<?php

namespace App\Interfaces;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\LengthAwarePaginator;
use App\Models\Gallery;

interface GalleryRepositoryInterface
{
  public function getAllData(): Collection;
  public function getAllDataByGalleryId(string $gallery_id, int $limit): LengthAwarePaginator;
  public function getData(int $limit): LengthAwarePaginator;
  public function getDataById(string $dataId): Gallery;
  public function getDataBySlug(string $slug): Gallery;
  public function storeOrUpdate(string $dataId = '', array $collection = []);
  public function destroyById(string $dataId);
}