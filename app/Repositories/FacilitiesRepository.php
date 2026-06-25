<?php

namespace App\Repositories;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\LengthAwarePaginator;
use App\Interfaces\FacilitiesRepositoryInterface;
use App\Models\Facilities;
use App\Models\FacilitiesTranslation;
use App\Helper\StringToSlug;

class FacilitiesRepository implements FacilitiesRepositoryInterface
{
  /**
   * @return Collection
   */
  public function getAllData(int $limit): LengthAwarePaginator
  {
    return Facilities::with('translation')
      ->where('deleted_at', null)
      ->orderBy('created_at', 'ASC')
      ->paginate($limit);
  }

  /**
   * @return Collection
   */
  public function getAllDataByCategory(string $category_id, int $limit): LengthAwarePaginator
  {
    return Facilities::where('facilities_category_id', $category_id)
      ->with('translation')
      ->where('deleted_at', null)
      ->orderBy('created_at', 'ASC')
      ->paginate($limit);
  }

  /**
   * @return Facilities
   */
  public function getData(): LengthAwarePaginator
  {
    return Facilities::with('translation')->orderBy('created_at', 'ASC')->paginate(10);
  }

  /**
   * @param string $dataId
   * @return Facilities
   */
  public function getDataById(string $dataId): Facilities
  {
    return Facilities::findOrFail($dataId);
  }

  /**
   * @param string $dataId
   * @return Facilities
   */
  public function getDataBySlug(string $slug): Facilities
  {
    $data = FacilitiesTranslation::where('slug', $slug)->first();

    return Facilities::findOrFail($data->facilities_id);
  }

  public function storeOrUpdate(string $dataId = '', array $data = [])
  {
    if(empty($dataId)) 
    {
      $dataParent = new Facilities;
      $dataParent->facilities_category_id = isset($data['facilities_category_id']) ? $data['facilities_category_id'] : '';
      $dataParent->status = isset($data['status']) ? $data['status'] : 'publish';
      $dataParent->save();

      $translation = new FacilitiesTranslation;
      $translation->facilities_id = $dataParent->id;
      $translation->title = isset($data['title']) ? $data['title'] : '';
      $translation->description = isset($data['description']) ? $data['description'] : '';
      
      $stringConvert = new StringToSlug;
      $translation->slug = $stringConvert->convert($translation->title);

      $translation->image = isset($data['image']) ? $data['image'] : '';
      $translation->language_code = isset($data['language_code']) ? $data['language_code'] : '';

      $translation->save();

      return $translation;
    }

    $thisData = FacilitiesTranslation::find($dataId);
    $parentId = $thisData->facilities_id;
    $dataSubmit = Facilities::find($parentId);
    $dataSubmit->facilities_category_id = isset($data['facilities_category_id']) ? $data['facilities_category_id'] : '';
    $dataSubmit->status = isset($data['status']) ? $data['status'] : 1;

    $translation = FacilitiesTranslation::find($dataId);
    $translation->title = isset($data['title']) ? $data['title'] : '';
    $translation->description = isset($data['description']) ? $data['description'] : '';

    $stringConvert = new StringToSlug;
    $translation->slug = $stringConvert->convert($translation->title);
    
    $translation->image = isset($data['image']) ? $data['image'] : '';
    $translation->language_code = isset($data['language_code']) ? $data['language_code'] : '';
    $translation->save();

    return $translation;
  }

  public function destroyById(string $dataId)
  {
    // check other data translation
    $thisData = FacilitiesTranslation::find($dataId);
    $parentId = $thisData->facilities_id;
    $dataParent = Facilities::find($parentId);

    // if not found other translation data, delete until parent
    if ($dataParent) {
      // delete child
      FacilitiesTranslation::find($dataId)->delete();

      // delete parent
      return Facilities::find($parentId)->delete();
    }

    // delete only child
    return FacilitiesTranslation::find($dataId)->delete();
  }

}