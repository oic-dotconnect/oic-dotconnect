<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\UserEntryRequest;

use App\Preg;

use Session;
use App\AwsUploader;
use App\Models\User;
use App\Models\Tag;

use Auth;
use Image;
use Crypt;
use File;
use Validator;

use Symfony\Component\HttpFoundation\File\UploadedFile;

class UserEntryController extends Controller
{ 
    public function InputProfile(UserEntryRequest $request)
    {
        if($request->hasFile('icon'))
        {
            if($request->has('old_icon')) File::delete($request->get('old_icon'));

            $icon = $request->file('icon')->move("cacheimg");   
        }
        else if($request->has('old_icon'))
        {
            $path = $request->get('old_icon');

            $imageName = substr(md5($request->get('name').str_shuffle('1234567890abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ')),0,5);

            $icon = new UploadedFile($path,$imageName,null,null,null,true);
            $icon = $icon->move("cacheimg");
        }
        else
        {  
            $path = base_path('public/assets/img/default_icon.png');
            $copyPath = base_path('public/assets/img/default_icon_copy.png');
            $imageName = substr(md5($request->get('name').str_shuffle('1234567890abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ')),0,5);
            File::copy($path,$copyPath);
            $icon = new UploadedFile($copyPath,$imageName,null,null,null,true);
            $icon = $icon->move("cacheimg");   
        }


		
			
		Session::put('icon', $icon->getRealPath());
    	Session::put('profile',$request->except("icon","submit"));		
		
		$value = $request->get('submit');
		
		if($value == "toTag"){	// プロフィール設定からお気に入りタグを設定する場合 
			return redirect()->route('user-entry-tag');
		}elseif($value == "toConfirm"){	// プロフィール設定から確認画面に行く場合
			if($request->session()->get('tags') != null){}
                else{Session::put('tags',[]);}
			return redirect()->route('user-entry-confirm');
		}
    }

    public function InputTag(Request $request)
    {
    	Session::put('tags',$request->get('tags'));		

    	return redirect()->route('user-entry-confirm');
    }

    public function Confirm(Request $request)
    {
    	$data = $request->session()->all();
		$data["tags"] = Tag::whereIn('id',$data["tags"])->get()->map(function($tag) {
			return $tag->name;
		});
    	return view('user/user-entry-confirm',$data);
    }

    public function Create(Request $request)
    {
    	$Sessiondata = $request->session()->all();

    	$UserProfire = array_merge($Sessiondata['google'],$Sessiondata['profile']);

    	$TagIds = $request->session()->get('tags');
   
    	$user = User::create($UserProfire);

    	$user->tags()->attach($TagIds);
		$icon = Session::get("icon");		
		$user->iconUp($icon);
		Auth::login($user);
		if (Session::has('redirect_route')) return redirect()->route(Session::pull('redirext_route'));		
        return redirect()->route('user-mypage-recommend');
    }

    public function Cancel(Request $request)
    {
        $request->session()->flush();

        return redirect()->route('landing');
    } 

    public function ShowEditProfile(Request $request)
    {

        $data['name'] = $request->session()->get('profile.name');
        $data['code'] = $request->session()->get('profile.code');
        $data['introduction'] = $request->session()->get('profile.introduction');
        $data['icon'] = $request->session()->get('icon');

        if(isset($data['name']) == false)
        {
            $data['name'] = preg_replace('/[ｱ-ﾝﾞﾟ]/u','',$request->session()->get('google.student_name'));
        }

        if(isset($data['code']) == false)
        {
            $rule = [
                'code' => 'unique:USER,code'
            ];

            do{
            $defaultCode['code'] = substr(str_shuffle('1234567890abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ-_'),0,7);

            $validatorResult = Validator::make($defaultCode, $rule);

            }while($validatorResult == false);

            $data['code'] = $defaultCode['code'];

            
        }

        if(isset($data['name']) == false)
        {
            $data['name'] = "";
        }
        if(isset($data['code']) == false)
        {
            $data['code'] = "";
        }
        if(isset($data['introduction']) == false)
        {
            $data['introduction'] = "";
        }
        if(isset($data['icon']) == false)
        {
            $data['icon'] = "";
        }

        //dd($request->session()->all());

        return view('user/user-entry-profile',$data);
    }
}
