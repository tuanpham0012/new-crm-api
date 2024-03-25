<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Traits\APIResponseHandlerTrait;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests, APIResponseHandlerTrait;
}
