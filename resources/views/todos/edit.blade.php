@extends('layout.app')

@section('title', 'todo編集')

@section('content')

    <form method="POST" action="{{ route('todos.update', ['todo' => $todo]) }}">
        @method('PATCH')
        @csrf
        <div class="md-form">
            <input class="form-control col-8 mr-5" name="todo" type="text">
            <input class="mr-5" name="deadline" type="date">
        </div>
        <button type="submit" class="btn blue-gradient btn-block">投稿する</button>
    </form>

@endsection
