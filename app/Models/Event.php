<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
	protected $table = 'EVENT';

    public function tag()
    {
        return $this->belongsToMany('App\tag','event_tag');
    }
    public function user()
    {
        return $this->belongsToMany('App\user','user_event');
    }
}
