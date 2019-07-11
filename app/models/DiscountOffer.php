<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class DiscountOffer extends Model
{
    
    protected $table = 'discount_offers';
    
    protected $fillable = [ 'name', 'websites', 'validity_years', 'offer_amount', 'offer_started', 'valid_til' ];
    
    /**
     * Get offer info
     * 
     * @param type $websites
     * @param type $years
     * @return boolean
     */
    public static function get_offer( $websites, $years ){
        $check_offer = DiscountOffer::whereBetween( 'websites', [ 1, $websites ] )
                ->whereBetween( 'validity_years', [1, $years ] )
                ->where( 'valid_til', '>=', date('Y-m-d H:i:s') )
                ->orderBy('offer_amount', 'desc')
                ->get()->first();
        
        if( $check_offer ){
            return $check_offer;
        }
        
        return false;
    }
    
}
