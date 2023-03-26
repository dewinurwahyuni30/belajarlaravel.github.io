<?php

namespace App\Models;

use App\Models\student;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class student extends Model
{
    use HasFactory,SoftDeletes;
    protected $fillable = [
        'name','gender','nis','class_id','image',
    ];
   
    public function class()
    {
        return $this->belongsTo(classroom::class);
    }

    public function extracurriculars()
    {
        return $this->belongsToMany(extracurricular::class, 'student_extracurricular', 'student_id', 'extracurricular_id');
    }

    
}
