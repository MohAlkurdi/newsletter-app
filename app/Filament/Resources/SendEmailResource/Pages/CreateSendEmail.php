<?php

namespace App\Filament\Resources\SendEmailResource\Pages;

use App\Filament\Resources\SendEmailResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;
use Illuminate\Database\Eloquent\Model;

class CreateSendEmail extends CreateRecord
{
    protected static string $resource = SendEmailResource::class;

    protected function handleRecordCreation(array $data): Model
    {
        $data['sent_at'] = now('asia/Riyadh');
        return static::getModel()::create($data);
    }
}
