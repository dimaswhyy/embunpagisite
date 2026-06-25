<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\NewsService;
use App\Services\NewsCategoryService;

class NewsController extends Controller
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
    $page = "news";
    $path = $request->input('path', '');
    // get all data news
    $news = $this->news->getAllData(10);
    // get data ctageory
    $category = $this->newsCategory->getAllData();

    $compact = compact('news', 'page', 'path', 'category');
    return view('admin.news.index', $compact);
  }

  public function add(Request $request)
  {
    $page = "add_news";
    $path = $request->input('path', '');
    // data category news
    $category = $this->newsCategory->getAllData();
    return view('admin.news.add', compact('page', 'path', 'category'));
  }

  public function store(Request $request)
  {
    $input = $request->all();

    $dataId = "";
    $submitData = $this->news->storeOrUpdate($dataId, $input);

    if ($submitData) {
      return redirect()->route('publication')->with('success', 'Publication has been added');
    }
  }

  public function edit(Request $request, $slug)
  {
    $page = 'edit_news';
    $path = $request->input('path', '');

    // get data page translation
    $news = $this->news->getDataBySlug($slug);
    if (!$news) {
      return abort(404);
    }

    // data category news
    $category = $this->newsCategory->getAllData();

    $compact = compact('slug', 'page', 'path', 'news', 'category');
    return view('admin.news.edit', $compact);
  }

  public function update(Request $request)
  {
    $input = $request->all();

    $dataId = $input['id'];
    $updateData = $this->news->storeOrUpdate($dataId, $input);

    if ($updateData) {
      return redirect()->route('publication')->with('success', 'Publication has been updated');
    }
  }

  public function delete(Request $request)
  {
    $input = $request->all();

    $dataId = $input['id'];
    $deleteData = $this->news->destroyById($dataId);

    if ($deleteData) {
      return response()->json([
				'success' => true,
				'message' => 'Success delete data'
			], 200); 
    }
  }

  public function category(Request $request, $slug)
  {
    // get category
    $category = $this->newsCategory->getDataBySlug($slug);
    $path = $request->input('path', '');
    // get data news
    $news = $this->news->getAllDataByCategory($category->id, 10);

    $compact = compact('slug', 'path', 'category', 'news');
    return view('admin.news.news-category', $compact);
  }

  public function show(Request $request, $slug)
  {
    // get data news
    $news = $this->news->getDataBySlug($slug);
    $path = $request->input('path', '');

    $compact = compact('news', 'path');
    return view('admin.news.news-detail', $compact);
  }

}