<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class ApiCallFlag extends Model
{
    
    protected $table = 'api_call_flag';
    protected $fillable = [
        'user_id', 'website_id', 'api_key_id', 'coin_trxid', 'total_coin', 'api_call_history_id'
    ];
    
}
