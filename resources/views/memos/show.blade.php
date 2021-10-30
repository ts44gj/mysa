@extends('layout.app')

@section('title', 'Memoshowリスト')

@section('pageCss')
    <link href="{{ asset('css/memo.css') }}" rel="stylesheet">
@endsection

@section('content')
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

        </table>
    </div>
        @endsection
