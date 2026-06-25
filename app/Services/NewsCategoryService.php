<?php

namespace App\Services;

use App\Repositories\NewsCategoryRepository;

class NewsCategoryService
{
  protected $data;

  public function __construct(NewsCategoryRepository $data)
  { 
    $this->data = $data;
  }

  public function getAllData()
  {
    return $this->data->getAllData();
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