<?php

namespace App\models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ApiExpire extends Model
{
    
    use SoftDeletes;
    
    protected $fillable = [
        'user_id', 'api_access_limit', 'website_access_limit', 'package_id', 'order_number','expire_date'
    ];
    
    protected $table = 'api_expire';
    
    /**
     * Has many apis
     * 
     * @return type
     */
    public function api(){
        return $this->hasMany( 'App\models\Api', 'api_id', 'id' );
    }
    
    /**
     * 
     * @return type
     */
    public function user(){
        return $this->belongsTo( 'App\User', 'user_id', 'id' );
    }
    
    /**
     * Get packages
     */
    public function packages(){
        return $this->belongsTo( 'App\models\Upgrade', 'package_id', 'id');
    }
    
    public function get_api_access_limit( $user_id ){
        $res = $row =  $this->select( array( 'id', 'api_access_limit') )
                ->whereRaw( 'expire_date > "' . Carbon::now()->toDateTimeString() .'" and api_access_limit = -1 and user_id = ' . $user_id )
                ->orWhereRaw( 'expire_date > "' . Carbon::now()->toDateTimeString() .'" and api_access_limit != 0 and user_id = ' . $user_id )
                ->get();
        
        if( $row->count() > 0 ){
            $check_limit = '';
            foreach($res as $r ){
                if( $r->api_access_limit == '-1' ){
                    $check_limit =  'Unlimited';
                    break;
                }else{
                    $check_limit =  $r->api_access_limit;
                }
            }
            return $check_limit;
        }else{
            return 'Expired';
        }
        
    }
    
}
