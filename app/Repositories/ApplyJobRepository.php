<?php

namespace App\Repositories;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\LengthAwarePaginator;
use App\Interfaces\ApplyJobRepositoryInterface;
use App\Models\ApplyJob;

class ApplyJobRepository implements ApplyJobRepositoryInterface
{
  /**
   * @return Collection
   */
  public function getAllData()
  {
    return ApplyJob::where('deleted_at', null)
      ->orderBy('created_at', 'DESC')
      ->get();
  }

  /**
   * @return Collection
   */
  public function getAllDataForExport()
  {
    return ApplyJob::where('deleted_at', null)
      ->orderBy('created_at', 'DESC')
      ->get()
      ->toArray();
  }

  /**
   * @return ApplyJob
   */
  public function getData(int $limit): LengthAwarePaginator
  {
    return ApplyJob::where('deleted_at', null)->orderBy('created_at', 'DESC')->paginate($limit);
  }

  /**
   * @param string $dataId
   * @return ApplyJob
   */
  public function getDataById(string $dataId): ApplyJob
  {
    return ApplyJob::findOrFail($dataId);
  }

  public function destroyById(string $dataId)
  {
    // check other data
    $thisData = ApplyJob::find($dataId);

    // if not found other translation data, delete until parent
    if ($thisData) {
      // delete parent
      return ApplyJob::find($dataId)->delete();
    }

    // delete only child
    return $thisData;
  }

}