<?php

namespace App\Filament\Resources\SendEmailResource\Pages;

use App\Filament\Resources\SendEmailResource;
use App\Mail\Newsletter;
use App\Models\SendEmail;
use App\Models\Subscriber;
use Filament\Resources\Pages\CreateRecord;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Mail;

class CreateSendEmail extends CreateRecord
{
    protected static string $resource = SendEmailResource::class;

    protected function handleRecordCreation(array $data): Model
    {
        $data['sent_at'] = now('asia/Riyadh');

        $newRecord = static::getModel()::create($data);

        Mail::to(Subscriber::all())->send(new Newsletter(SendEmail::find($newRecord->id)));

        return $newRecord;
    }
}
