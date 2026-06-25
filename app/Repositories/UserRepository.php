<?php

namespace App\Repositories;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Hash;
use App\Interfaces\UserRepositoryInterface;
use App\Models\Role;
use App\Models\User;

class UserRepository implements UserRepositoryInterface
{
  /**
   * @return Collection
   */
  public function getAllUsers(): Collection
  {
    return User::all();
  }
  
  /**
   * @return User
   */
  public function getUsers(): LengthAwarePaginator
  {
    return User::paginate(10);
  }

  /**
   * @param string $userId
   * @return User
   */
  public function getUserById(string $userId): User
  {
    return User::findOrFail($userId);
  }

  /**
   * @param string $email
   * @return User
   */
  public function getUserByEmail(string $email): User
  {
    return User::where('email', $email)->first();
  }

  public function storeOrUpdate(string $userId = null, array $data = [])
  {
    if(is_null($userId)) 
    {
      $user = new User;
      $user->role_id = $data['role_id'];
      $user->name = $data['name'];
      $user->email = $data['email'];
      $user->password = Hash::make($data['password']);
      $user->save();

      return $user;
    }

    $user = User::find($userId);
    $role = Role::find($user->role_id);
    $user->role_id = $role->id;

    if (isset($data['role_id'])) {
      $user->role_id = $data['role_id'];
    }
    
    if (isset($data['name'])) {
      $user->name = $data['name'];
    }

    if (isset($data['email'])) {
      $user->email = $data['email'];
    }

    if (isset($data['password'])) {
      $user->password = Hash::make($data['password']);
    }

    $user->save();

    return $user;
  }

  public function destroyById(string $userId)
  {
    return User::find($userId)->delete();
  }
}