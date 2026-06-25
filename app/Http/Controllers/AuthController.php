<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
  public function index(Request $request)
  {
    $page = 'login';
    $path = $request->input('path', '');

    if (Auth::user()){
      return redirect('/'. env('ADMIN_PATH') .'/dashboard');
    }

    return view('admin.login', compact('page', 'path'));
  }

  public function login(Request $request)
  {
    $credentials = $request->only('email', 'password');
    if (Auth::attempt($credentials)) {
			return redirect('/'. env('ADMIN_PATH') .'/dashboard');
		} else {
			return redirect('/'. env('ADMIN_PATH') .'/login');
		}
  }

  public function logout(Request $request)
	{
		Auth::logout();
    $request->session()->invalidate();
    $request->session()->regenerateToken();
    return redirect('/'. env('ADMIN_PATH') .'/login');
	}
}
