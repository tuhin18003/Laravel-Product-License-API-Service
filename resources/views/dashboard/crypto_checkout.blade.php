@extends('layouts.app')

@section('header')
<link href="{{ asset('app-assets/css/pages/pricing.css') }}" rel="stylesheet">
@endsection

@section('title', 'Pricing')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h4 class="header">Checkout</h4>
            <p>Please follow the following steps to complete your checkout process. </p>
            <div class="card-content mb-40">
                <div class="row">
                    
                    <div class="col s12 m8 l8">

                <div class="card-alert card gradient-45deg-red-pink top-alert display-none">
                    <div class="card-content white-text">
                        <p>
                            <i class="material-icons">error</i> <span class="response"></span></p>
                    </div>
                    <button type="button" class="close white-text" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                        <!-- process area -->

<!-- card section -->
<div class="card ">
    <form class="row" method="post" action="{{route('place_order_crypto_method')}}">
    <div class="card-content minheight-410">
         <!-- form area    -->
            <div class="input-field col s12">
                <input type="text" id="autocomplete-input" class="autocomplete coinname" placeholder="Enter cryptocurrency name. e.g: Bitcoin" name="coinname" required="">
                <label for="autocomplete-input">Enter Coin Name You Want To Pay</label>
            </div>
            
            <div class="coin-address-block text-center mt-40 mb-40 display-none">
                <img src="{{ asset('app-assets/images/loading-timer.gif') }}" width="" class="mt-20 loaderImg display-none" />
                <div class="row coin-details display-none">
                    <div class="col l12 text-center"><h4>Please pay to the following address</h4></div>
                    <div class="col l5">
                        <img class="qr-code" src=""/>
                    </div>
                    <div class="col l7 text-center pt-20">
                        <div class="coin-name">
                            <strong class="coinName">..</strong> / <small class="coinPriceUsd">$0</small>
                        </div>
                        <div class="coin-amount">
                            <strong>Net Payable:</strong> <span class="total_coin"></span> (<span class="coinSymbol"></span>)
                            <input type="hidden" class="coinSymbolInput" value="" />
                        </div>
                        <div class="coin-address mt-20">
                            <div class="input-field col s12 text-center">
                                <input type="text" class="text-center coin_address validate" placeholder="coin address" value="" name="coin_address" readonly="">
                                <label for="autocomplete-input">Send Coin To This Address</label>
                            </div>
                            
                        </div>
                        <p class="font-italic mt-20">
                            N.B : Please add transfer cost to the total amount.
                        </p>
                    </div>
                    <div class="col-lg-12">
                </div>
            <div class="input-field col s12">
                <input type="text" id="transaction_id" class="" name="transaction_id" required>
                <label for="autocomplete-input">Enter Coin Transaction ID </label>
            </div>
                </div>
            
            </div>
            
         <!-- form area-->

         <p class="font-italic">
            <!-- Need Support? Contact support@codesolz.net -->
         </p>
         <div class="card-alert card gradient-45deg-red-pink status-msg display-none">
                    <div class="card-content white-text">
                        <p>
                            <i class="material-icons">error</i> <span class="msg"></span></p>
                    </div>
                    <button type="button" class="close white-text" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>

    </div>
    <div class="card-action text-right">
        <button class="btn waves-effect waves-light btn-submit" disabled type="submit" name="action">Place Order
            <i class="material-icons right">send</i>
        </button>
    </div>
    </form>
</div>
<!-- card section -->

                        
                        <!-- process area -->
                              
                    </div>
                    <div class="col s12 m4 l4">
                        <div id="flight-card" class="card">
            <div class="card-header cyan">
               <div class="card-title">
                  <h5 class="task-card-title mb-3 mt-0 white-text">Summary</h5>
                  <!--<p class="flight-card-date">June 18, Thu 04:50</p>-->
               </div>
            </div>
               <div class="card-content bg-white">
                   <table class="table table-striped">
                       <tr>
                           <td>Subtotal</td>
                           <td>${{$order_info['tbd']}}</td>
                       </tr>
                       <tr>
                           <td>Tax</td>
                           <td>$0</td>
                       </tr>
                       <tr class="others">
                           <td>Others</td>
                           <td>$0</td>
                       </tr>
                       @if($order_info['d'] > 0 )
                       <tr>
                           <td>Discount</td>
                           <td>${{$order_info['dt']}}</td>
                       </tr>
                       @endif
                       @if($order_info['crypto_service_charge'] > 0 )
                       <tr>
                           <td>Service Charge</td>
                           <td>${{$order_info['crypto_service_charge']}}</td>
                       </tr>
                       @endif
                       
                       <tr>
                           <td>Grand Total</td>
                           <td>$<span class="side-total">{{$order_info['t']}}</span></td>
                       </tr>
                   </table>
                   <img src="{{ asset('app-assets/images/we-accept-currencies-black.png') }}" width="100%" class="mt-20" />
               </div>
         </div>
                    </div>
                </div>
            </div>
        </div>
    
</div>
</div>
@endsection


@section('footer_script')
<script src="{{ asset('app-assets/js/scripts/ui-alerts.js') }}" defer></script>
<script type="text/javascript">
    $(document).ready( function(){

        $("body").on('click', '.pmethod', function(){
            var pmethod = $(this).val();
            $("#payment_method").val( pmethod );
            var total = parseFloat($("#ototal").val()).toFixed(2);
            if( pmethod == 'crypto' ){
                var newSideRow = '<tr class="side-service-charge-row"><td>Service Charge</td><td>$5</td></tr>';
                $(".side-service-charge-row").remove();
                $( newSideRow).insertAfter(".others");

                var itemNo = parseInt($('.total-item').val());
                var scTotal = itemNo * 5;

                var newTblRow = '<tr class="tbl-service-charge-row"><td>Service Charge</td><td>$5</td><td>'+itemNo+'</td><td>$'+scTotal+'</td></tr>';
                $(".tbl-service-charge-row").remove();
                $( newTblRow ).insertAfter(".tbl-item-des");
                
                
                
                var newTotal = (parseFloat(total) +  parseInt(scTotal) ).toFixed(2); 
                $('.side-total').text(newTotal); 
                $('.tbl-total').text(newTotal); 
            }else{
                $(".side-service-charge-row").hide('slow');
                $(".tbl-service-charge-row").hide('slow');
                $('.side-total').text(total); 
                $('.tbl-total').text(total); 
            }
        });

        $('input.autocomplete').autocomplete({
            data: {
                 @if( 1 == $currency_list->success )
                    @foreach( $currency_list->result as $currency )
                    "{{$currency->MarketCurrencyLong}} ( {{$currency->MarketCurrency}} )" : '{{$currency->LogoUrl}}',
                    @endforeach    
                @endif   

            },
        });

        $(".coinname").on( 'change', function(){
            var coinName = $(this).val();
                // console.log(coinName);
            if( coinName.length <= 5 ){
                return;
            }
            // console.log( coinName );
            $(".coin-address-block").fadeIn('slow').removeClass('display-none');
            $(".loaderImg").removeClass('display-none');
            $(".coin-details").addClass('display-none');
            $(".btn-submit").attr('disabled', '');
            $(".top-alert").hide();
            $(".status-msg").addClass('display-none').hide('slow');
            $.ajax({
                type:'GET',
                url:'/get_coin_address',
                data: {
                    _token : '<?php echo csrf_token() ?>',
                    coinName : coinName
                },
                success:function(res) {
                    if( false == res.success ){
                        $(".top-alert").show().removeClass('display-none');
                        $('.response').html(res.message);
                        $(".loaderImg").addClass('display-none');
                    }else{
                        $(".loaderImg").addClass('display-none');
                        $(".coin-details").removeClass('display-none');
                        $(".coinPriceUsd").html( '$' + res.data.coin_price);
                        $(".coinName").html( res.data.coinName );
                        $(".coin_address").val( res.data.address );
                        $(".total_coin").html( res.data.total_coin );
                        $(".coinSymbol").html( res.data.coinSymbol );
                        $(".coinSymbolInput").val( res.data.coinSymbol );
                        $(".btn-submit").removeAttr('disabled');

                        var qrCode = "https://chart.googleapis.com/chart?chs=225x225&cht=qr&chl="+res.data.coinName+":"+res.data.address+"?cart_total:"+res.data.total_coin;
                        $(".qr-code").attr( 'src', qrCode );
                    }
                    console.log( res );
                },
                error: function( res ){
                    console.log( res );
                }
            });
        });
        

        var helperFuncitons = {
            is_ajax_busy : false,
            ajax_request : function( args ){
                return new Promise( (resolve, reject)=>{
                    $.ajax({
                        type:'POST',
                        url:'/place_order_crypto_method',
                        data: args.data,
                        success:function(res) {
                            resolve( res );
                            
                            console.log( res );
                        },
                        error: function( res ){
                            reject( res );
                            console.log( res );
                        }
                    });
                });
            }
        };

       $("form").submit(function(e){
           e.preventDefault();
           var $_this = $(this);
           $('.btn-submit').attr('disabled', '');
           $(".status-msg").show('slow').removeClass('display-none');
           $(".msg").show('slow').html('Searching for your transaction. Please wait a while..');

            var args = {
                data : {
                    _token : '<?php echo csrf_token() ?>',
                    trxid : $("#transaction_id").val(),
                    coinSymbol : $(".coinSymbolInput").val()
                }
            };

            var l = 0;
            var ajax_request = setInterval(() => {
                console.log( 'beeping..');
                if( false === helperFuncitons.is_ajax_busy ){
                    helperFuncitons.is_ajax_busy = true;
                    console.log('calling ajax..');
                    helperFuncitons.ajax_request( args )
                    .then( res => {
                        if( false === res.success ){
                            $(".msg").html( res.mesaage );
                            $('.btn-submit').removeAttr('disabled');
                            clearInterval(ajax_request);
                        }
                        else if( true === res.success && false === res.stopLoop ){
                            $(".msg").show('slow').html('Your order is processing.. Transactions confirmations : ' + res.currentConfirmation +' / '+ res.confirmationRequired );
                        }
                        else if( true === res.success && true === res.stopLoop ){
                            $(".msg").show('slow').html('Congratulation! Your order has been proceed! Redirecting to "API Generator" ');
                            clearInterval(ajax_request);
                            window.location.href = '/dashboard/api/key-generator';
                        }

                        helperFuncitons.is_ajax_busy = false;

                        if( l >= 2 ){
                            $(".msg").html( 'Order is taking more time.. Please re-click the place order button.' );
                            $('.btn-submit').removeAttr('disabled');
                            clearInterval(ajax_request);
                            console.log('loop stopped');
                        }

                    })
                    .catch(res => {
                        $(".msg").show('slow').html( res.responseJSON.message +'<br>'+ res.responseJSON.file +'('+ res.responseJSON.line +')' );
                        clearInterval(ajax_request);
                    });

                    l++;
                }

            }, 7000 );
            

            return false;
       }); 
       

//        $.ajax({
//           type:'POST',
//           url:'/get_payment_method',
//           data: {
//               _token : '<?php //echo csrf_token() ?>'
//           },
//           success:function(res) {
//               console.log( res );
//           },
//           error: function( res ){
//               console.log( res );
//           }
//        });
        
    });
    
</script>
@endsection