<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\App;
use App\Traits\Uuids;

class JobExperience extends Model
{
  use HasFactory, Uuids;

  // Table name
  protected $table = 'job_experience';

  // Allow mass assignment for specific fields
  protected $fillable = [
    'apply_job_id',
    'company_name',
    'position',
    'start_date',
    'end_date'
  ];

  // Define the inverse relationship
  public function applyJob()
  {
    return $this->belongsTo(ApplyJob::class, 'apply_job_id');
  }
}
