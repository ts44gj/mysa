@extends('layout.app')

@section('title', 'ユーザ登録')

@section('content')
    <div class="container-fluid">
        <div class=row>
            <div class="mx-auto col col-12 col-sm-11 col-md-9 col-lg-7 col-xl-6">
                <div class="card">
                    <div class="card-header">
                        ユーザー登録
                    </div>
                    @include('error_card_list')
                    <form method="POST" action="{{ route('register') }}">
                        @csrf
                        <div class="form-grop">
                            <label for="name">名前</label>
                            <input class="form-control" type="text" id="name" name="name">
                            <small>3文字以上で入力してください(登録後の変更はできません)</small>
                        </div>
                        <div class="form-grop">
                            <label for="name">メールアドレス</label>
                            <input class="form-control" type="email" id="email" name="email">
                        </div>
                        <div class="form-grop">
                            <label for="name">パスワード</label>
                            <input class="form-control" type="password" id="passward" name="password">
                        </div>
                        <div class="form-grop">
                            <label for="name">パスワード（確認）</label>
                            <input class="form-control" type="password" id="password_confirmation"
                                name="password_confirmation">
                        </div>
                        <button class="btn" type="submit">submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
