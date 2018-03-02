<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Socialite;

use App\User;

use Auth;

class FacebookController extends Controller
{
    public function redirect()
    {
    	return Socialite::driver('facebook')->redirect();
    }


    public function callback()
    {
    	$user = Socialite::driver('facebook')->user();

    	$user_local = User::where('fb_id', $user->id)->first();

    	if ($user_local) {

    		Auth::login($user_local);

    		return redirect(route('index'));

    	} else {
    		
    		$new_user = User::create([
    			'name' => $user->name,
    			'email' => $user->email,
    			'fb_id' => $user->id,
    			'role' => 'user',
    			'password' => ''
    		]);

    		Auth::login($new_user);

    		return redirect(route('index'));

    	}


    	

    }
}
