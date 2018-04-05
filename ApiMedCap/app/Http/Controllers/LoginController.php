<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class LoginController extends Controller
{
	/*
	*
	* login function
	*/
	public function login(Request $request)
	{
		$hasher = app()->make('hash');
		
		$email = $request->input('email');
		$password = $request->input('password');
		
		$login = User::where('email',$email)->first();
		
		if(!$login)
		{
			$res['success'] = false;
			$res['message'] = 'Your email or password incorrect! (1)';
			
			return response($res);
		}
		else
		{
			if($hasher->check($password, $login->password))
			{
				$api_key = sha1(time());
				$create_token = User::where('id', $login->id)->update(['api_key' => $api_key]);
				if($create_token)
				{
					$res['success'] = true;
					$res['api_key'] = $api_key;
					$res['message'] = $login;
					
					return response($res);
				}
			}
			else
			{
				$res['success'] = true;
				$res['pas_input'] = $hasher->make($password);
				$res['pas_db'] = $login->password;
				$res['message'] = 'Your email or password incorrect! (2)';
				
				return response($res);
			}
		}
	}

}
?>