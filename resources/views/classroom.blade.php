@extends('layouts.mainlayout')

@section('title', 'class')

@section('content')

               <h1>Class Page</h1>
               <div class="my-5 d-flex justify-content-between">
                <a href="class-add" class="btn btn-danger">Add data</a>
                <a href="class-deleted" class="btn btn-light">show deleted data</a>
               </div>
               <h3>Class List</h3>
               <table class="table">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Name</th>
                        <th>Action</th>
                        {{-- <th>Students</th>
                        <th>Homeroom Teacher</th> --}}
                    </tr>
                </thead>
                <tbody>
                    @foreach($classlist as $data)
                    <tr>
                        <td>{{$loop ->iteration}}</td>
                        <td>{{$data->name}}</td>
                        <td>
                            <a href="class-detail/{{$data->id}}" class="btn btn-light">detail</a>
                            <a href="class-edit/{{$data->id}}" class="btn btn-danger">edit</a>
                            
                            @if(Auth::user()->role_id == 1)
                            <a href="class-delete/{{$data->id}}" class="btn btn-light">delete</a>
                            @endif
                        </td>

                        {{-- <td>
                            @foreach($data->Students as $student)
                            - {{$student->name}}<br>
                            @endforeach
                        </td>
                        <td>
                            {{$data->HomeroomTeacher->name}}
                        </td> --}}
                        @endforeach
                    </tr>
                </tbody>
               </table>
@endsection