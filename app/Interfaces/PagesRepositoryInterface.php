<?php

namespace App\Interfaces;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\LengthAwarePaginator;
use App\Models\Pages;

interface PagesRepositoryInterface
{
  public function getAllData(): Collection;
  public function getDataWithChild(): Collection;
  public function getDataThisMenuChild(string $dataId): Collection;
  public function getParentData(string $dataId);
  public function getData(): LengthAwarePaginator;
  public function getDataById(string $dataId);
}