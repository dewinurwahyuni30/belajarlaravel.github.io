@extends('layouts.mainlayout')

@section('title', 'Class')

@section('content')
{{-- {{$student}}
<br>
<br>
{{$class}} --}}
 
  
<div class="mt-5 col-5 m-auto">
    <form action="/class/{{$class->id}}" method="post">
        @csrf
        @method('PUT')
        <div mb-3>
            <label for="name">Class</label>
            <input type="text" class="form-control" name="name"id="name" value="{{$class->name}}"required>
        </div>
        <div class="mt-3">
            <button class="btn btn-danger" type="submit">Update</button>
        </div>
    </form>
</div>
 
@endsection