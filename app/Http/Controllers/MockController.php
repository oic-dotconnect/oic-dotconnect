<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Models\User;

class MockController extends Controller
{
    public function landing(){
      $event = (Object)[
        'code' => 'abcdefg',
        'name' => 'Laravel勉強会',
        'field' => 'it',
        'start_date' => '2016-07-07',
        'start_at' => '17:00:00',
        'end_date' => '2016-07-07',
        'end_at' => '18:00:00',
        'place' => '5A',
        'capacity' => 30,
        'entry_num' => 20,
        'tags' => [
          'Web',
          'Laravel',
          'PHP'
        ]
      ];

      $new_events = [
        $event,
        $event,
        $event,
        $event,
        $event,
      ];

      $hold_events = [
        $event,
        $event,
        $event,
        $event,
        $event,
      ];

      $data['new_events'] = $new_events;
      $data['hold_events'] = $hold_events;

      return view('landing',$data);
    }

    public function mypage(){
      $event = (Object)[
        'code' => 'abcdefg',
        'name' => 'Laravel勉強会',
        'field' => 'it',
        'start_date' => '2016-07-07',
        'start_at' => '17:00:00',
        'end_date' => '2016-07-07',
        'end_at' => '18:00:00',
        'place' => '5A',
        'capacity' => 30,
        'entry_num' => 20,
        'tags' => [
          'Web',
          'Laravel',
          'PHP'
        ]
      ];

      $new_events = [
        $event,
        $event,
        $event,
        $event,
        $event,
      ];

      $hold_events = [
        $event,
        $event,
        $event,
        $event,
        $event,
      ];

      $data['new_events'] = $new_events;
      $data['hold_events'] = $hold_events;

      return view('mypage/manage',$data);
    }

    public function organize()
    {
      $data['user'] = User::with(['tags', 'organize' => function($query){
        $query->with('tags');
      }])->find(1);

      /*
      * user : ユーザー情報
      * user->organize : 主催しているイベント一覧
      * user->tags : お気に入りしているタグ
      */
      return view('mypage/organize',$data);
    }
}
