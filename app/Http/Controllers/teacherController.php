<?php

namespace App\Http\Controllers;

use App\Models\teacher;
use App\Models\classroom;
use Illuminate\Http\Request;

class teacherController extends Controller
{
    public function index()
    {
        $teacher = teacher::all();
        return view('teacher',['teacherList'=>$teacher]);
    }
    public function show($id)
    {
        // dd($id);
        $teacher = teacher::with('class.students')->findOrFail($id);
        return view('teacher-detail',['teacher'=>$teacher]);

    }
    public function create()
    {
        $class = classroom::select('id','name')->get();
        return view('teacher-add',['class'=>$class]);
        // dd('berhasil bikin route');

    }
    public function store(Request $request)
    {
       $teacher=teacher::create($request->all());
        return redirect('/teacher');

        // dd($request->all());
    }
}
