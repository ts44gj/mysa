@extends('layout.app')

@section('title', 'Buyリスト')

@section('content')
    <h1>Buyリスト</h1>
    <div class="container">
        <div class="card">
            <div class="card-header">buylist</div>
            <div class="card-body d-flex flex-row">
                <form method="POST" enctype="multipart/form-data" action="{{ route('buys.store') }}">
                    @csrf
                    <div class="md-form">
                        <input class="form-control col-8 mr-5" name="comment" type="comment">
                        <input type="file" name="file">
                        <input class="mr-5" name="day" type="date">
                    </div>
                    <button type="submit" class="btn blue-gradient btn-block">投稿する</button>
                </form>
            </div>
        </div>
    </div>

    <div class="container">
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
@endsection
