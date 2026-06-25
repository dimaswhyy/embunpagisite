<?php

namespace App\Exports;

use App\Models\ApplyJob;
use Maatwebsite\Excel\Concerns\FromArray;
use Maatwebsite\Excel\Concerns\WithStyles;
use Maatwebsite\Excel\Concerns\WithHeadings;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class ApplyJobExport implements FromArray, WithHeadings, WithStyles
{
	protected $maxExperiences = 0;
  protected $maxEducations = 0;

	public function __construct()
	{
		// Calculate maximum number of job experiences and education entries per user
		$applyData = ApplyJob::with(['experiences', 'education'])->get();
		foreach ($applyData as $item) {
			$this->maxExperiences = max($this->maxExperiences, $item->experiences->count());
			$this->maxEducations = max($this->maxEducations, $item->education->count());
		}
	}

	public function array(): array
	{
		// Fetch all users with related job experiences and education
		$applyData = ApplyJob::with(['experiences', 'education'])->get();
		$data = [];

		foreach ($applyData as $item) {
			// Base user information
			$userData = [
				'id'         => $item->id,
				'first_name' => $item->first_name,
				'last_name' => $item->last_name,
				'position' => $item->job->translation[0]->title,
				'phone' => $item->phone,
				'email' => $item->email,
				'address' => $item->address,
				'english_proficiency' => $item->english_proficiency,
				'latest_salary' => $item->latest_salary,
				'salary_expectation' => $item->salary_expectation,
				'agree' => $item->agree,
				'created_at' => $item->created_at->format('d-m-Y H:i:s'),
			];

			// Add job experiences to the user data up to the maximum count
			foreach ($item->experiences as $index => $experience) {
				$userData['company_name_' . $index]  = $experience->company_name;
				$userData['position_' . $index] = $experience->position;
				$userData['start_date_' . $index] = date('d-m-Y', strtotime($experience->start_date));
				$userData['end_date_' . $index]   = date('d-m-Y', strtotime($experience->end_date));
			}

			// Add education details to the user data up to the maximum count
			foreach ($item->education as $index => $education) {
				$userData['level_' . $index] = $education->level;
				$userData['institution_' . $index]= $education->institution;
				$userData['major_' . $index] = $education->major;
			}

			$data[] = $userData;
		}

		return $data;
	}

	public function headings(): array
	{
		$headings = [
			'ID',
			'First Name',
			'Last Name',
			'Position',
			'Phone',
			'Email',
			'Address',
			'English Proficiency',
			'Latest Salary',
			'Salary Expectation',
			'Agree Status',
			'Created At',
		];

		// Add dynamic headers for job experiences
		for ($i = 0; $i < $this->maxExperiences; $i++) {
			$headings[] = "Company Name #{$i}";
			$headings[] = "Company Position #{$i}";
			$headings[] = "Company Start Date #{$i}";
			$headings[] = "Company End Date #{$i}";
		}

		// Add dynamic headers for education details
		for ($i = 0; $i < $this->maxEducations; $i++) {
			$headings[] = "Education Level #{$i}";
			$headings[] = "Education Institution #{$i}";
			$headings[] = "Education Major #{$i}";
		}

		return $headings;
	}

	// Styling headings to be bold
	public function styles(Worksheet $sheet)
	{
		return [
			1 => ['font' => ['bold' => true]],  // Make first row (headings) bold
		];
	}
}
