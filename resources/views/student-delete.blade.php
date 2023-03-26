@extends('layouts.mainlayout')

@section('title', 'students')

@section('content')
    <div class="mt-5">
        {{-- {{$student}} --}}
        <h2>Are you sure to delete data : {{$student->name}} ({{$student->nis}}) ??</h2>
        <form style ="display:inline-block" action="/student-destroy/{{$student->id}}" method="post">
            @csrf
            @method('delete')
        <button type="submit" class="btn btn-danger">delete</button>
    </form>
        <a href="/students" class="btn btn-warning">cancel</a>
    </div>
@endsection