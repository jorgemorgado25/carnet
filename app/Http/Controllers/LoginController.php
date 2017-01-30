<?php

namespace Carnet\Http\Controllers;

use Illuminate\Http\Request;

use Carnet\Http\Requests;
use Redirect;
use Session;
use Auth;
class LoginController extends Controller
{
    public function admin()
    {
    	return view('login.admin');
    }

    public function postAdmin(Request $request)
    {
    	
    	if (Auth::attempt(['login' => $request['login'] , 'password' => $request['password']]))
        {
            if (Auth::user()->active == 0)
            {
                Auth::logout();
                Session::flash('error-message','Usted no tiene permisos para ingresar.');
                return Redirect::route('login.admin');
            }
            return Redirect::route('admin.dashboard');
        }
        Session::flash('error-message','Sus credenciales son inválidas');
        return Redirect::route('login.admin');
    }
}
