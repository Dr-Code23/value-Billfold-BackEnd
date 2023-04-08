<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;
use App\Models\Notification;

class ApprovedNotify implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;



    public $user;

    public $message;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct($user)
    {
        $this->message  = "{$user->name} . is the new user registered now";

        $notification = Notification::create([
            "UserName" => $user->name,
            "email" => $user->email,
            "message" =>  $this->message
        ]);
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return ['Notify'];
    }
}
