<?php

namespace App\Services;

use App\Repositories\UserRepository;

class UserService
{
  protected $user;

  public function __construct(UserRepository $user)
  { 
    $this->user = $user;
  }

  public function getAllUsers()
  {
    return $this->user->getAllUsers();
  }

  public function getUsers()
  {
    return $this->user->getUsers();
  }

  public function getUserById(string $userId)
  {
    return $this->user->getUserById($userId);
  }

  public function getUserByEmail(string $email)
  {
    return $this->user->getUserByEmail($email);
  }

  public function storeOrUpdate(string $userId, array $data = [])
  {
    return $this->user->storeOrUpdate($userId, $data);
  }

  public function destroyById(string $userId)
  {
    return $this->user->destroyById($userId);
  }
}