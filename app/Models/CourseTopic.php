<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CourseTopic extends Model
{
    use HasFactory;
    protected $table = 'course_topics';

    protected $guarded = [];

    public function course(){
        return $this->belongsTo(Course::class);
    }
}
