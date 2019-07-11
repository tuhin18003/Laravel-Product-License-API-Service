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
            <div class="card-content">
                <div class="row">
                    <div class="plans-container">
                        <h3>Free Plan</h3>
                        <div class="col s12 m6 l6">
                                <div class="card hoverable animate fadeLeft">
                                  <div class="card-image  {{$class}} waves-effect">
                                    <div class="card-title">{{$pckg->name}}</div>
                                    <div class="price">
                                      <sup>$</sup>
                                      <sub>/ yr </sub>
                                    </div>
                                    <div class="price-desc">
                                        
                                    </div>
                                  </div>
                                  <div class="card-content">
                                    <ul class="collection">
                                        @foreach( $features[$pckg->id] as $fet)
                                          <li class="collection-item">
                                              @if( strpos( $fet->feature_name, 'Integration') ) 
                                                  {{@sprintf( $fet->feature_name, $pckg->access_website )}} 
                                              @else
                                                  {{$fet->feature_name}}
                                              @endif
                                          </li>
                                        @endforeach
                                    </ul>
                                  </div>
                                  <div class="card-action center-align">
                                      @if( $pckg->id == 1 )
                                        <a href="#" readonly="" class="waves-effect waves-light gradient-45deg-indigo-blue gradient-shadow btn">
                                              Free
                                          </a>
                                      @else
                                          <a href="{{ route('checkout', [ 'id' => $pckg->id ]) }}" class="waves-effect waves-light gradient-45deg-indigo-purple gradient-shadow btn">
                                              Select Plan
                                          </a>
                                      @endif
                                  </div>
                                </div>
                              </div>
                        
                        
                        @foreach( $packages as $pckg )
                            @if( $pckg->id == 1 )
                                @php
                                    $class = 'gradient-45deg-light-blue-cyan'
                                @endphp
                            @elseif( $pckg->id == 2 )
                                @php
                                    $class = 'teal'
                                @endphp
                            @elseif( $pckg->id == 3 )
                                @php
                                    $class = 'gradient-45deg-red-pink'
                                @endphp
                            @elseif( $pckg->id == 4 )
                                @php
                                    $class = 'gradient-45deg-amber-amber'
                                @endphp
                            @endif    
                            
                            <div class="col s12 m6 l6">
                                <div class="card hoverable animate fadeLeft">
                                  <div class="card-image  {{$class}} waves-effect">
                                    <div class="card-title">{{$pckg->name}}</div>
                                    <div class="price">
                                      <sup>$</sup>{{$pckg->price}}
                                      <sub>/{{$pckg->validity}} @if( $pckg->validity_type == 1 ) &#8734; @elseif( $pckg->validity_type == 2 ) yr @endif</sub>
                                    </div>
                                    <div class="price-desc">
                                        @if( $pckg->id == 1 )
                                            Free Life Time
                                        @elseif( $pckg->id == 2 )
                                            Free 1 month
                                        @elseif( $pckg->id == 3 )
                                            @php
                                                $total = $pckg->access_website * 24.99;
                                                $discount_amount = $total - $pckg->price;
                                                $discount = round((($discount_amount / $total) * 100), 2 );
                                            @endphp
                                            Most Popular with {{$discount}}% Off
                                        @elseif( $pckg->id >= 4 )
                                            @php
                                                $total = $pckg->access_website * 24.99 * 2;
                                                $discount_amount = $total - $pckg->price;
                                                $discount = round((($discount_amount / $total) * 100), 2 );
                                            @endphp
                                            Get {{$discount}}% Off
                                        @endif
                                    </div>
                                  </div>
                                  <div class="card-content">
                                    <ul class="collection">
                                        @foreach( $features[$pckg->id] as $fet)
                                          <li class="collection-item">
                                              @if( strpos( $fet->feature_name, 'Integration') ) 
                                                  {{@sprintf( $fet->feature_name, $pckg->access_website )}} 
                                              @else
                                                  {{$fet->feature_name}}
                                              @endif
                                          </li>
                                        @endforeach
                                    </ul>
                                  </div>
                                  <div class="card-action center-align">
                                      @if( $pckg->id == 1 )
                                        <a href="#" readonly="" class="waves-effect waves-light gradient-45deg-indigo-blue gradient-shadow btn">
                                              Free
                                          </a>
                                      @else
                                          <a href="{{ route('checkout', [ 'id' => $pckg->id ]) }}" class="waves-effect waves-light gradient-45deg-indigo-purple gradient-shadow btn">
                                              Select Plan
                                          </a>
                                      @endif
                                  </div>
                                </div>
                              </div>
                        @endforeach
                        
              
              
<!--              <div class="col s12 m6 l4">
                <div class="card hoverable animate fadeRight">
                  <div class="card-image  accent-2 waves-effect">
                    <div class="card-title">PREMIUM</div>
                    <div class="price">
                      <sup>$</sup>69
                      <sub>/mo</sub>
                    </div>
                    <div class="price-desc">Get 27+% off</div>
                  </div>
                  <div class="card-content">
                    <ul class="collection">
                      <li class="collection-item">5 Websites</li>
                      <li class="collection-item">Unlimited Order Confirmation</li>
                      <li class="collection-item">Unlimited API access</li>
                      <li class="collection-item">API Statistics </li>
                      <li class="collection-item">Earning Statistics</li>
                    </ul>
                  </div>
                  <div class="card-action center-align">
                    <a href="{{ route('checkout', [ 'id' => 3 ]) }}" class="waves-effect waves-light gradient-45deg-indigo-purple gradient-shadow btn">
                          Select Plan
                      </a>
                  </div>
                </div>
              </div>-->
            </div>
                </div>
            </div>
            <p>N.B : Contact us support@codesolz.net for customize your package.</p>
        </div>
    </div>
</div>
@endsection

@section('footer_script')
<script src="{{ asset('app-assets/js/scripts/ui-alerts.js') }}" defer></script>
@endsection