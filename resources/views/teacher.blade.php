@extends('layouts.mainlayout')

@section('title', 'teachers')

@section('content')

               <h1>Teacher Page</h1>
               <div class="my-5">
                <a href="teacher-add" class="btn btn-danger">Add data</a>
               </div>
               <h3>Teacher List</h3>

               <table class="table">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Name</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($teacherList as $item)
                    <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>{{$item->name}}</td>
                        <td>
                            <a href="teacher-detail/{{$item->id}}" class="btn btn-light">detail</a>
                            <a href="student-edit/{{$item->id}}" class="btn btn-danger">edit</a>
                                <a href="student-delete/{{$item->id}}" class="btn btn-light">delete</a>
                        
                        </td>
                    </tr>
                        
                    @endforeach
                </tbody>
               </table>
@endsection