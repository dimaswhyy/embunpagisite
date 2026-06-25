<?php

namespace App\Repositories;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\LengthAwarePaginator;
use App\Interfaces\BookingSchoolTourRepositoryInterface;
use App\Models\BookingSchoolTour;

class BookingSchoolTourRepository implements BookingSchoolTourRepositoryInterface
{
  /**
   * @return Collection
   */
  public function getAllData()
  {
    return BookingSchoolTour::where('deleted_at', null)
      ->orderBy('created_at', 'DESC')
      ->get();
  }

  /**
   * @return BookingSchoolTour
   */
  public function getData(int $limit): LengthAwarePaginator
  {
    return BookingSchoolTour::where('deleted_at', null)->orderBy('created_at', 'DESC')->paginate($limit);
  }

  /**
   * @param string $dataId
   * @return BookingSchoolTour
   */
  public function getDataById(string $dataId): BookingSchoolTour
  {
    return BookingSchoolTour::findOrFail($dataId);
  }

  public function storeOrUpdate(string $dataId = '', array $data = [])
  {
    if(empty($dataId)) 
    {
      $dataBooking = new BookingSchoolTour;
      $dataBooking->child_name = isset($data['child_name']) ? $data['child_name'] : '';
      $dataBooking->parent_name = isset($data['parent_name']) ? $data['parent_name'] : '';
      $dataBooking->phone = isset($data['phone']) ? $data['phone'] : '';
      $dataBooking->email = isset($data['email']) ? $data['email'] : '';
      $dataBooking->address = isset($data['address']) ? $data['address'] : '';
      $dataBooking->school_from = isset($data['school_from']) ? $data['school_from'] : '';
      $dataBooking->program = isset($data['program']) ? $data['program'] : '';
      $dataBooking->visit_date = isset($data['visit_date']) ? $data['visit_date'] : '';
      $dataBooking->visit_time = isset($data['visit_time']) ? $data['visit_time'] : '';
      $dataBooking->save();

      return $dataBooking;
    }

    $dataBooking = BookingSchoolTour::find($dataId);
    $dataBooking->child_name = isset($data['child_name']) ? $data['child_name'] : '';
    $dataBooking->parent_name = isset($data['parent_name']) ? $data['parent_name'] : '';
    $dataBooking->phone = isset($data['phone']) ? $data['phone'] : '';
    $dataBooking->email = isset($data['email']) ? $data['email'] : '';
    $dataBooking->address = isset($data['address']) ? $data['address'] : '';
    $dataBooking->school_from = isset($data['school_from']) ? $data['school_from'] : '';
    $dataBooking->program = isset($data['program']) ? $data['program'] : '';
    $dataBooking->visit_date = isset($data['visit_date']) ? $data['visit_date'] : '';
    $dataBooking->visit_time = isset($data['visit_time']) ? $data['visit_time'] : '';

    return $dataBooking;
  }

  public function destroyById(string $dataId)
  {
    // check other data
    $thisData = BookingSchoolTour::find($dataId);

    // if not found other translation data, delete until parent
    if ($thisData) {
      // delete parent
      return BookingSchoolTour::find($dataId)->delete();
    }

    // delete only child
    return $thisData;
  }

}