@extends('layouts.mainlayout')

@section('title', 'class-detail')

@section('content')
    <h2>you are viewing the detailed data of the class => {{$class->name}}</h2>
    <div class="mt-5">
        <h4>Homeroom Teacher : {{$class->HomeroomTeacher->name}}</h4>
    </div>
    <div class="mt-5">
        <h4>List Student</h4>
        <ol>
            @foreach ($class->students as $item)
           <li>{{$item->name}}</li> 
                
            @endforeach
        </ol>

    </div>
    {{-- {{$class}} --}}
@endsection