<?php

namespace App\Interfaces;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\LengthAwarePaginator;
use App\Models\NewsCategory;

interface NewsCategoryRepositoryInterface
{
  public function getAllData(): Collection;
  public function getData(): LengthAwarePaginator;
  public function getDataById(string $dataId): NewsCategory;
  public function getDataBySlug(string $slug): NewsCategory;
  public function storeOrUpdate(string $dataId = '', array $collection = []);
  public function destroyById(string $dataId);
}