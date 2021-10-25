@extends('layout.app')

@section('title', 'morningリスト')

@section('pageCss')
    <link href="{{ asset('css/todo.css') }}" rel="stylesheet">
@endsection

@section('content')
    <h1>Morningリスト</h1>
    <div class="container">
        <div class="card">
            <div class="card-header">morninglist</div>
            <div class="card-body d-flex flex-row">
                <form method="POST" action="{{ route('mornings.store') }}">
                    @csrf
                    <div class="md-form">
                        <input class="mr-5" name="time" type="time">
                    </div>
                    <button type="submit" class="btn blue-gradient btn-block">投稿する</button>
                </form>
            </div>
        </div>
    </div>

    <div class="container">
        @foreach ($mornings as $morning)
            <div class="card-header text-center">
                <span class="card-title">{{ $morning->time }}</span>
            </div>
            <div class="card-body p-1">
                <span class="card-title">{{ $morning->day }}</span>
            </div>
            <div class='btn-toolbar' role="toolbar">
                <form method="POST" action="{{ route('mornings.destroy', ['morning' => $morning]) }}">
                    @csrf
                    @method('DELETE')
                    <button type="submit">
                        <i class="fas fa-trash-alt"></i>
                    </button>
            </div>
        @endforeach
    </div>
@endsection
