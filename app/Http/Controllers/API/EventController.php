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
    	// if( isset($requests['tag']) )
    	// {
    	// 	$TagNames = explode(',',$requests['tag']);
    	// 	$query = $query->TagName($TagNames);
    	// 	//$query = $query->union( Event::TagName($TagNames) );
    	// 	//$data = Event::TagName($TagNames)->get();

    	// 	//return response()->json($data);
    	// }
    	if( isset($requests['startdate']) )
    	{
    		$query = $query->where('opening_date','>=', $requests['startdate']);
    	}
    	if( isset($requests['enddate']) )
    	{
    		$query = $query->where('opening_date','<=', $requests['enddate']);
    	}

    	$data = $query->get();

    	if( isset($requests['tag']) ){
    		$data = $data->filter(function($event) use($requests){
    			
    			if( isset($requests['q'] ){
    				//$event->nameとqをマッチ
    			}

    			$result = false;
    			$tag_names = $event->tags->map(function($tag){
    				return $tag->name;
    			})->toArray();
    			foreach ($tag_names as $tag_name) {
    			 	$req_tagnames = explode(',',$requests['tag']);
    			 	if( in_array($tag_name, $req_tagnames, true) ){
    			 		$result = true;
    			 		break;
    			 	}
    			}
    			return $result;
    		});
    	}

    	return response()->json($data);
    }
}
