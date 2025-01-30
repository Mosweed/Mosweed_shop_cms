<?php

namespace App\Events;

use App\Models\User;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class UserLoggedIn implements ShouldQueue
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $user_id;

    public $session_id;

    /**
     * Create a new event instance.
     */
    public function __construct($user_id, $session)
    {
        $this->user_id = $user_id;
        $this->session_id = $session;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return array<int, \Illuminate\Broadcasting\Channel>
     */
    public function broadcastOn(): array
    {
        return [
            new PrivateChannel('channel-name'),
        ];
    }

    // public $user;

    //     /**
    //      * Create a new event instance.
    //      */
    //     public function __construct(string $user)
    //     {
    //         $this->user = $user;
    //     }

    //     /**
    //      * Get the channels the event should broadcast on.
    //      *
    //      * @return array<int, \Illuminate\Broadcasting\Channel>
    //      */
    //     public function broadcastOn(): array
    //     {
    //         return [
    //             new PrivateChannel('channel-name'),
    //         ];
    //     }

}
