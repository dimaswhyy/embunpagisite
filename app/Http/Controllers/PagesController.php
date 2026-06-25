<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\ModuleContentService;
use App\Services\PagesService;
use stdClass;

class PagesController extends Controller
{
  protected $moduleContent;
  protected $pagesService;

  public function __construct(
    ModuleContentService $moduleContent, 
    PagesService $pagesService
  )
  {
    $this->moduleContent = $moduleContent;
    $this->pagesService = $pagesService;
  }

  public function index(Request $request)
  {
    $page = 'pages';
    $path = $request->input('path', '');
    $dataPages = $this->pagesService->getDataWithChild();

    return view('admin.pages', compact('page', 'path', 'dataPages'));
  }

  public function add(Request $request)
  {
    $page = 'add_page';
    $path = $request->input('path', '');
    $dataPages = $this->pagesService->getDataWithChild();

    return view('admin.page-add', compact('page', 'path', 'dataPages'));
  }

  public function store(Request $request)
  {
    $input = $request->all();

    $dataId = "";
    $submitData = $this->pagesService->storeOrUpdate($dataId, $input);

    if ($submitData) {
      return redirect()->route('pages')->with('success', 'Page has been added');
    }
  }

  public function edit(Request $request, $slug)
  {
    $page = 'edit_page';
    $path = $request->input('path', '');

    // get data page translation
    $dataThisPage = $this->pagesService->getDataBySlug($slug);
    if (!$dataThisPage) {
      return abort(404);
    }

    // get data page
    $thisDataPage = $this->pagesService->getDataById($dataThisPage->pages_id);

    // for select menu parent
    $dataPages = $this->pagesService->getDataWithChild();

    $compact = compact('slug', 'page', 'path', 'dataThisPage', 'dataPages', 'thisDataPage');
    return view('admin.page-edit', $compact);
  }

  public function update(Request $request)
  {
    $input = $request->all();

    $dataId = $input['id'];
    $updateData = $this->pagesService->storeOrUpdate($dataId, $input);

    if ($updateData) {
      return redirect()->route('pages')->with('success', 'Page has been updated');
    }
  }
}
