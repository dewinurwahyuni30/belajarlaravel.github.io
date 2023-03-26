<?php

namespace App\Http\Controllers;
use App\Models\student;
use App\Models\classroom;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use App\Http\Requests\studentCreateRequest;

class studentController extends Controller
{
    public function index(Request $request)
    {
        $keyword =$request->keyword;
        $student = student::with('class')->
                            where('name','LIKE','%'.$keyword.'%')
                            ->orWhere('gender',$keyword)
                            ->orWhere('nis','LIKE','%'.$keyword.'%')
                            ->orWhereHas('class',function($query)use($keyword){
                                $query->where('name','LIKE','%'.$keyword.'%');
                            })
                            ->paginate(10);
        return view('student',['studentList'=>$student]);
    }
    public function show($id)
    {
        // dd($id);
        $student = student::with(['class.HomeroomTeacher','extracurriculars'])
        ->findOrFail($id);
        return view('student-detail',['student'=>$student]);
    }

    public function create()
    {
        $class = classroom::select('id','name')->get();
        return view('student-add',['class'=>$class]);
        // dd('berhasil bikin route');

    }

    public function store(studentCreateRequest $request)
    {
        $newName = '';
        if($request->file('photo')){
        $extension = $request->file('photo')->getClientOriginalExtension();
        $newName = $request->name.'-'.now()->timestamp.'.'.$extension;
        // $newName = $request->name.'.'.$extension;
        $request->file('photo')->storeAs('photo',$newName);
        }
        
        // $validated = $request->validate([
        //     'nis'=>'unique:students|max:10|required',
        //     'name'=>'max:100|required',
        //     'gender'=>'required',
        //     'class_id'=>'required'
        // ]);
       $request['image'] = $newName;
       $student=student::create($request->all());
       if($student){
            Session::flash('status','succes');
            Session::flash('message','add new student succes!');
       }
        return redirect('/students');

        // dd($request->all());
    }

    public function edit(Request $request,$id)
    {
        $student = student::with('class')->findOrFail($id);
        $class = classroom::where('id','!=',$student->class_id)->get(['id','name']);
       return view('student-edit',['student'=>$student,'class'=>$class]);

        // dd($request->all());
    }
//     public function update(Request $request, $id)
// {
//     $student = Student::findOrFail($id);
//     $oldPhoto = $student->image;
//     $file_path = 'storage/photo/' . $oldPhoto; // path jika pakai unlink()
//     $file_path = 'photo/' . $oldPhoto; // path jika pakai Storage::Delete

//     $newName = '';

//     if ($request->file('photo')) {
//         $extension = $request->file('photo')->getClientOriginalExtension();
//         $strName = preg_replace('/\s+/', '', $request->name);
//         $newName = strtolower($strName) . '-' . now()->timestamp . '.' . $extension;
//         $request->file('photo')->storeAs('photo', $newName);
//         $request['image'] = $newName;

//         if (isset($oldPhoto) || $oldPhoto != '') {
//             // unlink / delete old photo
//             // unlink($file_path);
//             if (Storage::exists($file_path)) {
//                 Storage::delete($file_path);
//             } else {
//                 dd('file gk ada!');
//             }
//         }
//     } else {
//         // timpa dgn nama yg sama, artinya biar gk berubah
//         $request['image'] = $oldPhoto;
//     }

//     // dd($request->all());

//     $student->update($request->all());

//     if ($student) {
//         Session::flash('status', 'success');
//         Session::flash('message', 'Edit student success!');
//     }

//     return redirect('/students');
// }
     public function update(Request $request,$id)
    {
        $student = student::findOrFail($id);
        $student->update($request->all());
        return redirect('/students');
    }
    public function delete($id)
    {
        $student = student::findOrFail($id);
        return view('student-delete',['student'=>$student]);
    }
    public function destroy($id)
    {
        $deletedstudent = student::findOrFail($id);
        $deletedstudent->delete();
        if($deletedstudent){
            Session::flash('status','succes');
            Session::flash('message','delete student succes!');
       }
        return redirect('/students');
    }
    public function deletedstudent()
    {
        $deletedstudent=student::onlyTrashed()->get();
        
        return view('student-deleted-list',['student'=>$deletedstudent]);
    }
    public function restore($id)
    {
        $deletedstudent=student::withTrashed()->where('id',$id)->restore();
        if($deletedstudent){
            Session::flash('status','succes');
            Session::flash('message','restore student succes!');
       }
        return redirect('/students');
        
    }

        // dd($student);
        // $nama = 'budi';

        // $nilai = [9.8, 7, 6, 5, 4, 3, 2, 1, 4, 11, 3, 6, 7, 8, 9, 5];
        // dd($nilai);

        // METHOD filter
        // $abc = collect($nilai)->filter(function($value){
        //     return $value > 7;
        // })->all();
        // dd($abc);

        //METHOD pluck
        // $biodata =[
        //     ['nama' => 'budi','umur' => 17],
        //     ['nama' => 'ani','umur' => 16],
        //     ['nama' => 'dewi','umur' => 18],
        //     ['nama' => 'angga','umur' => 20],
        // ];

        //METHOD map

        // $abc = collect($nilai)->map(function ($value) {
        //     return $value * 2;
        // })->all();
        // dd($abc);

        // $nilaikalidua = [];
        // foreach ($nilai as $value){
        //     array_push($nilaikalidua,$value * 2);
        // }
        // dd($nilaikalidua);

        // $abc = collect($biodata)->pluck('umur')->all();
        // dd($abc);

        //contains = untuk cek apakah sebuah array memiliki sesuatu yang sempurna
        // $abc = collect($nilai)->contains(10);
        // dd($abc);

        // $abc = collect($nilai)->contains(function($value){
        //     return $value < 6;
        // });
        // dd($abc);

        //METHOD diff
        // $restaurantA = ["burger","siomay","pizza","spagheti","makaroni","martabak","bakso"];
        // $restaurantB = ["pizza","fried chicken","martabak","sayur asem","pecel lele","bakso"];

        // $menurestoA = collect($restaurantA)->diff($restaurantB);
        // $menurestoB = collect($restaurantB)->diff($restaurantA);
        // dd($menurestoB);

        //php biasa->hitung jumlah nilai,hitung berapa banyak nilai,hitung nilai ratarata

        // $countNilai = count($nilai);
        // $totalNilai =array_sum($nilai);
        // $nilaiRataRata = $totalNilai / $countNilai;
        // dd($nilaiRataRata);

        //collection->hitung ratarata nilai

        // $nilaiRataRata = collect($nilai)->avg();
        // dd($nilaiRataRata);

        //elequent orm(rekomendasi laravel)
        //query builder
        //raw query
        // return view('student',['nama'=> $nama]);

        //query builder

        // $student = DB::table('students')->get();

        // DB::table('students')->insert([
        //     'name' => 'query builder',
        //     'gender' => 'L',
        //     'nis' => '0456734',
        //     'class_id' => 1
        // ]);

        // DB::table('students')->where('id',26)->update([
        //     'name' => 'query builder 2',
        //     'class_id' => 3
        // ]);

        // DB::table('students')->where('id',27)->delete();

        //eloquent
        // student::find(26)->delete();
        // student::find(27)->update ([
        //     'name'=>'eloquent 2',
        //     'class_id'=>2
        // ]);

        // student::create([
        //     'name' => ' eloquent',
        //     'gender' => 'L',
        //     'nis' => '0456794',
        //     'class_id' => 1
        // ]);

        // $student = student::all();
        // dd($student);
        // insert into students ('name','gender','nis','class_id') values (.......);
    
}
