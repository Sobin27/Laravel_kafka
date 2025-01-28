<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;
use Junges\Kafka\Contracts\KafkaMessage;
use Junges\Kafka\Facades\Kafka;


class Consumer extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'consumer';

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
        try {
            $consumer = Kafka::consumer()
                ->subscribe('test')
                ->withHandler(function (KafkaMessage $message) {
                    Log::info('Mensagem recebida: ', $message->getBody());
                })
                ->build();
            $consumer->consume();
        }catch (\Exception $exception){
            Log::info($exception->getMessage());
        }
    }
}
