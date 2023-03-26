<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\classroom;

class classroom extends Model
{
    use HasFactory;
    protected $fillable = [
        'name'
    ];
    
    protected $table = 'class';
   
    public function students()
    {
        return $this->hasMany(student::class,'class_id','id');
    }
    public function HomeroomTeacher()
    {
        return $this->belongsTo(teacher::class, 'teacher_id', 'id');
    }
}
