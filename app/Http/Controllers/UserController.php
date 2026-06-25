<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Services\UserService;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
  protected $user;

  public function __construct(UserService $user)
  {
    $this->user = $user;
  }

  public function index()
  {
    $users = $this->user->getAllUsers();

    return view('users', compact('users'));
  }

  public function myprofile()
  {
    $page = 'myprofile';

    if (Auth::check()) {
      // User is authenticated
      $userId = Auth::id();
      $dataUser = $this->user->getUserById($userId);

      return view('admin.myprofile', compact('page', 'dataUser'));
    }

    return redirect()->route('login')->with('error', 'Invalid login'); 
  }

  public function updateProfile(Request $request)
  {
    $input = $request->all();
    $userId = Auth::id();
    $updateProfile = $this->user->storeOrUpdate($userId, $input);

    return redirect()->route('myprofile')->with('success','Berhasil update profile'); 
  }

  public function changePassword()
  {
    $page = 'change_password';

    if (Auth::check()) {
      // User is authenticated
      $userId = Auth::id();
      $dataUser = $this->user->getUserById($userId);

      return view('admin.change-password', compact('page', 'dataUser'));
    }

    return redirect()->route('login')->with('error', 'Invalid login'); 
  }

  public function updatePassword(Request $request)
  {
    $input = $request->all();
    $userId = Auth::id();
    $user = User::find($userId);

    // check existing password
    if (Hash::check($input['current_password'], $user->password)) 
    {
      // check password and confirm password
      if ($input['new_password'] === $input['confirm_password']) 
      {
        $data['password'] = $input['new_password'];
        $updateProfile = $this->user->storeOrUpdate($userId, $data);

        return redirect()->route('changePassword')->with('success', 'Berhasil update password'); 
      }

      return redirect()->route('changePassword')->with('error', 'Password Baru dan Konfirmasi Password harus sama!'); 
    }

    return redirect()->route('changePassword')->with('error', 'Password Sekarang salah!'); 
  }
}