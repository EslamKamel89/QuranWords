<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Symfony\Component\Process\Process;
use Symfony\Component\Process\Exception\ProcessFailedException;

class Clear extends Command {
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'eslam:clear';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Clear all Laravel caches and composer autoload';

    /**
     * Execute the console command.
     */
    public function handle() {
        $this->info('Clearing Laravel application caches...');

        $this->call('config:clear');
        $this->call('cache:clear');
        $this->call('route:clear');
        $this->call('view:clear');
        $this->call('event:clear');
        $this->call('optimize:clear');
        // $this->info('Running composer dump-autoload...');
        // $process = new Process(['composer', 'dump-autoload']);
        // $process->setTimeout(300);
        // $process->run();

        // if (!$process->isSuccessful()) {
        //     throw new ProcessFailedException($process);
        // }

        $this->info('clear success');
    }
}
