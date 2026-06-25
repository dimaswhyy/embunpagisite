<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\NewsService;
use App\Services\NewsCategoryService;

class NewsCategoryController extends Controller
{
  protected $news;
  protected $newsCategory;

  public function __construct(
    NewsService $news, 
    NewsCategoryService $newsCategory
  ) {
    $this->news = $news;
    $this->newsCategory = $newsCategory;
  }

  public function index(Request $request)
  {
    $page = "news_category";
    $path = $request->input('path', '');
    // get all data news
    $data = $this->newsCategory->getAllData();
    $compact = compact('data', 'page', 'path');
    return view('admin.news_category.index', $compact);
  }

  public function add(Request $request)
  {
    $page = "add_news_category";
    $path = $request->input('path', '');
    return view('admin.news_category.add', compact('page', 'path'));
  }

  public function store(Request $request)
  {
    $input = $request->all();

    $dataId = "";
    $submitData = $this->newsCategory->storeOrUpdate($dataId, $input);

    if ($submitData) {
      return redirect()->route('publication_category')->with('success', 'Publication category has been added');
    }
  }

  public function edit(Request $request, $slug)
  {
    $page = 'edit_news_category';
    $path = $request->input('path', '');

    // get data page translation
    $data = $this->newsCategory->getDataBySlug($slug);
    if (!$data) {
      return abort(404);
    }

    $compact = compact('slug', 'page', 'path', 'data');
    return view('admin.news_category.edit', $compact);
  }

  public function update(Request $request)
  {
    $input = $request->all();

    $dataId = $input['id'];
    $updateData = $this->newsCategory->storeOrUpdate($dataId, $input);

    if ($updateData) {
      return redirect()->route('publication_category')->with('success', 'Publication category has been updated');
    }
  }

  public function delete(Request $request)
  {
    $input = $request->all();

    $dataId = $input['id'];
    $deleteData = $this->newsCategory->destroyById($dataId);

    if ($deleteData) {
      return response()->json([
				'success' => true,
				'message' => 'Success delete data'
			], 200); 
    }
  }
}