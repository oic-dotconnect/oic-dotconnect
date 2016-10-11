<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{   
    /*  項目一覧
    *   カラム名        型          説明              備考
    *   id             integer    イベントのID       他のモデルとリレーションを張るためなどプログラム上で使用する。イベントを識別可能なユニークなコード
    *   code           string     イベントのコード    リンクなどの表示用に用いる。イベントを識別可能なユニークなコード
    *   name           string     イベントの名      
    *   field          string     イベントの分野      この項目には、it(IT分野), design(デザイン分野), move(映像分野), game(ゲーム分野), other(その他)が入る
    *   description    text       イベントの概要、説明 
    *   start_date     date       イベントの開催日　   フォーマット: Y-m-d 2016-09-06
    *   start_at       time       イベントの開始時間   フォーマット： H:i:s 19:00:00
    *   end_date       date       イベントの開催日　   フォーマット: Y-m-d 2016-09-06
    *   end_at         time       イベントの開始時間   フォーマット： H:i:s 19:00:00
    *   place          string     開催場所
    *   capacity       int        定員数
    *   open           boolean    公開               true:公開中　false:非公開（下書き）
    *   open_date      datetime   公開日             フォーマット：　Y-m-d H:i:s 2016-09-06 19:00:00
    *   oganizer_id    int        主催者のユーザーID   
    */

	protected $table = 'EVENT';

    public function tags()
    {
        return $this->belongsToMany('App\Models\Tag','event_tag');
    }
    public function users()
    {
        return $this->belongsToMany('App\Models\User','user_event')->withPivot('role');
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
