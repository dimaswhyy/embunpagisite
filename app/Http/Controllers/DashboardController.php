<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
  public function index(Request $request)
  {
    $page = 'dashboard';
    $path = $request->input('path', '');
    return view('admin.dashboard', compact('page', 'path'));
  }
}
