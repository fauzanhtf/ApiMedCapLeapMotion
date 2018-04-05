<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class UserController extends Controller
{

	/*Register function*/
	
	public function register(Request $request)
	{
		$hasher = app()-> make ('hash');
		
		$email = $request->input('email');
		$password = $hasher->make($request->input('password'));
		
		$register = User::create([
			'email' => $email,
			'password' => $password,
		]);
		
		if($register)
		{
			$res['success']=true;
			$res['message']='Register Succesfull!';
			
			return response($res);
		}
		else
		{
			$res['success']=false;
			$res['message']='Register Failed!';

			return response($res);
		}
	}
	
	/* Get User Information by id */
	public function get_user(Request $request, $id)
	{
		$user = User::where('id', $id)->first();
		if($user)
		{
			$res['success'] = true;
			$res['message'] = $user;
			
			return response($res);
		}
		else
		{
			$res['success'] = false;
			$res['message'] = 'Cannot find User!';
			
			return response($res);
		}
	
	}
	
	/* Update data user by id */
	public function update_user(Request $request, $id)
	{
		$user_update = User::where('id', $id)->first();
		if($user_update->update($request->all()))
		{
			//$user_update->save();
			
			$res['success'] = true;
			$res['status'] = 'User Information Updated!';
			$res['message'] = $user_update;
			
			return response($res);
		}
		else
		{
			$res['success'] = true;
			$res['status'] = 'User Information Cant Updated!';
			
			return response ($res);
		}
	}

}