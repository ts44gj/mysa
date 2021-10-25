@extends('layout.app')

@section('title', 'ログイン')

@section('content')
    <div class="container-fluid">
        <div class=row>
            <div class="mx-auto col col-12 col-sm-11 col-md-9 col-lg-7 col-xl-6">
                <div class="card">
                    <div class="card-header">
                        ユーザー登録
                    </div>
                    <div class="card-body">
                        @include('error_card_list')
                        <form method="POST" action="{{ route('login') }}">
                            @csrf
                            <div class="form-grop">
                                <label for="name">メールアドレス</label>
                                <input class="form-control" type="email" id="email" name="email">
                            </div>
                            <div class="form-grop">
                                <label for="name">パスワード</label>
                                <input class="form-control" type="password" id="passward" name="password">
                            </div>
                            <input type="hidden" name="remember" id="remember" value="on">
                            <button class="btn" type="submit">login</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
