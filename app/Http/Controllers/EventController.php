<?php

namespace App\Http\Controllers;

use Illuminate\Database\Eloquent\Model;
use App\Http\Controllers\Controller; 
use App\Http\Requests;
use Illuminate\Http\Request;
use App\Models\Event;
use Auth;
use Route;

class EventController extends Controller
{
	public function detail(Request $request)
	{
		$code = $request -> all();
		$capacity = Event::FindCode($code)->value('capacity');

		/*$data = Event::EventDetail($code)->with(['tags','users' => function($query) {
			$query->orderby('user_event.created_at','desc');
		} ,'organizer'])->get();*/



		$data['event'] = Event::FindCode($code)->with('organizer')->get();
		$users = Event::FindCode($code)->first()->users()->orderby('user_event.created_at','desc')->get()->toArray();

		$data['users'] = array_slice($users,0,$capacity);
		$data['substitate'] = array_slice($users,$capacity);

		return view('event/event-detail')->with('data',$data);
	}

	public function edit(Request $request,$code)
	{
		$data['event'] = Event::FindCode($code)->get();

		return view('event/event-edit')->with('data',$data);
	}

	public function entry(Request $request)
	{
		$data = $request->all();

		$data['code'] = substr(md5($request->get('name').str_shuffle('1234567890abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ')),0,7);

		$data['organizer_id'] = Auth::user()->id;

		$event = Event::create($data);

		if($data['status'] == 'open')
		{
			$request = Request::create('/event/'.$event->code.'/status','POST',['status' => 'open']);
			return Route::dispatch($request);    
		}

		return redirect()->route('event-control');

	}

	public function status(Request $request,$code)
	{
		$status = $request->get('status');

		Event::FindCode($code)->update(['status' => $status]);
	}
}