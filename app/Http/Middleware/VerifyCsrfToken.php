<?php

namespace App\Http\Middleware;

use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken as Middleware;

class VerifyCsrfToken extends Middleware
{
    /**
     * The URIs that should be excluded from CSRF verification.
     *
     * @var array<int, string>
     */
    protected $except = [
        'register',
        'login',
        'post/store',
        'post/edit',
        'post/update',
        'post/delete',
        'category/store',
        'category/edit',
        'category/update',
        'category/delete',
        'user/edit',
        'user/update',
        'user/delete',
    ];
}
