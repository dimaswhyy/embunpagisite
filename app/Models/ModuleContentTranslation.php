<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\Uuids;

class ModuleContentTranslation extends Model
{
    use HasFactory, Uuids;

    protected $table = 'module_content_translation';
}
