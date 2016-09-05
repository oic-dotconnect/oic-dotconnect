<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
	protected $table = 'TAG';
	public $timestamps = false;

    public function event()
    {
        return $this->belongsToMany('App\event','event_tag');
    }
    public function user()
    {
        return $this->belongsToMany('App\user','user_event');
    }
}
