<?php

namespace App\Http\Controllers;

use Illuminate\Database\Eloquent\Model;
use App\Http\Controllers\Controller; 
use App\Http\Requests;
use Illuminate\Http\Request;
use App\Models\Event;
use Auth;
use Route;
use App\Models\User;

class EventController extends Controller
{
	public function detail(Request $request,$event_code)
	{
		$user = Auth::User();

		$capacity = Event::FindCode($event_code)->value('capacity');

		$data['event'] = Event::FindCode($event_code)->with('organizer')->get();

		$data['tags'] = Event::FindCode($event_code)->tags;

		$users = Event::FindCode($event_code)->first()->users()->orderby('user_event.created_at','desc')->get()->toArray();

		$data['users'] = array_slice($users,0,$capacity);

		$data['substitate'] = array_slice($users,$capacity);

		
		if(Event::FindCode($event_code)->first()->organizer_id == $user->id)
		{
			//このイベントの主催者がログインユーザーならここ
			echo('a');
		}
		else 
		{
			$userIds = Event::FindCode($event_code)->first()->users->map(function($user){return $user->id;})->toArray();
			if(in_array($user->id,$userIds)){
				//このイベントにログインユーザーが参加しているならここ
				echo('b');
			} else {
				//このイベントにログインユーザーが参加していないならここ
				echo('c');
			}
			
		}
		

		return view('event/event-detail', $data);
	}

	public function edit(Request $request,$event_code)
	{
		$data['event'] = Event::FindCode($event_code)->first();

		return view('event/event-edit', $data);
	}

	public function entry(Request $request)
	{

		$data = $request->except('status');

		$data['code'] = substr(md5($request->get('name').str_shuffle('1234567890abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ')),0,7);

		$data['organizer_id'] = Auth::user()->id;

		if($request->get('status') == 'open')
		{
			$event = Event::create($data);
			$request = Request::create(route('post-event-status',['event_code' => $event->code]),'POST',['status' => 'open']);
			return Route::dispatch($request);    
		}
		if($request->get('status') == 'close')
		{
			$event = Event::create($data);
			return redirect()->route('event-control');			
		}



	}

	public function status(Request $request,$event_code)
	{
		$status = $request->get('status');

		Event::FindCode($event_code)->update(['status' => $status]);

		
	}

	public function control()
	{
		
		$user = Auth::user();

		$data['event'] = $user->events()->role('admin')->get();
		
		return view('event/event-control')->with('data',$data);
	}

	public function join(Request $request,$event_code)
	{
		$user = Auth::User();

		$eventId = Event::FindCode($event_code)->select('id')->get();

		$user->events()->attach($eventId);

		$redirectUrl = $request->session()->get('_previous.url');

		return redirect($redirectUrl);
	}

	public function cancel(Request $request,$event_code)
	{
		$user = Auth::User();

		$eventId = Event::FindCode($event_code)->select('id')->get();

		$user->events()->detach($eventId);

		$redirectUrl = $request->session()->get('_previous.url');

		return redirect($redirectUrl);
	}
}