<?php namespace App\Http\Controllers;

/**
 * Description of NewslettersController
 *
 * @author Tuhin
 */

use App\Http\Controllers\Controller;
use Mail;
use App\User;
use Illuminate\Http\Request;
use App\models\Order;


/*
* special-discount = name of the url slug
*/
// https://myportal.coinmarketstats.online/api/email-sender?email_type=special-discount&total_user=4

class NewslettersController extends Controller{
    
    /**
     * New coin announcement newsletter
     * 
     * @param type $args
     */
    public function new_coin_announcement(){
        
        
//        $user = User::find( 19 );
        $users = User::all();
        
        
//            echo $user->full_name;
//            echo "<br>";
//        echo "<pre>";
// //        print_r( $user);
//        exit;


        foreach( $users as $user ){
            $email_data = array(
                'userfullname' => isset($user->full_name) ? $user->full_name : ''
            );

            $data = array( 'data' => $email_data );
            Mail::send( 'email_templates.newCoinAnnouncement', $data, function($message) use ( $user ) {
                $message->to( $user->email, $user->full_name )->subject
                        ( 'New coins added to WooCommerce Altcoin Payment Gateway' );
                $message->from( 'info@codesolz.net', 'CodeSolz Team' );
            });
        }
        
        echo 'Email sent!';
        
    }
    

    public function special_discount(Request $Request){
        
        // $user_id = $Request->input( 'next_user_id' );
        // //sleep( 4 );
        // return response()
        //                 ->json( [ 'status' => 200, 'success' => false, 'message' => 'called successfully' . $user_id ] )
        //                 ->setStatusCode(220);
        
        $user_id = $Request->input( 'next_user_id' );

               $user = User::find( $user_id );

               if( empty($user)){
                return response()
                                ->json( [ 'status' => 200, 'success' => false, 'message' => 'user not found --' . $user_id ] )
                                ->setStatusCode(220);
               }

               $is_purchased = Order::where( 'user_id', '=', $user_id)
               ->where( 'status', '=', 2 )
               ->get()->first();

               if( $is_purchased ){
                   return response()
                                ->json( [ 'status' => 200, 'success' => false, 'message' => 'User already purchased --' . $user_id ] )
                                ->setStatusCode(220);
               }

               $email_data = array(
                    'userfullname' => isset($user->full_name) ? $user->full_name : ''
                );
                
                
                
        //            echo $user->full_name;
        //            echo "<br>";
        //        echo "<pre>";
        // //        print_r( $user);
        //        exit;
        
        //return view( 'email_templates.specialDiscount', array( 'data' => $email_data ));
        
        // $users = User::all();
                // foreach( $users as $user ){
                //     $email_data = array(
                //         'userfullname' => isset($user->full_name) ? $user->full_name : ''
                //     );
        
                    $data = array( 'data' => $email_data );
                    Mail::send( 'email_templates.newPaymentGateway', $data, function($message) use ( $user ) {
                        $message->to( $user->email, $user->full_name )->subject
                                ( 'Buy with Cryptocurrency - Pro. WooCommerce Altcoin Payment Gateway' );
                        $message->from( 'info@codesolz.net', 'CodeSolz Team' );
                    });
                // }
                
                
                return response()
                        ->json( [ 'status' => 200, 'success' => true, 'message' => 'Email sent!' . $user_id ] )
                        ->setStatusCode(200);
                
            }

        public function send_newsletter(){

            return view( 'email_templates.emailSender');
        }    
    
}
