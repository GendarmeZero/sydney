<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Symfony\Component\Process\Process;

class StartSydneyServe extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'sydney';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Start Laravel serve only if the project name and database are "sydney"';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $projectName = 'sydney';
        $dbName = config('database.connections.mysql.database');

        if ($projectName === 'sydney' && $dbName === 'sydney') {
            $this->info('Starting the Laravel development server...');


            $process = new Process(['php', 'artisan', 'serve']);


            if (DIRECTORY_SEPARATOR !== '\\') {
                $process->setTty(true);
            }


            $process->setTimeout(null);


            $process->run(function ($type, $buffer) {
                echo $buffer;
            });


            return $process->isSuccessful() ? Command::SUCCESS : Command::FAILURE;
        } else {
            $this->error('The project or database name is not "sydney".');
            return Command::FAILURE;
        }
    }
}
