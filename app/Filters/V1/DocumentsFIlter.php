<?php

namespace App\Filters\V1;

use Illuminate\Http\Request;
use App\Filters\ApiFilter;

class DocumentsFilter extends ApiFilter
{

    protected $allowedParams = [
        'userId' => ['eq'],
        'fileName' => ['eq'],
        'extension' => ['eq'],
        'type' => ['eq'],
    ];

    protected $columnMap = [
        'userId' => 'user_id',
        'fileName' => 'filename',
    ];

    protected $operatorMap = [
        'eq' => '=',
    ];

}