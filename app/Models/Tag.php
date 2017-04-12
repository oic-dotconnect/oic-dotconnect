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

    protected $fillable = [ 'name' ];

    public function candidacy_tags()
    {
        return $this->hasOne('App\Models\Candidy_tag','tag_id');
    }
    public function events()
    {
        return $this->belongsToMany('App\Models\Event','EVENT_TAG');
    }
    public function users()
    {
        return $this->belongsToMany('App\Models\User','USER_TAG');
    }

    protected $appends = ['search_url']; 

    public function getSearchUrlAttribute(){
        return route('event-search', ['tags' => $this->name ]);
    }
}
