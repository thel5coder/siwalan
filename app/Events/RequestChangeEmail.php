<?php

namespace App\Events;

use App\Events\Event;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class RequestChangeEmail extends Event
{
    use SerializesModels;
    protected $status;
    protected $email;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct($status,$email)
    {
        $this->status = $status;
        $this->email = $email;
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

    /**
     * @return mixed
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }


}
