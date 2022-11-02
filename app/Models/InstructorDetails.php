<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class InstructorDetails extends Model
{
    use HasFactory;
    public $guarded = [];
    protected $primaryKey='instructor_id';
    // protected $casts=['social_links'=>'array'];

    // Scopes
    public function scopeInstructor($query , $arg){
        return $query->where('instructor_id  ', $arg);
    }
    // Sccessors and mutators
    protected function socialLinks(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => json_decode($value , true),
            set: fn ($value) => json_encode($value)
        );
    }

    public function user()
    {
        return $this->belongsTo(User::class,'instructor_id' , 'id');
    }
}
