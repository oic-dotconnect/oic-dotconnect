<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Models\User;
use App\Models\Event;
use Auth;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;



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

	public function editProfile()
	{
		$data = Auth::user();

		return view('user/user-setting-profile',$data);
	}

	public function editFavoriteTags()
	{
		return view('user/user-setting-tag');
	}

	public function editNotice()
	{
		$data['userNotice'] = Auth::user();

		$data['tagNotice'] = Auth::user()->tags()->get();

		return view('user/user-setting-notice',$data);
	}

	public function editLeave()
	{
		return view('user/user-setting-leave');
	}

	public function saveProfile(Request $request)
	{
		$user = Auth::user();

		$data = $request->all();

		$user->update($data);

		return redirect()->route('user-mypage-recommend');
	}

	public function saveFavoriteTags(Request $request)
	{
		$newTagIds = $request->get('tags');

		$user = Auth::user();

		$user->tags()->detach();

		$user->tags()->attach($newTagIds);

		return redirect()->route('user-mypage-recommend');
	}

	public function saveNotice(Request $request)
	{
		$notices = $request->all();

		$user = Auth::user();

		$eventJoinNoticed = isset($notices['eventjoinnotice']);
		$user->update(['event_join_notice' => $eventJoinNoticed]);

		$eventCancelNoticed = isset($notices['eventcancelnotice']);
		$user->update(['event_cancel_notice' => $eventCancelNoticed]);
		
		$favoriteTagNoticed = isset($notices['favoritetagnotice']);
		$user->update(['favorite_tag_notice' => $favoriteTagNoticed]);

		$requestTags = $request->get('tags');

		$user->getPivotTags($user->id)->update(['noticed' => false]);

		$user->getPivotTags($user->id)->whereIn('tag_id',$requestTags)->update(['noticed' => true]);

		return redirect()->route('user-mypage-recommend');

	}

}
