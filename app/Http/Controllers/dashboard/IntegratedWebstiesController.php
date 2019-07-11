<?php

namespace App\Http\Controllers\dashboard;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\models\IntegratedWebsites;
use App\User;

class IntegratedWebstiesController extends Controller
{
    
    public function __construct() {
        $this->middleware('auth');
    }
    
    public function index(Request $Request){
        $user_id = $Request->user()->id;
        $webhistory = IntegratedWebsites::where( 'integrated_websites.user_id', '=', $user_id )
                ->select( array( 'integrated_websites.*', 'integrated_websites.created_at as created_on', 'integrated_websites.id as int_id', 'expire_date') )
                ->leftJoin( 'api_expire', 'api_expire.id', '=', 'integrated_websites.api_expire_id')
                ->get();
        return view('dashboard.integrt_websites', 
            array( 
                'cmenu' => 'integrated_websites', 
                'web_history' => $webhistory,
                'is_premium_member' => User::is_premium_user( $user_id ) 
            ));
    }
    
    
    /**
     * Delete
     * 
     * @param type $id
     */
    public function destroy( $id ){
        IntegratedWebsites::find( $id )->delete();
        return back()->with( 'success_status', 'Website has been removed successfully!' );
    }
    
}
