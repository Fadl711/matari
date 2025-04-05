<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class AddComment implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    /**
     * Create a new event instance.
     */
    public $commentcr;
    public function __construct($commentcr)
    {
        $this->commentcr = $commentcr;
        //
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return array<int, \Illuminate\Broadcasting\Channel>
     */
    public function broadcastOn()
    {
        return new Channel("comments");
    }
    public function broadcastAs()
    {
        return "create";
    }
    public function broadcastWith()
    {
        return 
         [
        "comment" => "[{$this->commentcr->comment}]"
               ] ; 

    //             return response()->json([
    //     'success' => true,
    //     'comment' => $this->commentcr->comment,
    //     'message' => 'Comment added successfully'
    // ], 201); 
        // Return additional data to be included in the broadcast event;
    }
}
