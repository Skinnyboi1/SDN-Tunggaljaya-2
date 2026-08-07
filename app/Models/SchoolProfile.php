<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SchoolProfile extends Model
{
    protected $fillable = [
        'name',
        'npsn',
        'akreditasi',
        'principal_name',
        'principal_welcome',
        'principal_photo',
        'history',
        'vision',
        'mission',
        'address',
        'phone',
        'email',
        'map_url',
        'student_count',
        'teacher_count',
        'class_count',
    ];

    protected $casts = [
        'mission' => 'array',
    ];
}
