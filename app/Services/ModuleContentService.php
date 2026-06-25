<?php

namespace App\Services;

use App\Repositories\ModuleContentRepository;

class ModuleContentService
{
  protected $moduleContent;

  public function __construct(ModuleContentRepository $moduleContent)
  { 
    $this->moduleContent = $moduleContent;
  }

  public function getAllData()
  {
    return $this->moduleContent->getAllData();
  }

  public function getData()
  {
    return $this->moduleContent->getData();
  }

  public function getDataById(string $dataId)
  {
    return $this->moduleContent->getDataById($dataId);
  }

  public function getDataByType(string $type, int $limit)
  {
    return $this->moduleContent->getDataByType($type, $limit);
  }

  public function storeOrUpdate(string $dataId, array $data = [])
  {
    return $this->moduleContent->storeOrUpdate($dataId, $data);
  }

  public function destroyById(string $dataId)
  {
    return $this->moduleContent->destroyById($dataId);
  }
}