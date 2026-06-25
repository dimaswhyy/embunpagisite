<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\Uuids;

class Role extends Model
{
    use HasFactory, Uuids;

    protected $table = 'roles';

    /**
     *  Get the user that owns the role
     * 
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
