<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class candidy_tag extends Model
{   
    /*  項目一覧
    *   カラム名     型          説明              備考
    *   id          integer    候補タグのID
    *   name        string     候補タグのタグ名      
    */
              
    protected $table = 'CANDIDACY_TAG';
    public $timestamps = false;
}
