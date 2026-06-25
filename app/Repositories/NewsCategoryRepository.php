<?php

namespace App\Repositories;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\LengthAwarePaginator;
use App\Interfaces\NewsCategoryRepositoryInterface;
use App\Models\NewsCategory;
use App\Models\NewsCategoryTranslation;
use App\Helper\StringToSlug;

class NewsCategoryRepository implements NewsCategoryRepositoryInterface
{
  /**
   * @return Collection
   */
  public function getAllData(): Collection
  {
    return NewsCategory::with('translation')->orderBy('num_order', 'ASC')->get();
  }

  /**
   * @return NewsCategory
   */
  public function getData(): LengthAwarePaginator
  {
    return NewsCategory::with('translation')->orderBy('created_at', 'DESC')->paginate(10);
  }

  /**
   * @param string $dataId
   * @return NewsCategory
   */
  public function getDataById(string $dataId): NewsCategory
  {
    return NewsCategory::findOrFail($dataId);
  }

  /**
   * @param string $dataId
   * @return NewsCategory
   */
  public function getDataBySlug(string $slug): NewsCategory
  {
    $data = NewsCategoryTranslation::where('slug', $slug)->first();

    return NewsCategory::findOrFail($data->news_category_id);
  }

  public function storeOrUpdate(string $dataId = '', array $data = [])
  {
    if(empty($dataId)) 
    {
      $dataParent = new NewsCategory;
      $dataParent->status = isset($data['status']) ? $data['status'] : 1;
      $dataParent->num_order = isset($data['num_order']) ? $data['num_order'] : 1;
      $dataParent->save();

      $translation = new NewsCategoryTranslation;
      $translation->news_category_id = $dataParent->id;
      $translation->title = isset($data['title']) ? $data['title'] : '';
      
      $stringConvert = new StringToSlug;
      $translation->slug = $stringConvert->convert($translation->title);

      $translation->language_code = isset($data['language_code']) ? $data['language_code'] : 'en';
      $translation->save();

      return $translation;
    }
    
    $thisData = NewsCategoryTranslation::find($dataId);
    $parentId = $thisData->news_category_id;
    $dataSubmit = NewsCategory::find($parentId);
    $dataSubmit->status = isset($data['status']) ? $data['status'] : 1;
    $dataSubmit->num_order = isset($data['num_order']) ? $data['num_order'] : 1;
    $dataSubmit->save();

    $translation = NewsCategoryTranslation::find($dataId);
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
    $thisData = NewsCategoryTranslation::find($dataId);
    $parentId = $thisData->news_category_id;
    $dataParent = NewsCategory::find($parentId);

    // if not found other translation data, delete until parent
    if ($dataParent) {
      // delete child
      NewsCategoryTranslation::find($dataId)->delete();

      // delete parent
      return NewsCategory::find($parentId)->delete();
    }

    // delete only child
    return NewsCategoryTranslation::find($dataId)->delete();
  }

}