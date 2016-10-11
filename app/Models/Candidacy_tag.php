<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Candidacy_tag extends Model
{   
    /*  項目一覧
    *   カラム名     型          説明              備考
    *   id          integer    候補タグのID
    *   name        string     候補タグのタグ名      
    */
              
    protected $table = 'CANDIDACY_TAG';
    public $timestamps = false;

    public function tags()
    {
    	return $this->belongsTo('App\Models\Tag','tag_id');
    }
}
