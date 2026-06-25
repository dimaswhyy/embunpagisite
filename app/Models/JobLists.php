<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\App;
use App\Traits\Uuids;

class JobLists extends Model
{
    use HasFactory, Uuids;

    protected $table = 'job_lists';

    /**
     *  Get the translation
     * 
     */
    public function translation($language = null)
    {
        if ($language == null) {
            $language = App::getLocale();
        }

        return $this->hasMany(JobListsTranslation::class)->where('language_code', $language);
    }

    /**
     *  Define the one-to-many relationship
     */
    public function applications()
    {
        return $this->hasMany(ApplyJob::class, 'job_id');
    }
}
