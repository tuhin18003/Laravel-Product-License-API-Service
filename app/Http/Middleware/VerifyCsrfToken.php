<?php

namespace App\Http\Middleware;

use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken as Middleware;

class VerifyCsrfToken extends Middleware
{
    /**
     * Indicates whether the XSRF-TOKEN cookie should be set on the response.
     *
     * @var bool
     */
    protected $addHttpCookie = true;

    /**
     * The URIs that should be excluded from CSRF verification.
     *
     * @var array
     */
    protected $except = [
        '/dashboard/order_created', 
        '/woo-altcoin-user-register',
        '/auto-tracking-coin-list',
        '/heybaby159753nas5er54df5sfwer54', //api auth checking
        '/successtrxid87sdf545sd4fs5df8sd_confirm', 
        '/deletetrxid87sdfcx87s8df8sd',
        '/dashboard/upgrade/success'
    ];
}
