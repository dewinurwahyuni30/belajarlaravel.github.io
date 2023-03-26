@extends('layouts.mainlayout')

@section('title', 'eksul-detail')

@section('content')
    <h2>you are viewing the detailed data of the extracurricular => {{$ekskul->name}}</h2>
    <div class="mt-5">
        <h3>List Peserta</h3>
        <ol>
            @foreach ($ekskul->students as $item)
           <li>{{$item->name}}</li> 
                
            @endforeach
        </ol>
        {{-- {{$ekskul}} --}}
    </div>
@endsection