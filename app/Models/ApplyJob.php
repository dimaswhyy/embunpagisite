<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\App;
use App\Traits\Uuids;

class ApplyJob extends Model
{
  use HasFactory, Uuids;

  // Table name
  protected $table = 'apply_job';

  // Allow mass assignment for specific fields
  protected $fillable = [
    'job_id',
    'first_name',
    'last_name',
    'phone',
    'email',
    'address',
    'english_proficiency',
    'latest_salary',
    'salary_expectation',
    'agree',
  ];

  /**
   *  Get the job data
   */
  public function job()
  {
    return $this->belongsTo(JobLists::class, 'job_id');
  }

  /**
   *  Get the job experience data
   */
  public function experiences()
  {
    return $this->hasMany(JobExperience::class, 'apply_job_id');
  }

  /**
   *  Get the latest education
   */
  public function education()
  {
    return $this->hasMany(LatestEducation::class, 'apply_job_id');
  }
}
