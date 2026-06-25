<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Services\ModuleContentService;
use App\Services\PagesService;
use App\Services\NewsService;
use App\Services\NewsCategoryService;
use App\Services\FacilitiesService;
use App\Services\FacilitiesCategoryService;
use App\Services\GalleryService;
use App\Services\JobListsService;
use App\Http\Requests\StoreVisitRequest;
use App\Http\Requests\ApplyFormRequest;
use App\Models\BookingSchoolTour;
use App\Models\ApplyJob;
use App\Models\JobExperience;
use App\Models\LatestEducation;
use App\Mail\VisitScheduled;
use App\Mail\ApplyJobMail;
use stdClass;

class ApiPagesFrontController extends Controller
{
  protected $moduleContent;
  protected $pagesService;
  protected $newsService;
  protected $newsCategoryService;
  protected $facilitiesService;
  protected $facilitiesCategoryService;
  protected $galleryService;
  protected $jobListsService;

  public function __construct(
    ModuleContentService $moduleContent, 
    PagesService $pagesService,
    NewsService $newsService,
    NewsCategoryService $newsCategoryService,
    FacilitiesService $facilitiesService,
    FacilitiesCategoryService $facilitiesCategoryService,
    GalleryService $galleryService,
    JobListsService $jobListsService
  )
  {
    $this->moduleContent = $moduleContent;
    $this->pagesService = $pagesService;
    $this->newsService = $newsService;
    $this->newsCategoryService = $newsCategoryService;
    $this->facilitiesService = $facilitiesService;
    $this->facilitiesCategoryService = $facilitiesCategoryService;
    $this->galleryService = $galleryService;
    $this->jobListsService = $jobListsService;
  }

  public function menu(Request $request)
  {
    // for menu in layout
    $dataPages = $this->pagesService->getDataForMenu();

    // return response
    return response()->json($dataPages, 200);
  }

  public function news(Request $request) 
  {
    // get params limit
    $limit = $request->query('limit');
    // get data news
    $dataNews = $this->newsService->getAllData($limit ?? 3);
    // return response
    return response()->json($dataNews, 200);
  }

  public function module_content(Request $request)
  {
    // get params type content
    $type = $request->query('type');
    // get params limit
    $limit = $request->query('limit');
    // get data
    $data = $this->moduleContent->getDataByType($type, $limit);
    // return response
    return response()->json($data, 200);
  }

  public function testimonials(Request $request)
  {
    // get params limit
    $limit = $request->query('limit');
    // get data testimonials
    $testimonials = $this->moduleContent->getDataByType('testimonials', $limit);
    // return response
    // $options = app('request')->header('accept-charset') == 'utf-8' ? JSON_UNESCAPED_UNICODE : null;
    return response()->json($testimonials, 200);
  }

  public function slideshow(Request $request)
  {
    // get params limit
    $limit = $request->query('limit');
    // get data testimonials
    $slideshow = $this->moduleContent->getDataByType('slideshow', $limit);
    // return response
    // $options = app('request')->header('accept-charset') == 'utf-8' ? JSON_UNESCAPED_UNICODE : null;
    return response()->json($slideshow, 200);
  }
}