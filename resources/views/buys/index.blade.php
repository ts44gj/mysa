<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
    <!-- Google Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap">
    <!-- Bootstrap core CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/css/bootstrap.min.css" rel="stylesheet">
    <!-- Material Design Bootstrap -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.19.1/css/mdb.min.css" rel="stylesheet">
    <title>buys</title>
</head>

<body>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            @guest
                <li class="breadcrumb-item"><a href="{{ route('register') }}">ユーザー登録</a></li>
                <li class="breadcrumb-item"><a href="{{ route('login') }}">ログイン</a></li>
            @endguest
            @auth
                <li class="breadcrumb-item"><a href="{{ route('top') }}">Home</a></li>
                <li class="breadcrumb-item"><a href="{{ route('todos.index') }}">todo</a></li>
                <li class="breadcrumb-item"><a href="{{ route('buys.index') }}">buylist</a></li>
                <li class="breadcrumb-item"><a href="#">myself</a></li>
                <!-- Dropdown -->
                <li class="breadcrumb-item dropdown">
                    <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink" data-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false">
                    </a>
                    <div class="dropdown-menu dropdown-menu-right dropdown-primary"
                        aria-labelledby="navbarDropdownMenuLink">
                        <button class="dropdown-item" type="button" onclick="location.href=''">
                            マイページ
                        </button>
                        <div class="dropdown-divider"></div>
                        <button form="logout-button" class="dropdown-item" type="submit">
                            ログアウト
                        </button>
                    </div>
                </li>
                <form id="logout-button" method="POST" action="{{ route('logout') }}">
                    @csrf
                </form>
                <!-- Dropdown -->
            @endauth

        </ol>
    </nav>
    <div class="container mt-3">
        <h1>Buyリスト</h1>
    </div>
    <form method="POST" enctype="multipart/form-data" action="{{ route('buys.store') }}">
        @csrf
        <div class="md-form">
            <input class="form-control col-8 mr-5" name="text" type="text">
            <input type="file" name="image">
            <input class="mr-5" name="time" type="date">
        </div>
        <button type="submit" class="btn blue-gradient btn-block">投稿する</button>
    </form>
    {{-- <form action="{{ route('buys.store') }}" method="post" enctype="multipart/form-data">
        @csrf
        <!-- アップロードフォームの作成 -->
        <input type="file" name="image">
        <input type="submit" value="アップロード">
    </form>
    @foreach ($buys as $buy)
        @if ($buy->imagepath)
            <!-- 画像を表示 -->
            <img src="{{ $buy->imagepath }}">
        @endif
    @endforeach --}}
    {{-- @foreach ($buys as $buy)
        <tr>
            <th scope="row" class="todo">{{ $buy->buy }}</th>
            <td>{{ $buy->day }}</td>
            <td><a href="{{ route('todos.edit', ['buy' => $buy]) }}" class="btn btn-primary">編集</a></td>
            <td>
                <form method="POST" action="{{ route('todos.destroy', ['todo' => $todo]) }}">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">削除する</button>
                    </div>
                </form>
            </td>
        </tr>
    @endforeach --}}
    //投稿フォーム
    {!! Form::open(['route' => 'buys.store', 'method' => 'post', 'files' => true]) !!}
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

    {!! Form::close() !!}

@foreach($buys as $buy)
    <div class="card-header text-center">
        <img src= {{ Storage::disk('s3')->url("/{$buy->image_file_name}") }} alt="" width=250px height=250px></a>
    </div>
    <div class="card-body p-1">
        <span class="card-title">{{ $buy->image_title }}</span>
    </div>
    <div class="card-body p-1">
        <span class="card-title">{{ $buy->day }}</span>
    </div>
@endforeach

    <!-- JQuery -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <!-- Bootstrap tooltips -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.4/umd/popper.min.js">
    </script>
    <!-- Bootstrap core JavaScript -->
    <script type="text/javascript"
        src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <!-- MDB core JavaScript -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.19.1/js/mdb.min.js">
    </script>
</body>

</html>
