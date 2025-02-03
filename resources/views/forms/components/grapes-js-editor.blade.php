<x-dynamic-component
        :component="$getFieldWrapperView()"
        :id="$getId()"
        :label="$getLabel()"
        :label-sr-only="$isLabelHidden()"
        :helper-text="$getHelperText()"
        :hint="$getHint()"
        :hint-icon="$getHintIcon()"
        :required="$isRequired()"
        :state-path="$getStatePath()"
>
    <div>
        <div id="gjs" style="height: 800px" wire:ignore
             x-data="{ state: $wire.$entangle('{{ $getStatePath() }}') }"
             x-init="
             createStudioEditor({
                root: '#gjs',
                licenseKey: '{{ config('app.grapesjs_token')  }}',
                pages: {
                    add: false
                },
                settingsMenu: false,
                actions: ({actions}) => {
                    const EXCLUDED_ACTIONS = ['store', 'showCode'];

                    // Helper function to create the fullscreen action object
                    const createFullscreenAction = () => ({
                        id: 'fullscreen',
                        icon: 'fullscreen',
                        tooltip: 'Fullscreen',
                        buttonType: 'button',
                        onClick: ({editor, state, setState}) => {
                            const isActive = state.active;
                            const target = {target: '#gjs'};

                            if (!isActive) {
                                setState({active: 1});
                                editor.runCommand('fullscreen', target);
                            } else {
                                setState({active: 0});
                                editor.stopCommand('fullscreen', target);
                            }
                        }
                    });

                    // Filter and map actions
                    return actions
                        .filter(action => !EXCLUDED_ACTIONS.includes(action.id))
                        .map(action => action.id === 'fullscreen'
                            ? createFullscreenAction()
                            : {
                                ...action,
                                buttonType: 'button'
                            }
                        );
                },
                onReady: (editor) => {
                    const editorContainer = document.getElementById('gjs');
                    const buttons = editorContainer.querySelectorAll('button')

                    buttons.forEach(button => {
                        button.setAttribute('type', 'button');
                    })

                    window.addEventListener('lang-changed', function (e) {
                        const defaultState = {
                            html: `<h1 style='padding: 2rem; text-align:center'>Hello Studio 👋</h1>`,
                            css: ''
                        }
                        const content = e.detail[0].content ? JSON.parse(e.detail[0].content) : defaultState;

                        if (content.html) editor.setComponents(content.html);
                        if (content.css) editor.setStyle(content.css);

                        state = JSON.stringify(content)
                    })

                    editor.on('rte:enable', async () => {
                        await delay(50);
                        const btnToolbar = document.getElementsByClassName('gjs-rte-toolbar')[0].querySelectorAll('button');

                        btnToolbar.forEach(button => {
                            button.setAttribute('type', 'button');
                        })
                    })

                    editor.on('component:selected', async () => {
                        await delay(50);
                        const btnLayer = document.querySelector('.gjs-cv-unscale.gs-utl-flex.gs-utl-absolute button').parentElement.parentElement.querySelectorAll('button');
                        btnLayer.forEach(button => {
                            button.setAttribute('type', 'button');
                        })
                    })

                    editor.DomComponents.addType('livewire-latest-update', {
                      isComponent: (el) => el.tagName === 'LIVEWIRE:NEWS.LATEST-UPDATE',
                      model: {
                        defaults: {
                          tagName: 'livewire:news.latest-update',
                          traits: [
                            {
                              type: 'text',
                              name: 'id',
                              label: 'ID',
                            },
                          ],
                          droppable: false,
                          stylable: false,
                        },
                      },
                      view: {
                        onRender() {
                          // Visual representation in the editor
                          this.el.innerHTML = 'Livewire Latest Update';
                          this.el.style.border = '1px solid #ccc';
                          this.el.style.padding = '10px';
                          this.el.style.background = '#f9f9f9';
                        },
                      },
                    });

                    editor.BlockManager.add('livewire-latest-update', {
                      label: 'Livewire Latest Update',
                      category: 'Livewire',
                      content: {
                        type: 'livewire-latest-update',
                      },
                    });


                    function delay(ms) {
                      return new Promise(resolve => setTimeout(resolve, ms));
                    }
                },
                onUpdate: (projectData, editor) => {

                    const css_code = editor.getCss();
                    const content = editor.getHtml({cleanId: true});
                    const extract = content.match(/<body\b[^>]*>([\s\S]*?)<\/body>/);

                    if (extract) {
                        state = JSON.stringify({html: extract[1], css: css_code})
                    } else {
                        state = JSON.stringify({html: editor.getHtml(), css: css_code})
                    }
                },
                project: {
                    type: 'web',
                    default: {
                        pages: [
                            {
                                name: 'Page',
                                component: `<h1 style='padding: 2rem; text-align:center'>Hello Studio project 👋</h1>`
                            }
                        ]
                    },
                },
                components: {
                    contextMenu: ({ items, component, type, source }) => {
                        return []
                    }
                },
                storage: {
                    type: 'self',
                    onSave: async ({project}) => {
                    },
                    onLoad: async () => {
                        const defaultState = JSON.stringify({
                            html: `<h1 style='padding: 2rem; text-align:center'>Hello Studio 👋</h1>`,
                            css: ''
                        })

                        const savedState = state ? JSON.parse(state) : JSON.parse(defaultState);

                        state = JSON.stringify(savedState);

                        return {
                            project: {
                                pages: [
                                    {
                                        name: 'Page',
                                        component: `
                                        <!doctype html>
                                        <html lang='en'>
                                        <head>
                                            <meta charset='UTF-8'>
                                            <meta name='viewport' content='width=device-width, initial-scale=1.0'>
                                            <title>Page</title>
                                            <link rel='preload' as='style' href='https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css'>
                                            <noscript>
                                                <link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css'>
                                            </noscript>
                                            <link rel='stylesheet' href='{{ asset("assets/css/styles.min.css") }}'>
                                            <link rel='stylesheet' href='{{ asset("assets/css/app.css") }}'>
                                            <style>
                                                ${savedState.css}
                                            </style>
                                        </head>
                                        ${savedState.html}
                                        </html>`
                                    }
                                ]
                            }
                        }
                    },
                }
            });"
        ></div>
    </div>
</x-dynamic-component>

@push('scripts')
    @vite(['resources/js/grapesjs.js'])
@endpush
