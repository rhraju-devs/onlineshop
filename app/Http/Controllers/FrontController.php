<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FrontController extends Controller
{
    public function index(){
        return view('welcome');
    }
    public function hi(){
        return ('Hi everyone');
    }
}
// FrontController@inde
// FrontController