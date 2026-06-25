<?php

namespace App\Services;

use App\Repositories\PagesRepository;

class PagesService
{
  protected $pages;

  public function __construct(PagesRepository $pages)
  { 
    $this->pages = $pages;
  }

  public function getAllData()
  {
    return $this->pages->getAllData();
  }

  public function getDataWithChild()
  {
    return $this->pages->getDataWithChild();
  }

  public function getDataForMenu()
  {
    return $this->pages->getDataForMenu();
  }

  public function getDataThisMenuChild(string $dataId)
  {
    return $this->pages->getDataThisMenuChild($dataId);
  }

  public function getParentData(string $dataId)
  {
    return $this->pages->getParentData($dataId);
  }

  public function getTopParentData(string $dataId)
  {
    return $this->pages->getTopParentData($dataId);
  }

  public function getData()
  {
    return $this->pages->getData();
  }

  public function getDataById(string $dataId)
  {
    return $this->pages->getDataById($dataId);
  }

  public function getDataBySlug(string $slug)
  {
    return $this->pages->getDataBySlug($slug);
  }

  public function getImagesPage(string $dataId)
  {
    return $this->pages->getImagesPage($dataId);
  }

  public function getPageContent(string $pages_id)
  {
    return $this->pages->getPageContent($pages_id);
  }

  public function storeOrUpdate(string $dataId, array $data = [])
  {
    return $this->pages->storeOrUpdate($dataId, $data);
  }
}