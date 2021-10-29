@extends('layout.app')

@section('title', 'Memoeditリスト')

@section('pageCss')
    <link href="{{ asset('css/memo.css') }}" rel="stylesheet">
@endsection

@section('content')
    <h1>Memo編集</h1>
    <div class="container">
        <div class=row>
            <div class="col-12">
                <div class="d-flex justify-content-center">
                    <div class="card col-7">
                        <div class="card-header">Memolist</div>
                        <div class="card-body">
                            <form method="POST" action="{{ route('memos.update',['memo'=>$memo]) }}">
                                @csrf
                                <div class="form-group">
                                    <div class=md-form>
                                        <label>タイトル</label>
                                        <input type="text" name="title" class="form-control"
                                            required　value="{{ $memo->title ?? old('title') }}">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <textarea class="form-control" name="body" rows="10" >{{ $memo->body ?? old('title') }}</textarea>
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
