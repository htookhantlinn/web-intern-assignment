<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'email',
        'roll_no',
        'gender',
        'dob',
        'nrc',
    ];

    public function courses()
    {
        return $this->belongsToMany(Course::class, StudentCourse::class);
    }

    public function scopeOrderByName($query)
    {
        $query->orderBy('name');
    }
}
