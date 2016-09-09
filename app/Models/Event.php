<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{   
    /*  項目一覧
    *   カラム名     型          説明              備考
    *   id          integer    イベントのID
    *   code        string     イベントのコード
    *   name        string     候補タグのタグ名      
    */

	protected $table = 'EVENT';

    public function tags()
    {
        return $this->belongsToMany('App\Models\Tag','event_tag');
    }
    public function users()
    {
        return $this->belongsToMany('App\Models\User','user_event')->withPivot('state');
    }

	public function entry_num()
    {
		return $this->users()->count();
	}

    public function scopeBeforeHold($query)
    {
        $Today = date("Y-m-d");

        return $query->where('start_date','>=',$Today);
    }
}
