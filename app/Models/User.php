<?php

namespace App\Models;

use Hash;
use Image; 
use File;
use DB;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\AwsUploader;


class User extends Authenticatable
{   
    use SoftDeletes;
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
      $array  = ['code' => substr(md5(str_shuffle('1234567890abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ')),0,7),
                'student_number' => substr($data['email'],0,5)];
      $merged_array = array_merge($array,$data); 
      return parent::create($merged_array);
    }

    protected $appends = ['icon_url', 'icon_min_url', 'userpage_url']; 

    public function getIconUrlAttribute(){
        return "https://s3-ap-northeast-1.amazonaws.com/linker/icons/" . $this->code . "/icon.png";
    }

    public function getIconMinUrlAttribute(){
        return "https://s3-ap-northeast-1.amazonaws.com/linker/icons/" . $this->code . "/icon_min.png";
    } 

    public function getUserpageUrlAttribute(){
        return route('user-page', [ 'user_code' => $this->code ]);
    } 

    public function tags()
    {
        return $this->belongsToMany('App\Models\Tag','USER_TAG')->withPivot('noticed');
    }
    public function events()
    {
        return $this->belongsToMany('App\Models\Event','USER_EVENT')->withPivot('role','entry');
    }

    public function organize()
    {
        return $this->hasMany('App\Models\Event', 'organizer_id');
    }

    public function favoriteUsers()
    {
        return $this->belongsToMany('App\Models\User', 'FAVORITE_USER', 'user1_id', 'user2_id');
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
	    return $this->organize();
    }

    public function getPivotTags($user_id)
    {
        return $this->tags()->newPivotStatement()->where('user_id', $user_id);
    }

    public function iconUp($file_path, $delete = true){
        $image = Image::make($file_path);
        $width = $image->width();
        $height = $image->height();

        $small_len = $width <= $height? $width : $height;
        $large_len = $width <= $height? $height : $width;
        $direction = $width <= $height? "y" : "x";
        $diff_len = $large_len - $small_len; 

        if($direction === "x"){
            $crop_img = $image->crop($small_len, $small_len, floor($diff_len/2), 0);
        } else {
            $crop_img = $image->crop($small_len, $small_len, 0, floor($diff_len/2));
        }

        $icon = $crop_img->resize(200, 200);
        $icon->save(public_path('icon.png'),90);

        $icon_min = $crop_img->resize(64,64);
        $icon_min->save(public_path('icon_min.png'),90);

        $result['icon_min'] = AwsUploader::up("icons/" . $this->code . "/icon_min.png", public_path('icon_min.png'));
        $result['icon'] = AwsUploader::up("icons/" . $this->code . "/icon.png", public_path('icon.png'));
        if($delete){
            if(File::exists($file_path)) File::delete($file_path);
        }

        if(File::exists(public_path('icon.png'))) File::delete(public_path('icon.png'));
        if(File::exists(public_path('icon_min.png'))) File::delete(public_path('icon_min.png'));

        return $result;
        return null;        
    }

    public function iconPath(){
        return "https://s3-ap-northeast-1.amazonaws.com/linker/icons/" . $this->code . "/icon.png";
    }

    public function iconMinPath(){
        return "https://s3-ap-northeast-1.amazonaws.com/linker/icons/" . $this->code . "/icon_min.png";
    } 

    /*ユーザーをお気に入りにしているか*/
    public function isFavorite(User $user){
        $user = $this->favoriteUsers()->where('code', $user->code)->get();
        if (!$user->isEmpty()){
            return true;
        } else {
            return false;
        }
    }

}
