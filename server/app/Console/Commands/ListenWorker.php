<?php
/**
 * Created by PhpStorm.
 * User: tm30user
 * Date: 07/03/2018
 * Time: 5:43 PM
 */

namespace App\Console\Commands;

use Illuminate\Console\Command;

class ListenWorker extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'worker:listen {queue}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Starts a worker listening on a particular queue';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $queue = $this->argument('queue');
        echo "listening on $queue";
        Tail::listenWithOptions($queue, [
            'empty_queue_timeout' => 0,
            'time' => 0,
            'message_limit' => 0
        ], function ($messages) {
            print_r(json_decode($messages));
        });
    }

}