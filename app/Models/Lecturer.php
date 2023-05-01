<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lecturer extends Model
{
    use HasFactory;
    
    public function courses()
    {
        return $this->belongsToMany(DeptCourse::class, 'course_lecturer');
    }
}
