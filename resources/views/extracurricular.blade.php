@extends('layouts.mainlayout')

@section('title', 'extracurricular')

@section('content')
    <h1>Extracurricular Page</h1>
    <div class="my-5">
        <a href="ekskul-add" class="btn btn-danger">Add data</a>
       </div>
    <h3>Extracurricular List</h3>

    <table class="table">
        <thead>
            <tr>
                <th>No.</th>
                <th>Name</th>
                <th>Action</th>
                {{-- <th>Anggota</th> --}}
            </tr>
        </thead>
        <tbody>
            @foreach($ekskulList as $data)
            <tr>
                <td>{{$loop ->iteration}}</td>
                <td>{{$data->name}}</td>
                <td>
                    <a href="ekskul-detail/{{$data->id}}" class="btn btn-light">detail</a>
                    <a href="student-edit/{{$data->id}}" class="btn btn-danger">edit</a>
                    <a href="student-delete/{{$data->id}}" class="btn btn-light">delete</a>
                
                </td>
                {{-- <td>
                    @foreach ($data->students as $item)
                    - {{$item -> name}}<br>
                        
                    @endforeach
                </td> --}}
            </tr>
            @endforeach
        </tbody>
       </table>

@endsection
