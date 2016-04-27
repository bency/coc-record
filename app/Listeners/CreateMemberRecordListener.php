<?php

namespace App\Listeners;

use App\Events\CreateMemberRecord;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class CreateMemberRecordListener
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
     * @param  CreateMemberRecord  $event
     * @return void
     */
    public function handle(CreateMemberRecord $event)
    {
        $member_data_key = [
            'name',
            'role',
            'expLevel',
            'league',
            'trophies',
            'clanRank',
            'previousClanRank',
            'donations',
            'donationsReceived',
        ];
        $member_data = array_only($event->data, $member_data_key);
        $member_data['league'] = $member_data['league']['name'];
        $event->member->records()->create($member_data);
    }
}
