<?php

namespace App\Console;

use App\Console\Commands\CveCheckCommand;
use App\Console\Commands\ReadHostDataCommand;
use App\Console\Commands\ReadOperatingSystemDataCommand;
use App\Console\Commands\SitemapGeneratorCommand;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    private const ENV_PROD = 'prod';
    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [
        ReadHostDataCommand::class,
        ReadOperatingSystemDataCommand::class,
        CveCheckCommand::class,
        SitemapGeneratorCommand::class,
    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        // $schedule->command('inspire')
        //          ->hourly();

        if (getenv('APP_ENV') === self::ENV_PROD) {
            $schedule->command(CveCheckCommand::class)
                ->hourlyAt(12);
            $schedule->command(ReadHostDataCommand::class)
                ->hourlyAt(2);
            $schedule->command(ReadOperatingSystemDataCommand::class)
                ->hourlyAt(3);
            $schedule->command(SitemapGeneratorCommand::class)
                ->weekends();
        }
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
