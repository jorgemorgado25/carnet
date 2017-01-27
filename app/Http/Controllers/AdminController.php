<?php

namespace Carnet\Http\Controllers;

use Illuminate\Http\Request;

use Carnet\Http\Requests;

class AdminController extends Controller
{
    public function dashboard()
    {
    	return view('admin.dashboard');
    }
}
