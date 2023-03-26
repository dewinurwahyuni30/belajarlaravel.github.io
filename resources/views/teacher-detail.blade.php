@extends('layouts.mainlayout')

@section('title', 'teacher-detail')

@section('content')
<h2>you are currently viewing the details of the named teacher => {{$teacher->name}}</h2>
    <div class="mt-5">
        <h3>
            Class : 
            @if ($teacher->class)
            {{$teacher->class->name}}
                @else
                    -
            @endif
        </h3>
    </div>
    <div class="mt-5">
        <h4>List Student </h4>
        @if ($teacher->class)
        <ol>
            @foreach ($teacher->class->students as $item)
                <li>{{$item->name}}</li>
            @endforeach
        </ol>
            @else
                -
        @endif

    </div>
@endsection