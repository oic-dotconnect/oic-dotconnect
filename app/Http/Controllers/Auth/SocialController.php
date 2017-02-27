<?php

namespace App\Http\Controllers\Auth;

use Auth;
use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Socialite;
use Validator;
use Session;

class SocialController extends Controller
{

  public function getGoogleAuth(Request $request){
    Session::put('redirect_url',$request->input('redirect_url'));
    return Socialite::driver('google')->redirect();
  }

  public function getGoogleAuthCallback(){
    try {
      $guest = Socialite::driver('google')->stateless()->user();
    } catch (Exception $e) {
      return $e;
    }

    if(!$guest){
      return 'hoge';
    }

    $data = [
      'email'     => $guest->email,
      'student_name' => $guest->name,
      'google_id' => $guest->id,
    ];

    $oicValidator = Validator::make($data, ['email' => 'oic']);
    $uniqueValdator = Validator::make($data, ['email' => 'unique:USER,email']);

    if( !$oicValidator->fails() ){
      if( $uniqueValdator->fails() ){
        /*既にユーザー登録されている場合*/
        $user = User::Google($data['google_id'])->first();
        Auth::login($user);        
        if (Session::has('redirect_url')) return redirect()->to(Session::pull('redirect_url'));
        return redirect()->route('user-mypage-recommend');

      } else {
        /*ユーザー登録されていない場合*/
        Session::put('google', $data);
        return redirect()->route('user-entry-profile');
      }
    } else {
      /*oicドメインでなかった場合*/
      return 'oicドメインでなかった';
    }

  }
}
