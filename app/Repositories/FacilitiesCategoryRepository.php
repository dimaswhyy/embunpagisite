<?php

namespace App\Repositories;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\LengthAwarePaginator;
use App\Interfaces\FacilitiesCategoryRepositoryInterface;
use App\Models\FacilitiesCategory;
use App\Models\FacilitiesCategoryTranslation;
use App\Helper\StringToSlug;

class FacilitiesCategoryRepository implements FacilitiesCategoryRepositoryInterface
{
  /**
   * @return Collection
   */
  public function getAllData(): Collection
  {
    return FacilitiesCategory::with('translation')->orderBy('num_order', 'ASC')->get();
  }

  /**
   * @return FacilitiesCategory
   */
  public function getData(): LengthAwarePaginator
  {
    return FacilitiesCategory::with('translation')->orderBy('created_at', 'DESC')->paginate(10);
  }

  /**
   * @param string $dataId
   * @return FacilitiesCategory
   */
  public function getDataById(string $dataId): FacilitiesCategory
  {
    return FacilitiesCategory::findOrFail($dataId);
  }

  /**
   * @param string $dataId
   * @return FacilitiesCategory
   */
  public function getDataBySlug(string $slug): FacilitiesCategory
  {
    $data = FacilitiesCategoryTranslation::where('slug', $slug)->first();

    return FacilitiesCategory::findOrFail($data->facilities_category_id);
  }

  public function storeOrUpdate(string $dataId = '', array $data = [])
  {
    if(empty($dataId)) 
    {
      $dataParent = new FacilitiesCategory;
      $dataParent->status = isset($data['status']) ? $data['status'] : 1;
      $dataParent->num_order = isset($data['num_order']) ? $data['num_order'] : 1;
      $dataParent->save();

      $translation = new FacilitiesCategoryTranslation;
      $translation->facilities_category_id = $dataParent->id;
      $translation->title = isset($data['title']) ? $data['title'] : '';
      
      $stringConvert = new StringToSlug;
      $translation->slug = $stringConvert->convert($translation->title);

      $translation->language_code = isset($data['language_code']) ? $data['language_code'] : 'en';
      $translation->save();

      return $translation;
    }
    
    $thisData = FacilitiesCategoryTranslation::find($dataId);
    $parentId = $thisData->facilities_category_id;
    $dataSubmit = FacilitiesCategory::find($parentId);
    $dataSubmit->status = isset($data['status']) ? $data['status'] : 1;
    $dataSubmit->num_order = isset($data['num_order']) ? $data['num_order'] : 1;
    $dataSubmit->save();

    $translation = FacilitiesCategoryTranslation::find($dataId);
    $translation->title = isset($data['title']) ? $data['title'] : '';
    $stringConvert = new StringToSlug;
    $translation->slug = $stringConvert->convert($translation->title);
    $translation->language_code = isset($data['language_code']) ? $data['language_code'] : 'en';
    $translation->save();

    return $translation;
  }

  public function destroyById(string $dataId)
  {
    // check other data translation
    $thisData = FacilitiesCategoryTranslation::find($dataId);
    $parentId = $thisData->facilities_category_id;
    $dataParent = FacilitiesCategory::find($parentId);

    // if not found other translation data, delete until parent
    if ($dataParent) {
      // delete child
      FacilitiesCategoryTranslation::find($dataId)->delete();

      // delete parent
      return FacilitiesCategory::find($parentId)->delete();
    }

    // delete only child
    return FacilitiesCategoryTranslation::find($dataId)->delete();
  }

}