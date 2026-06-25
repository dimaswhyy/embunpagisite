<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\BookingSchoolTourService;

class BookingSchoolTourController extends Controller
{
  protected $bookingSchoolTour;

  public function __construct(
    BookingSchoolTourService $bookingSchoolTour
  ) {
    $this->bookingSchoolTour = $bookingSchoolTour;
  }

  public function index(Request $request)
  {
    $page = "booking_school_tour";
    $path = $request->input('path', '');
    // get all data Facilities
    $data = $this->bookingSchoolTour->getData(10);

    $compact = compact('data', 'page', 'path');
    return view('admin.booking-school-tour.index', $compact);
  }

  public function store(Request $request)
  {
    $input = $request->all();

    $dataId = "";
    $submitData = $this->bookingSchoolTour->storeOrUpdate($dataId, $input);

    if ($submitData) {
      return redirect()->route('booking_school_tour')->with('success', 'Booking has been added');
    }
  }

  public function show(Request $request, $id)
  {
    $page = 'show_booking_school_tour';
    $path = $request->input('path', '');

    // get data page translation
    $data = $this->bookingSchoolTour->getDataById($id);
    if (!$data) {
      return abort(404);
    }

    $compact = compact('id', 'page', 'path', 'data');
    return view('admin.booking-school-tour.show', $compact);
  }

  public function delete(Request $request)
  {
    $input = $request->all();

    $dataId = $input['id'];
    $deleteData = $this->bookingSchoolTour->destroyById($dataId);

    if ($deleteData) {
      return response()->json([
				'success' => true,
				'message' => 'Success delete data'
			], 200); 
    }
  }

}