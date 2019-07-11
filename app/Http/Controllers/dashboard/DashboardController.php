<?php

namespace App\Http\Controllers\dashboard;

use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\models\ApiExpire;
use App\models\ApiCallHistory;
use App\models\IntegratedWebsites;
use App\User;

class DashboardController extends Controller
{
    
    public function __construct() {
        $this->middleware('auth');
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        
       $ApiCallHistory = new ApiCallHistory();
       
       $lifetime_sold_total_coin = $ApiCallHistory->get_total_sold( 'total_coin' )
               ->where( 'user_id', '=', $request->user()->id )->get()->first();
       
       $lifetime_total_sold_fiat = $ApiCallHistory->get_total_sold( 'total_coin_price' )
               ->where( 'user_id', '=', $request->user()->id )->get()->first();
       
       $total_sold_today_fiat = $ApiCallHistory->get_total_sold( 'total_coin_price' )
               ->where( 'user_id', '=', $request->user()->id )
               ->where( 'created_at', 'like', Carbon::now()->toDateString() )
               ->get()->first();
       
       $lifetime_order_count = $ApiCallHistory->get_total_count( 'total_coin_price' )
               ->where( 'user_id', '=', $request->user()->id )->get()->first();
       
       $order_count_today = $ApiCallHistory->get_total_count( 'total_coin_price' )
               ->where( 'user_id', '=', $request->user()->id )
               ->where( 'created_at', 'like', Carbon::now()->toDateString() )
               ->get()->first();
       
       
       $apiExpire = new ApiExpire();
       $api_expire_limit = $apiExpire->get_api_access_limit( $request->user()->id);
       $api_used_today = $ApiCallHistory->get_api_used( $request->user()->id)
               ->where( 'created_at', 'like', Carbon::now()->toDateString() )
               ->get()->first();
               
         $total_intg_website = IntegratedWebsites::where( 'user_id', '=', $request->user()->id )
                 ->count();
         
         $website_access_limit = (new IntegratedWebsites())->get_website_access_limit( $request->user()->id );

        $ApiCallHistory = ApiCallHistory::select( DB::raw( " sum(total_coin) as total_coin, count(*) as order_count, created_at, coin_web_id") )
                ->where( 'user_id', '=', $request->user()->id)
                ->where( 'status', '=', 2)
                ->groupBy( 'created_at' )
                ->groupBy( 'coin_web_id' )
                ->orderBy('id', 'ASC')
                 ->get();
         
        
        $chart_data = '';
        if( $ApiCallHistory->count() > 0 ){
            $data = array();
            foreach( $ApiCallHistory as $history ){
                
                $time = Carbon::createFromFormat('Y-m-d H:i:s', $history->created_at );
                $datetime = mktime( $time->format('H' ), $time->format('m' ), $time->format('s' ), $time->format('m' ), $time->format('d' ) , $time->format('Y' ) ) * 1000;
//                $datetime = mktime( 12, 0, 0, $time->format('m' ), $time->format('d' ) , $time->format('Y' ) ) * 1000;
                
                if( isset( $data[ $history->coin_web_id ] ) ){
                    $data[ $history->coin_web_id ] = $data[ $history->coin_web_id ] . ", [{$datetime}, {$history->total_coin}] ";
                }else{
                    $data += array(
                        $history->coin_web_id => "[{$datetime}, {$history->total_coin}]"
                    );
                }
                
                if( isset($data[ $history->coin_web_id .'_order_count' ]) ){
                    $data[ $history->coin_web_id .'_order_count' ] = $data[ $history->coin_web_id .'_order_count' ] . ", [{$datetime}, {$history->order_count}] ";
                }else{
                    $data += array(
                        $history->coin_web_id .'_order_count' => "[{$datetime}, {$history->order_count}]"
                    );
                }
                
            }
            
            $chart_data = '';
            
            if( $data ){
                $i = 0;
                foreach( $data as $key => $val ){
                    if( $i > 0 ) { $chart_data .= ", \n"; }
                    $chart_data .= sprintf( '{pointInterval: 24*3600*1000, name: %s, data:[ %s ] }', '"'. $key .'"', $val );
                    $i++;
                }
            }
            
//            echo "<pre>";
//        print_r($chart_data);
//        exit;
        } 
         
         
       
        return view('dashboard.dashboard', 
            array( 
                'cmenu' => 'home', 
                'is_premium_member' => User::is_premium_user( $request->user()->id ),
                'lifetime_total_coin_price' => empty($lifetime_total_sold_fiat) ? 0 : $lifetime_total_sold_fiat->total_coin_price,
                'total_sold_today_fiat' => empty($total_sold_today_fiat) ? '0.00' : $total_sold_today_fiat->total_coin_price,
                'lifetime_order_count' => empty($lifetime_order_count) ? 0 : $lifetime_order_count->total,
                'order_count_today' => empty($order_count_today) ? 0 : $order_count_today->total,
                'api_expire_limit' => $api_expire_limit,
                'api_used_today' => empty($api_used_today) ? 0 : $api_used_today,
                'total_intg_website' => empty($total_intg_website) ? 0 : $total_intg_website,
                'website_access_limit' => empty($website_access_limit) ? 0 : $website_access_limit,
                'chart_data' => $chart_data
            ) );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
        //
    }
}
