@extends('layout.app')

@section('title', 'todoリスト')

@section('pageCss')
    <link href="{{ asset('css/todo.css') }}" rel="stylesheet">
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
        <table class="table table-bordered table table-hover table-sm">
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
                                <a class="" 　role="button" href="{{ route('todos.edit', ['todo' => $todo]) }}"><i
                                        class="fas fa-edit fa-lg icon_blue fa-border"></i></a>
                                </a>
                                &nbsp;
                                <a class="" data-toggle="modal"
                                    data-target="#modal-delete-{{ $todo->id }}">
                                    <i class="fas fa-trash-alt fa-lg icon_red fa-border"></i>
                                </a>
                            </div>

                            <!-- modal -->
                            <div id="modal-delete-{{ $todo->id }}" class="modal fade" tabindex="-1" role="dialog">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-label="閉じる">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <form method="POST" action="{{ route('todos.destroy', ['todo' => $todo]) }}">
                                            @csrf
                                            @method('DELETE')
                                            <div class="modal-body">
                                                {{ $todo->title }}を削除します。よろしいですか？
                                            </div>
                                            <div class="modal-footer justify-content-between">
                                                <a class="btn btn-outline-grey" data-dismiss="modal">キャンセル</a>
                                                <button type="submit" class="btn btn-danger">削除する</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <!-- modal -->
                        </th>
                    </tr>
                </tbody>
            @endforeach
        </table>
    </div>



@endsection
