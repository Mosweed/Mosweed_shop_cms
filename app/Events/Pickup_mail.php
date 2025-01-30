<?php

namespace App\Events;

use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class Pickup_mail
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $order;

    public $OrderItemsData;

    /**
     * Create a new event instance.
     */
    public function __construct($order, $OrderItemsData)
    {
        //dd($order, $OrderItemsData);
        $this->order = $order;
        $this->OrderItemsData = $OrderItemsData;
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
