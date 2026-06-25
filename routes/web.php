<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\FileManagerController;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\PagesFrontController;
use App\Http\Controllers\ModuleContentController;
use App\Http\Controllers\SlideshowController;
use App\Http\Controllers\WhySectionController;
use App\Http\Controllers\EnrollNowSectionController;
use App\Http\Controllers\NewsCategoryController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\TestimonialsController;
use App\Http\Controllers\FacilitiesCategoryController;
use App\Http\Controllers\FacilitiesController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\JobListsController;
use App\Http\Controllers\BookingSchoolTourController;
use App\Http\Controllers\ApplyJobController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ApiPagesFrontController;

use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Vite;

$admin_path = env('ADMIN_PATH');

Route::get('/', [PagesFrontController::class, 'index'])->name('home_page');

Route::get('/{slug}', [PagesFrontController::class, 'page'])->name('page_front');

Route::get('/publication/{slug}', [PagesFrontController::class, 'news_detail'])->name('news_detail');

Route::get('/gallery/{slug}', [PagesFrontController::class, 'gallery_detail'])->name('gallery_detail');

Route::get('/career/{slug}', [PagesFrontController::class, 'detail_career'])->name('detail_career');
Route::get('/apply-career/{slug}', [PagesFrontController::class, 'apply_career'])->name('apply_career');

Route::get('/data_chart/{slug}', [PagesFrontController::class, 'data_chart'])->name('data_chart');

Route::post('/submit_visit', [PagesFrontController::class, 'submitVisitForm'])->name('visit.submit');
Route::post('/submit_apply_job', [PagesFrontController::class, 'submitApplyJob'])->name('apply.submit');

Route::get('/' . $admin_path . '/login', [AuthController::class, 'index'])->name('login');
Route::post('/' . $admin_path . '/login', [AuthController::class, 'login'])->name('submit_login');

Route::prefix('api')->group(function () {
  Route::get('/menu', [ApiPagesFrontController::class, 'menu'])->name('api.menu');
  Route::get('/news', [ApiPagesFrontController::class, 'news'])->name('api.news');
  Route::get('/module_content', [ApiPagesFrontController::class, 'module_content'])->name('api.module_content');
  Route::get('/testimonials', [ApiPagesFrontController::class, 'testimonials'])->name('api.testimonials');
  Route::get('/slideshow', [ApiPagesFrontController::class, 'slideshow'])->name('api.slideshow');
});

// Clear Application Cache
Route::get('/artisan/clear-cache', function () {
  Artisan::call('cache:clear');
  return "Application cache cleared!";
});

// Clear Route Cache
Route::get('/artisan/clear-route', function () {
  Artisan::call('route:clear');
  return "Route cache cleared!";
});

// Clear Configuration Cache
Route::get('/artisan/clear-config', function () {
  Artisan::call('config:clear');
  return "Configuration cache cleared!";
});

// Clear Compiled Views Cache
Route::get('/artisan/clear-view', function () {
  Artisan::call('view:clear');
  return "View cache cleared!";
});

Route::get('/sw/service-worker.js', function () {

  if (env('APP_ENV') === 'production') {
    $cwd = getcwd();
    $cssName = basename(glob($cwd . '/build/assets/embunpagi-*.css')[0], '.css');
    $jsName = basename(glob($cwd . '/build/assets/embunpagi-*.js')[0], '.js');
    $css = asset('build/assets/' . $cssName . '.css');
    $js = asset('build/assets/' . $jsName . '.js');

    $appCssName = basename(glob($cwd . '/build/assets/app-*.css')[0], '.css');
    $appJsName = basename(glob($cwd . '/build/assets/app-*.js')[0], '.js');
    $app_css = asset('build/assets/' . $appCssName . '.css');
    $app_js = asset('build/assets/' . $appJsName . '.js');

    $assets = [
      'css' => $css,
      'js' =>  $js,
      'app_css' => $app_css,
      'app_js' => $app_js,
    ];
  } else {
    $assets = [
      'css' => Vite::asset('resources/css/embunpagi.css'),
      'js' => Vite::asset('resources/js/embunpagi.js'),
      'app_css' => Vite::asset('resources/css/app.css'),
      'app_js' => Vite::asset('resources/js/app.js'),
    ];
  }

  return response(view('service-worker', $assets), 200)
      ->header('Content-Type', 'application/javascript');
});

/* Routes with Auth */
Route::middleware(['auth', 'verified'])->group(function () {

  $admin_path = env('ADMIN_PATH');

  Route::get('/' . $admin_path . '/dashboard', [DashboardController::class, 'index'])->name('dashboard');

  Route::get('/' . $admin_path . '/pages', [PagesController::class, 'index'])->name('pages');
  Route::get('/' . $admin_path . '/page/add', [PagesController::class, 'add'])->name('page_add');
  Route::post('/' . $admin_path . '/page/store', [PagesController::class, 'store'])->name('page_store');
  Route::get('/' . $admin_path . '/page/edit/{slug}', [PagesController::class, 'edit'])->name('page_edit');
  Route::post('/' . $admin_path . '/page/update', [PagesController::class, 'update'])->name('page_update');

  Route::post('/' . $admin_path . '/module_content/store', [ModuleContentController::class, 'store'])->name('add_module_content');
  Route::put('/' . $admin_path . '/module_content/update', [ModuleContentController::class, 'update'])->name('update_module_content');
  Route::post('/' . $admin_path . '/module_content/delete', [ModuleContentController::class, 'delete'])->name('delete_module_content');
  
  Route::get('/' . $admin_path . '/slideshow', [SlideshowController::class, 'index'])->name('slideshow');
  Route::get('/' . $admin_path . '/slideshow/add', [SlideshowController::class, 'add'])->name('slideshow_add');
  Route::post('/' . $admin_path . '/slideshow/store', [SlideshowController::class, 'store'])->name('slideshow_store');
  Route::get('/' . $admin_path . '/slideshow/{id}', [SlideshowController::class, 'edit'])->name('slideshow_edit');
  Route::post('/' . $admin_path . '/slideshow/update', [SlideshowController::class, 'update'])->name('slideshow_update');
  Route::post('/' . $admin_path . '/slideshow_delete/delete', [SlideshowController::class, 'delete'])->name('slideshow_delete');

  Route::get('/' . $admin_path . '/why_section', [WhySectionController::class, 'index'])->name('why_section');
  Route::get('/' . $admin_path . '/why_section/add', [WhySectionController::class, 'add'])->name('why_section_add');
  Route::get('/' . $admin_path . '/why_section_content/add', [WhySectionController::class, 'add_content'])->name('why_section_content_add');
  Route::post('/' . $admin_path . '/why_section/store', [WhySectionController::class, 'store'])->name('why_section_store');
  Route::get('/' . $admin_path . '/why_section/{id}', [WhySectionController::class, 'edit'])->name('why_section_edit');
  Route::get('/' . $admin_path . '/why_section_content/{id}', [WhySectionController::class, 'edit_content'])->name('why_section_content_edit');
  Route::post('/' . $admin_path . '/why_section/update', [WhySectionController::class, 'update'])->name('why_section_update');
  Route::post('/' . $admin_path . '/why_section/delete', [WhySectionController::class, 'delete'])->name('why_section_delete');

  Route::get('/' . $admin_path . '/enrollnow_section', [EnrollNowSectionController::class, 'index'])->name('enrollnow_section');
  Route::get('/' . $admin_path . '/enrollnow_section/add', [EnrollNowSectionController::class, 'add'])->name('enrollnow_section_add');
  Route::post('/' . $admin_path . '/enrollnow_section/store', [EnrollNowSectionController::class, 'store'])->name('enrollnow_section_store');
  Route::get('/' . $admin_path . '/enrollnow_section/{id}', [EnrollNowSectionController::class, 'edit'])->name('enrollnow_section_edit');
  Route::post('/' . $admin_path . '/enrollnow_section/update', [EnrollNowSectionController::class, 'update'])->name('enrollnow_section_update');
  Route::post('/' . $admin_path . '/enrollnow_section/delete', [EnrollNowSectionController::class, 'delete'])->name('enrollnow_section_delete');

  Route::get('/' . $admin_path . '/publication_category', [NewsCategoryController::class, 'index'])->name('publication_category');
  Route::get('/' . $admin_path . '/publication_category/add', [NewsCategoryController::class, 'add'])->name('publication_category_add');
  Route::post('/' . $admin_path . '/publication_category/store', [NewsCategoryController::class, 'store'])->name('publication_category_store');
  Route::get('/' . $admin_path . '/publication_category/{slug}', [NewsCategoryController::class, 'edit'])->name('publication_category_edit');
  Route::post('/' . $admin_path . '/publication_category/update', [NewsCategoryController::class, 'update'])->name('update_publication_category');
  Route::post('/' . $admin_path . '/publication_category_delete/{id}', [NewsCategoryController::class, 'delete'])->name('delete_publication_category');

  Route::get('/' . $admin_path . '/publication', [NewsController::class, 'index'])->name('publication');
  Route::get('/' . $admin_path . '/publication/add', [NewsController::class, 'add'])->name('publication_add');
  Route::post('/' . $admin_path . '/publication/store', [NewsController::class, 'store'])->name('publication_store');
  Route::get('/' . $admin_path . '/publication/{id}', [NewsController::class, 'edit'])->name('publication_edit');
  Route::post('/' . $admin_path . '/publication/update', [NewsController::class, 'update'])->name('update_publication');
  Route::post('/' . $admin_path . '/publication_delete/{id}', [NewsController::class, 'delete'])->name('delete_publication');

  Route::get('/' . $admin_path . '/facilities_category', [FacilitiesCategoryController::class, 'index'])->name('facilities_category');
  Route::get('/' . $admin_path . '/facilities_category/add', [FacilitiesCategoryController::class, 'add'])->name('facilities_category_add');
  Route::post('/' . $admin_path . '/facilities_category/store', [FacilitiesCategoryController::class, 'store'])->name('facilities_category_store');
  Route::get('/' . $admin_path . '/facilities_category/{slug}', [FacilitiesCategoryController::class, 'edit'])->name('facilities_category_edit');
  Route::post('/' . $admin_path . '/facilities_category/update', [FacilitiesCategoryController::class, 'update'])->name('update_facilities_category');
  Route::post('/' . $admin_path . '/facilities_category_delete/{id}', [FacilitiesCategoryController::class, 'delete'])->name('delete_facilities_category');

  Route::get('/' . $admin_path . '/facilities', [FacilitiesController::class, 'index'])->name('facilities');
  Route::get('/' . $admin_path . '/facilities/add', [FacilitiesController::class, 'add'])->name('facilities_add');
  Route::post('/' . $admin_path . '/facilities/store', [FacilitiesController::class, 'store'])->name('facilities_store');
  Route::get('/' . $admin_path . '/facilities/{id}', [FacilitiesController::class, 'edit'])->name('facilities_edit');
  Route::post('/' . $admin_path . '/facilities/update', [FacilitiesController::class, 'update'])->name('update_facilities');
  Route::post('/' . $admin_path . '/facilities_delete/{id}', [FacilitiesController::class, 'delete'])->name('delete_facilities');

  Route::get('/' . $admin_path . '/testimonials', [TestimonialsController::class, 'index'])->name('testimonials');
  Route::get('/' . $admin_path . '/testimonials/add', [TestimonialsController::class, 'add'])->name('testimonials_add');
  Route::post('/' . $admin_path . '/testimonials/store', [TestimonialsController::class, 'store'])->name('testimonials_store');
  Route::get('/' . $admin_path . '/testimonials/{id}', [TestimonialsController::class, 'edit'])->name('testimonials_edit');
  Route::post('/' . $admin_path . '/testimonials/update', [TestimonialsController::class, 'update'])->name('testimonials_update');
  Route::post('/' . $admin_path . '/testimonials_delete/delete', [TestimonialsController::class, 'delete'])->name('testimonials_delete');

  Route::get('/' . $admin_path . '/gallery', [GalleryController::class, 'index'])->name('gallery');
  Route::get('/' . $admin_path . '/gallery/add', [GalleryController::class, 'add'])->name('gallery_add');
  Route::post('/' . $admin_path . '/gallery/store', [GalleryController::class, 'store'])->name('gallery_store');
  Route::get('/' . $admin_path . '/gallery/{id}', [GalleryController::class, 'edit'])->name('gallery_edit');
  Route::post('/' . $admin_path . '/gallery/update', [GalleryController::class, 'update'])->name('update_gallery');
  Route::post('/' . $admin_path . '/gallery_delete/{id}', [GalleryController::class, 'delete'])->name('delete_gallery');

  Route::get('/' . $admin_path . '/job_lists', [JobListsController::class, 'index'])->name('job_lists');
  Route::get('/' . $admin_path . '/job_lists/add', [JobListsController::class, 'add'])->name('job_lists_add');
  Route::post('/' . $admin_path . '/job_lists/store', [JobListsController::class, 'store'])->name('job_lists_store');
  Route::get('/' . $admin_path . '/job_lists/{slug}', [JobListsController::class, 'edit'])->name('job_lists_edit');
  Route::post('/' . $admin_path . '/job_lists/update', [JobListsController::class, 'update'])->name('update_job_lists');
  Route::post('/' . $admin_path . '/job_lists_delete/{id}', [JobListsController::class, 'delete'])->name('delete_job_lists');

  Route::get('/' . $admin_path . '/booking_school_tour', [BookingSchoolTourController::class, 'index'])->name('booking_school_tour');
  Route::get('/' . $admin_path . '/booking_school_tour/{id}', [BookingSchoolTourController::class, 'show'])->name('booking_school_tour_show');
  Route::post('/' . $admin_path . '/booking_school_tour_delete/{id}', [BookingSchoolTourController::class, 'delete'])->name('booking_school_tour_delete');

  Route::get('/' . $admin_path . '/apply_career', [ApplyJobController::class, 'index'])->name('apply_career_admin');
  Route::get('/' . $admin_path . '/apply_career/{id}', [ApplyJobController::class, 'show'])->name('apply_career_show');
  Route::post('/' . $admin_path . '/apply_career_delete/{id}', [ApplyJobController::class, 'delete'])->name('apply_career_delete');
  Route::get('/' . $admin_path . '/export_apply_career', [ApplyJobController::class, 'export'])->name('export_apply_career');

  Route::get('/' . $admin_path . '/filemanager', [FileManagerController::class, 'index'])->name('filemanager');
  Route::post('/' . $admin_path . '/filemanager/upload', [FileManagerController::class, 'upload'])->name('filemanager.upload');
  Route::post('/' . $admin_path . '/filemanager/create-folder', [FileManagerController::class, 'createFolder'])->name('filemanager.create-folder');
  Route::post('/' . $admin_path . '/filemanager/copy', [FileManagerController::class, 'copy'])->name('filemanager.copy');
  Route::post('/' . $admin_path . '/filemanager/move', [FileManagerController::class, 'move'])->name('filemanager.move');
  Route::delete('/' . $admin_path . '/filemanager/delete', [FileManagerController::class, 'delete'])->name('filemanager.delete');
  Route::get('/' . $admin_path . '/filemanager/parent-directory', [FileManagerController::class, 'parentDirectory'])->name('filemanager.parent-directory');
  Route::get('/' . $admin_path . '/filemanager/modal', [FileManagerController::class, 'loadModal'])->name('filemanager.loadModal');
  Route::post('/' . $admin_path . '/filemanager/save-view-option', [FileManagerController::class, 'saveViewOption'])->name('filemanager.saveViewOption');

  Route::get('/' . $admin_path . '/changePassword', [UserController::class, 'changePassword'])->name('changePassword');
  Route::post('/' . $admin_path . '/updatePassword', [UserController::class, 'updatePassword'])->name('updatePassword');

  Route::get('/' . $admin_path . '/myprofile', [UserController::class, 'myprofile'])->name('myprofile');
  Route::post('/' . $admin_path . '/updateProfile', [UserController::class, 'updateProfile'])->name('updateProfile');


  // Route::resource('user', UserController::class);
  Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
});
