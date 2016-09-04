<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
	protected $table = 'TAG';

    public function event()
    {
        return $this->belongsToMany('App\event','event_tag');
    }
    public function user()
    {
        return $this->belongsToMany('App\user','user_event');
    }
}
