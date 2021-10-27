@extends('layout.app')

@section('title', 'todo編集')

@section('pageCss')
    <link href="{{ asset('css/layout.css') }}" rel="stylesheet">
@endsection

@section('content')
    <h1>Todo編集</h1>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="d-flex justify-content-center">
                    <div class="card col-7">
                        <div class="card-header">todolist</div>
                        <div class="card-body">
                            <form method="POST" action="{{ route('todos.update', ['todo' => $todo]) }}">
                                @method('PATCH')
                                @csrf
                                <div class="form-group">
                                    <input class="form-control" name="todo" type="text"
                                        required　value="{{ $todo->todo ?? old('title') }}">
                                </div>
                                <div class="form-group">
                                    <input class="form-control" name="deadline" type="date"
                                        required　value="{{ $todo->deadline ?? old('deadline') }}">
                                </div>
                                <button type="submit" class="btn blue-gradient btn-block">投稿する</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
