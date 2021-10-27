@extends('layout.app')

@section('title', 'Buyリスト')

@section('pageCss')
    <link href="{{ asset('css/buy.css') }}" rel="stylesheet">
@endsection

@section('content')
    <h1>Buyリスト</h1>
    <div class="container">
        <div class=row>
            <div class="col-12">
                <div class="d-flex justify-content-center">
                    <div class="card col-7">
                        <div class="card-header">buylist</div>
                        <div class="card-body">
                            <form method="POST" enctype="multipart/form-data" action="{{ route('buys.store') }}">
                                @csrf
                                <div class="form-group">
                                        <input class="form-control text-right" name="comment" type="text" placeholder="商品">
                                </div>
                                <div class="form-group">
                                    <input class="form-control-file" type="file" name="file">
                                </div>
                                <div class="form-group">
                                    <input class="form-control" type="date" name="day">
                                </div>
                                <button type="submit" class="btn blue-gradient btn-block">投稿する</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-12 buytable">
                <div class="card">
                    @foreach ($buys as $buy)
                        <div class="card-header text-center">
                            <span class="card-title">{{ $buy->image_title }}</span>
                        </div>
                        <div class="card-body p-1">
                            <img src={{ Storage::disk('s3')->url("/{$buy->image_file_name}") }} alt="" width=250px
                                height=250px></a>
                        </div>
                        <div class="card-body p-1">
                            <span class="card-title">{{ $buy->day }}</span>
                        </div>
                        <div class='btn-toolbar' role="toolbar">
                            <form method="POST" action="{{ route('buys.destroy', ['buy' => $buy]) }}">
                                @csrf
                                @method('DELETE')
                                <button type="submit">
                                    <i class="fas fa-trash-alt"></i>
                                </button>
                            </form>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    @endsection
