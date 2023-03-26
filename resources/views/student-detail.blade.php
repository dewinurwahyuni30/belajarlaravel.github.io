@extends('layouts.mainlayout')

@section('title', 'students-detail')

@section('content')
<div class="mt-5">
<div class="card">
    <div class="container">
        <div class="card-body">
<center>
 <div class="card-header"> 
    <h2>you are viewing the details of the named student => {{$student->name}}</h2>
 </div>
</center>
    <div class="my-3 d-flex justify-content-center">
        @if ($student->image !='')
        <img src="{{asset('storage/photo/'.$student->image)}}" alt="" width="200px">
        @else
        <img src="{{asset('images/images.png')}}" alt="" width="200px">
            
        @endif

    </div>
    <div class="mt-5 mb-5">
    <table class="table table-bordered">
        <tr>
            <th>NIS</th>
            <th>Gender</th>
            <th>Class</th>
            <th>Homeroom Teacher</th>
        </tr>
        <tr>
            <td>{{$student->nis}}</td>
            <td>
                @if ($student->gender=='P')
                    Perempuan
                    @else
                    Laki Laki
                @endif
            </td>
            <td>{{$student->class->name}}</td>
            <td>{{$student->class->HomeroomTeacher->name}}</td>
        </tr>

    </table>
</div>
<div>
    <h3>Extracurricular</h3>
    <ol>
        @foreach ($student->extracurriculars as $item)
        <li>
            {{$item ->name}}
        </li>
        
    @endforeach
    </ol>
    <a href="/students" class="btn btn-danger">Back</a>
</div>
        </div>
    </div>
</div>
</div>

    {{-- {{$student}} --}}
    <style>
        th{
            width: 25%;
        }
    </style>
@endsection
