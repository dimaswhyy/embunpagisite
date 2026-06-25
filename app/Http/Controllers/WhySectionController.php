<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\ModuleContentService;

class WhySectionController extends Controller
{
  protected $moduleContent;

  public function __construct(ModuleContentService $moduleContent)
  {
    $this->moduleContent = $moduleContent;
  }

  public function index(Request $request)
  {
    $page = "why_section";
    $path = $request->input('path', '');
    $whySection = $this->moduleContent->getDataByType('why-section', 1);
    $whySectionContent = $this->moduleContent->getDataByType('why-section-content', 4);
    $compact = compact('whySection', 'whySectionContent', 'page', 'path');
    return view('admin.why-section.index', $compact);
  }

  public function add(Request $request)
  {
    $page = "add_why_section";
    $path = $request->input('path', '');
    return view('admin.why-section.add', compact('page', 'path'));
  }

  public function add_content(Request $request)
  {
    $page = "add_why_section_content";
    $path = $request->input('path', '');
    return view('admin.why-section.add_content', compact('page', 'path'));
  }

  public function edit(Request $request, $id)
  {
    $page = 'edit_why_section';
    $path = $request->input('path', '');

    // get data page translation
    $whySection = $this->moduleContent->getDataById($id);
    if (!$whySection) {
      return abort(404);
    }

    $compact = compact('id', 'page', 'path', 'whySection');
    return view('admin.why-section.edit', $compact);
  }

  public function edit_content(Request $request, $id)
  {
    $page = 'edit_why_section_content';
    $path = $request->input('path', '');

    // get data page translation
    $whySection = $this->moduleContent->getDataById($id);
    if (!$whySection) {
      return abort(404);
    }

    $compact = compact('id', 'page', 'path', 'whySection');
    return view('admin.why-section.edit_content', $compact);
  }

  public function store(Request $request)
  {
    $input = $request->all();

    $dataId = "";
    $submitData = $this->moduleContent->storeOrUpdate($dataId, $input);

    if ($submitData) {
      return redirect()->route('why_section')->with('success', 'Data has been added');
    }
  }

  public function update(Request $request)
  {
    $input = $request->all();

    $dataId = $input['id'];
    $updateData = $this->moduleContent->storeOrUpdate($dataId, $input);

    if ($updateData) {
      return redirect()->route('why_section')->with('success', 'Data has been updated');
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