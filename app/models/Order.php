<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table = 'orders';
    protected $fillable = [
        'order_id', 'user_id', 'package_id', 'price', 'status'
    ];
    
    /**
     * Return by package
     * 
     * @return type
     */
    public function package(){
        return $this->belongsTo( 'App\models\Upgrade', 'package_id', 'id');
    }
}
