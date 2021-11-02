@extends('layout.app')

@section('title', 'Memoリスト')

@section('pageCss')
    <link href="{{ asset('css/memo.css') }}" rel="stylesheet">
@endsection

@section('content')
    <h1>Memoリスト</h1>
    <div class="container">
        <div class=row>
            <div class="col-12">
                <div class="d-flex justify-content-center">
                    <div class="card col-7">
                        <div class="card-header">Memolist</div>
                        <div class="card-body">
                            <form method="POST" action="{{ route('memos.store') }}">
                                @csrf
                                <div class="form-group">
                                    <div class=md-form>
                                        <label>タイトル</label>
                                        <input type="text" name="title" class="form-control"
                                            requiredvalue="{{ old('title') }}">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <textarea class="form-control" name="body" rows="10"
                                        requiredvalue="{{ old('body') }}"></textarea>
                                </div>
                                <button type="submit" class="btn blue-gradient btn-block">投稿する</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>


            <div class="col-12 memotable">
                <table class="table table-bordered table table-hover table-sm">
                    <caption>List of memos</caption>
                    <thead>
                        <tr>
                            <th scope="col">タイトル</th>
                            <th scope="col">内容</th>
                            <th scope="col">削除</th>
                        </tr>
                    </thead>
                    @foreach ($memos as $memo)
                        <tbody>
                            <tr>
                                <th scope="row" class=""><a class="text-dark" href="{{ route('memos.show', ['memo' => $memo]) }}">{{ $memo->title }}</a></th>
                                <th>{{ $memo->body }}</th>
                                <th>
                                    <div class='btn-toolbar' role="toolbar">
                                        <a class="" href="{{ route('memos.edit', ['memo' => $memo]) }}">
                                            <i class="fas fa-pen mr-1"></i>
                                        </a>
                                        <form method="POST" action="{{ route('memos.destroy', ['memo' => $memo]) }}">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit">
                                                <i class="fas fa-trash-alt"></i>
                                            </button>
                                        </form>
                                    </div>
                                </th>
                                <div class="card">
                                    <div class="card-header">
                                        memo内容
                                    </div>
                                    <div class="card-body">
                                        <h5 class="card-title">{{ $memo->title }}</h5>
                                        <p class="card-text">{{ $memo->body }}</p>
                                        <a href="{{ route('memos.show', ['memo' => $memo]) }}" class="card-link">詳細</a>
                                        <div class="dropdown">
                                            <a data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <i class="fas fa-caret-down"></i>
                                            </a>
                                            <div class="dropdown-menu">
                                                <a class="dropdown-item"
                                                    href="{{ route('memos.edit', ['memo' => $memo]) }}">
                                                    <i class="fas fa-pen mr-1"></i>記事を更新する
                                                </a>
                                                <div class="dropdown-divider"></div>
                                                <a class="dropdown-item" data-toggle="modal"
                                                    data-target="#modal-delete-{{ $memo->id }}">
                                                    <i class="fas fa-trash-alt mr-1"></i>記事を削除する
                                                </a>
                                            </div>
                                        </div>
                                        </a>
                                    </div>
                                </div>
                            </tr>
                        </tbody>
                    @endforeach
                </table>
            </div>

            {{ $memos->links() }}
            <!-- モーダル -->
            <div id="modal-delete-{{ $memo->id }}" class="modal fade" tabindex="-1" role="dialog">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="閉じる">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form method="POST" action="{{ route('memos.destroy', ['memo' => $memo]) }}">
                            @csrf
                            @method('DELETE')
                            <div class="modal-body">
                                {{ $memo->title }}を削除します。よろしいですか？
                            </div>
                            <div class="modal-footer justify-content-between">
                                <a class="btn btn-outline-grey" data-dismiss="modal">キャンセル</a>
                                <button type="submit" class="btn btn-danger">削除する</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <!-- モーダル -->
        </div>
    </div>
@endsection
