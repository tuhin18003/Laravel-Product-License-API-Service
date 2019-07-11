@extends('layouts.app')

@section('header')
<link href="{{ asset('app-assets/css/pages/pricing.css') }}" rel="stylesheet">
@endsection

@section('title', 'Purchase History')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h4 class="header">Purchase History</h4>
            <p>All of your purchase history so far</p>
            <div class="card-content">
                <div class="row">
                    <div class="col-lg-12">
                    <div class="plans-container">
                        @if( empty( $purchase_history->count() ))
                            @include( 'dashboard.status', [ 'empty' => true, 'msg' => 'Sorry! No history found!' ] )
                        @else
                        <table class="table table-striped">
                            <tr>
                                <th>Order Number</th>
                                <th>Package Name</th>
                                <th>Price</th>
                                <th>Purchase Method</th>
                                <th>Purchase On</th>
                                <th>Expire On</th>
                            </tr>
                            @foreach($purchase_history as $puh)
                                <tr>
                                    <td>
                                        #{{$puh->order_number}}
                                    </td>
                                    <td>
                                        <b>{{$puh->package_name}}</b>
                                        @php
                                            $fetures = json_decode($puh->package_features);
                                        @endphp
                                        @if( !empty($fetures ))
                                            <ul>
                                                @foreach( $fetures as $fet)
                                                    <li>
                                                        @if( strpos( $fet->feature_name, 'Integration') ) 
                                                              {{@sprintf( $fet->feature_name, $puh->website_access_limit )}} 
                                                          @else
                                                              {{$fet->feature_name}}
                                                          @endif
                                                    </li>
                                                @endforeach
                                            </ul>
                                        @endif
                                    </td>
                                    <td>${{$puh->price}}</td>
                                    <td>{{$puh->payment_type}}</td>
                                    <td>{{$puh->created_at}}</td>
                                    <td>{{$puh->expire_on}}</td>
                                </tr>

                            @endforeach
                        </table>
                        @endif
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
@endsection