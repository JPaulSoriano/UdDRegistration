<?php

namespace App;
use Illuminate\Database\Eloquent\Model;

class Registration extends Model
{
    
    protected $fillable = [
        'year',
        'semester',
        'stud_type',
        'stud_no',
        'first_name',
        'last_name',
        'middle_name',
        'course_id',
        'year_level',
        'phone',
        'email',
        'last_school',
        'payment_method',
        'payment_ref',
        'image',
        'auth_first_name',
        'auth_last_name',
        'auth_middle_name',
        'reg_ref'
    ];

    public function course(){
        return $this->belongsTo('App\Course');
    }

    public function getFullNameAttribute()
    {
        return "{$this->last_name}, {$this->first_name} {$this->middle_name}";
    }
}
