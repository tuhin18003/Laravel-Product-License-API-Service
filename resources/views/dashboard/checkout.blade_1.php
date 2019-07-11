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
                                <th>Package</th>
                                <td>Price</th>
                                <th>Quantity</th>
                                <th>Total</th>
                            </tr>
                            <tr>
                                <td>
                                    <b>{{$package->name}}</b> <span class="text-italic">({{$package->validity}}</span> year) <br>
                                    @php
                                        $package_info = $package->name .' ('. $package->validity .' year)'
                                    @endphp
                                    <ul class="text-italic">
                                        @foreach( $features as $fet )
                                            <li>
                                                @if( strpos( $fet->feature_name, 'Integration') ) 
                                                    {{@sprintf( $fet->feature_name, $package->access_website )}} 
                                                @else
                                                    {{$fet->feature_name}}
                                                @endif
                                            </li>
                                        @endforeach
                                    </ul>
                                </td>
                                <td>${{$package->price}}</td>
                                <td>1</td>
                                <td>${{$package->price}}</td>
                            </tr>
                        </table>
                        <div class="text-right mt-40">
                            <ul class="collapsible" data-collapsible="accordion">
                                <li class="active">
                                   <div class="collapsible-header"><i class="material-icons">check</i>Paypal</div>
                                   <div class="collapsible-body"><span>You will be redirecting to paypal..</span></div>
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
                            <form action='https://sandbox.2checkout.com/checkout/purchase?BACK_REF=http%3A//www.YourCustomRedirectURL.com' method='post'>
                                <input type='hidden' name='sid' value='{{$sid}}' />
                                <input type='hidden' name='mode' value='2CO' />
                                <input type='hidden' name='li_0_type' value='product' />
                                <input type='hidden' name='li_0_name' value='{{$package_info}}' />
                                <input type='hidden' name='li_0_id' value='{{$order->id}}' />
                                <input type='hidden' name='li_0_price' value='{{$package->price}}' />
                                <input type='hidden' name='li_0_product_id' value='{{$package->id}}' />
                                <input type='hidden' name='li_0_duration' value='1 year' />
                                <!--<input name="paypal_direct" type="hidden" value="Y">-->
                                
                                <button class="mb-6 btn waves-effect waves-light purple lightrn-1" >Proceed To Checkout</button>
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
                           <td>${{$package->price}}</td>
                       </tr>
                       <tr>
                           <td>Tax</td>
                           <td>$0</td>
                       </tr>
                       <tr>
                           <td>Others</td>
                           <td>$0</td>
                       </tr>
                       <tr>
                           <td>Grand Total</td>
                           <td>${{$package->price}}</td>
                       </tr>
                   </table>
                   <img src="{{ asset('app-assets/images/2checkout.png') }}" width="100%" class="mt-10" />
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
//        $('.collapsible').collapsible();
        
        alert( 'hi');
        
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