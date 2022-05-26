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
          'http://localhost/PayrollApi/public/admin',
          'http://localhost/PayrollApi/public/admin/*', //* = by id
          'http://localhost/PayrollApi/public/boss',
          'http://localhost/PayrollApi/public/boss/*', //* = by id
          'http://localhost/PayrollApi/public/company/',
          'http://localhost/PayrollApi/public/company/*', //by id
          'http://localhost/PayrollApi/public/employee',
          'http://localhost/PayrollApi/public/employee/*' //* = by id


    ];
}
