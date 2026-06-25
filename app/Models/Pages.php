<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\App;
use App\Traits\Uuids;

class Pages extends Model
{
    use HasFactory, Uuids;

    protected $table = 'pages';

    /**
     *  Get childrens
     * 
     */
    public function children()
    {
        return $this->hasMany(Pages::class, 'parent_id')->orderBy('order_num', 'ASC');
    }

    /**
     *  Get childrens
     * 
     */
    public function children_menu()
    {
        return $this->hasMany(Pages::class, 'parent_id')
            ->with('translation')
            ->where('show_menu', 1)
            ->orderBy('order_num', 'ASC');
    }

    /**
     *  Get parents
     * 
     */
    public function parent()
    {
        return $this->belongsTo(Pages::class, 'parent_id');
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

        return $this->hasMany(PagesTranslation::class)->where('language_code', $language);
    }
}
