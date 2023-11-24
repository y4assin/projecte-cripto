<?php

namespace App\Console;

use App\Http\Controllers\CryptoController;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * Updates the prices history of a crypto every minute
     */
    protected function schedule(Schedule $schedule): void
    {
        $schedule->call(function () {
            $controller = new CryptoController();
            $controller->autoUpdateHistory();
        })->everyMinute();
    }

    /**
     * Register the commands for the application.
     */
    protected function commands(): void
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}
