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

     //cambiar la direccion por su direccion local
    protected $except = [
          'http://localhost/PayrollApi/public/admin',
          'http://localhost/PayrollApi/public/admin/*',
          'http://localhost/PayrollApi/public/boss',
          'http://localhost/PayrollApi/public/boss/*',
          'http://localhost/PayrollApi/public/company/',
          'http://localhost/PayrollApi/public/company/*',
          'http://localhost/PayrollApi/public/employee',
          'http://localhost/PayrollApi/public/employee/*'


    ];
}
