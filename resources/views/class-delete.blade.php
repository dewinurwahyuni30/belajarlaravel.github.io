@extends('layouts.mainlayout')

@section('title', 'students')

@section('content')
    <div class="mt-5">
        {{-- {{$student}} --}}
        <h2>Are you sure to delete data : {{$class->name}}??</h2>
        <form style ="display:inline-block" action="/class-destroy/{{$class->id}}" method="post">
            @csrf
            @method('delete')
        <button type="submit" class="btn btn-danger">delete</button>
    </form>
        <a href="/class" class="btn btn-warning">cancel</a>
    </div>
@endsection