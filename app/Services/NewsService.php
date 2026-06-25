<?php

namespace App\Services;

use App\Repositories\NewsRepository;

class NewsService
{
  protected $data;

  public function __construct(NewsRepository $data)
  { 
    $this->data = $data;
  }

  public function getAllData(int $limit)
  {
    return $this->data->getAllData($limit);
  }

  public function getAllDataByCategory(string $category_id, int $limit)
  {
    return $this->data->getAllDataByCategory($category_id, $limit);
  }

  public function getData()
  {
    return $this->data->getData();
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