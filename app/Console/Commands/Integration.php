<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;
use Junges\Kafka\Facades\Kafka;

class Integration extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'integration';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $user = User::factory()->createOne();
        try {
            Kafka::publish('localhost')
                ->onTopic('test')
                ->withBodyKey(18,$user)
                ->send();
        }catch (\Exception $exception){
            Log::info($exception->getMessage());
        }
    }
}
