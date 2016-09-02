<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class MockController extends Controller
{
    public function landing(){
      $event = (Object)[
        'code' => 'abcdefg',
        'name' => 'Laravel勉強会',
        'field' => 'it',
        'start_date' => '2016-07-07',
        'start_time' => '17:00:00',
        'end_date' => '2016-07-07',
        'end_time' => '18:00:00',
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
}
