<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\models\ApiExpire;

class User extends Authenticatable implements MustVerifyEmail
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'full_name','email', 'password', 'password_confirmation'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    
    /**
     * Users Role
     * 
     * @return type
     */
    public function role(){
        return $this->belongsTo( 'App\Role');
    }
    
    /**
     * Belongs to table
     * 
     * @return type
     */
    public function api(){
        return $this->hasMany( 'App\models\Api' );
    }
    
    /**
     * Belongs to table
     * 
     * @return type
     */
    public function api_expire(){
        return $this->hasOne( 'App\models\ApiExpire', 'id', 'user_id');
    }
    
    /**
     * Return purchase history
     * 
     * @return type
     */
    public function purchase_history(){
        return $this->hasMany('App\models\PurchaseHistory', 'user_id' );
    }
    
    /**
     * Get users order
     * 
     * @return type
     */
    public function order(){
        return $this->hasMany( 'App\models\order', 'user_id' ); 
    }
    
    /**
     * Check premium user
     * 
     * @param type $user_id
     * @return type
     */
    public static function is_premium_user( $user_id ){
        //check premium
        $is_premium_member = ApiExpire::where( 'api_expire.user_id', '=', $user_id )
                ->where( 'package_id', '>', 1)
                ->where( 'expire_date', '>', now() )->get()->count();
        return $is_premium_member ? true : false;
    }
}
