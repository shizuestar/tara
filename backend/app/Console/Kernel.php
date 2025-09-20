<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    protected function schedule(Schedule $schedule)
    {
        $backupSchedule = config('backup.schedule', 'disabled');

        if ($backupSchedule === 'daily') {
            $schedule->command('backup:run')->daily();
        } elseif ($backupSchedule === 'weekly') {
            $schedule->command('backup:run')->weekly();
        } elseif ($backupSchedule === 'monthly') {
            $schedule->command('backup:run')->monthly();
        }
    }

    protected function commands()
    {
        $this->load(__DIR__.'/Commands');
    }
}