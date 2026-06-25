<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\GalleryService;

class GalleryController extends Controller
{
  protected $gallery;

  public function __construct(
    GalleryService $gallery, 
  ) {
    $this->gallery = $gallery;
  }

  public function index(Request $request)
  {
    $page = "gallery";
    $path = $request->input('path', '');
    // get all data Facilities
    $gallery = $this->gallery->getData(10);

    $compact = compact('gallery', 'page', 'path');
    return view('admin.gallery.index', $compact);
  }

  public function add(Request $request)
  {
    $page = "add_gallery";
    $path = $request->input('path', '');
    return view('admin.gallery.add', compact('page', 'path'));
  }

  public function store(Request $request)
  {
    $input = $request->all();

    $dataId = "";
    $submitData = $this->gallery->storeOrUpdate($dataId, $input);

    if ($submitData) {
      return redirect()->route('gallery')->with('success', 'Gallery has been added');
    }
  }

  public function edit(Request $request, $slug)
  {
    $page = 'edit_gallery';
    $path = $request->input('path', '');

    // get data page translation
    $gallery = $this->gallery->getDataBySlug($slug);
    if (!$gallery) {
      return abort(404);
    }

    $compact = compact('slug', 'page', 'path', 'gallery');
    return view('admin.gallery.edit', $compact);
  }

  public function update(Request $request)
  {
    $input = $request->all();

    $dataId = $input['id'];
    $updateData = $this->gallery->storeOrUpdate($dataId, $input);

    if ($updateData) {
      return redirect()->route('gallery')->with('success', 'Gallery has been updated');
    }
  }

  public function delete(Request $request)
  {
    $input = $request->all();

    $dataId = $input['id'];
    $deleteData = $this->gallery->destroyById($dataId);

    if ($deleteData) {
      return response()->json([
				'success' => true,
				'message' => 'Success delete data'
			], 200); 
    }
  }

}