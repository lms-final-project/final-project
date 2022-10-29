<?php

namespace App\Models;

use App\Models\Icon;
use App\Models\Course;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Category extends Model
{
    use HasFactory;
    protected $fillable=[
        'name',
        'description',
        'icon_id'
        ];



    // Relationships
    public function icon(){
        return $this->belongsTo(Icon::class);
    }
    public function courses(){
        return $this->hasMany(Course::class , 'category_id' , 'id');
    }
}
