<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    //
    protected $guarded = [];

    public function fromContact()
    {
    	// return $this->hasOne(User::class,'id', 'from');
    	return $this->hasOne(User::class,'id', 'asked_by');
    	// $message->fromContact
    }

    public function toContact()
    {
    	// return $this->hasOne(User::class,'id', 'from');
    	return $this->hasOne(Subject::class,'id', 'subject');
    	// $message->fromContact
    }

}
