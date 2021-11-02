@extends('layout.app')

@section('title', 'Memoshowリスト')

@section('pageCss')
    <link href="{{ asset('css/memo.css') }}" rel="stylesheet">
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
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
                                <a class="dropdown-item" href="{{ route('memos.edit', ['memo' => $memo]) }}">
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
            </div>
        </div>
    </div>
@endsection
