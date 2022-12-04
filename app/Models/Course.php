<?php

namespace App\Models;

use App\Models\User;
use App\Models\CourseType;
use App\Models\CourseTopic;
use App\Models\CourseContent;
use App\Models\CourseHeading;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Course extends Model
{
    use HasFactory;
    protected $table = 'courses';
    public $guarded = [];


    // Scopes
    public function scopeStatus($query , $arg = 'accepted'){
        return $query->where('status', $arg);
    }

    public function scopeCategory($query , $arg){
        return $query->where('category_id', $arg);
    }
    public function scopeOwner($query , $arg){
        return $query->where('instructor_id', $arg);
    }


    // relationships
    public function topics(){
        return $this->hasMany(CourseTopic::class);
    }
    public function type(){
        return $this->belongsTo(CourseType::class, 'course_type_id' , 'id');
    }
    public function category(){
        return $this->belongsTo(Category::class, 'category_id' , 'id');
    }
    public function instructor(){
        return $this->belongsTo(User::class , 'instructor_id' , 'id');
    }
    public function courseType(){
        return $this->belongsTo(CourseType::class);
    }
    public function courseHeadings(){
        return $this->hasMany( CourseHeading::class , 'course_id' , 'id');
    }
    public function courseContents(){
        return $this->hasManyThrough(CourseHeading::class , CourseContent::class , 'course_heading_id', 'course_id');
    }
    public function users(){
        return $this->belongsToMany( User::class , 'course_users' );
    }

}
