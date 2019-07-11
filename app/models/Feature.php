<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Feature extends Model
{
    
    protected $table = 'package_features';
    protected $fillable = [ 'package_id', 'feature_name' ];
 
    public function feature(){
        return $this->hasOne( 'App\models\Upgrade', 'package_id', 'id');
    }
    
    /**
     * Get apis owner
     * 
     * @return type
     */
    public function upgrade(){
        return $this->belongsTo( 'App\models\Upgrade' );
    }
}
