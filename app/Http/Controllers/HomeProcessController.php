<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input; 
use Session;
use Response;
use App\User;
use Hash;
use Auth;
use Carbon\Carbon;
use Mail;

class HomeProcessController extends Controller
{
    public function registerUser(Request $request)
    {
    	$first_name 	 = Input::get('first_name');
    	$last_name  	 = Input::get('last_name');
    	$email      	 = Input::get('email');
    	$phone      	 = Input::get('phone');
    	$password        = Input::get('password');
    	$c_password      = Input::get('confirm_password');
    	if(empty($first_name) || empty($email) || empty($password) || empty($c_password)){
    		return response()->json([
    			'status' => 400,
    			'error_code' => '1',
			    'message' => 'Please fill required fields!'
			]);
    	}
    	if($password != $c_password){
    		return response()->json([
    			'status' => 400,
    			'error_code' => '2',
			    'message' => 'Password Mismatch!'
			]);
    	}
    	$user = User::whereEmail($email)->first();
    	if(!empty($user)){
    		return response()->json([
    			'status' => 400,
    			'error_code' => '3',
				'message' => 'Email already exists'
			]);
    	}
    	$role = User::where(['role' => '1'])->first();
    	if(!empty($role)){
    		$default_role = 2;
    	}else{
    		$default_role = 1;
    	}      
    	if ($request->hasFile('avatar')) {
            $imageName = rand().''.$request->file('avatar')->getClientOriginalName();
            $request->file('avatar')->move(
                base_path() . '/public/images/', $imageName
            );
            $filePath = 'images/'.$imageName;
        }else{
           $filePath = '';
        }

        $current_timestamp = Carbon::now()->toDateTimeString();
        $remember_token = rand(1111111111,9999999999);
        $data = array(
            'first_name' => $first_name,
            'last_name' => $last_name,
            'email' => $email,
            'phone' => $phone,
            'password' => Hash::make($password),
            'avatar' => $filePath,
            'role' => $default_role,
            'remember_token' => $remember_token,
            'updated_at' => $current_timestamp,
            'created_at' => $current_timestamp           
        );
        $result = User::insert($data);
        if($result){
            $name = $first_name.' '.$last_name;

            if(env('SEND_VERIFY_EMAIL') == 'true'){
                $emailLink = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]".'/verify-email/'.$remember_token;
                $data = array('name'=>$name, 'link' => $emailLink);
                Mail::send(['text'=>'mail'], $data, function($message) {
                     $message->to($email, $name)->subject('Registration Confirmation');
                     $message->from('vivek@sparkpostbox.com','OTF CODER');
                });
            }              
            return response()->json([
                'status' => 200,
                'message' => 'You have registered successfully!'
            ]);     	
        }else{
        	return response()->json([
	        	'status' => 400,
			    'message' => 'Failed! Incorrect data'
			]);
        }
    }
    public function logInUser(Request $request)
    {
    	$email      	 = Input::get('email');
    	$password        = Input::get('password');

    	$user = User::whereEmail($email)->first();

    	if(empty($user)){
    		return response()->json([
    			'status' => 404, 
				'message' => 'This email id is not registered with us'
			]);
    	}else{
    		if (Auth::attempt(['email' => $email, 'password' => $password])){
    			return response()->json([
    				'status' => 200,
				    'message' => 'Loggedin successfully'
				]);
    		}else{
    			return response()->json([
    				'status' => 400, 
				    'message' => 'Incorrect Password'
				]);
    		}
    	}    	
    }
    public function logout()
    {
    	Auth::logout();
  		return redirect('/home');
    }
    public function myProfile()
    {
        if(Auth::check()){
            $my_profile_data = User::whereEmail(Auth::user()->email)->first();
            return view('my_profile')
                ->with('my_profile_data', $my_profile_data);
        }else{
            return redirect('/home');
        }        
    }
    public function usersList()
    {
        $users_list = User::where(['role' => '2'])->orderBy('id', 'DEC')->simplePaginate(9);
        return view('users_list')
                ->with('users_list', $users_list);
    }
    public function updateProfile(Request $request)
    {
        $first_name              = Input::get('first_name');
        $last_name               = Input::get('last_name');
        $phone                   = Input::get('phone');
        $id                      = Input::get('id');
        $previos_image           = Input::get('previos_image');

        if(empty($first_name)){
            return response()->json([
                'status' => 400,
                'error_code' => '1',
                'message' => 'Please fill required fields!'
            ]);
        }        
              
        if ($request->hasFile('avatar')) {
            $imageName = rand().''.$request->file('avatar')->getClientOriginalName();
            $request->file('avatar')->move(
                base_path() . '/public/images/', $imageName
            );
            $filePath = 'images/'.$imageName;
        }else{
           $filePath = $previos_image;
        }

        $current_timestamp = Carbon::now()->toDateTimeString();
        $data = array(
            'first_name' => $first_name,
            'last_name' => $last_name,
            'phone' => $phone,
            'avatar' => $filePath,
            'updated_at' => $current_timestamp          
        );
        $result =  User::where(['id'=>$id])->update($data);
        if($result){           
            return response()->json([
                'status' => 200,
                'message' => 'Profile updated successfully!'
            ]);           
        }else{
            return response()->json([
                'status' => 400,
                'message' => 'Failed! Incorrect data'
            ]);
        }
    }
    public function varifyEmailLink($link)
    {
        $result =  User::where(['remember_token'=>$link])->first();
        if($result){            
            if (Auth::loginUsingId($result->id)) {
                $current_timestamp = Carbon::now()->toDateTimeString();
                $data = array(
                    'remember_token' => '',
                    'updated_at' => $current_timestamp          
                );
                $result1 =  User::where(['id'=>$result->id])->update($data);            
                return redirect('home');
            }                       
        }else{
            return redirect('404');
        }
    }
}
