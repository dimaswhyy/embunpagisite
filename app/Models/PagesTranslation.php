<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\Uuids;

class PagesTranslation extends Model
{
    use HasFactory, Uuids;

    protected $table = 'pages_translation';

    public function withImages()
    {
        return $this->hasMany(ImagesPage::class, 'pages_translation_id')->orderBy('order_num', 'ASC');
    }
}
