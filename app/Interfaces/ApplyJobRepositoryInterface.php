<?php

namespace App\Interfaces;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\LengthAwarePaginator;
use App\Models\ApplyJob;

interface ApplyJobRepositoryInterface
{
  public function getAllData();
  public function getData(int $limit): LengthAwarePaginator;
  public function getDataById(string $dataId): ApplyJob;
  public function destroyById(string $dataId);
}