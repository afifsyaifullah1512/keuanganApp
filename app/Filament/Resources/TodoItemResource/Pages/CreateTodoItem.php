<?php

namespace App\Filament\Resources\TodoItemResource\Pages;

use App\Filament\Resources\TodoItemResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateTodoItem extends CreateRecord
{
    protected static string $resource = TodoItemResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
