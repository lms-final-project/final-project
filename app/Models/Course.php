<?php

namespace App\Models;

use App\Models\CourseType;
use App\Models\CourseTopic;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Course extends Model
{
    use HasFactory;
    public $guarded = [];

    // Scopes
    public function scopeStatus($query , $arg='accepted'){
        return $query->where('status', $arg);
    }

    public function scopeCategory($query , $arg){
        return $query->where('category_id', $arg);
    }
    public function scopeInstructor($query , $arg){
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
}
