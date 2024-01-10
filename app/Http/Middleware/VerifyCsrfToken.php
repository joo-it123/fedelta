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
        //
<<<<<<< HEAD
=======
        'login'
>>>>>>> 49d5b26f76c9414c5c664dcc334c8910e1fdb7a1
    ];
}
