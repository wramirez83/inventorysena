<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashsboardController extends Controller
{
    public function index(Request $res){
        return view('admin.dashboard');
    }
}
