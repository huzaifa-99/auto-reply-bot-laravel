<?php

namespace App\Events;

use App\Message;

use Illuminate\Queue\SerializesModels;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;



class NewMessage implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $message;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(Message $message)
    {
        $this->message = $message;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        // if($this->message->subject==null){
        //     $this->message->to=$this->message->asked_by;
        // }
        // else{
        //     $this->message->to=$this->message->subject;
        // }
        // return new PrivateChannel('messages.'.$this->message->asked_by);
        return new PrivateChannel('messages.'.$this->message->asked_by);
    }


    public function broadcastWith()
    {   
        // if($this->message->subject==null){
        //     $this->message->load('toContact');
        // }
        // elseif($this->message->asked_by==null){
        //     $this->message->load('fromContact');
        // }
        
        $this->message->load('toContact');

        return ["message" => $this->message];
    }
}
