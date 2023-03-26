@extends('layouts.mainlayout')

@section('title', 'students-add')

@section('content')

    <div class="mt-5 col-5 m-auto">
                @if ($errors->any())
            <div class="alert alert-warning">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form action="student" method="post" enctype="multipart/form-data">
            @csrf
            <div mb-3>
                <label for="name">Name</label>
                <input type="text" class="form-control" name="name"id="name" >
            </div><br>
            
            <div class="mb-3">
                <label for="gender">Gender</label>
                <select name="gender" id="gender" class="form-control" >
                <option value="">select one</option>
                <option value="L">L</option>
                <option value="P">P</option>
            </select>
            </div>
            <div mb-3>
                <label for="nis">NIS</label>
                <input type="text" class="form-control" name="nis" id="nis" >
            </div><br>
            <div class="mb-3">
                <label for="class">Class</label>
                <select name="class_id" id="gender" class="form-control" >
                <option value="">select one</option>
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
                <button class="btn btn-danger" type="submit">Save</button>
            </div>
        </form>
    </div>
@endsection