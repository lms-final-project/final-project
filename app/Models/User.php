<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use instructor;
use Carbon\Carbon;
use App\Models\Role;
use App\Models\Feedback;
use App\Models\Assignment;
use App\Models\StudentProfile;
use App\Models\InstructorDetails;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'role_id',
        'requestTo_instructor'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    // accessors and mutators
    protected function createdAt(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => Carbon::parse($value)->format('d/m/Y'),
        );
    }
    protected function name(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => ucfirst($value),
        );
    }
  /*  protected function password(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => Crypt::decrypt($value),



        );
    }*/


    // relations
    public function role()
    {
        return $this->belongsTo(Role::class);
    }

    public function instructor_details()
    {
        return $this->hasOne(InstructorDetails::class,'instructor_id' , 'id');
    }
    public function profile_student()
    {
        return $this->hasOne(StudentProfile::class,'student_id' , 'id');
    }
    public function courses(){
        return $this->belongsToMany( Course::class , 'course_users' );
    }

    public function feedbacks(){
        return $this->hasMany( Feedback::class ,'student_id','id' );
}

public function assignments(){
    return $this->belongsToMany( Assignment::class , 'assignment_students' );
}
}
