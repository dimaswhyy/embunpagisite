<?php

namespace App\Services;

use App\Repositories\JobListsRepository;

class JobListsService
{
  protected $data;

  public function __construct(JobListsRepository $data)
  { 
    $this->data = $data;
  }

  public function getAllData()
  {
    return $this->data->getAllData();
  }
  
  public function getDataPublish()
  {
    return $this->data->getDataPublish();
  }

  public function getData(int $limit)
  {
    return $this->data->getData($limit);
  }

  public function getDataById(string $dataId)
  {
    return $this->data->getDataById($dataId);
  }

  public function getDataByIdToArray(string $dataId)
  {
    return $this->data->getDataByIdToArray($dataId);
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