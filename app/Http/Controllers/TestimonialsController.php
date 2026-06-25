<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\ModuleContentService;

class TestimonialsController extends Controller
{
  protected $moduleContent;

  public function __construct(ModuleContentService $moduleContent)
  {
    $this->moduleContent = $moduleContent;
  }

  public function index(Request $request)
  {
    $page = "testimonials";
    $path = $request->input('path', '');
    $testimonials = $this->moduleContent->getDataByType('testimonials', 15);
    $compact = compact('testimonials', 'page', 'path');
    return view('admin.testimonials.index', $compact);
  }

  public function add(Request $request)
  {
    $page = "add_testimonial";
    $path = $request->input('path', '');
    return view('admin.testimonials.add', compact('page', 'path'));
  }

  public function edit(Request $request, $id)
  {
    $page = 'edit_testimonial';
    $path = $request->input('path', '');

    // get data page translation
    $testimonial = $this->moduleContent->getDataById($id);
    if (!$testimonial) {
      return abort(404);
    }

    $compact = compact('id', 'page', 'path', 'testimonial');
    return view('admin.testimonials.edit', $compact);
  }

  public function store(Request $request)
  {
    $input = $request->all();

    $dataId = "";
    $submitData = $this->moduleContent->storeOrUpdate($dataId, $input);

    if ($submitData) {
      return redirect()->route('testimonials')->with('success', 'Testimonial has been added');
    }
  }

  public function update(Request $request)
  {
    $input = $request->all();

    $dataId = $input['id'];
    $updateData = $this->moduleContent->storeOrUpdate($dataId, $input);

    if ($updateData) {
      return redirect()->route('testimonials')->with('success', 'Testimonial has been updated');
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