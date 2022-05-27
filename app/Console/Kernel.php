<?php

namespace App\Console;
use App\Jobs\GetFixture;
use App\Jobs\GetTeam;
use App\Jobs\NewsData;
use Illuminate\Console\Command;
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
        Commands\Democron::class,
    ];


    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        $schedule->job(GetFixture::class)->everyFifteenMinutes();
        //$schedule->command('demo:cron')->everyMinute();
        //$schedule->job(GetTeam::class)->everyFifteenMinutes();
        //$schedule->job(NewsData::class)->everyFifteenMinutes();
        //$schedule->job(GetTeam::class)->weekly();
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
}
