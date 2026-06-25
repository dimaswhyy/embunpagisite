<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\Uuids;

class FacilitiesTranslation extends Model
{
    use HasFactory, Uuids;

    protected $table = 'facilities_translation';
}
