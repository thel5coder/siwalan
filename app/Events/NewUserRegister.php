<?php

namespace App\Events;

use App\Events\Event;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class NewUserRegister extends Event
{
    use SerializesModels;

    private $email;
    private $token;
    private $name;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct($email,$token,$name)
    {
        $this->email = $email;
        $this->token = $token;
        $this->name = $name;
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
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @return mixed
     */
    public function getToken()
    {
        return $this->token;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }


}
