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
            <p>Complete checkout process to activate your package</p>
            <div class="card-content mb-40">
                <div class="row">
                    
                    <div class="col s12 m8 l8">
                        <table class="table">
                            <tr>
                                <th>Item Name</th>
                                <td>Price Per Item</th>
                                <th>Quantity</th>
                                <th>Total</th>
                            </tr>
                            <tr class="tbl-item-des">
                                <td>
                                    <b>{{$order_info['name']}}</b> <span class="text-italic"> - {{ $order_info['validity']}} year(s) </span> <br>
                                    <ul class="text-italic">
                                        <li>
                                            Unlimited Automatic Order Confirmation
                                        </li>
                                        <li>
                                            Upto {{ $order_info['website_access']}} website(s) 
                                        </li>
                                    </ul>
                                </td>
                                <td>${{$order_info['per_item_price']}}</td>
                                <td >{{ $order_info['quantity']}}</td>
                                <td>${{$order_info['tbd']}}</td>
                            </tr>
                             @if($order_info['d'] > 0 )
                            <tr>
                                <td>
                                    <b>Special Discount</b> <br>
                                    <ul class="text-italic">
                                        <li>
                                            {{$order_info['d']}}% on total amount
                                        </li>
                                    </ul>
                                </td>
                                <td></td>
                                <td></td>
                                <td>${{$order_info['dt']}}</td>
                            </tr>
                            @endif 
                            <tfoot>
                                <tr>
                                <th></th>
                                <td></th>
                                <th>Total: </th>
                                <th >$<span class="tbl-total">{{$order_info['t']}}</span></th>
                            </tr>
                            </tfoot>
                        </table>
                        
                        <div class="text-right mt-40">
                            <ul class="collapsible" data-collapsible="accordion">
                                <li class="active">
                                   <div class="collapsible-header">
                                   <label>
                                        <input type="radio" name="pmethod" class="pmethod" value="paypal"/>
                                        <span>Paypal</span>
                                    </label>
                                   
                                   
                                       <div class="float-right width-100">
                                           <img src="{{ asset('app-assets/images/paypal.png') }}" width="20%" class="" />
                                       </div>
                                   </div>
                                   <div class="collapsible-body">
                                       <!--<div class="row">-->
                                           <div class="s6 l6">
                                               <span>You will be redirecting to paypal..</span>
                                           </div>
                                           <div class="s6 l6">
                                           </div>
                                       <!--</div>-->
                                   </div>
                               </li>
                                <li class="">
                                   <div class="collapsible-header">
                                   <label>
                                        <input type="radio" name="pmethod" class="pmethod" value="crypto"/>
                                        <span>Cryptocurrency</span>
                                    </label>
                                   
                                   
                                       <div class="float-right width-100">
                                           <img src="{{ asset('app-assets/images/crypto-icon.png') }}" width="10%" class="" />
                                       </div>
                                   </div>
                                   <div class="collapsible-body">
                                       <!--<div class="row">-->
                                           <div class="s6 l6">
                                               <span>You will be redirecting to cryptocurrency payment gateway..</span>
                                           </div>
                                           <div class="s6 l6">
                                           </div>
                                       <!--</div>-->
                                   </div>
                               </li>
<!--                               <li>
                                   <div class="collapsible-header"><i class="material-icons">place</i>Second</div>
                                   <div class="collapsible-body"><span>Lorem ipsum dolor sit amet.</span></div>
                               </li>
                               <li>
                                   <div class="collapsible-header"><i class="material-icons">whatshot</i>Third</div>
                                   <div class="collapsible-body"><span>Lorem ipsum dolor sit amet.</span></div>
                               </li>-->
                            </ul>
                            <form class="paypal" action="{{ route('redirect-to-payment-gateway') }}" method="post" id="paypal_form">
                                @csrf
                                <input type="hidden" name="cmd" value="_xclick" />
                                <input type="hidden" name="no_note" value="1" />
                                <input type="hidden" name="lc" value="UK" />
                                <input type="hidden" name="bn" value="PP-BuyNowBF:btn_buynow_LG.gif:NonHostedGuest" />
                                <input type="hidden" name="first_name" value="Customer's First Name" />
                                <input type="hidden" name="last_name" value="Customer's Last Name" />
                                <input type="hidden" name="payer_email" value="customer@example.com" />
                                <input type="hidden" name="item_number" value="123456" />
                                <input type="hidden" name="payment_method" id="payment_method" value="paypal" />
                                <input type="hidden" id="ototal" value="{{$order_info['t']}}" />
                                <input type="hidden" class="total-item" value="{{$order_info['website_access']}}" />
                                <button class="mb-6 mt-40 btn waves-effect waves-light purple lightrn-1" >Proceed To Checkout</button>
                            </form>
                            
                        </div>
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