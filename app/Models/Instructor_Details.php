<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Instructor_Details extends Model
{
    use HasFactory;
    public $guarded = [];

    public function scopeInstructor($query , $arg){
        return $query->where('instructor_id  ', $arg);
    }
   /* protected function social_links(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => json_decode($value, true),
            set: fn ($value) => json_encode($value),
        );
    }*/
    protected $casts=[
        'social_links'=>'array'];
protected $primaryKey='instructor_id';
        public function user()
        {
            return $this->belongsTo(User::class,'instructor_id' , 'id');
        }
}
