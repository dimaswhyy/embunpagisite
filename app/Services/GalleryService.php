<?php

namespace App\Services;

use App\Repositories\GalleryRepository;

class GalleryService
{
  protected $data;

  public function __construct(GalleryRepository $data)
  { 
    $this->data = $data;
  }

  public function getAllData()
  {
    return $this->data->getAllData();
  }

  public function getAllDataByGalleryId(string $gallery_id, int $limit)
  {
    return $this->data->getAllDataByGalleryId($gallery_id, $limit);
  }

  public function getData(int $limit)
  {
    return $this->data->getData($limit);
  }

  public function getDataById(string $dataId)
  {
    return $this->data->getDataById($dataId);
  }

  public function getDataBySlug(string $slug)
  {
    return $this->data->getDataBySlug($slug);
  }

  public function storeOrUpdate(string $dataId, array $data = [])
  {
    return $this->data->storeOrUpdate($dataId, $data);
  }

  public function destroyById(string $dataId)
  {
    return $this->data->destroyById($dataId);
  }
}