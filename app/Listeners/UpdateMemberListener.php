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
        $data = $event->data['memberList'];
        foreach ($data as $d) {
            $member_data = array_only($d, ['name', 'tag']);
            $member = $event->clan->members()->UpdateOrCreate($member_data);
        }
    }
}
