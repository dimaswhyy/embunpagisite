<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\JobListsService;

class JobListsController extends Controller
{
  protected $job_lists;

  public function __construct(
    JobListsService $job_lists
  ) {
    $this->job_lists = $job_lists;
  }

  public function index(Request $request)
  {
    $page = "job_lists";
    $path = $request->input('path', '');
    // get all data job_lists
    $jobLists = $this->job_lists->getData(10);

    $compact = compact('jobLists', 'page', 'path');
    return view('admin.job-lists.index', $compact);
  }

  public function add(Request $request)
  {
    $page = "add_job_lists";
    $path = $request->input('path', '');
    return view('admin.job-lists.add', compact('page', 'path'));
  }

  public function store(Request $request)
  {
    $input = $request->all();

    $dataId = "";
    $submitData = $this->job_lists->storeOrUpdate($dataId, $input);

    if ($submitData) {
      return redirect()->route('job_lists')->with('success', 'New job has been added');
    }
  }

  public function edit(Request $request, $slug)
  {
    $page = 'edit_job_lists';
    $path = $request->input('path', '');

    // get data page translation
    $dataJob = $this->job_lists->getDataBySlug($slug);
    if (!$dataJob) {
      return abort(404);
    }

    $compact = compact('slug', 'page', 'path', 'dataJob');
    return view('admin.job-lists.edit', $compact);
  }

  public function update(Request $request)
  {
    $input = $request->all();

    $dataId = $input['id'];
    $updateData = $this->job_lists->storeOrUpdate($dataId, $input);

    if ($updateData) {
      return redirect()->route('job_lists')->with('success', 'Job has been updated');
    }
  }

  public function delete(Request $request)
  {
    $input = $request->all();

    $dataId = $input['id'];
    $deleteData = $this->job_lists->destroyById($dataId);

    if ($deleteData) {
      return response()->json([
				'success' => true,
				'message' => 'Success delete data'
			], 200); 
    }
  }

}