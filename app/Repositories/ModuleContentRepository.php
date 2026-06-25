<?php

namespace App\Repositories;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\LengthAwarePaginator;
use App\Interfaces\ModuleContentRepositoryInterface;
use App\Models\ModuleContent;
use App\Models\ModuleContentTranslation;

class ModuleContentRepository implements ModuleContentRepositoryInterface
{
  /**
   * @return Collection
   */
  public function getAllData(): Collection
  {
    return ModuleContent::with('translation')
      ->where('deleted_at', null)
      ->orderBy('created_at', 'DESC')
      ->get();
  }

  /**
   * @return ModuleContent
   */
  public function getData(): LengthAwarePaginator
  {
    return ModuleContent::with('translation')->orderBy('created_at', 'ASC')->paginate(10);
  }

  /**
   * @param string $dataId
   * @return ModuleContent
   */
  public function getDataById(string $dataId): ModuleContent
  {
    return ModuleContent::findOrFail($dataId);
  }

  /**
   * @param string $type
   * @return ModuleContent
   */
  public function getDataByType(string $type, int $limit): Collection
  {
    return ModuleContent::with('translation')
      ->where('type', $type)
      ->orderBy('created_at', 'DESC')
      ->limit($limit)
      ->get();
  }
  
  public function storeOrUpdate(string $dataId = "", array $data = [])
  {
    if(empty($dataId)) 
    {
      $moduleContent = new ModuleContent;
      $moduleContent->type = $data['type'];
      $moduleContent->status = $data['status'];
      $moduleContent->save();

      $moduleContentTranslation = new ModuleContentTranslation;
      $moduleContentTranslation->module_content_id = $moduleContent->id;
      $moduleContentTranslation->title = isset($data['title']) ? $data['title'] : '';
      $moduleContentTranslation->subtitle = isset($data['subtitle']) ? $data['subtitle'] : '';
      $moduleContentTranslation->description = isset($data['description']) ? $data['description'] : '';

      if (isset($data['image'])) {
        $moduleContentTranslation->image = $data['image'];
      }

      $moduleContentTranslation->language_code = $data['language_code'];
      $moduleContentTranslation->save();

      return $moduleContentTranslation;
    }

    $moduleContentTranslation = ModuleContentTranslation::find($dataId);
    $parentId = $moduleContentTranslation->module_content_id;
    $dataSubmit = ModuleContent::find($parentId);
    $dataSubmit->status = isset($data['status']) ? $data['status'] : 1;
    $dataSubmit->save();

    $moduleContentTranslation->title = isset($data['title']) ? $data['title'] : '';
    $moduleContentTranslation->subtitle = isset($data['subtitle']) ? $data['subtitle'] : '';
    $moduleContentTranslation->description = isset($data['description']) ? $data['description'] : '';

    if (isset($data['image'])) {
      $moduleContentTranslation->image = $data['image'];
    }

    $moduleContentTranslation->save();

    return $moduleContentTranslation;
  }

  public function destroyById(string $dataId)
  {
    // check other data translation
    $thisData = ModuleContentTranslation::find($dataId);
    $parentId = $thisData->module_content_id;
    $dataParent = ModuleContent::find($parentId);

    // if not found other translation data, delete until parent
    if ($dataParent) {
      // delete child
      ModuleContentTranslation::find($dataId)->delete();

      // delete parent
      return ModuleContent::find($parentId)->delete();
    }

    // delete only child
    return ModuleContentTranslation::find($dataId)->delete();
  }
}