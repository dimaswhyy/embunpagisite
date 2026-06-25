<?php

namespace App\Interfaces;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\LengthAwarePaginator;
use App\Models\News;

interface NewsRepositoryInterface
{
  public function getAllData(int $limit): LengthAwarePaginator;
  public function getAllDataByCategory(string $category_id, int $limit): LengthAwarePaginator;
  public function getData(): LengthAwarePaginator;
  public function getDataById(string $dataId): News;
  public function getDataBySlug(string $slug): News;
  public function storeOrUpdate(string $dataId = '', array $collection = []);
  public function destroyById(string $dataId);
}