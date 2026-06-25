<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\ModuleContentService;

class EnrollNowSectionController extends Controller
{
  protected $moduleContent;

  public function __construct(ModuleContentService $moduleContent)
  {
    $this->moduleContent = $moduleContent;
  }

  public function index(Request $request)
  {
    $page = "enrollnow_section";
    $path = $request->input('path', '');
    $enrollNow = $this->moduleContent->getDataByType('enrollnow-section', 1);
    $compact = compact('enrollNow', 'page', 'path');
    return view('admin.enrollnow-section.index', $compact);
  }

  public function add(Request $request)
  {
    $page = "add_enrollnow_section";
    $path = $request->input('path', '');
    return view('admin.enrollnow-section.add', compact('page', 'path'));
  }

  public function edit(Request $request, $id)
  {
    $page = 'edit_enrollnow_section';
    $path = $request->input('path', '');

    // get data page translation
    $enrollNow = $this->moduleContent->getDataById($id);
    if (!$enrollNow) {
      return abort(404);
    }

    $compact = compact('id', 'page', 'path', 'enrollNow');
    return view('admin.enrollnow-section.edit', $compact);
  }

  public function store(Request $request)
  {
    $input = $request->all();

    $dataId = "";
    $submitData = $this->moduleContent->storeOrUpdate($dataId, $input);

    if ($submitData) {
      return redirect()->route('enrollnow_section')->with('success', 'Data has been added');
    }
  }

  public function update(Request $request)
  {
    $input = $request->all();

    $dataId = $input['id'];
    $updateData = $this->moduleContent->storeOrUpdate($dataId, $input);

    if ($updateData) {
      return redirect()->route('enrollnow_section')->with('success', 'Data has been updated');
    }
  }

  public function delete(Request $request)
  {
    $input = $request->all();
    $id = $input[0]['id'];

    $deleteData = $this->moduleContent->destroyById($id);

    if ($deleteData) {
      return response()->json([
				'success' => true,
				'message' => 'Berhasil hapus data'
			], 200); 
    }
  }

}