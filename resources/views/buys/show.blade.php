@extends('layout.app')

@section('title', 'Buyshowリスト')

@section('pageCss')
    <link href="{{ asset('css/buy.css') }}" rel="stylesheet">
@endsection

@section('content')
    <div class="col-12 memotable">
        <table class="table table-bordered table table-hover table-sm">
            <caption>List of buys</caption>
            <thead>
                <tr>
                    <th scope="col">タイトル</th>
                    <th scope="col">内容</th>
                    <th scope="col">削除</th>
                </tr>
            </thead>
                <tbody>
                    <tr>
                        <th scope="row" class=""><a class="text-dark" href="{{ route('buys.show', ['buy' => $buy]) }}">{{ $buy->image_title }}</a></th>
                        <th>{{ $buy->day }}</th>
                                <th>
                                    <img src={{ Storage::disk('s3')->url("/{$buy->image_file_name}") }} alt="" width=100px
                                        height=100px></a>
                                </th>
                                <th>
                        <th>
                                <form method="POST" action="{{ route('buys.destroy', ['buy' => $buy]) }}">
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
