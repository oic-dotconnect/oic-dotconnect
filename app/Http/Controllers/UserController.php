<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Models\User;
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
		$data['recommendEvent'] = $user->recommende_events();
		
        return view('user/user-mypage-recommend',$data);    
	}
}
