<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Assignment extends Model
{
    use HasFactory;
    protected $guarded = [];
    public $timestamps = false;


    //relation
    public function users(){
        return $this->belongsToMany( User::class , 'assignment_students' );

    }
  
}
