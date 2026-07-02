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
use App\Models\InstagramPost;
use App\Mail\VisitScheduled;
use App\Mail\ApplyJobMail;
use stdClass;

class PagesFrontController extends Controller
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

  public function index(Request $request)
  {
    $page = 'home';
    $slug = 'home';
    $lastSegment = basename(url()->current());

    // get data page
    $dataThisPage = $this->pagesService->getDataBySlug($slug);
    if (!$dataThisPage) {
      return abort(404);
    }

    $template = $dataThisPage->template;

    // get data by id
    $thisDataPage = $this->pagesService->getDataById($dataThisPage->pages_id);
    $countArrayThisDataPage = collect($thisDataPage);
    
    if ($countArrayThisDataPage->isEmpty()) { // page not found or deleted
      return abort(404);
    }

    // for menu in layout
    $dataPages = $this->pagesService->getDataForMenu();

    // get all data module content
    $moduleContents = $this->moduleContent->getAllData();

    // get data news
    $dataNews = $this->newsService->getAllData(3);

    // get data news category
    $dataNewsCategory = $this->newsCategoryService->getAllData();
    
    // get data instagram posts
    $dataInstagramPost = InstagramPost::orderBy('id', 'asc')->get();
    
    $compact = compact('page', 'slug', 'dataThisPage', 'thisDataPage', 'dataPages', 'moduleContents', 'dataNews', 'dataNewsCategory', 'dataInstagramPost', 'lastSegment');
    return view($template, $compact);
  }

  public function page(Request $request, $slug)
  {  
    $page = $slug;
    $lastSegment = basename(url()->current());

    if ($slug == env('ADMIN_PATH')) {
      return abort(404);
    }

    if ($slug == 'home') {
      $template = 'index';
    }

    // get data page
    $dataThisPage = $this->pagesService->getDataBySlug($slug);
    if (!$dataThisPage) {
      return abort(404);
    }

    $template = $dataThisPage->template;

    // get data by id
    $thisDataPage = $this->pagesService->getDataById($dataThisPage->pages_id);
    $countArrayThisDataPage = collect($thisDataPage);
    
    if ($countArrayThisDataPage->isEmpty()) { // page not found or deleted
      return abort(404);
    }

    // for menu in layout
    $dataPages = $this->pagesService->getDataForMenu();

    // get all data module content
    $moduleContents = $this->moduleContent->getAllData();

    // get data news
    $dataNews = $this->newsService->getAllData(3);

    // get data news category
    $dataNewsCategory = $this->newsCategoryService->getAllData();

    if ($lastSegment == 'news') {
      $getDataNewsCategory = $this->newsCategoryService->getDataBySlug('news');
    }

    if ($lastSegment == 'achivements') {
      $getDataNewsCategory = $this->newsCategoryService->getDataBySlug('achivements');
    }

    // get data news per 9 item
    $dataNewsPage = [];
    if (isset($getDataNewsCategory)) {
      $dataNewsPage = $this->newsService->getAllDataByCategory($getDataNewsCategory->translation[0]->news_category_id, 9);
    }

    $dataFacilities = [];
    $dataFacilitiesCategory = [];
    if ($lastSegment == 'facilities-1') {
      // get data facilities
      $dataFacilities = $this->facilitiesService->getAllData(100);

      // get data facilities category
      $dataFacilitiesCategory = $this->facilitiesCategoryService->getAllData();
    }

    if ($lastSegment == 'nursery-kindergarten') {
      // get data facilities category
      $getDataFacilitiesCategory = $this->facilitiesCategoryService->getDataBySlug('nursery-preschool');

      // get data facilities by category id
      $dataFacilities = $this->facilitiesService->getAllDataByCategory($getDataFacilitiesCategory->translation[0]->facilities_category_id, 9);
    }

    if ($lastSegment == 'primary-school') {
      // get data facilities category
      $getDataFacilitiesCategory = $this->facilitiesCategoryService->getDataBySlug('primary-school');

      // get data facilities by category id
      $dataFacilities = $this->facilitiesService->getAllDataByCategory($getDataFacilitiesCategory->translation[0]->facilities_category_id, 9);
    }

    if ($lastSegment == 'junior-high-school' || $lastSegment == 'senior-high-school') {
      // get data facilities category
      $getDataFacilitiesCategory = $this->facilitiesCategoryService->getDataBySlug('junior-senior-high-school');

      // get data facilities by category id
      $dataFacilities = $this->facilitiesService->getAllDataByCategory($getDataFacilitiesCategory->translation[0]->facilities_category_id, 9);
    }

    $dataGalleries = [];
    if ($lastSegment == 'gallery') {
      $dataGalleries = $this->galleryService->getAllData();
    }

    $dataCareer = [];
    if ($lastSegment == 'career') {
      $dataCareer = $this->jobListsService->getDataPublish();
    }
    
    // get data instagram posts
    $dataInstagramPost = [];
    if ($lastSegment == 'home') {
        $dataInstagramPost = InstagramPost::orderBy('id', 'asc')->get();
    }
    
    $compact = compact('page', 'slug', 'dataThisPage', 'thisDataPage', 'dataPages', 'moduleContents', 'dataNews', 'dataNewsCategory', 'dataNewsPage', 'dataFacilities', 'dataFacilitiesCategory', 'dataGalleries', 'dataCareer', 'lastSegment', 'dataInstagramPost');
    return view($template, $compact);
  }
  
  public function data_chart(Request $request, $slug)
  {
    $data_primary_school = [
      [
        'id' => 1,
        'title' => 'Math Club',
        'description' => '',
        'image' => asset('storage') . '/SD/Program Highlight/Science Club.jpg',
      ],
      [
        'id' => 2,
        'title' => "Halaqah Tahfizh Qur'an Unggulan (HaTiQU)",
        'description' => "Enhancing Qur'an memorizing skill",
        'image' => asset('storage') . '/SD/Program Highlight/Hatiqu.jpg',
      ],
      [
        'id' => 3,
        'title' => 'Native Speaker',
        'description' => 'Directly taught by a qualified native teacher',
        'image' => asset('storage') . '/SD/Program Highlight/Cambridge Test (2).JPG',
      ]
    ];

    $data_junior_high_school = [
      [
        'id' => 1,
        'title' => "Tahsin, Tahfizh & Muroja'ah",
        'description' => "Tahsin, Tahfizh & Muhadhoroh",
        'image' => asset('storage') . '/SMP-SMA/Program Highlights/Hatiqu.jpg',
      ],
      [
        'id' => 2,
        'title' => "Literacy & Numeracy Program",
        'description' => "Enriching student's reading interests and numeracy skills",
        'image' => asset('storage') . '/SMP-SMA/Program Highlights/Hatiqu.jpg',
      ],
      [
        'id' => 3,
        'title' => 'Keputraan/Keputrian',
        'description' => 'The Teenager Talks',
        'image' => asset('storage') . '/SMP-SMA/Program Highlights/Cambridge Test (2).JPG',
      ],
      [
        'id' => 4,
        'title' => "HaTiQU",
        'description' => "Enhancing Qur'an memorizing skill",
        'image' => asset('storage') . '/SMP-SMA/Program Highlights/Hatiqu.jpg',
      ],
      [
        'id' => 5,
        'title' => "Fun Class",
        'description' => "Developing students' interests and talents",
        'image' => asset('storage') . '/SMP-SMA/Program Highlights/Science Club.jpg',
      ],
      [
        'id' => 6,
        'title' => "Students Council (OSIS)",
        'description' => "A space for students to innovate and develop creative ideas.",
        'image' => asset('storage') . '/SMP-SMA/Program Highlights/Science Club.jpg',
      ],
      [
        'id' => 7,
        'title' => "Public Speaking",
        'description' => "Muhadhoroh (Dakwah), Grade 7 in Bahasa-Grade 8 in English-Grade 9 as Evaluator",
        'image' => asset('storage') . '/SMP-SMA/Program Highlights/Cambridge Test (2).JPG',
      ],
      [
        'id' => 8,
        'title' => 'Native Speaker',
        'description' => 'Directly taught by a qualified native teacher',
        'image' => asset('storage') . '/SMP-SMA/Program Highlights/Cambridge Test (2).JPG',
      ]
    ];

    $data_senior_high_school = [
      [
        'id' => 1,
        'title' => 'Second year "Maker"',
        'description' => '<ul class="p-0 pb-5"><li class="flex gap-3 items-center mb-3"><img src="'. asset('img/item-list-type.svg') .'" class="w-5 h-5" /><span>Disciplinary Conduct</li><li class="flex gap-3 items-center mb-3"><img src="'. asset('img/item-list-type.svg') .'" class="w-5 h-5" /><span>Manners Shaping</li><li class="flex gap-3 items-center mb-3"><img src="'. asset('img/item-list-type.svg') .'" class="w-5 h-5" /><span>EPIS Goes to Campus</li><li class="flex gap-3 items-center mb-3"><img src="'. asset('img/item-list-type.svg') .'" class="w-5 h-5" /><span>Dream Profession Exploring</li></ul>',
        'image' => asset('storage') . '/SD/Program Highlight/Science Club.jpg',
      ],
      [
        'id' => 2,
        'title' => 'Third year "Influencer"',
        'description' => '<ul class="p-0 pb-5"><li class="flex gap-3 items-center mb-3"><img src="'. asset('img/item-list-type.svg') .'" class="w-5 h-5" /><span>Self Profiling</li><li class="flex gap-3 items-center mb-3"><img src="'. asset('img/item-list-type.svg') .'" class="w-5 h-5" /><span>Internship</li><li class="flex gap-3 items-center mb-3"><img src="'. asset('img/item-list-type.svg') .'" class="w-5 h-5" /><span>EPIS Sit in Campus</li><li class="flex gap-3 items-center mb-3"><img src="'. asset('img/item-list-type.svg') .'" class="w-5 h-5" /><span>Passion Focus Group</li><li class="flex gap-3 items-center mb-3"><img src="'. asset('img/item-list-type.svg') .'" class="w-5 h-5" /><span>EPIS Shark Tank</li></ul>',
        'image' => asset('storage') . '/SD/Program Highlight/Hatiqu.jpg',
      ],
      [
        'id' => 3,
        'title' => 'First year "Do-er"',
        'description' => '<ul class="p-0 pb-5"><li class="flex gap-3 items-center mb-3"><img src="'. asset('img/item-list-type.svg') .'" class="w-5 h-5" /><span>Community Service Camp</li><li class="flex gap-3 items-center mb-3"><img src="'. asset('img/item-list-type.svg') .'" class="w-5 h-5" /><span>Personal Community Service</li><li class="flex gap-3 items-center mb-3"><img src="'. asset('img/item-list-type.svg') .'" class="w-5 h-5" /><span>Junior Tutoring</li><li class="flex gap-3 items-center mb-3"><img src="'. asset('img/item-list-type.svg') .'" class="w-5 h-5" /><span>Career Exploration and Planning</li></ul>',
        'image' => asset('storage') . '/SD/Program Highlight/Cambridge Test (2).JPG',
      ]
    ];

    $data = $data_primary_school;

    if ($slug == "junior-high-school") {
      $data = $data_junior_high_school;
    }

    if ($slug == "senior-high-school") {
      $data = $data_senior_high_school;
    }

    return response()->json([
      'success' => true,
      'data' => $data
    ]);
  }

  public function detail_career($slug)
  {
    $page = 'career';
    $lastSegment = basename(url()->current());

    // for menu in layout
    $dataPages = $this->pagesService->getDataForMenu();

    // get data jobs
    $dataJob = $this->jobListsService->getDataBySlug($slug);
    
    // get data news for meta tag
    $getDataPage = $this->pagesService->getDataBySlug('career');
    
    $dataThisPage = new stdClass();
    $dataThisPage->title = $dataJob->translation[0]->title;
    $dataThisPage->description = $getDataPage->description;
    $dataThisPage->keyword = $getDataPage->keyword;
    $dataThisPage->image = $getDataPage->image;
    
    $compact = compact('page', 'slug', 'dataPages', 'dataJob', 'lastSegment');
    return view('detail-career', $compact);
  }

  public function apply_career($slug)
  {
    $page = 'career';
    $lastSegment = basename(url()->current());

    // for menu in layout
    $dataPages = $this->pagesService->getDataForMenu();

    // get data jobs
    $dataJob = $this->jobListsService->getDataBySlug($slug);
    
    $compact = compact('page', 'slug', 'dataPages', 'dataJob', 'lastSegment');
    return view('apply-career', $compact);
  }

  public function news_detail($slug)
  {
    $page = 'news';
    $lastSegment = basename(url()->current());

    // for menu in layout
    $dataPages = $this->pagesService->getDataForMenu();

    // get data news
    $news = $this->newsService->getDataBySlug($slug);

    // get data news
    $dataNews = $this->newsService->getAllData(3);
    
    // get data news for meta tag
    $dataThisPage = new stdClass();
    $dataThisPage->title = $news->translation[0]->title;
    $dataThisPage->description = $news->translation[0]->description;
    $dataThisPage->keyword = $news->translation[0]->keyword;
    $dataThisPage->image = $news->translation[0]->image;
    
    // get data news category
    $dataNewsCategory = $this->newsCategoryService->getAllData();
    $getDataNewsCategory = $this->newsCategoryService->getDataBySlug('news');
    
    $compact = compact('page', 'slug', 'dataPages', 'news', 'lastSegment', 'dataNews', 'dataNewsCategory', 'dataThisPage');
    return view('news-detail', $compact);
  }

  public function gallery_detail($slug)
  {
    $page = 'gallery';
    $lastSegment = basename(url()->current());

    // for menu in layout
    $dataPages = $this->pagesService->getDataForMenu();

    // get data gallery
    $gallery = $this->galleryService->getDataBySlug($slug);
    
    // get data news for meta tag
    $getDataPage = $this->pagesService->getDataBySlug('gallery');
    
    $dataThisPage = new stdClass();
    $dataThisPage->title = $gallery->title;
    $dataThisPage->description = $getDataPage->description;
    $dataThisPage->keyword = $getDataPage->keyword;
    $dataThisPage->image = $getDataPage->image;
    
    $compact = compact('page', 'slug', 'dataPages', 'gallery', 'lastSegment', 'dataThisPage');
    return view('gallery-detail', $compact);
  }

  public function submitVisitForm(StoreVisitRequest $request)
  {
    // Check for spam
    if ($request->filled('purpose_to_empty')) {
      return redirect()->back()->with('error', 'Spam detected.');
    }

    // Save to the database
    $visit = BookingSchoolTour::create($request->except(['_token', 'purpose_to_empty']));

    // Send email notification
    Mail::to(env('MAIL_VISIT_ADDRESS'))->send(new VisitScheduled($visit));

    return redirect()->back()->with('success', 'Visit scheduled successfully!');
  }

  public function submitApplyJob(ApplyFormRequest $request)
  {
    // Check for spam
    if ($request->filled('purpose_to_empty')) {
      return redirect()->back()->with('error', 'Spam detected.');
    }
    
    $input = $request->input();
    
    // get job name from job id
    $jobData = $this->jobListsService->getDataById($input['job_id']);
    $input['title_job'] = $jobData->translation[0]->title;

    $applyJob = new ApplyJob;
    $applyJob->job_id = $input['job_id'];
    $applyJob->first_name = $input['first_name'];
    $applyJob->last_name = $input['last_name'];
    $applyJob->phone = $input['phone'];
    $applyJob->email = $input['email'];
    $applyJob->address = $input['address'];
    $applyJob->english_proficiency = $input['english_proficiency'];
    $applyJob->latest_salary = $input['latest_salary'];
    $applyJob->salary_expectation = $input['salary_expectation'];
    $applyJob->agree = $input['agree'] == 'on' ? 1 : 0;
    $applyJob->save();

    foreach($input['job'] as $itemJob) {
      $jobExperience = new JobExperience;
      $jobExperience->apply_job_id = $applyJob->id;
      if ($itemJob['company'] != "") {
        $jobExperience->company_name = $itemJob['company'];
        $jobExperience->position = $itemJob['position'] ? $itemJob['position'] : "";
        $jobExperience->start_date = $itemJob['start_date'] ? $itemJob['start_date'] : null;
        $jobExperience->end_date = $itemJob['end_date'] ? $itemJob['end_date'] : null;
        $jobExperience->save();
      }
    }

    foreach($input['education'] as $itemEdu) {
      $education = new LatestEducation;
      $education->apply_job_id = $applyJob->id;
      if ($itemEdu['level'] != "") {
        $education->level = $itemEdu['level'];
        $education->institution = $itemEdu['institution'] ? $itemEdu['institution'] : "";
        $education->major = $itemEdu['major'] ? $itemEdu['major'] : "";
        $education->save();
      }
    }

    // Send email notification
    Mail::to(env('MAIL_APPLYJOB_ADDRESS'))->send(new ApplyJobMail($input));

    return redirect()->back()->with('success', 'Success submit form!');
  }
}
