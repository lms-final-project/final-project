<?php

namespace App\Models;

use Illuminate\Support\Facades\Crypt;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class StudentProfile extends Model
{
    use HasFactory;
    public $guarded = [];
    protected $primaryKey='student_id';
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
        return $this->belongsTo(User::class,'student_id' , 'id');
    }

}
