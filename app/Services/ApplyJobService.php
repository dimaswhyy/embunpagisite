<?php

namespace App\Services;

use App\Repositories\ApplyJobRepository;

class ApplyJobService
{
  protected $data;

  public function __construct(ApplyJobRepository $data)
  { 
    $this->data = $data;
  }

  public function getAllData()
  {
    return $this->data->getAllData();
  }

  public function getAllDataForExport()
  {
    return $this->data->getAllDataForExport();
  }

  public function getData(int $limit)
  {
    return $this->data->getData($limit);
  }

  public function getDataById(string $dataId)
  {
    return $this->data->getDataById($dataId);
  }

  public function destroyById(string $dataId)
  {
    return $this->data->destroyById($dataId);
  }
}