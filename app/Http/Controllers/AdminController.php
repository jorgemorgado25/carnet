<?php

namespace Carnet\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Session;
use Redirect;
use Carnet\Http\Requests;

class AdminController extends Controller
{
    public function dashboard()
    {
    	return view('admin.dashboard');
    }
    public function logout()
    {
        Auth::logout();
        Session::flash('success-message', 'Ha finalizado sesión exitosamente');
        return Redirect::route('login.admin');
    }
}
