<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Models\User;
use App\Models\Event;
use Auth;


class UserController extends Controller
{
    public function mypage()
    {
    	//本番環境はこれ
    	//$data['user'] = Auth::user();
    	$user = User::find(1);
    	$data['user'] = $user;
    	$data['favorite-tag'] = $user->tags;
    	$data['entry-event'] = $user->events()->Role('member')->get();
    	$data['opening-event'] = $user->events()->Role('admin')->get();
    	$data['recommend-event'] = $user->recommende_events();

    	return response()->json($data);
    }

	public function mypageRecommend() {
		$user = Auth::user();
		$data['events'] = $user->recommende_events()->paginate(10);	
        return view('user/user-mypage-recommend', $data);    
	}

	public function mypageJoin() {
		$user = Auth::user();
		$data['events'] = $user->joined_events()->paginate(10);		
        return view('user/user-mypage-join', $data);    
	}

	public function mypageHold() {
		$user = Auth::user();
		$data['events'] = $user->hold_events()->paginate(10);		
        return view('user/user-mypage-hold', $data);    
	}

	public function userpageJoin(Request $request, $userCode) {
		$user = User::findCode($userCode);
		$data['user'] = $user;
		$data['events'] = $user->joined_events()->paginate(10);		
        return view('user/user-userpage-join', $data);    
	}

	public function userpageHold(Request $request, $userCode) {
		$user = User::findCode($userCode);
		$data['user'] = $user;
		$data['events'] = $user->hold_events()->paginate(10);		
        return view('user/user-userpage-hold', $data);    
	}

}
