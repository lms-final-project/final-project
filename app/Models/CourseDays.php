<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CourseDays extends Model
{
    use HasFactory;
    protected $table = 'course_days';
    protected $guarded = [];
}
