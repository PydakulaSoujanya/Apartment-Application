<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    protected $commands = [
        // Register your custom commands here
        \App\Console\Commands\GenerateMaintenanceFees::class,
    ];

    protected function schedule(Schedule $schedule)
    {
        // Schedule your commands here
        $schedule->command('maintenance:generate-fees')->monthlyOn(1, '00:00');
    }

    protected function commands()
    {
        $this->load(__DIR__.'/Commands');

        // Load routes for console commands
        require base_path('routes/console.php');
    }
}
