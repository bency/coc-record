<?php

namespace App\Console\Commands;

use Event;
use App\Events\UpdateClan;
use Ixudra\Curl\Facades\Curl;
use Illuminate\Console\Command;

class FetchCOC extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'coc:fetchclan';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Fetch clan data';

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
        $raw_data = Curl::to(env('COC_API_ENDPOINT') . '/clans/' . env('COC_CLANHASH'))
            ->withHeader('authorization: Bearer ' . env('COC_API_KEY'))
            ->enableDebug('/tmp/curl-error.txt')
            ->get();
        $data = json_decode($raw_data, true);
        Event::fire(new UpdateClan($data));
    }
}
