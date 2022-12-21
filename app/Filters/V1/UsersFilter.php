<?php

namespace App\Filters\V1;

use Illuminate\Http\Request;
use App\Filters\ApiFilter;

class UsersFilter extends ApiFilter
{

    protected $allowedParams = [
        'name' => ['eq'],
        'lastname' => ['eq'],
        'email' => ['eq'],
        'username' => ['eq'],
        'password' => ['eq'],
        'isAdmin' => ['eq'],
        'isActive' => ['eq'],
    ];

    protected $columnMap = [
        'isAdmin' => 'is_admin',
        'isActive' => 'is_active'
    ];

    protected $operatorMap = [
        'eq' => '=',
    ];

}