@extends('layout.app')

@section('title', 'todoリスト')

@section('pageCss')
    <link href="{{ asset('css/layout.css') }}" rel="stylesheet">
@endsection

@section('content')
    <h1>Todoリスト</h1>
    <div class="container">
        <div class="card">
            <div class="card-header">todolist</div>
            <div class="card-body d-flex flex-row">
                <form method="POST" action="{{ route('todos.store') }}">
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
    <div class="container todotable">
        <table class="table table-bordered table table-hover table-sm ">
            <caption>List of todos</caption>
            <thead>
                <tr>
                    <th scope="col">todo</th>
                    <th scope="col">期限</th>
                    <th scope="col">編集・削除</th>
                </tr>
            </thead>
            @foreach ($todos as $todo)
                <tbody>
                    <tr>
                        <th scope="row" class="todo">{{ $todo->todo }}</th>
                        <th>{{ $todo->deadline }}</th>
                        <th>
                            <div class='btn-toolbar' role="toolbar">
                                <a class="btn btn-primary" 　role="button" href="{{ route('todos.edit', ['todo' => $todo]) }}">編集</a>
                                <form method="POST" action="{{ route('todos.destroy', ['todo' => $todo]) }}">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger" 　type="submit">削除する</button>
                                </form>
                            </div>
                        </th>
                    </tr>
                </tbody>
            @endforeach
        </table>

    </div>

@endsection
