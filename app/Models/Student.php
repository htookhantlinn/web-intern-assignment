<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

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
    public function scopeFilter($query, array $filters)
    {
        $query
            ->when($filters['search'] ?? null, function ($query, $search) {
                $query->where(DB::raw('lower(name)'), "LIKE", "%" . strtolower($search) . "%")
                    ->orWhere('email', 'LIKE', "%{$search}%");
            });
    }
}
