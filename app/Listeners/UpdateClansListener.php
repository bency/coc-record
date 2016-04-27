<?php

namespace App\Listeners;

use App\Events\UpdateClan;
use App\Clan;
use App\ClanRecord;
use App\Member;
use App\MemberRecord;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class UpdateClansListener
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
     * @param  SomeEvent  $event
     * @return void
     */
    public function handle(UpdateClan $event)
    {
        $data = $event->data;
        $clan_data = array_only($data, ['name', 'tag']);
        $clan = Clan::UpdateOrCreate($clan_data);
        \Event::fire(new \App\Events\CreateClanRecord($clan, $data));
        \Event::fire(new \App\Events\UpdateMember($clan, $data));
    }
}
