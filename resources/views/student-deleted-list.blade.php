@extends('layouts.mainlayout')

@section('title', 'students')

@section('content')
<h1>List of deleted students</h1>
<div class="my-5">
    <a href="/students" class="btn btn-warning">Back</a>
   </div>
<div class="mt-5">
    <table class="table">
        <thead>
            <tr>
                <th>No.</th>
                <th>Name</th>
                <th>Gender</th>
                <th>NIS</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($student as $data)
            <tr>
                <td>{{$loop->iteration}}</td>
                <td>{{$data->name}}</td>
                            <td>{{$data->gender}}</td>
                            <td>{{$data->nis}}</td>
                            <td>
                                <a href="/student/{{$data->id}}/restore" class="btn btn-danger">Restore</a>
                            </td>
            </tr>
                
            @endforeach
        </tbody>
    </table>

</div>
@endsection