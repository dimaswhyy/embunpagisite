<?php

namespace App\Repositories;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\LengthAwarePaginator;
use App\Interfaces\NewsRepositoryInterface;
use App\Models\News;
use App\Models\NewsTranslation;
use App\Helper\StringToSlug;

class NewsRepository implements NewsRepositoryInterface
{
  /**
   * @return Collection
   */
  public function getAllData(int $limit): LengthAwarePaginator
  {
    return News::with('translation')
      ->with('category')
      ->where('deleted_at', null)
      ->orderBy('created_at', 'DESC')
      ->paginate($limit);
  }

  /**
   * @return Collection
   */
  public function getAllDataByCategory(string $category_id, int $limit): LengthAwarePaginator
  {
    return News::where('news_category_id', $category_id)
      ->with('translation')
      ->where('deleted_at', null)
      ->orderBy('created_at', 'DESC')
      ->paginate($limit);
  }

  /**
   * @return News
   */
  public function getData(): LengthAwarePaginator
  {
    return News::with('translation')->orderBy('created_at', 'DESC')->paginate(10);
  }

  /**
   * @param string $dataId
   * @return News
   */
  public function getDataById(string $dataId): News
  {
    return News::findOrFail($dataId);
  }

  /**
   * @param string $dataId
   * @return News
   */
  public function getDataBySlug(string $slug): News
  {
    $data = NewsTranslation::where('slug', $slug)->first();

    return News::findOrFail($data->news_id);
  }

  public function storeOrUpdate(string $dataId = '', array $data = [])
  {
    if(empty($dataId)) 
    {
      $dataParent = new News;
      $dataParent->news_category_id = isset($data['news_category_id']) ? $data['news_category_id'] : '';
      $dataParent->status = isset($data['status']) ? $data['status'] : 'publish';
      $dataParent->save();

      $translation = new NewsTranslation;
      $translation->news_id = $dataParent->id;
      $translation->title = isset($data['title']) ? $data['title'] : '';
      $translation->description = isset($data['description']) ? $data['description'] : '';
      
      $stringConvert = new StringToSlug;
      $translation->slug = $stringConvert->convert($translation->title);

      $translation->keyword = isset($data['keyword']) ? $data['keyword'] : '';
      $translation->image = isset($data['image']) ? $data['image'] : '';

      $translation->language_code = isset($data['language_code']) ? $data['language_code'] : '';

      $translation->save();

      return $translation;
    }

    $thisData = NewsTranslation::find($dataId);
    $parentId = $thisData->news_id;
    $dataSubmit = News::find($parentId);
    $dataSubmit->news_category_id = isset($data['news_category_id']) ? $data['news_category_id'] : '';
    $dataSubmit->status = isset($data['status']) ? $data['status'] : 1;
    $dataSubmit->save();

    $translation = NewsTranslation::find($dataId);
    $translation->title = isset($data['title']) ? $data['title'] : '';
    $translation->description = isset($data['description']) ? $data['description'] : '';

    $stringConvert = new StringToSlug;
    $translation->slug = $stringConvert->convert($translation->title);
    
    $translation->keyword = isset($data['keyword']) ? $data['keyword'] : '';
    $translation->image = isset($data['image']) ? $data['image'] : '';
    $translation->language_code = isset($data['language_code']) ? $data['language_code'] : '';
    $translation->save();

    return $translation;
  }

  public function destroyById(string $dataId)
  {
    // check other data translation
    $thisData = NewsTranslation::find($dataId);
    $parentId = $thisData->news_id;
    $dataParent = News::find($parentId);

    // if not found other translation data, delete until parent
    if ($dataParent) {
      // delete child
      NewsTranslation::find($dataId)->delete();

      // delete parent
      return News::find($parentId)->delete();
    }

    // delete only child
    return NewsTranslation::find($dataId)->delete();
  }

}