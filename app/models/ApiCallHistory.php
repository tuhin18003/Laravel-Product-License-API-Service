<?php

namespace App\models;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;

class ApiCallHistory extends Model
{
    protected $table = 'api_call_history';
    protected $fillable = [
        'user_id', 'website_id', 'api_key_id', 'coin_trxid', 'total_coin', 'status', 'coin_web_id'
    ];
    
    /**
     * Get total sold sum
     */
    public function get_total_sold( $col_name ){
        return $this->select( DB::raw( "SUM({$col_name}) as {$col_name}" ) )
                ->where( 'status', '=', 2)
	    ->groupBy( DB::raw("user_id") );
    }
    
    /**
     * Get anything count
     */
    public function get_total_count($col_name){
        return $this->select( DB::raw( "COUNT({$col_name}) as total" ) )
                ->where( 'status', '=', 2)
	    ->groupBy( DB::raw("user_id") );
    }

    /**
     * Get api used today
     */
    public function get_api_used( $col_name ){
        return $this->select( DB::raw( "COUNT({$col_name}) as total" ) )
	    ->groupBy( DB::raw("user_id") );
    }
    
}
