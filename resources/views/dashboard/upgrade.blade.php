@extends('layouts.app')

@section('header')
<link href="{{ asset('app-assets/css/pages/pricing.css') }}" rel="stylesheet">
@endsection

@section('title', 'Pricing')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h4 class="header">Upgrade</h4>
            <p>Upgrade your package to get unlimited options.</p>

            <div class="card-alert card gradient-45deg-purple-deep-orange">
                <div class="card-content white-text">
                    <p>
                        <i class="material-icons">notifications</i>
                        Premium Plan's Support - If we fail to response around 48 hours on your query, we will refund your money! No question will be ask.(week days only)
                    </p>
                </div>
            </div>
            <div class="card-content">
                <div class="row">
                    <div class="plans-container">
                        <div class="upgrade-plan-title">
                            <h3>Free Plan</h3>
                            <p>Free For Lifetime</p>
                            <hr>
                        </div>
                        
                        <div class="col s12 m6 l6 offset-l3 offset-m3">
                                <div class="card hoverable animate fadeLeft">
                                  <div class="card-image  gradient-45deg-light-blue-cyan waves-effect">
                                    <div class="card-title">Trial</div>
                                    <div class="price">
                                      <sup>$</sup>0.00
                                      <sub>/ Lifetime </sub>
                                    </div>
                                    <div class="price-desc">
                                        
                                    </div>
                                  </div>
                                  <div class="card-content">
                                      
                                    <ul class="collection">
                                      <li class="collection-item">
                                           Upto 1 Website
                                      </li>
                                      <li class="collection-item">
                                             Total 5 Automatic Order Confirmation
                                      </li>
                                      <li class="collection-item">
                                            156+ Fiat currency supported
                                      </li>
                                             
                                    </ul>
                                  </div>
                                  <div class="card-action center-align">
                                      Trial package is automatically added to your account, to use this you need to generate API from 'Api Keys' ( left menu )
                                  </div>
                                </div>
                              </div>
                                </div>
                              </div>
                        
                        
                        <div class="row">
                    <div class="plans-container">
                        <div class="upgrade-plan-title">
                            <h3>Premium Plans</h3>
                            <p>You can customize the plan by your requirements. You will get discount for higher customize package.</p>
                            <hr>
                        </div>
                        
                        <!-- <div class="col s12 m8 l8 offset-l2 offset-m2"> -->
                        <!-- premium basic plan -->
                        <div class="col s12 m6 l6">
                                <div class="card hoverable animate fadeLeft">
                                  <div class="card-image teal waves-effect">
                                    <div class="card-title">Basic</div>
                                    <div class="price">
                                        <sup>$</sup><span class="basic-pamount">0.00</span>
                                      <sub>/ <span class="basic-order-count">0</span> Order(s)</sub>
                                    </div>
                                    <div class="price-desc">
                                        Free 1 month
                                    </div>
                                  </div>
                                    <form class="" method="post" action="{{ route('cart/checkout') }}" >
                                        @csrf
                                  <div class="card-content">
                                      
                                    <ul class="collection">
                                      <li class="collection-item">
                                            Validity 1 year
                                      </li>
                                      <li class="collection-item">
                                            156+ Fiat currency supported
                                      </li>
                                      <li class="collection-item">
                                            $0.70 / Order | $5 will be added for 2+ websites
                                      </li>
                                    </ul>
                                      <div class="calculator">
                                          <div class="row">
                                                <div class="input-field col s7 offset-s3">
                                                    <input placeholder="e.g: 1" class="validate basic-number" required="" id="basic_website_number" name="website_number" type="number" min="1" max="50" value="">
                                                  <label for="website">Enter number of website you want to use*</label>
                                                  @if (session('website_number'))
                                                        <div class="error" role="alert">
                                                            <strong>{{ session('website_number') }}</strong>
                                                        </div>
                                                    @endif
                                                </div>
                                            </div>
                                           <div class="row">
                                                <div class="input-field col s7 offset-s3">
                                                  <input placeholder="e.g: 1" class="validate basic-number" required="" aria-required="true" id="basic_order_number" name="basic_order_number" type="number" min="1" max="1000">
                                                  <label for="validity">Enter number of order(s) you want*</label>
                                                  @if (session('basic_order_number'))
                                                        <div class="error" role="alert">
                                                            <strong>{{ session('basic_order_number') }}</strong>
                                                        </div>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="input-field col s6 offset-s3 text-center">
                                                <strong>
                                                    $<span class="basic-pamount">0.00</span> /
                                                    <span class="basic-order-count">0</span> Order(s)
                                                </strong>
                                                </div>  
                                            </div>
                                           
                                                    
                                      </div>
                                     
                                      
                                  </div>
                                  <div class="card-action center-align">
                                        <input type="hidden" name="package_type" value="1" />
                                        <button type="submit" class="waves-effect waves-light gradient-45deg-indigo-purple gradient-shadow btn">Checkout</button>
                                  </div>
                                </form>
                                </div>
                        
                              </div>
                        <!-- premium basic plan -->
                        
                        <!-- premium plan -->
                        <div class="col s12 m6 l6">
                                <div class="card hoverable animate fadeLeft">
                                  <div class="card-image gradient-45deg-amber-amber waves-effect">
                                    <div class="card-title">Premium - Unlimited</div>
                                    <div class="price">
                                        <sup>$</sup><span class="pamount">0.00</span>
                                      <sub>/ <span class="yvalidity">0</span> Yr(s)</sub>
                                    </div>
                                    <div class="price-desc pckg2-offer-notifi">
                                        Free 1 month
                                    </div>
                                  </div>
                                    <form class="" method="post" action="{{ route('cart/checkout') }}" >
                                        @csrf
                                  <div class="card-content">
                                      
                                    <ul class="collection">
                                      <li class="collection-item">
                                            Unlimited Automatic Order Confirmation
                                      </li>
                                      <li class="collection-item">
                                            156+ Fiat currency supported
                                      </li>
                                      <li class="collection-item">
                                            $29.99 / website / year
                                      </li>
                                    </ul>
                                      <div class="calculator">
                                          <div class="row">
                                                <div class="input-field col s7 offset-s3">
                                                    <input placeholder="e.g: 1" class="validate custom-number" required="" id="website_number" name="website_number" type="number" min="1" max="50" value="">
                                                  <label for="website">Enter number of website you want to use*</label>
                                                  @if (session('website_number'))
                                                        <div class="error" role="alert">
                                                            <strong>{{ session('website_number') }}</strong>
                                                        </div>
                                                    @endif
                                                </div>
                                            </div>
                                           <div class="row">
                                                <div class="input-field col s7 offset-s3">
                                                  <input placeholder="e.g: 1" class="validate custom-number" required="" aria-required="true" id="validity_years" name="validity_years" type="number" min="1" max="10">
                                                  <label for="validity">Enter number of years validity you want*</label>
                                                  @if (session('validity_years'))
                                                        <div class="error" role="alert">
                                                            <strong>{{ session('validity_years') }}</strong>
                                                        </div>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="input-field col s6 offset-s3 text-center">
                                                <strong>
                                                    $<span class="pamount">0.00</span> /
                                                    <span class="yvalidity">0</span> Yr(s)
                                                </strong>
                                                </div>  
                                            </div>
                                           
                                                    
                                      </div>
                                     
                                      
                                  </div>
                                  <div class="card-action center-align">
                                        <input type="hidden" name="package_type" value="2" />
                                        <button type="submit" class="waves-effect waves-light gradient-45deg-indigo-purple gradient-shadow btn">Checkout</button>
                                  </div>
                                </form>
                                </div>
                              </div>
                        <!-- premium plan -->



            </div>
                </div>
            </div>
            
        </div>
    </div>
    <p>N.B : Contact us support@codesolz.net for customize your package.</p>
</div>
@endsection

@section('footer_script')
<script src="{{ asset('app-assets/js/scripts/ui-alerts.js') }}" defer></script>
<script type="text/javascript">
$(document).ready( function(){
    $(".custom-number").on( 'keyup', function(){
        var inputVal = ($(this).val()).trim();
        if( parseInt( inputVal ) <= 0 || inputVal.length === 0  ) {
            return;
        }
        $(".pamount").html( '0.00' );
        $(".pckg2-offer-notifi").html( 'Free 1 month' );
        $(".yvalidity").text( $("#validity_years").val() );
        $.ajax({
           type:'POST',
           url:'/dashboard/get_discount',
           data: {
               response_type : 'msg',
               _token : '<?php echo csrf_token() ?>',
               w : $("#website_number").val(),
               v : $("#validity_years").val()
           },
           success:function(res) {
               console.log( res );
               var result = JSON.parse( res );
               if( result.status === 'success' ){
                   $(".pamount").html( result.p );
                   if( result.dm.length > 0 ){
                       $(".pckg2-offer-notifi").html( result.dm );
                   }else{
                       $(".pckg2-offer-notifi").html( 'Free 1 month' );
                   }
               }else{
                   console.log( result.response );
               }
           },
           error: function( res ){
               console.log( res.responseText );
           }
        });
        
    });

    $(".basic-number").on( 'keyup', function(){
        var inputVal = ($(this).val()).trim();
        if( parseInt( inputVal ) <= 0 || inputVal.length === 0  ) {
            return;
        }
        $(".basic-pamount").html( '0.00' );
        // $(".price-desc").html( 'Free 1 month' );
        $(".basic-order-count").text( $("#basic_order_number").val() );
        $.ajax({
           type:'POST',
           url:'/dashboard/basic_get_discount',
           data: {
               response_type : 'msg',
               _token : '<?php echo csrf_token() ?>',
               w : $("#basic_website_number").val(),
               o : $("#basic_order_number").val()
           },
           success:function(res) {
               console.log( res );
               var result = JSON.parse( res );
               if( result.status === 'success' ){
                   $(".basic-pamount").html( result.p );
                   if( result.dm.length > 0 ){
                       $(".price-desc").html( result.dm );
                   }else{
                    //    $(".price-desc").html( 'Free 1 month' );
                   }
               }else{
                   console.log( result.response );
               }
           },
           error: function( res ){
               console.log( res.responseText );
           }
        });
        
    });
});
</script>
@endsection