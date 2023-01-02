<?php

namespace App\Models;

use App\Models\User;
use App\Models\Assignment;
use App\Models\AssignmentStudent;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class AssignmentStudent extends Model
{
    use HasFactory;
    protected $table = 'assignment_students' ;
    protected $guarded = [];
    protected function userId(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => User::findorfail($value),
        );
    }

    

}
