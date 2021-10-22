@extends('layout.app')

@section('title', 'todo編集')

@section('pageCss')
    <link href="{{ asset('css/layout.css') }}" rel="stylesheet">
@endsection

@section('content')

    <div class="container">
        <div class="card">
            <div class="card-header">todolist</div>
            <div class="card-body d-flex flex-row">
                <form method="POST" action="{{ route('todos.update', ['todo' => $todo]) }}">
                    @method('PATCH')
                    @csrf
                    <div class="md-form">
                        <input class="form-control col-8 mr-5" name="todo" type="text">
                        <input class="mr-5" name="deadline" type="date">
                    </div>
                    <button type="submit" class="btn blue-gradient btn-block">投稿する</button>
                </form>
            </div>
        </div>
    </div>
@endsection
