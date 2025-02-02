<?php

namespace App\Filament\Resources\PageResource\Pages;

use App\Filament\Resources\PageResource;
use Filament\Actions\Action;
use Filament\Notifications\Notification;
use Filament\Resources\Pages\EditRecord;

class EditPage extends EditRecord
{
    protected static string $resource = PageResource::class;

    protected function getHeaderActions(): array
    {
        return [
//            Actions\DeleteAction::make(),
        ];
    }

    protected function mutateFormDataBeforeFill(array $data): array
    {
        $data['content'] = $data['content_id'];
        $data['lang'] = 'id';
        return $data;
    }

    protected function mutateFormDataBeforeSave(array $data): array
    {
        $data['content_'.$data['lang']] = $data['content'];
        unset($data['lang'], $data['content']);

        return $data;
    }

    protected function getSavedNotification(): ?Notification
    {
        return Notification::make()
            ->success()
            ->title('Page edited')
            ->body('The page has been edited successfully.');
    }

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }

    protected function getSaveFormAction(): Action
    {
        return parent::getSaveFormAction()
            ->submit(null)
            ->requiresConfirmation()
            ->action(function () {
                $this->closeActionModal();
                $this->save();
            });
    }

    protected function getFormActions(): array
    {
        return [
            $this->getSaveFormAction(),
            $this->getCancelFormAction()
        ];
    }
}
