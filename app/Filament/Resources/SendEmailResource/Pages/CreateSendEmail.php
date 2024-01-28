<?php

namespace App\Filament\Resources\SendEmailResource\Pages;

use App\Filament\Resources\SendEmailResource;
use App\Mail\Newsletter;
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

        $subscribedSubscribers = Subscriber::whereNull('unsubscribed_at')->get();

        $subscriberEmails = $subscribedSubscribers->pluck('email');

        foreach ($subscriberEmails as $email) {
            Mail::to($email)->send(new Newsletter($newRecord, $subscribedSubscribers->where('email', $email)->first()));
            // TODO: This is a temporary solution to avoid Mailtrap rate limit, remove it later. It takes so much time to send emails.
            sleep(5);
        }

        return $newRecord;
    }
}
