<?php

namespace App\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Auth;

class HomeController extends Controller
{
    public function index()
    {
        return 33;
    }
}
