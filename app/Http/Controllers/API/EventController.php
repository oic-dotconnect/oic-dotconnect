<?php

namespace App\Http\Controllers\API;

use Illuminate\Database\Eloquent\Model;
use App\Http\Controllers\Controller; 
use App\Http\Requests;
use Illuminate\Http\Request;
use App\Models\Event;

class EventController extends Controller
{
    public function index(Request $request)
    {
    	$requests = $request -> all();

    	$query = Event::Status('open')->with('tags');
    	
    	if( isset($requests['q']) )
    	{
    		$query = $query->EventName($requests['q']);
    	}
    	if( isset($requests['tag']) && !isset($requests['q']))
    	{
    		$TagNames = explode(',',$requests['tag']);
    		$query = $query->TagName($TagNames);
    	}
    	if( isset($requests['startdate']) )
    	{
    		$query = $query->whereDate('opening_date','>=', date($requests['startdate']));
    	}
    	if( isset($requests['enddate']) )
    	{
			$query = $query->whereDate('opening_date','<=', date($requests['enddate']));
    	}

    	$data = $query->get();
		$data = $data->map(function( $event ) {
			$event['entry_num'] = $event->entry_num();
			return $event;
		});
    	return response()->json($data);
    }
}
