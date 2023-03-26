@extends('layouts.mainlayout')

@section('title', 'students')

@section('content')
 

               <h1>Students Page</h1>

               <div class="my-5 d-flex justify-content-between">
                <a href="student-add" class="btn btn-danger">Add data</a>
                <a href="student-deleted" class="btn btn-light">show deleted data</a>
               </div>

               @if(Session::has('status'))
               <div class="alert alert-warning" role="alert">
                {{Session::get('message')}}
              </div>
               @endif

               <h3>Student List</h3>
               <form class="d-flex col-12 col-sm-8 col-md-10" role="search" >
                <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" name="keyword">
                <button class="btn btn-danger" type="submit">Search</button>
            </form>
               <table class="table">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Name</th>
                        <th>Gender</th>
                        <th>NIS</th>
                        <th>Class</th>
                        <th>Action</th>
                    </tr>
                </thead>
                    <tbody>
                        @foreach($studentList as $data)
                        <tr>
                            <td>{{$loop ->iteration}}</td>
                            <td>{{$data->name}}</td>
                            <td>{{$data->gender}}</td>
                            <td>{{$data->nis}}</td>
                            <td>{{$data->class->name}}</td>
                            <td>
                                @if(Auth::user()->role_id != 1 && Auth::user()->role_id != 2)
                                -
                                @else
                                <a href="student/{{$data->id}}" class="btn btn-light">detail</a>
                                <a href="student-edit/{{$data->id}}" class="btn btn-danger">edit</a>
                                @endif
                                @if(Auth::user()->role_id == 1)
                                <a href="student-delete/{{$data->id}}" class="btn btn-light">delete</a>
                                @endif
                                
                            </td>
                            {{-- <td>{{$data ->class['name']}}</td>
                            <td>
                                @foreach ($data->extracurriculars as $item)
                               -  {{$item ->name}}
                                @endforeach
                            </td>
                            <td>{{$data->class->HomeroomTeacher->name}}</td> --}}
                        </tr>
                        @endforeach
                    </tbody>
               </table>
               <div class="my-5">
                {{$studentList->withQueryString()->links()}}
               </div>

           
@endsection