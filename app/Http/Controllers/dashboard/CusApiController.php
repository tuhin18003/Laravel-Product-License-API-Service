<?php

namespace App\Http\Controllers\dashboard;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Controller;
use App\User;
use App\models\Api;
use App\models\ApiExpire;
use App\models\IntegratedWebsites;

class CusApiController extends Controller
{
    
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
        $user_id = $request->user()->id;
        $is_premium_user = User::is_premium_user( $user_id );
        if( $is_premium_user ){
            $packages = ApiExpire::where( 'api_expire.user_id', '=', $user_id)
                    ->select( array( 'api_expire.id as id', 'name', 'order_number' ) )
                    ->where( 'expire_date', '>', now() )
                    ->leftJoin( 'upgrade_packages', 'upgrade_packages.id', '=', 'api_expire.package_id')
                    ->get();
            
            $apis = Api::where( 'apis.user_id', '=', $user_id )
                    ->select( array( '*',  'apis.id as api_id') )
//                    ->where( 'api_expire.api_access_limit', '=', -1 )
                    ->leftJoin( 'api_expire', 'apis.api_expire_id', '=', 'api_expire.id')
                    ->leftJoin( 'upgrade_packages', 'upgrade_packages.id', '=', 'api_expire.package_id')
                    ->get();
        }else{
            $packages = ApiExpire::where('api_expire.user_id', '=', $user_id)
                    ->where( 'api_access_limit', '!=', -1 )
                    ->select( array( 'api_expire.id as id', 'name', 'order_number' ) )
                    ->leftJoin( 'upgrade_packages', 'upgrade_packages.id', '=', 'api_expire.package_id')
                    ->get();
            
            $apis = Api::where( 'apis.user_id', '=', $user_id )
                    ->select( array( '*',  'apis.id as api_id') )
                    ->where( 'api_access_limit', '!=', -1 )
                    ->leftJoin( 'api_expire', 'apis.api_expire_id', '=', 'api_expire.id')
                    ->leftJoin( 'upgrade_packages', 'upgrade_packages.id', '=', 'api_expire.package_id')
                    ->get();
            
        }
        
        
//        dd( $packages );
        
        return view('dashboard.api-list', 
            array( 
                'cmenu' => 'api', 
                'apis' => $apis, 
                'packages' => $packages,
                'is_premium_member' => $is_premium_user
            ) );
    }
    
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function api_key_generator(Request $request)
    {
        $user_id = $request->user()->id;
        $is_premium_user = User::is_premium_user( $user_id );
        if( $is_premium_user ){
            $packages = ApiExpire::where( 'api_expire.user_id', '=', $user_id)
                    ->select( array( 'api_expire.id as id', 'name', 'order_number' ) )
                    ->where( 'expire_date', '>', now() )
                    ->leftJoin( 'upgrade_packages', 'upgrade_packages.id', '=', 'api_expire.package_id')
                    ->get();
            
            $apis = User::find( $user_id )->api()
                    ->where( 'api_expire.api_access_limit', '=', -1 )
                    ->leftJoin( 'api_expire', 'apis.api_expire_id', '=', 'api_expire.id')
                    ->leftJoin( 'upgrade_packages', 'upgrade_packages.id', '=', 'api_expire.package_id')
                    ->get();
        }else{
            $packages = ApiExpire::where('api_expire.user_id', '=', $user_id)
                    ->where( 'api_access_limit', '!=', -1 )
                    ->select( array( 'api_expire.id as id', 'name', 'order_number' ) )
                    ->leftJoin( 'upgrade_packages', 'upgrade_packages.id', '=', 'api_expire.package_id')
                    ->get();
            
            $apis = User::find( $user_id )->api()
                    ->where( 'api_access_limit', '!=', -1 )
                    ->leftJoin( 'api_expire', 'apis.api_expire_id', '=', 'api_expire.id')
                    ->leftJoin( 'upgrade_packages', 'upgrade_packages.id', '=', 'api_expire.package_id')
                    ->get();
        }
        
        
//        dd( $packages );
        
        return view('dashboard.apigenerator', 
            array( 
                'cmenu' => 'key-generator', 
                'apis' => $apis, 
                'packages' => $packages,
                'is_premium_member' => $is_premium_user
            ) );
    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(array $data )
    {

    }

    /**
     * Validate form value
     * 
     * @param array $data
     * @return type
     */
    protected function validator(array $data){
        return Validator::make( $data, [
            'label' => ['required', 'string', 'max:100'],
            'package_id' => ['required', 'not_in:0']
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user_id = $request->user()->id;
        $this->validator( $request->all() )->validate();
        
        $apis = User::find( $user_id )->api()
                ->where( 'api_expire_id', '=', $request->input( 'package_id' ) )
                ->count();
        
        $api_expire = ApiExpire::where( 'user_id', '=', $user_id )
                ->where( 'id', '=', $request->input( 'package_id' ) )
                ->first();
        
//        dd($api_expire);
        
        if( $apis == $api_expire->website_access_limit ){
            return back()->with( 'error_status', "Whops! You can\'t create more then {$apis} APIs. Revoke any API from the API keys list to create new one." );
        }
        
        
        $Api = new Api();
        $Api->label = $request->input( 'label' );
        $Api->api_key = Str::random(40);
        $Api->user_id = $user_id;
        //get api expire id
        $Api->api_expire_id = $api_expire->id;
        $Api->save();
        
        return back()->with( 'success_status', 'Congratulation! <a href="/dashboard/api">Your API key</a> has been generated successfully!' );
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $api = Api::where( 'id', '=', $id)->get()->first();
        
        IntegratedWebsites::where('used_api_key', '=', $api->api_key) 
                ->update( array( 'deleted_at' => date('Y-m-d H:i:s')) );
        
        Api::find($id)->delete();
         
        return back()->with( 'success_status', 'API access revoked successfully!' );
    }
}
