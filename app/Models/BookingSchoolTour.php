<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\App;
use App\Traits\Uuids;

class BookingSchoolTour extends Model
{
    use HasFactory, Uuids;

    // Table name
    protected $table = 'booking_school_tour';

    // Allow mass assignment for specific fields
    protected $fillable = [
        'child_name',
        'parent_name',
        'phone',
        'email',
        'address',
        'school_from',
        'program',
        'visit_date',
        'visit_time',
    ];
}
