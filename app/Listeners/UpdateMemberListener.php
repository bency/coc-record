<?php

namespace App\Listeners;

use App\Events\UpdateMember;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class UpdateMemberListener
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
     * @param  UpdateMember  $event
     * @return void
     */
    public function handle(UpdateMember $event)
    {
        $member_data_key = [
            'tag',
            'name',
            'role',
            'expLevel',
            'trophies',
            'clanRank',
            'previousClanRank',
            'donations',
            'donationsReceived',
        ];
        $data = $event->data['memberList'];
        foreach ($data as $d) {
            $member_data = array_only($d, $member_data_key);
            $member = $event->clan->members()->UpdateOrCreate(['tag' => $member_data['tag']], $member_data);
            \Event::fire(new \App\Events\CreateMemberRecord($member, $d));
        }
    }
}
