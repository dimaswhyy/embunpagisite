<?php

namespace App\Services;

use App\Repositories\BookingSchoolTourRepository;

class BookingSchoolTourService
{
  protected $data;

  public function __construct(BookingSchoolTourRepository $data)
  { 
    $this->data = $data;
  }

  public function getAllData()
  {
    return $this->data->getAllData();
  }

  public function getData(int $limit)
  {
    return $this->data->getData($limit);
  }

  public function getDataById(string $dataId)
  {
    return $this->data->getDataById($dataId);
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