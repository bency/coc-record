<?php

namespace App\Listeners;

use App\Events\CreateClanRecord;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class CreateClanRecordListener
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  CreateClanRecord  $event
     * @return void
     */
    public function handle(CreateClanRecord $event)
    {
        $clan_record_data_key = [
            'name',
            'type',
            'description',
            'badgeUrls',
            'location',
            'warFrequency',
            'clanLevel',
            'warWins',
            'warWinStreak',
            'clanPoints',
            'requiredTrophies',
            'members',
        ];
        $data = $event->data;
        $clan_record_data = array_only($data, $clan_record_data_key);
        $clan_record_data['badgeUrls'] = json_encode($clan_record_data['badgeUrls']);
        $clan_record_data['location'] = json_encode($clan_record_data['location']);
        $event->clan->records()->create($clan_record_data);
    }
}
