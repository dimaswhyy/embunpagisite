<?php

namespace App\Repositories;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\LengthAwarePaginator;
use App\Interfaces\GalleryRepositoryInterface;
use App\Models\Gallery;
use App\Models\GalleryImages;
use App\Helper\StringToSlug;

class GalleryRepository implements GalleryRepositoryInterface
{
  /**
   * @return Collection
   */
  public function getAllData(): Collection
  {
    return Gallery::with('images')
      ->where('deleted_at', null)
      ->orderBy('created_at', 'DESC')
      ->get();
  }

  /**
   * @return Collection
   */
  public function getAllDataByGalleryId(string $gallery_id, int $limit): LengthAwarePaginator
  {
    return Gallery::where('gallery_id', $gallery_id)
      ->with('images')
      ->where('deleted_at', null)
      ->orderBy('created_at', 'DESC')
      ->paginate($limit);
  }

  /**
   * @return Gallery
   */
  public function getData(int $limit): LengthAwarePaginator
  {
    return Gallery::with('images')
      ->where('deleted_at', null)
      ->orderBy('created_at', 'DESC')
      ->paginate($limit);
  }

  /**
   * @param string $dataId
   * @return Gallery
   */
  public function getDataById(string $dataId): Gallery
  {
    return Gallery::findOrFail($dataId);
  }

  /**
   * @param string $dataId
   * @return Gallery
   */
  public function getDataBySlug(string $slug): Gallery
  {
    return Gallery::where('slug', $slug)->first();
  }

  public function storeOrUpdate(string $dataId = '', array $data = [])
  {
    if(empty($dataId)) 
    {
      $dataParent = new Gallery;
      $dataParent->title = isset($data['title']) ? $data['title'] : '';

      $stringConvert = new StringToSlug;
      $dataParent->slug = $stringConvert->convert($dataParent->title);

      $dataParent->status = isset($data['status']) ? $data['status'] : 1;
      $dataParent->language_code = isset($data['language_code']) ? $data['language_code'] : 'en';
      $dataParent->save();

      // add image array
      if (isset($data['image']) && count($data['image']) > 0) {
        foreach($data['image'] as $itemImage) {
          $images = new GalleryImages;
          $images->gallery_id = $dataParent->id;
          $images->title = $itemImage['title'];
          $images->image = $itemImage['image'];
          $images->num_order = $itemImage['num_order'];
          $images->save();
        }
      }

      return $dataParent;
    }

    $dataSubmit = Gallery::find($dataId);
    if ($dataSubmit->title != $data['title']) {
      $stringConvert = new StringToSlug;
      $dataSubmit->slug = $stringConvert->convert($dataSubmit->title);
    }
    $dataSubmit->title = isset($data['title']) ? $data['title'] : '';
    $dataSubmit->status = isset($data['status']) ? $data['status'] : 1;
    $dataSubmit->language_code = isset($data['language_code']) ? $data['language_code'] : 'en';
    $dataSubmit->save();

    // delete image array first
    $findAllImages = GalleryImages::where('gallery_id', $dataId)->get();
    foreach($findAllImages as $imageDelete) {
      GalleryImages::find($imageDelete->id)->delete();
    }

    // add image array
    if (isset($data['image']) && count($data['image']) > 0) {
      foreach($data['image'] as $itemImage) {
        $images = new GalleryImages;
        $images->gallery_id = $dataId;
        $images->title = $itemImage['title'];
        $images->image = $itemImage['image'];
        $images->num_order = $itemImage['num_order'];
        $images->save();
      }
    }

    return $dataSubmit;
  }

  public function destroyById(string $dataId)
  {
    // check other data translation
    $thisData = Gallery::find($dataId);

    // if not found other translation data, delete until parent
    if ($thisData) {
      // delete child
      $findAllImages = GalleryImages::where('gallery_id', $dataId)->get();
      foreach($findAllImages as $imageDelete) {
        GalleryImages::find($imageDelete->id)->delete();
      }

      // delete parent
      return Gallery::find($dataId)->delete();
    }

    return false;
  }

}