<?php

namespace App\Http\Controllers\dashboard;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Support\Facades\Hash;

class MyProfileController extends Controller
{

    public function __construct() {
        $this->middleware( 'auth' );
    }
    
    public function index(Request $request){
        return view('dashboard.my_profile', 
            array( 
                'cmenu' => 'my-profile', 
                'is_premium_member' => User::is_premium_user( $request->user()->id ),
                'User' => User::find( $request->user()->id )
            ) );
    }
    
    /**
     * Update
     * 
     * @param Request $Request
     */
    public function update(Request $Request){
        $fullname = $Request->input('full_name');
        $email = $Request->input('email');
        $old_email = $Request->input('old_email');
        
        //check if user change email and email not exists in the db
        if($email != $old_email ){
            $check_user_email = User::where( 'email', '=', $email )->get()->exists();
            if( $check_user_email ){
                return back()->with( 'email_exists', 'Email has already been used!' );
            }
        }
        
        
        $update_data = empty( $fullname ) ? '' : array( 'full_name' => $fullname );
        $update_data += empty( $email ) ? '' : array( 'email' => $email );
        
        $password = $Request->input('password');
        if( !empty($password)){
            $cpassword = $Request->input('cpassword');
            if( $password != $cpassword ){
                return back()->with( 'cpassword', 'Confirm password doesn\'t match!' );
            }
            $update_data += empty( $password ) ? '' : array( 'password' => Hash::make($password) );
        }
        
        
        //update user info
        User::where( 'id', '=', $Request->user()->id)
                ->update( $update_data );
        
        return back()->with( 'success_status', 'Profile information updated successfully' );
    }
}
