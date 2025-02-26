<?php

namespace App\Events;

use App\Models\SalespersonLocation;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class LocationUpdated implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $location;

    public function __construct(SalespersonLocation $location)
    {
        $this->location = $location;
    }

    public function broadcastOn()
    {
        return ['salesperson-location'];
    }

    public function broadcastAs()
    {
        return 'location-updated';
    }
}
