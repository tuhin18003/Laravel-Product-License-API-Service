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
            <div class="card-alert card gradient-45deg-green-teal">
                <div class="card-content white-text">
                    <p>
                        <i class="material-icons">check</i> Checkout completed! Thank you for your purchase.</p>
                </div>
                <button type="button" class="close white-text" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="card-content mb-40 mt-100">
                <div class="row">
                    <div class="col s12 m12 l12 text-center">
                        <h3>Congratulations!</h3>
                        <p>Your account has been upgraded. Now you can enjoy our all premium services!</p>
                        <p> You can add more APIs for your website. <a href="/dashboard/api">Click here</a> to create APIs</p>
                        <strong>Thank you very much for choosing us!</strong>
                        <p>For any problem you face with our service, please contact us at <a href="mailto:customer-support@codesolz.net">customer-support@codesolz.net</a></p>
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