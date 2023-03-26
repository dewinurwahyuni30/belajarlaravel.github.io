@extends('layouts.mainlayout')

@section('title', 'class-add')

@section('content')
<div class="mt-5 col-5 m-auto">
    <form action="class" method="post">
        @csrf
        <div mb-3>
            <label for="name">Name</label>
            <input type="text" class="form-control" name="name"id="name" required>
        </div><br>
        <div class="mb-3">
            <button class="btn btn-warning" type="submit">Save</button>
        </div>
    </form>
</div>
@endsection