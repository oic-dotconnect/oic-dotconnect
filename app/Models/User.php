<?php

namespace App\Models;

use Hash;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{   
     /*  項目一覧
    *   カラム名        型          説明                備考
    *   id             integer    ユーザーのID         他のモデルとリレーションを張るためなどプログラム上で使用する。ユーザーを識別可能なユニークなコード
    *   code           string     ユーザーのコード      リンクなどの表示用に用いる。ユーザーを識別可能なユニークなコード
    *   name           string     ユーザー名      
    *   student_number string     学籍番号
    *   email　        string     メールアドレス    　
    *   student_name   string     本名
    *   introduction   text       紹介文
    *   image_name     string     プロフィール画像の名前
    */

    protected $table = "USER";
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'code', 'name', 'email', 'student_number', 'google_id','student_name','image_pass','introduction','event_join_notice','event_cancel_notice','favorite_tag_notice'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'remember_token',
    ];

    public function scopeGoogle($query, $google_id)
    {
        return $query->where('google_id', $google_id);
    }

    public static function create(array $data = Array()){
      $array  = ['code' => substr(bcrypt($data['google_id']),-7),
                'student_number' => substr($data['email'],0,5)];
      $merged_array = array_merge($array,$data); 
      return parent::create($merged_array);
    }

    public function tags()
    {
        return $this->belongsToMany('App\Models\Tag','user_tag')->withPivot('noticed');
    }
    public function events()
    {
        return $this->belongsToMany('App\Models\Event','user_event')->withPivot('role','entry');
    }

    public function organize()
    {
        return $this->hasMany('App\Models\Event', 'organizer_id');
    }

    public static function findCode($code) {
        return self::where('code',$code)->first();
    }

    /*ユーザーのおすすめイベントを取得する
    *return query
    */

    public function recommende_events()
    {
        $fav_events = $this->tags->map(function($tag){ return $tag->events; })->flatten()->map(function($event){ return $event->id; })->unique();
	    return Event::BeforeHold()->whereIn('id', $fav_events);
    }

    /*参加したイベント
    *return query
    */
    public function joined_events()
    {    
	    return $this->events()->Role('member');
    }
    
    /*開催したイベント
    *return query
    */
    public function hold_events()
    {    
	    return $this->events()->Role('admin');
    }
       
}
