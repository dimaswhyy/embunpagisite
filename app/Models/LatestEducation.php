<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\App;
use App\Traits\Uuids;

class LatestEducation extends Model
{
  use HasFactory, Uuids;

  // Table name
  protected $table = 'latest_education';

  // Allow mass assignment for specific fields
  protected $fillable = [
    'apply_job_id',
    'level',
    'institution',
    'major'
  ];

  // Define the inverse relationship
  public function applyJob()
  {
    return $this->belongsTo(ApplyJob::class, 'apply_job_id');
  }
}
