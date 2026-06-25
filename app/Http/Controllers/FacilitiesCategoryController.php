<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\FacilitiesService;
use App\Services\FacilitiesCategoryService;

class FacilitiesCategoryController extends Controller
{
  protected $facilities;
  protected $facilitiesCategory;

  public function __construct(
    FacilitiesService $facilities, 
    FacilitiesCategoryService $facilitiesCategory
  ) {
    $this->facilities = $facilities;
    $this->facilitiesCategory = $facilitiesCategory;
  }

  public function index(Request $request)
  {
    $page = "facilities_category";
    $path = $request->input('path', '');
    // get all data Facilities
    $data = $this->facilitiesCategory->getAllData();
    $compact = compact('data', 'page', 'path');
    return view('admin.facilities_category.index', $compact);
  }

  public function add(Request $request)
  {
    $page = "add_facilities_category";
    $path = $request->input('path', '');
    return view('admin.facilities_category.add', compact('page', 'path'));
  }

  public function store(Request $request)
  {
    $input = $request->all();

    $dataId = "";
    $submitData = $this->facilitiesCategory->storeOrUpdate($dataId, $input);

    if ($submitData) {
      return redirect()->route('facilities_category')->with('success', 'Facilities category has been added');
    }
  }

  public function edit(Request $request, $slug)
  {
    $page = 'edit_facilities_category';
    $path = $request->input('path', '');

    // get data page translation
    $data = $this->facilitiesCategory->getDataBySlug($slug);
    if (!$data) {
      return abort(404);
    }

    $compact = compact('slug', 'page', 'path', 'data');
    return view('admin.facilities_category.edit', $compact);
  }

  public function update(Request $request)
  {
    $input = $request->all();

    $dataId = $input['id'];
    $updateData = $this->facilitiesCategory->storeOrUpdate($dataId, $input);

    if ($updateData) {
      return redirect()->route('facilities_category')->with('success', 'Facilities category has been updated');
    }
  }

  public function delete(Request $request)
  {
    $input = $request->all();

    $dataId = $input['id'];
    $deleteData = $this->facilitiesCategory->destroyById($dataId);

    if ($deleteData) {
      return response()->json([
				'success' => true,
				'message' => 'Success delete data'
			], 200); 
    }
  }
}