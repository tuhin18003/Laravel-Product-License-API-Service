<?php
namespace App\CustomLib\PaymentGateway\paypal;

use App\models\Order;

class Paypal_Processor {
    
    private function default_pay_config(){
        return array(
            'cmd' => '_xclick',
            'business' => 'youremail@gmail.com',
            'currency_code' => 'USD',
            'item_name' => '',
            'item_number' => '',
            'amount' => '',
            'no_note' => '1',
            'no_shipping' => '1',
            'rm' => '2',
           'return' => 'https://myportal.coinmarketstats.online/dashboard/upgrade/afterpayment',
           'cancel_return' => 'https://myportal.coinmarketstats.online/dashboard/upgrade/cancelled',
            'custom' => ''
        );
    }
    
    /**
     * subscription payment config
     * 
     * @return string
     */
    private function subscription_pay_config(){
        $params = $this->default_pay_config();
        unset($params['amount']);
        $params['cmd'] = '_xclick-subscriptions';
        $params['charset'] = 'utf-8';
        $params['a3'] = '';
        $params['p3'] = '';
        $params['t3'] = '';
        $params['src'] = '1';
        return $params;
    }
    
    /**
     * Generate hash with info
     * 
     * @param type $user_id
     * @param type $item
     * @param type $amount
     * @return type
     */
    private function generate_code( $args ){
        $code = md5(md5(microtime()) . md5(rand(0, 100000)));
        $code = base64_encode( $code . "-" . $args['user_id'] . '-' . $args['order_info']['package_id'] . '-' . $args['order_info']['order_id'] );
        return $code;
    }
    
    /**
     * Decode custom code
     * 
     * @param type $custom_code
     * @return type
     */
    public function decode_custom_code( $custom_code ){
        return explode('-', base64_decode($custom_code));
    }

    /**
     * get paypal redirect url
     * 
     * @param type $args
     */
    public function get_redirect_url( $args ){
        $params = $this->default_pay_config();
        $params['item_name'] = $args['item_name'];
        $params['item_number'] = $args['order_info']['package_id'];
        $params['amount'] = $args['order_info']['t'];
        $params['custom'] = $this->generate_code( $args );
        
        //update order custom code
//         Order::where( 'id', '=', args['order_info']['order_id'] )
//            ->update(array(
//                'custom_code' => $params['custom']
//            ));
        
        if( isset($args['subscription']) && true === $args['subscription']  ){
            $params = $this->subscription_pay_config();
            $params['a3'] = $args['order_info']['t'];
            $params['p3'] = '30';
            $params['t3'] = '30';
        }
        
        $demoUrlPrefix = '';
        if( isset( $args['demo']) && $args['demo'] == 'Y' ) {
            $demoUrlPrefix = 'sandbox.';
            $params['business'] = 'sandboxemail@gmail.com';
            $params['return'] = 'http://127.0.0.1:8000/dashboard/upgrade/afterpayment';
            $params['cancel_return'] = 'http://127.0.0.1:8000/dashboard/upgrade/cancelled';
        }

        $url = "https://www.{$demoUrlPrefix}paypal.com/cgi-bin/webscr";
        
        
        return $url . '?' . http_build_query($params);
    }
    
}
