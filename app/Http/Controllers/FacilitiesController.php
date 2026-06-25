<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\FacilitiesService;
use App\Services\FacilitiesCategoryService;

class FacilitiesController extends Controller
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
    $page = "facilities";
    $path = $request->input('path', '');
    // get all data Facilities
    $facilities = $this->facilities->getAllData(10);
    // get data ctageory
    $category = $this->facilitiesCategory->getAllData();

    $compact = compact('facilities', 'page', 'path', 'category');
    return view('admin.facilities.index', $compact);
  }

  public function add(Request $request)
  {
    $page = "add_facilities";
    $path = $request->input('path', '');
    // data category Facilities
    $category = $this->facilitiesCategory->getAllData();
    return view('admin.facilities.add', compact('page', 'path', 'category'));
  }

  public function store(Request $request)
  {
    $input = $request->all();

    $dataId = "";
    $submitData = $this->facilities->storeOrUpdate($dataId, $input);

    if ($submitData) {
      return redirect()->route('facilities')->with('success', 'Facilities has been added');
    }
  }

  public function edit(Request $request, $slug)
  {
    $page = 'edit_facilities';
    $path = $request->input('path', '');

    // get data page translation
    $facilities = $this->facilities->getDataBySlug($slug);
    if (!$facilities) {
      return abort(404);
    }

    // data category facilities
    $category = $this->facilitiesCategory->getAllData();

    $compact = compact('slug', 'page', 'path', 'facilities', 'category');
    return view('admin.facilities.edit', $compact);
  }

  public function update(Request $request)
  {
    $input = $request->all();

    $dataId = $input['id'];
    $updateData = $this->facilities->storeOrUpdate($dataId, $input);

    if ($updateData) {
      return redirect()->route('facilities')->with('success', 'Facilities has been updated');
    }
  }

  public function delete(Request $request)
  {
    $input = $request->all();

    $dataId = $input['id'];
    $deleteData = $this->facilities->destroyById($dataId);

    if ($deleteData) {
      return response()->json([
				'success' => true,
				'message' => 'Success delete data'
			], 200); 
    }
  }

}