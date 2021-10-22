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

    {{-- {!! Form::open(['route' => 'buys.store', 'method' => 'post', 'files' => true]) !!}
    <div class="form-group">
        {!! Form::label('file', '画像投稿', ['class' => 'control-label']) !!}
        {!! Form::file('file') !!}
    </div>
    <div class="form-group m-0">
        {!! Form::label('textarea', '投稿コメント', ['class' => 'control-label']) !!}
        {!! Form::textarea('comment', null, ['class' => 'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('day', '日時', ['class' => 'control-label']) !!}
        {{ Form::date('day', null, ['class'=>'form-control']) }}
    </div>
    <div class="form-group text-center">
        {!! Form::submit('投稿', ['class' => 'btn btn-primary my-2']) !!}
    </div>

    {!! Form::close() !!} --}}
    <div class="container">
        <div class="card">
            @foreach ($buys as $buy)
                <div class="card-header text-center">
                    <img src={{ Storage::disk('s3')->url("/{$buy->image_file_name}") }} alt="" width=250px
                        height=250px></a>
                </div>
                <div class="card-body p-1">
                    <span class="card-title">{{ $buy->image_title }}</span>
                </div>
                <div class="card-body p-1">
                    <span class="card-title">{{ $buy->day }}</span>
                </div>
            @endforeach
        </div>
    </div>
@endsection
