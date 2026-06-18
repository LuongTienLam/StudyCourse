<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [
        //
    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        // $schedule->command('inspire')->hourly();
    }

    /**
     * Register the commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }

    /**
     * Get the bootstrap classes for the application.
     *
     * @return array
     */
    protected function bootstrappers()
    {
        $bootstrappers = parent::bootstrappers();

        // Inject custom bootstrapper to suppress deprecation warnings on PHP 8.1+
        $index = array_search(\Illuminate\Foundation\Bootstrap\HandleExceptions::class, $bootstrappers);
        if ($index !== false) {
            array_splice($bootstrappers, $index + 1, 0, \App\Bootstrap\SuppressDeprecations::class);
        }

        return $bootstrappers;
    }
}
