@extends('layouts.main')
@section("container")

<div class="col-lg-4">
    @if(session('successs'))
    <div class="alert-success">
        <p> {{ session('success') }}</p>
    </div>
@endif
@if ($errors->any())
<div class="alert-danger">
    <ul>
        @foreach ($errors->all() as $error)
        <li>
            {{ $error }}
        </li>
        @endforeach
    </ul>
</div>
@endif

<form action="{{ url('todo',$todo->id) }}" method="POST">
    @csrf
    @method("PUT")
    <div class="input-group mb-3">
    <input name="task" type="text" class="form-control" value="{{ $todo->task }}" placeholder="Add your task">
    <button class="btn btn-outline-warning" type="submit"> Edit </button>
    </div>
</form>
</div>

@endsection