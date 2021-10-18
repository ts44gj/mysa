@extends('layout.app')

@section('title','todoリスト')

@section('content')
<div class="container mt-3">
        <h1>Todoリスト</h1>
    </div>
    <form method="POST" action="{{ route('todos.store') }}">
        @csrf
        <div class="md-form">
            <input class="form-control col-8 mr-5" name="todo" type="text">
            <input class="mr-5" name="deadline" type="date">
        </div>
        <button type="submit" class="btn blue-gradient btn-block">投稿する</button>
    </form>
    @foreach ($todos as $todo)
        <tr>
            <th scope="row" class="todo">{{ $todo->todo }}</th>
            <td>{{ $todo->deadline }}</td>
            <td><a href="{{ route('todos.edit', ['todo' => $todo]) }}" class="btn btn-primary">編集</a></td>
            <td>
                <form method="POST" action="{{ route('todos.destroy', ['todo' => $todo]) }}">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">削除する</button>
                    </div>
                </form>
            </td>
        </tr>
    @endforeach

@endsection
