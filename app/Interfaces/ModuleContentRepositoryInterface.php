<?php

namespace App\Interfaces;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\LengthAwarePaginator;
use App\Models\ModuleContent;

interface ModuleContentRepositoryInterface
{
  public function getAllData(): Collection;
  public function getData(): LengthAwarePaginator;
  public function getDataById(string $dataId): ModuleContent;
  public function getDataByType(string $type, int $limit): Collection;
  public function storeOrUpdate(string $dataId = "", array $collection = []);
  public function destroyById(string $dataId);
}