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
        //'http://127.0.0.1:8000/insertaradmin',
        //'http://127.0.0.1:8000/insertarCompany'
        'http://localhost/ClasesFsj2021/PayrollApi/public/',
        'http://localhost/ClasesFsj2021/PayrollApi/public/companyP',
        'http://localhost/ClasesFSJ/proyecto4/PayrollApi/public'

    ];
}
