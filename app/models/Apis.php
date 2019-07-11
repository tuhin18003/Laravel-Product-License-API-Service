<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Apsi extends Model
{
    
    use SoftDeletes;
    
    protected $fillable = [
        'label', 'api_key'
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
}
