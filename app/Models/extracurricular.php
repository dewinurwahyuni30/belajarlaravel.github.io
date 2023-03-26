<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\extracurricular;

class extracurricular extends Model
{
    use HasFactory;
    protected $fillable = [
        'name'
    ];
    public function students()
    {
        return $this->belongsToMany(student::class, 'student_extracurricular', 'extracurricular_id', 'student_id');
    }
}
