<?php

namespace App\models;

use App\models\ApiExpire;
use App\models\Upgrade;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\DB;

class IntegratedWebsites extends Model
{
    
    use SoftDeletes;
    
    protected $table = 'integrated_websites';
    protected $fillable = [
        'website_url', 'used_api_key', 'api_expire_id', 'user_id'
    ];
    
    /**
     * Get api expire
     * 
     * @return type
     */
    public function get_expire(){
        return $this->belongsTo( 'App\models\ApiExpire', 'api_expire_id', 'id');
    }
    
    /**
     * get website access limit
     */
    public function get_website_access_limit( $user_id ){
        $Package = new Upgrade();
        $res =  $Package->select( DB::raw( 'SUM(upgrade_packages.access_website) as website_limit' ) )
                ->join('api_expire', function ($join ) use($user_id) {
                    $join->on('upgrade_packages.id', '=', 'api_expire.package_id')
                         ->where('api_expire.user_id', '=', $user_id);
                })
                ->get()->first();
        return isset($res->website_limit) ? $res->website_limit : 0;
    }
    
}
