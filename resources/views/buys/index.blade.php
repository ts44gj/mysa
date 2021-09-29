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
    <title>todos</title>
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
                <li class="breadcrumb-item"><a href="{{ route('buys.index' ) }}">buylist</a></li>
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
    <form method="POST" action="{{ route('buys.store') }}">
        @csrf
        <div class="md-form">
            <input class="form-control col-8 mr-5" name="text" type="text">
            <input type="file" name="image">
            <input class="mr-5" name="day" type="date">
        </div>
        <button type="submit" class="btn blue-gradient btn-block">投稿する</button>
    </form>
 {{--   @foreach ($buys as $buy)
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
