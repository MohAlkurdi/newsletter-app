<?php

namespace App\Filament\Widgets;

use App\Models\SendEmail;
use App\Models\Subscriber;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class StatsOverview extends BaseWidget
{
    protected function getStats(): array
    {
        return [
            Stat::make('Subscribers', Subscriber::count())
                ->icon('heroicon-o-users')
                ->chart(
                    ($this->SubscribersInThisYear()->toArray())
                )
                ->description('Subscriber This Year')
                ->color('info'),

            Stat::make('Emails Sent', SendEmail::count())
                ->icon('heroicon-o-envelope')
                ->chart(
                    ($this->SendEmailsInThisYear()->toArray())
                )
                ->description('Emails Sent This Year')
                ->color('success'),

        ];
    }

    protected function SubscribersInThisYear()
    {
        return Subscriber::whereYear('created_at', date('Y'))
            ->get()
            ->groupBy(function ($val) {
                return $val->created_at->format('F');
            })
            ->map(function ($item) {
                return $item->count();
            });
    }

    protected function SendEmailsInThisYear()
    {
        return SendEmail::whereYear('created_at', date('Y'))
            ->get()
            ->groupBy(function ($val) {
                return $val->created_at->format('F');
            })
            ->map(function ($item) {
                return $item->count();
            });
    }
}
