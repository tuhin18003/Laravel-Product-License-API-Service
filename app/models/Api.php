<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Api extends Model
{
    
    use SoftDeletes;
    
    protected $fillable = [
        'label', 'api_key', 'user_id', 'api_expire_id'
    ];
    
    protected $dates = ['deleted_at'];
    
    protected  $table = 'apis';
    
    /**
     * Get apis owner
     * 
     * @return type
     */
    public function user(){
        return $this->belongsTo( 'App\User' );
    }
    
    /**
     * Get api expire
     * 
     * @return type
     */
    public function get_expire( $api_key ){
        return $this->where( 'api_key' , '=', $api_key )
            ->where( 'api_expire.expire_date', '>', now() )
            ->leftJoin( 'api_expire', 'api_expire.id', '=', 'apis.api_expire_id')
            ->get()->first();
    }
    
    
}
