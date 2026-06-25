<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\App;
use App\Traits\Uuids;

class FacilitiesCategory extends Model
{
    use HasFactory, Uuids;

    protected $table = 'facilities_category';

    /**
     *  Get the translation
     * 
     */
    public function translation($language = null)
    {
        if ($language == null) {
            $language = App::getLocale();
        }

        return $this->hasMany(FacilitiesCategoryTranslation::class)->where('language_code', $language);
    }
}
