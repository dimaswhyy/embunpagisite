<?php

namespace App\Repositories;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\LengthAwarePaginator;
use App\Interfaces\JobListsRepositoryInterface;
use App\Models\JobLists;
use App\Models\JobListsTranslation;
use App\Helper\StringToSlug;

class JobListsRepository implements JobListsRepositoryInterface
{
  /**
   * @return Collection
   */
  public function getAllData(): Collection
  {
    return JobLists::with('translation')
      ->where('deleted_at', null)
      ->orderBy('created_at', 'DESC')
      ->get();
  }
  
  /**
   * @return Collection
   */
  public function getDataPublish(): Collection
  {
    return JobLists::with('translation')
      ->where('status', 1)
      ->where('deleted_at', null)
      ->orderBy('created_at', 'DESC')
      ->get();
  }

  /**
   * @return JobLists
   */
  public function getData(int $limit): LengthAwarePaginator
  {
    return JobLists::with('translation')->orderBy('created_at', 'DESC')->paginate($limit);
  }

  /**
   * @param string $dataId
   * @return JobLists
   */
  public function getDataById(string $dataId): JobLists
  {
    return JobLists::findOrFail($dataId);
  }

  /**
   * @param string $dataId
   * @return JobLists
   */
  public function getDataByIdToArray(string $dataId)
  {
    return JobListsTranslation::where('job_lists_id', $dataId)->first()->toArray();
  }

  /**
   * @param string $dataId
   * @return JobLists
   */
  public function getDataBySlug(string $slug): JobLists
  {
    $data = JobListsTranslation::where('slug', $slug)->first();

    return JobLists::findOrFail($data->job_lists_id);
  }

  public function storeOrUpdate(string $dataId = '', array $data = [])
  {
    if(empty($dataId)) 
    {
      $dataParent = new JobLists;
      $dataParent->status = isset($data['status']) ? $data['status'] : 'publish';
      $dataParent->save();

      $translation = new JobListsTranslation;
      $translation->job_lists_id = $dataParent->id;
      $translation->title = isset($data['title']) ? $data['title'] : '';
      $translation->description = isset($data['description']) ? $data['description'] : '';
      
      $stringConvert = new StringToSlug;
      $translation->slug = $stringConvert->convert($translation->title);

      $translation->language_code = isset($data['language_code']) ? $data['language_code'] : '';
      $translation->save();

      return $translation;
    }

    $thisData = JobListsTranslation::find($dataId);
    $parentId = $thisData->job_lists_id;
    $dataSubmit = JobLists::find($parentId);
    $dataSubmit->status = isset($data['status']) ? $data['status'] : 1;
    $dataSubmit->save();

    $translation = JobListsTranslation::find($dataId);
    $translation->title = isset($data['title']) ? $data['title'] : '';
    $translation->description = isset($data['description']) ? $data['description'] : '';

    $stringConvert = new StringToSlug;
    $translation->slug = $stringConvert->convert($translation->title);
    
    $translation->language_code = isset($data['language_code']) ? $data['language_code'] : '';
    $translation->save();

    return $translation;
  }

  public function destroyById(string $dataId)
  {
    // check other data translation
    $thisData = JobListsTranslation::find($dataId);
    $parentId = $thisData->job_lists_id;
    $dataParent = JobLists::find($parentId);

    // if not found other translation data, delete until parent
    if ($dataParent) {
      // delete child
      JobListsTranslation::find($dataId)->delete();

      // delete parent
      return JobLists::find($parentId)->delete();
    }

    // delete only child
    return JobListsTranslation::find($dataId)->delete();
  }

}