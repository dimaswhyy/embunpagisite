<?php

namespace App\Interfaces;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\LengthAwarePaginator;
use App\Models\User;

interface UserRepositoryInterface
{
  public function getAllUsers(): Collection;
  public function getUsers(): LengthAwarePaginator;
  public function getUserById(string $userId): User;
  public function getUserByEmail(string $email): User;
  public function storeOrUpdate(string $userId = null, array $collection = []);
  public function destroyById(string $userId);
}