<?php

namespace App\Repositories;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\LengthAwarePaginator;
use App\Interfaces\PagesRepositoryInterface;
use App\Models\Pages;
use App\Models\PagesTranslation;
use App\Models\PagesContent;
use App\Models\ImagesPage;
use App\Helper\StringToSlug;

class PagesRepository implements PagesRepositoryInterface
{
  /**
   * @return Collection
   */
  public function getAllData(): Collection
  {
    return Pages::with('translation')
      ->where('deleted_at', null)
      ->where('show_menu', 1)
      ->orderBy('order_num', 'ASC')
      ->get();
  }

  /**
   * @return Pages
   */
  public function getData(): LengthAwarePaginator
  {
    return Pages::with('translation')
      ->where('deleted_at', null)
      ->orderBy('order_num', 'ASC')
      ->paginate(10);
  }

  /**
   * @return Pages
   */
  public function getDataWithChild(): Collection
  {
    return Pages::whereNull('parent_id')
      ->with('children')
      ->with('translation')
      ->where('deleted_at', null)
      ->orderBy('order_num', 'ASC')
      ->get();
  }

  /**
   * @return Pages
   */
  public function getDataForMenu(): Collection
  {
    return Pages::whereNull('parent_id')
      ->with('children_menu')
      ->with('translation')
      ->where('deleted_at', null)
      ->where('show_menu', 1)
      ->orderBy('order_num', 'ASC')
      ->get();
  }

  /**
   * @return Pages
   */
  public function getDataThisMenuChild($dataId): Collection
  {
    return Pages::where('parent_id', $dataId)
      ->with('children')
      ->with('translation')
      ->where('deleted_at', null)
      ->orderBy('order_num', 'ASC')
      ->get();
  }

  /**
   * @return Pages Parent
   */
  public function getParentData(string $dataId)
  {
    $page = Pages::with('translation')->find($dataId);
    $parents = [];

    while ($page && $page->parent_id != NULL) {
      $page = $page->parent;
      if ($page) {
        $parents[] = $page;
      }
    }

    return $parents;
  }

  /**
   * @return Pages Parent
   */
  public function getTopParentData(string $dataId)
  {
    $page = Pages::with('translation')->find($dataId);

    while ($page && $page->parent_id != NULL) {
      $page = $page->parent;
    }

    return $page;
  }

  /**
   * @param string $dataId
   * @return Pages
   */
  public function getDataById(string $dataId)
  {
    return Pages::with('translation')
      ->where('id', $dataId)
      ->where('deleted_at', null)
      ->first();
  }

  /**
   * @param string $slug
   * @return Pages
   */
  public function getDataBySlug(string $slug)
  {
    return PagesTranslation::where('slug', $slug)->first();
  }

  /**
   * @param string $id
   * @return ImagesPage
   */
  public function getImagesPage(string $dataId)
  {
    return ImagesPage::where('pages_translation_id', $dataId)->get();
  }

  /**
   * @param string $slug
   * @return Pages
   */
  public function getPageContent(string $pages_id)
  {
    return PagesContent::where('pages_id', $pages_id)
      ->where('deleted_at', null)
      ->orderBy('num_order', 'asc')
      ->get();
  }

  public function storeOrUpdate(string $dataId = '', array $data = [])
  {
    if(empty($dataId)) 
    {
      $page = new Pages;
      $page->parent_id = isset($data['parent']) ? $data['parent'] : NULL;
      $page->order_num = isset($data['order_num']) ? $data['order_num'] : 1;
      $page->as_parent = isset($data['parent']) ? 1 : 0;
      $page->show_menu = isset($data['show_menu']) ? $data['show_menu'] : 1;
      $page->save();

      $pageTranslation = new PagesTranslation;
      $pageTranslation->pages_id = $page->id;
      $pageTranslation->title = isset($data['title']) ? $data['title'] : '';
      $pageTranslation->description = isset($data['description']) ? $data['description'] : '';

      $stringConvert = new StringToSlug;
      $pageTranslation->slug = $stringConvert->createUniqueSlug(PagesTranslation::class, $pageTranslation->title);

      $pageTranslation->template = isset($data['template']) ? $data['template'] : 'default';
      $pageTranslation->image = isset($data['image']) ? $data['image'] : '';

      $pageTranslation->language_code = isset($data['language_code']) ? $data['language_code'] : 'id';
      $pageTranslation->save();

      return $pageTranslation;
    }

    $thisData = PagesTranslation::find($dataId);
    $parentId = $thisData->pages_id;
    $dataSubmit = Pages::find($parentId);
    $dataSubmit->parent_id = isset($data['parent']) ? $data['parent'] : NULL;
    $dataSubmit->order_num = isset($data['order_num']) ? $data['order_num'] : 1;
    $dataSubmit->as_parent = isset($data['parent']) ? 1 : 0;
    $dataSubmit->show_menu = isset($data['show_menu']) ? $data['show_menu'] : 1;
    $dataSubmit->save();

    $pageTranslation = PagesTranslation::find($dataId);
    $pageTranslation->title = isset($data['title']) ? $data['title'] : '';
    $pageTranslation->description = isset($data['description']) ? $data['description'] : '';

    $stringConvert = new StringToSlug;
    $pageTranslation->slug = $stringConvert->createUniqueSlug(PagesTranslation::class, $pageTranslation->title);

    $pageTranslation->template = isset($data['template']) ? $data['template'] : 'default';
    $pageTranslation->image = isset($data['image']) ? $data['image'] : '';
    $pageTranslation->language_code = isset($data['language_code']) ? $data['language_code'] : 'id';
    $pageTranslation->save();

    return $pageTranslation;
  }
}