<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\App;
use App\Traits\Uuids;

class Gallery extends Model
{
    use HasFactory, Uuids;

    protected $table = 'gallery';

    /**
     *  Get the images
     * 
     */
    public function images($gallery_id = null)
    {
        // return $this->hasMany(GalleryImages::class)->where('gallery_id', $gallery_id);
        return $this->hasMany(GalleryImages::class)->orderBy('num_order', 'ASC');
    }
}
