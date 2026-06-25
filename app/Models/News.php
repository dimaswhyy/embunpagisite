<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\App;
use App\Traits\Uuids;

class News extends Model
{
    use HasFactory, Uuids;

    protected $table = 'news';

    /**
     *  Get news category
     * 
     */
    public function category()
    {
        return $this->belongsTo(NewsCategory::class, 'news_category_id')->with('translation');
    }

    /**
     *  Get the translation
     * 
     */
    public function translation($language = null)
    {
        if ($language == null) {
            $language = App::getLocale();
        }

        return $this->hasMany(NewsTranslation::class)->where('language_code', $language);
    }
}
