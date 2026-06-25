<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\App;
use App\Traits\Uuids;

class ModuleContent extends Model
{
    use HasFactory, Uuids;

    protected $table = 'module_content';

    /**
     *  Get the translation
     * 
     */
    public function translation($language = null)
    {
        if ($language == null) {
            $language = App::getLocale();
        }

        return $this->hasMany(ModuleContentTranslation::class)->where('language_code', $language);
    }
}
