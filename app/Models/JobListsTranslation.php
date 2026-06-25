<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\Uuids;

class JobListsTranslation extends Model
{
    use HasFactory, Uuids;

    protected $table = 'job_lists_translation';
}
