<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;
use App\models\Upgrade;

class PurchaseHistory extends Model
{
    protected $table = 'purchase_history';
    protected $fillable = [
        'user_id', 'order_id', 'package_id', 'price', 'payment_type',
        'order_number', 'package_name', 'website_access_limit',
        'api_access_limit', 'purchase_on', 'expire_on'
    ];

    /**
     * Get package
     * 
     * @return type
     */
    public function package_info(){
        return $this->belongsTo( 'App\models\Upgrade', 'package_id', 'id');
    }

    /**
     * Purchase history
     * 
     * @param type $user_id
     * @return type
     */
    public function purchase_history( $user_id ){
        return $this->where( 'user_id', '=', $user_id )
                ->leftJoin( 'upgrade_packages', $this->table .'.package_id', '=', 'upgrade_packages.id')
                ->get();
    }

}
