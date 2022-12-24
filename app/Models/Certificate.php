<?php

namespace App\Models;

use App\Models\Course;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Certificate extends Model
{
    use HasFactory;
    public $guarded = [];

//relations
public function course()
{
    return $this->belongsTo(Course::class);
}

public function student()
    {
        return $this->belongsTo(User::class,'user_id','id');
    }

}
