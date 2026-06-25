<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Services\ApplyJobService;
use App\Services\JobListsService;
use App\Exports\ApplyJobExport;
use App\Helper\FormatNumber;
use PhpOffice\PhpSpreadsheet\Calculation\TextData\Format;

class ApplyJobController extends Controller
{
  protected $applyJob;
  protected $jobList;

  public function __construct(
    ApplyJobService $applyJob,
    JobListsService $jobList
  ) {
    $this->applyJob = $applyJob;
    $this->jobList = $jobList;
  }

  public function index(Request $request)
  {
    $page = "apply_job";
    $path = $request->input('path', '');
    // get all data job_lists
    $data = $this->applyJob->getData(10);

    $compact = compact('data', 'page', 'path');
    return view('admin.apply_job.index', $compact);
  }

  public function show(Request $request, $id)
  {
    $page = 'apply_job';
    $path = $request->input('path', '');

    // get data page translation
    $data = $this->applyJob->getDataById($id);
    if (!$data) {
      return abort(404);
    }

    // selected job data
    $jobData = $this->jobList->getDataById($data->job_id);

    $compact = compact('id', 'page', 'path', 'data', 'jobData');
    return view('admin.apply_job.show', $compact);
  }

  public function delete(Request $request)
  {
    $input = $request->all();

    $dataId = $input['id'];
    $deleteData = $this->applyJob->destroyById($dataId);

    if ($deleteData) {
      return response()->json([
				'success' => true,
				'message' => 'Success delete data'
			], 200); 
    }
  }

  public function export()
  { 
    // inital data
    $data = [];
    // get all data job_lists
    $getDataApply = $this->applyJob->getAllDataForExport();
    // call format number helper
    $formatNumber = new FormatNumber;

    foreach ($getDataApply as $key => $item) {
      $getJobData = $this->jobList->getDataByIdToArray($item['job_id']);
      $item['no'] = $key + 1;
      $item['latest_salary'] = $formatNumber->thousandFormat($item['latest_salary']);
      $item['salary_expectation'] = $formatNumber->thousandFormat($item['salary_expectation']);
      $item['job'] = $getJobData;
      $data[$key] = $item;
    }

    // Use the Facade directly
    $pdf = Pdf::loadView('admin.apply_job.export_pdf', ['data' => $data])
      ->setPaper('a4', 'landscape'); // Set paper to landscape

    // Dynamically generate the filename with the current date
    $fileName = 'apply-career-' . date('Ymd') . '.pdf';

    // Download the file with the generated filename
    return $pdf->download($fileName);
  }

  public function export_excel()
  {
    return Excel::download(new ApplyJobExport, 'apply_career.xlsx');
  }

}