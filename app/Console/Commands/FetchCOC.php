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
    protected $signature = 'coc:fetchclan {--dry-run=*}';

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
        $options = $this->option();
        $curl = Curl::to(env('COC_API_ENDPOINT') . '/clans/' . urlencode(env('COC_CLANHASH')))
            ->withHeader('authorization: Bearer ' . env('COC_API_KEY'))
            ->enableDebug('/tmp/curl-error.txt');
        if (env('PROXY') and env('PROXY_AUTH')) {
            $curl->withOption('PROXY', env('PROXY'))->withOption('PROXYUSERPWD', env('PROXY_AUTH'));
        }
        $raw_data = $curl->get();
        $data = json_decode($raw_data, true);
        if(count($options['dry-run'])) {
            return var_dump($data);
        }
        Event::fire(new UpdateClan($data));
    }
}
