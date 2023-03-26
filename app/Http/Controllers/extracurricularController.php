<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\extracurricular;
use App\Models\classroom;
class extracurricularController extends Controller
{

    public function index()
    {
        $ekskul = extracurricular::get();
        return view('extracurricular',['ekskulList'=>$ekskul]);
        // dd($ekskul);
    }
    public function show($id)
    {
        // dd($id);
        $ekskul = extracurricular::with('students')->findOrFail($id);
        return view('ekskul-detail',['ekskul'=>$ekskul]);

    }
    public function create()
    {
        $class = classroom::select('id','name')->get();
        return view('ekskul-add',['class'=>$class]);
        // dd('berhasil bikin route');

    }
    public function store(Request $request)
    {
       $ekskul=extracurricular::create($request->all());
        return redirect('/extracurricular');

        // dd($request->all());
    }
}
