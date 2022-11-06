<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CourseHeading extends Model
{
    use HasFactory;
    protected $table = 'course_headings';

    protected $guarded = [];



    // relations
    public function contents(){
        return $this->hasMany(CourseContent::class, 'course_heading_id' , 'id');
    }
}
