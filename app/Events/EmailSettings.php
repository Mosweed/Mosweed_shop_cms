<?php

namespace App\Events;

use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class EmailSettings implements ShouldQueue
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $emailConfigurations;

    /**
     * Create a new event instance.
     */
    public function __construct($emailConfigurations)
    {
        $this->emailConfigurations = $emailConfigurations;
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
}
