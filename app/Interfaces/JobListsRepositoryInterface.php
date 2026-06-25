<?php

namespace App\Interfaces;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\LengthAwarePaginator;
use App\Models\JobLists;

interface JobListsRepositoryInterface
{
  public function getAllData(): Collection;
  public function getData(int $limit): LengthAwarePaginator;
  public function getDataById(string $dataId): JobLists;
  public function getDataBySlug(string $slug): JobLists;
  public function storeOrUpdate(string $dataId = '', array $collection = []);
  public function destroyById(string $dataId);
}