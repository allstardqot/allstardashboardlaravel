<?php

namespace App\Console;
use App\Jobs\GetFixture;
use App\Jobs\SetUserTeamTotal;
use App\Jobs\WinningProcess;
use App\Jobs\NewsData;
use App\Models\Team;
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
        $schedule->job(SetUserTeamTotal::class)->everyFifteenMinutes();
        $schedule->job(WinningProcess::class)->daily();
        //$schedule->job(GetTeam::class)->everyMinute();
        //$schedule->command('demo:cron')->everyMinute();
        $schedule->job(NewsData::class)->daily();
        //$schedule->job(GetTeam::class)->weekly();
        //dispatch($schedule);
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
