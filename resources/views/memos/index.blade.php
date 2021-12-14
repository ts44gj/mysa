@extends('layout.app')

@section('title', 'Memoリスト')

@section('pageCss')
    <link href="{{ asset('css/memo.css') }}" rel="stylesheet">
@endsection

@section('content')
    <h1>Memoリスト</h1>
    <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
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
                                    <buy-tags-input>
                                    </buy-tags-input>
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
            <div class="col-12">
                @foreach ($memos as $memo)
                    @if (Auth::user()->can('view', $memo))
                        <div class="card mt-3">
                            <div class="card-body d-flex flex-row">
                                <i class="fas fa-user-circle fa-3x mr-1"></i>
                                <div>
                                    <div class="font-weight-bold">
                                        {{ $memo->user->name }}
                                    </div>
                                    <div class="font-weight-lighter">
                                        {{ $memo->created_at->format('Y/m/d H:i') }}
                                    </div>
                                </div>
                                <!-- dropdown -->
                                <div class="ml-auto card-text">
                                    <div class="dropdown">
                                        <a data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <button type="button" class="btn btn-link text-muted m-0 p-2">
                                                <i class="fas fa-ellipsis-v"></i>
                                            </button>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-right">
                                            <a class="dropdown-item" href="{{ route('memos.edit', ['memo' => $memo]) }}">
                                                <i class="fas fa-pen mr-1"></i>記事を更新する
                                            </a>
                                            <div class="dropdown-divider"></div>
                                            <a class="dropdown-item text-danger" data-toggle="modal"
                                                data-target="#modal-delete-{{ $memo->id }}">
                                                <i class="fas fa-trash-alt mr-1"></i>記事を削除する
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <!-- dropdown -->
                                <!-- modal -->
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
                                <!-- modal -->
                            </div>
                            <div class="card-body pt-0 pb-2">
                                <h3 class="h4 card-title">
                                    <a class="text-dark" href="{{ route('memos.show', ['memo' => $memo]) }}">
                                        {{ $memo->title }}
                                    </a>
                                </h3>
                                <div class="card-text">
                                    {!! nl2br(e($memo->body)) !!}
                                </div>
                            </div>
                            @foreach ($memo->tags as $tag)
                                @if ($loop->first)
                                    <div class="card-body pt-0 pb-4 pl-3">
                                        <div class="card-text line-height">
                                @endif
                                <a href=""
                                    class="border p-1 mr-1 mt-1 text-muted">
                                    {{ $tag->name }}
                                </a>
                                @if ($loop->last)
                                     </div>
                                    </div>
                                @endif
                            @endforeach
                            </div>
                    @endif
                @endforeach
             </div>
        </div>
    </div>
    {{ $memos->links() }}



@endsection
