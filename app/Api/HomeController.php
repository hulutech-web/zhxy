<?php

namespace App\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Auth;

class HomeController extends Controller
{
    function __construct()
    {
        $this->middleware('auth:sanctum');
    }
    public function index()
    {
        return Auth::user();
    }
}
