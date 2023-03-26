@extends('layouts.mainlayout')

@section('title', 'students')

@section('content')
{{-- {{$student}}
<br>
<br>
{{$class}} --}}
<div class="mt-5 col-5 m-auto">
    <form action="/student/{{$student->id}}" method="post">
        @csrf
        @method('PUT')
        <div mb-3>
            <label for="name">Name</label>
            <input type="text" class="form-control" name="name"id="name" value="{{$student->name}}"required>
        </div><br>
        
        <div class="mb-3">
            <label for="gender">Gender</label>
            <select name="gender" id="gender" class="form-control" required>
                <option value="{{$student->gender}}">{{$student->gender}}</option>
                @if ($student->gender == 'L')
                <option value="P">P</option>
                    @else
                    <option value="L">L</option>
                @endif
        </select>
        </div>
        <div mb-3>
            <label for="nis">NIS</label>
            <input type="text" class="form-control" name="nis" id="nis" value="{{$student->nis}}" required>
        </div><br>
        <div class="mb-3">
            <label for="class">Class</label>
            <select name="class_id" id="gender" class="form-control" required>
                <option value="{{$student->class->id}}">{{$student->class->name}}</option>
                @foreach ($class as $item)
                <option value="{{$item->id}}">{{$item->name}}</option>
                @endforeach
        </select>
        </div>
        <div class="mb-3">
            <label for="photo">Photo</label>
            <div class="input-group">
                <input type="file" class="form-control" id="photo"  name="photo">
              </div>
        </div>
        <div class="mb-3">
            <button class="btn btn-danger" type="submit">Update</button>
        </div>
    </form>
</div>
@endsection