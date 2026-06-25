<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\ModuleContentService;

class SlideshowController extends Controller
{
  protected $moduleContent;

  public function __construct(ModuleContentService $moduleContent)
  {
    $this->moduleContent = $moduleContent;
  }

  public function index(Request $request)
  {
    $page = "slideshow";
    $path = $request->input('path', '');
    $slideshow = $this->moduleContent->getDataByType('slideshow', 10);
    $compact = compact('slideshow', 'page', 'path');
    return view('admin.slideshow.index', $compact);
  }

  public function add(Request $request)
  {
    $page = "add_slideshow";
    $path = $request->input('path', '');
    return view('admin.slideshow.add', compact('page', 'path'));
  }

  public function edit(Request $request, $id)
  {
    $page = 'edit_slideshow';
    $path = $request->input('path', '');

    // get data page translation
    $slideshow = $this->moduleContent->getDataById($id);
    if (!$slideshow) {
      return abort(404);
    }

    $compact = compact('id', 'page', 'path', 'slideshow');
    return view('admin.slideshow.edit', $compact);
  }

  public function store(Request $request)
  {
    $input = $request->all();

    $dataId = "";
    $submitData = $this->moduleContent->storeOrUpdate($dataId, $input);

    if ($submitData) {
      return redirect()->route('slideshow')->with('success', 'Slideshow has been added');
    }
  }

  public function update(Request $request)
  {
    $input = $request->all();

    $dataId = $input['id'];
    $updateData = $this->moduleContent->storeOrUpdate($dataId, $input);

    if ($updateData) {
      return redirect()->route('slideshow')->with('success', 'Slideshow has been updated');
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