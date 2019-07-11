@if (session('success_status'))
<div class="card-alert card gradient-45deg-green-teal">
    <div class="card-content white-text">
        <p>
            <i class="material-icons">check</i> {!! session('success_status') !!}</p>
    </div>
    <button type="button" class="close white-text" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">×</span>
    </button>
</div>
@endif

@if (session('error_status'))
<div class="card-alert card gradient-45deg-red-pink">
    <div class="card-content white-text">
        <p>
            <i class="material-icons">error</i> {!! session('error_status') !!}</p>
    </div>
    <button type="button" class="close white-text" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">×</span>
    </button>
</div>
@endif

@if (isset($empty))
<div class="card-alert card gradient-45deg-red-pink">
    <div class="card-content white-text">
        <p>
            <i class="material-icons">error</i> {!! $msg !!}</p>
    </div>
    <button type="button" class="close white-text" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">×</span>
    </button>
</div>
@endif