<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Contracts\Broadcasting\ShouldBroadcastNow;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class WaiterCalled implements ShouldBroadcastNow
{
    use Dispatchable, InteractsWithSockets, SerializesModels;


    public $menuId;
    public $tableNumber;

    public function __construct($menuId, $tableNumber)
    {
        $this->menuId = $menuId;
        $this->tableNumber = $tableNumber;
    }

    public function broadcastOn()
    {
        return new Channel('menu.' . $this->menuId);
    }

    public function broadcastWith()
    {
        return [
            'menuId' => $this->menuId,
            'tableNumber' => $this->tableNumber,
        ];
    }
}
