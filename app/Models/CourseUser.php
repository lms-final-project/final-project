<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class CourseUser extends Model
{
    use HasFactory;
    protected $table = 'course_users' ;
    protected $guarded = [];
public $Total_Price=0;
    protected function userId(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => User::findorfail($value),
        );
    }

    protected function courseId(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => Course::findorfail($value),
        );
    }
   
}
