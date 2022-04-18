@if (session('success'))
<div class="alert-success">
    <p>
      {{session('success') }}   
    </p>
</div>
@endif

@if ($errors->any())
<div class="alert-danger">
    <ul>
        @foreach ($errors->all() as $error)
        <li> {{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif

@extends('layouts.main')
@section("container")



<div class="col-lg-4">
@foreach ($user as $nama)
<center>  <h1> Hello {{ $nama->name }}, This is Todo App!</h1> </center>
@endforeach
<form action="{{ url('todo') }}" method="POST"> 
    @csrf
    <div class="input-group mb-3">
        <input name="task" type="text" class="form-control" placeholder="Add your task">
        <button class="btn btn-outline-secondary" type="submit"> Add </button>
    </div>
</form>


<ul class="list-group">
    @foreach ($todos as $todo)
    <li class="list-group-item d-flex justify-content-between align-items-center">
        <p style="with: 150px; margin: 0;"> {{$todo->task}}</p>
        <div class="row">
            <div class="col">
                <a href="todo/{{$todo->id}}/edit" class="btn btn-warning">Edit</a>
            </div>
           
            <div class="col">
                <form action="{{ url("todo", $todo->id) }}" method="POST"> 
                    @csrf
                    @method("Delete")
                <button class="btn btn-danger"> Hapus </button>
                </div>
                </form>
            </div>
        </li>
        @endforeach
    </ul>
    <div class="col">
                <a href="/dashboard" class="btn btn-primary">Back</a>
            </div>
</div>
</div>

@endsection