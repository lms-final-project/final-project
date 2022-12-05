<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CourseZoom extends Model
{
    use HasFactory;
    protected $table = 'course_zooms';
    public $guarded = [];

    public function course(){
        return $this->belongsTo( Course::class,'course_id','id' );
}
}
