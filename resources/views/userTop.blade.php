@extends('layout.app')

@section('title', 'トップ')

@section('content')
    <div id="aaa">
        <p>ここはトップページです</p>
    </div>
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-header card-header-tabs card-header-primary">
                            <div class="nav-tabs-navigation">
                                <div class="nav-tabs-wrapper">
                                    <span class="nav-tabs-title">todo</span>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="container todotable">
                                <table class="table table-bordered table table-hover table-sm ">
                                    <caption>List of todos</caption>
                                    <thead>
                                        <tr>
                                            <th scope="col">todo</th>
                                            <th scope="col">期限</th>
                                        </tr>
                                    </thead>
                                    @auth
                                        @foreach ($todos as $todo)
                                            @if (Auth::user()->can('view', $todo))
                                                <tbody>
                                                    <tr>
                                                        <th scope="row" class="todo">{{ $todo->todo }}</th>
                                                        <th>{{ $todo->deadline }}</th>
                                                    </tr>
                                                </tbody>
                                            @endif
                                        @endforeach
                                    @endauth
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-header card-header-warning">
                            <h4 class="card-title">buylist</h4>
                        </div>
                        <div class="card-body table-responsive">
                            <table class="table table-hover">
                                <caption>List of buys</caption>
                                <div class="card">
                                    <tbody>
                                        @auth
                                            @foreach ($buys as $buy)
                                                @if (Auth::user()->can('view', $buy))
                                                    <tr>
                                                        <th>
                                                            <div class="card-body p-1">
                                                                <span class="card-title">{{ $buy->image_title }}</span>
                                                            </div>
                                                            <div class="card-body p-1">
                                                                <span class="card-title">{{ $buy->day }}</span>
                                                            </div>
                                                        </th>
                                                    </tr>
                                                @endif
                                            @endforeach
                                        @endauth
                                    </tbody>
                                </div>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-header card-header-warning">
                            <h4 class="card-title">Morningist</h4>
                        </div>
                        <div class="card-body table-responsive">
                            <table class="table table-hover">
                                <caption>List of mornings</caption>
                                <div class="card">
                                    <tbody>
                                        @auth
                                            @foreach ($mornings as $morning)
                                                @if (Auth::user()->can('view', $morning))
                                                    <tr>
                                                        <th>
                                                            <div class="card-body p-1">
                                                                <span class="card-title">{{ $morning->time }}</span>
                                                            </div>
                                                            <div class="card-body p-1">
                                                                <span class="card-title">{{ $morning->day }}</span>
                                                            </div>
                                                        </th>
                                                    </tr>
                                                @endif
                                            @endforeach
                                        @endauth
                                    </tbody>
                                </div>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-header card-header-warning">
                            <h4 class="card-title">memolist</h4>
                        </div>
                        <div class="card-body table-responsive">
                            <table class="table table-hover">
                                <caption>List of memos</caption>
                                <div class="card">
                                    <tbody>
                                        @auth
                                            @foreach ($memos as $memo)
                                                @if (Auth::user()->can('view', $memo))
                                                    <tr>
                                                        <th>
                                                            <div class="card-body p-1">
                                                                <span class="card-title">{{ $memo->title }}</span>
                                                            </div>
                                                            <div class="card-body p-1">
                                                                <span class="card-title">{{ $memo->body }}</span>
                                                            </div>
                                                        </th>
                                                    </tr>
                                                @endif
                                            @endforeach
                                        @endauth
                                    </tbody>
                                </div>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
