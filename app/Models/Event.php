<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
	protected $table = 'EVENT';

    public function tags()
    {
        return $this->belongsToMany('App\Models\Tag','event_tag');
    }
    public function users()
    {
        return $this->belongsToMany('App\Models\User','user_event');
    }
}
