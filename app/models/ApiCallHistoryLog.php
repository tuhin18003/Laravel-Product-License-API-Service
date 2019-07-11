<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class ApiCallHistoryLog extends Model
{
    protected $table = 'api_call_history_log';
    
    protected $fillable = [
        'user_id', 'api_call_history_id', 'created_at'
    ];
    
    public $timestamps = false;
}
