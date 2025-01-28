<?php

namespace App\Forms\Components;

use Filament\Forms\Components\Field;

class GrapesJsEditor extends Field
{
    protected string $view = 'forms.components.grapes-js-editor';

    protected string|\Closure|null $licenseKey = null;
    protected bool $showPages = false;
    protected array $excludedActions = ['store', 'showCode'];
    protected array $projectConfig = [];

    public function licenseKey(string|\Closure|null $key): static
    {
        $this->licenseKey = $key;
        return $this;
    }

    public function showPages(bool $showPages): static
    {
        $this->showPages = $showPages;
        return $this;
    }

    public function excludedActions(array $actions): static
    {
        $this->excludedActions = $actions;
        return $this;
    }

    public function getConfiguration(): array
    {
        return [
            'licenseKey' => $this->getLicenseKey(),
            'showPages' => $this->showPages,
            'excludedActions' => $this->excludedActions,
            'projectConfig' => array_merge([
                'type' => 'web',
                'default' => [
                    'pages' => [
                        [
                            'name' => 'Page',
                            'component' => '<h1 style="padding: 2rem; text-align:center">Hello Studio 👋</h1>'
                        ]
                    ],
                ]
            ], $this->projectConfig)
        ];
    }

    public function getLicenseKey(): ?string
    {
        return $this->evaluate($this->licenseKey) ?? config('grapesjs.key');
    }
}
