<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
	protected $table = 'TAG';
	public $timestamps = false;

    public function event()
    {
        return $this->belongsToMany('App\Models\Event','event_tag');
    }
    public function user()
    {
        return $this->belongsToMany('App\Models\User','user_event');
    }
}
