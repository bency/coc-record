<?php

namespace App\Events;

use App\Events\Event;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class UpdateMember extends Event
{
    use SerializesModels;
    public $clan;
    public $data;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(\App\Clan $clan, array $data)
    {
        $this->clan = $clan;
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
