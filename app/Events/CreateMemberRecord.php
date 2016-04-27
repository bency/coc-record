<?php

namespace App\Events;

use App\Events\Event;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class CreateMemberRecord extends Event
{
    use SerializesModels;
    public $member;
    public $data;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(\App\Member $member, array $data)
    {
        $this->member = $member;
        $this->data = $data;
    }

    /**
     * Get the channels the event should be broadcast on.
     *
     * @return array
     */
    public function broadcastOn()
    {
        return [];
    }
}
