<?php

namespace App\Http\Controllers;

use Illuminate\Database\Eloquent\Model;
use App\Http\Controllers\Controller; 
use App\Http\Requests;
use App\Http\Requests\EventEntryRequest;
use Illuminate\Http\Request;
use App\Models\Event;
use App\Models\Tag;
use Auth;
use Route;
use App\Models\User;
use Validator;
use Valitron;

class EventController extends Controller
{
	public function detail(Request $request,$event_code)
	{
		$user = Auth::User();
		try{	//イベントが見つからなかった時のエラー回避処理
			$capacity = Event::FindCode($event_code)->first()->capacity;
		}catch(\Exception $e){
			return view('errors/404');
		}
		$data['event'] = Event::FindCode($event_code)->with('organizer')->first();
		$order   = array("\r\n", "\n", "\r");
		$data['event']->description = str_replace($order, '<br>', $data['event']->description);	
	
		$data['tags'] = Event::FindCode($event_code)->first()->tags;

		$users = Event::FindCode($event_code)->first()->users()->orderby('user_event.created_at','desc')->get();

		if( $capacity !== '' ){
			$data['users'] = $users->take($capacity);
			$data['substitate'] = $users->splice($capacity);
		} else {
			$data['users'] = [];
			$data['substitate'] = [];
		}
		
		if($user === null){
			return view('event/event-detail-guest', $data);
		} else 
		if(Event::FindCode($event_code)->first()->organizer_id == $user->id)
		{
			//このイベントの主催者がログインユーザーならここ
			return view('event/event-detail-hold', $data);
		}
		else 
		{
			$userIds = Event::FindCode($event_code)->first()->users->map(function($user){return $user->id;})->toArray();
			if(in_array($user->id,$userIds)){
				//このイベントにログインユーザーが参加しているならここ
				return view('event/event-detail-join',$data);
			} else {
				//このイベントにログインユーザーが参加していないならここ
				return view('event/event-detail-viewer',$data);
			}
			
		}
		

		return view('event/event-detail-guest', $data);
	}

	public function edit(Request $request,$event_code)
	{
		$data['event'] = Event::FindCode($event_code)->first();
		$data['event']->description = str_replace('<br>', '\r' ,$data['event']->description);	

		return view('event/event-edit', $data);
	}

	public function entry(Request $request)
	{

		$data = $request->except(['status', 'tags']);		
		$data['code'] = substr(md5($request->get('name').str_shuffle('1234567890abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ')),0,7);

		$data['organizer_id'] = Auth::user()->id;	
	
		$tags = $request->has('tags')? $request->get('tags') : []; 
		$event = Event::create($data);
		
		foreach($tags as $tag){
			$t = Tag::where('name', $tag)->first();
			if(count($t)){
				$event->tags()->attach($t->id);
			} else {
				$new_tag = Tag::create([
					'name' => $tag
				]);
				$event->tags()->attach($new_tag->id);
			}
		}

		if($request->get('status') == 'open')
		{
			$request = Request::create(route('post-event-status',['event_code' => $event->code]),'POST',['status' => 'open']);
			return Route::dispatch($request);    
		} else 
		if($request->get('status') == 'close')
		{							
			return redirect()->route('event-detail', [ 'event_code' => $event->code ]);			
		}
	}

	public function postEdit(Request $request, $event_code)
	{

		$data = $request->except(['status', 'tags', '_token', '_place', 'roomType']);				
		$event = Event::findCode($event_code)->first();								
		$event->update($data);

		$tags = $request->has('tags')? $request->get('tags') : []; 


		$_tags = [];
		foreach($tags as $tag){
			$t = Tag::where('name', $tag)->first();
			if(count($t)){
				$_tags[] = $t->id;
			} else {
				$new_tag = Tag::create([
					'name' => $tag
				]);
				$_tags[] = $new_tag->id;
			}
		}		
		$event->tags()->sync($_tags);

		if($request->get('status') == 'open')
		{
			$request = Request::create(route('post-event-status',['event_code' => $event->code]),'POST',['status' => 'open']);
			return Route::dispatch($request);    
		} else 
		if($request->get('status') == 'close')
		{							
			return redirect()->route('event-detail', [ 'event_code' => $event->code ]);			
		}
	}

	public function status(Request $request,$event_code)
	{		
		$status = $request->get('status');
		$open_date = date('Y-m-d');

		$event = Event::FindCode($event_code)->first();
		$event->update(['status' => $status]);

		if($status == 'open')
		{
			$event = Event::FindCode($event_code)->first();

			$validator = new EventEntryRequest();

			$rules = $validator->rules();

			$messages = $validator->messages();

			$validatorResult = Validator::make($event->toArray(), $rules,$messages);

			$errors = $validatorResult->errors();

			if ($validatorResult->fails()) {

				$event->status = 'close';

				$event->save();

           		return redirect()->route('event_open')
                        	->withErrors($errors)
                        	->withInput();
        		}


			$event->open_date = $open_date;

			$event->status = $status;

			$event->save();
		}

		return redirect()->route('event-detail', [ 'event_code' => $event->code ]);	
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

	public function search(Request $request) {
		$data['tag'] = $request->has('tags')? $request->get('tags') : '';
		$data['title'] = $request->has('title')? $request->get('title') : '';
		return view('event/event-search', $data);
	}

	public function delete($event_code){
		$event = Event::FindCode($event_code)->first();
		$event->delete();
		return redirect()->route('user-event-control');	
	}
}