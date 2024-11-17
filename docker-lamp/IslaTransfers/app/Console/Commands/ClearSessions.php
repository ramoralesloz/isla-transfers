<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;

class ClearSessions extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'session:clear';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Clear all session files';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        File::cleanDirectory(storage_path('framework/sessions'));
        $this->info('All session files have been cleared.');
        return Command::SUCCESS;
    }
}
