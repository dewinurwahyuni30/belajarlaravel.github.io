@extends('layouts.mainlayout')
@section('title', 'class')
@section('content')


<h1>List of deleted class</h1>

<div class="my-5">
    <a href="/class" class="btn btn-warning">Back</a>
   </div>
<div class="mt-5">
    <table class="table">
        <thead>
            <tr>
                <th>No.</th>
               <th>CLASS</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($class as $data)
            <tr>
                <td>{{$loop->iteration}}</td>
                <td>{{$data->name}}</td>
                            <td>
                                <a href="/class/{{$data->id}}/restore" class="btn btn-danger">Restore</a>
                            </td>
            </tr>
                
            @endforeach
        </tbody>
    </table>

</div>
@endsection