<?php

namespace App\Http\Controllers;

use Illuminate\Database\Eloquent\Model;
use App\Http\Controllers\Controller; 
use App\Http\Requests;
use Illuminate\Http\Request;
use App\Models\Event;


class EventController extends Controller
{
	public function detail(Request $request)
	{
		$code = $request -> all();
		$capacity = Event::EventDetail($code)->value('capacity');

		/*$data = Event::EventDetail($code)->with(['tags','users' => function($query) {
			$query->orderby('user_event.created_at','desc');
		} ,'organizer'])->get();*/



		$data['event'] = Event::EventDetail($code)->with('organizer')->get();
		$users = Event::EventDetail($code)->first()->users()->orderby('user_event.created_at','desc')->get()->toArray();

		$data['users'] = array_slice($users,0,$capacity);
		$data['substitate'] = array_slice($users,$capacity);

		return view('event/event-detail')->with('data',$data);
	}

	public function edit(Request $request,$code)
	{
		$data['event'] = Event::EventDetail($code)->get();

		return view('event/event-edit')->with('data',$data);
	}
}