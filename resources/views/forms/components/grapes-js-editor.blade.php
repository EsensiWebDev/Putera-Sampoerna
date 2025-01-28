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
        <div id="gjs-{{ $getId() }}" style="height: 800px" wire:ignore
             x-data="{ state: $wire.$entangle('{{ $getStatePath() }}') }"
             x-init="createStudioEditor({
                root: '#gjs-{{ $getId() }}',
                licenseKey: 'test',
                pages: {
                    add: false
                },
                actions: ({actions}) => {
                    const EXCLUDED_ACTIONS = ['store', 'showCode', 'preview'];

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
                                editor.runCommand('fullscreen', target);
                                setState({active: 1});
                            } else {
                                editor.stopCommand('fullscreen', target);
                                setState({active: 0});
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
                settingsMenu: false,
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
