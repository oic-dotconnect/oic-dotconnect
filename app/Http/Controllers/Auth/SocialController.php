<?php

namespace App\Http\Controllers\Auth;

use Auth;
use App\User;
use App\Http\Controllers\Controller;
use Socialite;
use Validator;

class SocialController extends Controller
{

  public function getGoogleAuth(){
    return Socialite::driver('google')->redirect();
  }

  public function getGoogleAuthCallback(){
    try {
      $guser = Socialite::driver('google')->user();
    } catch (Exception $e) {
      return $e;
    }

    if(!$guser){
      return 'hoge';
    }

    $data = [
      'email'     => $guser->email,
      'name'      => $guser->name,
      'google_id' => $guser->id,
    ];

    $oicValidator = Validator::make($data, ['email' => 'oic']);
    $uniqueValdator = Validator::make($data, ['email' => 'unique:users,email']);

    if( !$oicValidator->fails() ){
      if( $uniqueValdator->fails() ){
        /*既にユーザー登録されている場合*/
        $user = User::Google($data['google_id'])->first();
        Auth::login($user);
      } else {
        /*ユーザー登録されていない場合*/
        $user = User::create($data);
        Auth::login($user);
      }
    } else {
      /*oicドメインでなかった場合*/
      return 'oicドメインでなかった';
    }

  }
}
