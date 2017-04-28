<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class LandingController extends Controller
{
    public function index()
	{
    	$data = [];

		$data["new_events"] = \App\Models\Event::orderby('open_date','desc')
			->where('status','=','open')
			->take(5)
			->with('Tags')
			->get()
			->each(function($event){
				$event["entry_num"] = $event->entry_num();
			});
			
		$data["hold_events"] = \App\Models\Event::Beforehold()
			->where('status','=','open')
			->take(5)
			->with('Tags')
			->orderby('opening_date')
			->get()
			->each(function($event){
				$event["entry_num"] = $event->entry_num();
			});
			
    	return view('landing',$data);
	}
}
