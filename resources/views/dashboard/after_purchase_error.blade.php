@extends('layouts.app')

@section('header')
<link href="{{ asset('app-assets/css/pages/pricing.css') }}" rel="stylesheet">
@endsection

@section('title', 'Checkout Status')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
<!--            <h4 class="header">Thank you!</h4>
            <p>Your checkout process has been done!</p>-->
            <div class="card-alert card gradient-45deg-red-pink">
                <div class="card-content white-text">
                    <p>
                        <i class="material-icons">error</i> Whoops! Something went wrong!</p>
                </div>
                <button type="button" class="close white-text" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="card-content mb-40 mt-100">
                <div class="row">
                    <div class="col s12 m12 l12 text-center">
                        <h3>Woops! :( </h3>
                        <code>
                            {{ $request }}
                        </code>
                        <p> {{ $response }} If you think you have completed your purchase successfully please contact us at <a href="mailto:customer-support@codesolz.net">customer-support@codesolz.net</a></p>
                        <strong>Thank you very much for choosing us!</strong>
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