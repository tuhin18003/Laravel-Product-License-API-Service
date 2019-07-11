<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Coin extends Model
{
    protected $fillable = [
        'name', 'slug', 'symbol', 'type', 'has_masternode', 'total_supply', 'max_supply', 'available_supply', 'price_usd', 'price_btc', '24h_volume_usd', 'market_cap_usd', 'percent_change_1h', 'percent_change_24h', 'percent_change_7d', 'last_updated', 'is_paid', 'is_active'
    ];
    
    protected  $table = 'coins';
    
    public $timestamps = false;
    
}
