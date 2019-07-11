@if( $is_premium_member === false )
<div class="card-alert card gradient-45deg-purple-deep-orange">
    <div class="card-content white-text">
        <p>
            <i class="material-icons">notifications</i>
            You are currently on the "free" plan and receive only 5 automatic order confirmation. <a href="/dashboard/upgrade"> Upgrade now to unlock more automatic order</a>!
        </p>
    </div>
</div>
@endif