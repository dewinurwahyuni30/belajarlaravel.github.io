<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\classroom;

class classController extends Controller
{
    public function index()
    {
        //lazy load
        // $class = classroom::all();//cara request data =>ketika dibutuhkan ambil data
        // return view('classroom', ['classlist' => $class]);
        //select * from table class
        //select * from student where class = 1A
        //select * from student where class = 1B
        //select * from student where class = 1C
        //select * from student where class = 1D

        //eager load
        $class = classroom::get();//cara request data =>
        return view('classroom', ['classlist' => $class]);
        //select * table class
        //select * from student where class in(1A.1B,1C,1D)
    }
    public function show($id)
    {
        // dd($id);
        $class = classroom::with(['students','HomeroomTeacher'])
        ->findOrFail($id);
        return view('class-detail',['class'=>$class]);

    }
    public function create()
    {
        $class = classroom::select('id','name')->get();
        return view('class-add',['class'=>$class]);
        // dd('berhasil bikin route');

    }
    public function store(Request $request)
    {
       $class=classroom::create($request->all());
        return redirect('/class');

        // dd($request->all());
    }

    public function edit(Request $request,$id)
    {
        $class = classroom::find($id);
       return view('class-edit',['class'=>$class]);

    }
    public function update(Request $request,$id)
    {
        $student = classroom::findOrFail($id);
        $student->update($request->all());
        return redirect('/class');
    }

    public function delete($id)
    {
        $class = classroom::findOrFail($id);
        return view('class-delete',['class'=>$class]);
    }
    public function destroy($id)
    {
        $deletedclass = classroom::findOrFail($id);
        $deletedclass->delete();
       
        return redirect('/class');
    }
    public function deletedclass()
    {
        $deletedclass=classroom::get();
        
        return view('class-deleted-list',['class'=>$deletedclass]);
    }
    public function restore($id)
    {
        $deletedclass=classroom::withTrashed()->where('id',$id)->restore();
        
        return redirect('/class');
        
    }
}
