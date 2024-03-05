<?php

namespace App\Http\Controllers;

use Illuminate\HttpCRequest;

class MainController extends Controller
{

    public function index()
    {
        return view('welcome');
    }

}
