<?php

namespace App\Interfaces;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\LengthAwarePaginator;
use App\Models\FacilitiesCategory;

interface FacilitiesCategoryRepositoryInterface
{
  public function getAllData(): Collection;
  public function getData(): LengthAwarePaginator;
  public function getDataById(string $dataId): FacilitiesCategory;
  public function getDataBySlug(string $slug): FacilitiesCategory;
  public function storeOrUpdate(string $dataId = '', array $collection = []);
  public function destroyById(string $dataId);
}