<?php

namespace App\Interfaces;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\LengthAwarePaginator;
use App\Models\BookingSchoolTour;

interface BookingSchoolTourRepositoryInterface
{
  public function getAllData();
  public function getData(int $limit): LengthAwarePaginator;
  public function getDataById(string $dataId): BookingSchoolTour;
  public function storeOrUpdate(string $dataId = '', array $collection = []);
  public function destroyById(string $dataId);
}