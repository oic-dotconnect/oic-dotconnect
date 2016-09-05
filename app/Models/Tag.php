<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
	protected $table = 'TAG';
	public $timestamps = false;

    public function events()
    {
        return $this->belongsToMany('App\Models\Event','event_tag');
    }
    public function users()
    {
        return $this->belongsToMany('App\Models\User','user_event');
    }
}
