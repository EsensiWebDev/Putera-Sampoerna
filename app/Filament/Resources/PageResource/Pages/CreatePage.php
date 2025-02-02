<?php

namespace App\Filament\Resources\PageResource\Pages;

use App\Filament\Resources\PageResource;
use Filament\Actions\Action;
use Filament\Notifications\Notification;
use Filament\Resources\Pages\CreateRecord;

class CreatePage extends CreateRecord
{
    protected static string $resource = PageResource::class;

    protected static string $view = 'filament.resources.pages.pages.create-page';

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        $data['content_'.$data['lang']] = $data['content'];
        unset($data['lang'], $data['content']);
        $data['created_by'] = auth()->id();

        return $data;
    }

    protected function getCreatedNotification(): ?Notification
    {
        return Notification::make()
            ->success()
            ->title('Page created')
            ->body('The page has been created successfully.');
    }

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }

    protected function getCreateFormAction(): Action
    {
        return parent::getCreateFormAction()
            ->submit(null)
            ->requiresConfirmation()
            ->action(function () {
                $this->closeActionModal();
                $this->create();
            });
    }

    protected function getFormActions(): array
    {
        return [
            $this->getCreateFormAction(),
            $this->getCancelFormAction()
        ];
    }
}
