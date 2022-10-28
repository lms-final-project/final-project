<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class CourseType extends Model
{
    use HasFactory;
    public $timestamps = false;
    public $guarded = [];
    //  Accessors and Mutators
    protected function name(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => ucfirst($value),
        );
    }

    // Relationships
    public function courses(){
        return $this->hasMany(Course::class);
    }
}
