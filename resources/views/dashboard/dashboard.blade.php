@extends('layouts.app')

@section('title', 'Welcome to dashboard')
@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="row">
                <div class="col s12">
                    <div class="container">
                        @include('dashboard.notification')
                        
                        @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                        @endif
                    </div>
                </div>
            </div>
              
            <div class="row">
        <div class="col s12">
          <div class="container">
            <!--card stats start-->
<div id="card-stats">
   <div class="row">
      <div class="col s12 m6 l6 xl3">
         <div class="card gradient-45deg-light-blue-cyan gradient-shadow min-height-100 white-text animate fadeLeft">
            <div class="padding-4">
               <div class="col s7 m7">
                  <i class="material-icons background-round mt-5">add_shopping_cart</i>
                  <p>Orders</p>
               </div>
               <div class="col s5 m5 right-align">
                  <h5 class="mb-0 white-text">{{ $order_count_today }}</h5>
                  <p class="no-margin">Today</p>
                  <p>{{ $lifetime_order_count }}</p>
               </div>
            </div>
         </div>
      </div>
       
       <div class="col s12 m6 l6 xl3">
         <div class="card gradient-45deg-green-teal gradient-shadow min-height-100 white-text animate fadeRight">
            <div class="padding-4">
               <div class="col s6 m6">
                  <i class="material-icons background-round mt-5">attach_money</i>
                  <p>Total Sold </p>
               </div>
               <div class="col s6 m6 mr-0 right-align">
                  <h5 class="mb-0 white-text">{{$total_sold_today_fiat}}</h5>
                  <p class="no-margin">Today</p>
                  <p class="mt-10">{{ $lifetime_total_coin_price }} </p>
               </div>
            </div>
         </div>
      </div>
      
      <div class="col s12 m6 l6 xl3">
         <div class="card gradient-45deg-amber-amber gradient-shadow min-height-100 white-text animate fadeRight">
            <div class="padding-4">
               <div class="col s6 m6">
                  <i class="material-icons background-round mt-5">timeline</i>
                  <p class="fs-14">API Limit</p>
               </div>
               <div class="col s6 m6 right-align">
                  <h5 class="mb-0 white-text">{{ $api_used_today }}</h5>
                  <p class="no-margin fs-13">Used Today</p>
                  <p>{{ $api_expire_limit }}</p>
               </div>
            </div>
         </div>
      </div>
      
       <div class="col s12 m6 l6 xl3">
         <div class="card gradient-45deg-red-pink gradient-shadow min-height-100 white-text animate fadeLeft">
            <div class="padding-4">
               <div class="col s7 m7">
                  <i class="material-icons background-round mt-5">perm_identity</i>
                  <p class="fs-13">Website Limit</p>
               </div>
               <div class="col s5 m5 right-align">
                  <h5 class="mb-0 white-text">{{ $total_intg_website }}</h5>
                  <p class="no-margin">Used</p>
                  <p>{{$website_access_limit}}</p>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
</div>
</div>
</div>
            
            <div class="row">
                <div class="col s12">
                    <div class="container">
                        <div id="chartjs-line-chart" class="card">
      <div class="card-content">
<!--         <h4 class="card-title">Order Confirmation</h4>
         <p class="caption">
            API call and your order confirmation statistics.
         </p>-->
         <div class="row">
            <div class="col s12">
                <div id="earning_graph">No API Call Made Yet!</div>
               <!--<div class="sample-chart-wrapper"><canvas id="line-chart" height="400"></canvas></div>-->
            </div>
         </div>
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
<script src="{{ asset('app-assets/vendors/nascharts/nascharts.js') }}" type="text/javascript" ></script>
<script src="{{ asset('app-assets/vendors/nascharts/data.js') }}" type="text/javascript" > </script>
<script src="{{ asset('app-assets/vendors/nascharts/drilldown.js') }}" type="text/javascript" ></script>
<script src="{{ asset('app-assets/vendors/nascharts/nascharts.init.js') }}" type="text/javascript" ></script>
<script src="{{ asset('app-assets/vendors/nascharts/nascharts.line.chart.init.js') }}" type="text/javascript" ></script>

<script type="text/javascript">
    var LinehighChartData = [ {!! $chart_data !!} ]; 
    var _obj = {
        graph_load_in: 'earning_graph',
        title_text: 'All Transactions Report',
        sub_title_text: 'Transaction & Earning Reports',
        colors: [ '#9ACD32', 'forestgreen', '#FFA07A', 'red'],
        data: LinehighChartData
    };
    var AiosNasChartsLine = new Aios_NasCharts_Line( _obj );
    AiosNasChartsLine.init();
</script>

@endsection

