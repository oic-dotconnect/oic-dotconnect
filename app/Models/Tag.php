<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{   
    /*  項目一覧
    *   カラム名     型          説明              備考
    *   id          integer    タグのID
    *   name        string     タグ名      
    */

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
