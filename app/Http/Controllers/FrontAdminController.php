<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class FrontAdminController extends Controller
{
    public function index () : View
    {
        return view('front-office-back.index');
    }
}
