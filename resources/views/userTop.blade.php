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
                    <div class="card card-stats">
                        <div class="card-header card-header-warning card-header-icon">
                            <div class="card-icon">
                                <i class="material-icons">content_copy</i>
                            </div>
                            <p class="card-category">Used Space</p>
                            <h3 class="card-title">49/50
                                <small>GB</small>
                            </h3>
                        </div>
                        <div class="card-footer">
                            <div class="stats">
                                <i class="material-icons text-danger">warning</i>
                                <a href="javascript:;">Get More Space...</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="card card-chart">
                        <div class="card-header card-header-danger">
                            <div class="ct-chart" id="completedTasksChart"></div>
                        </div>
                        <div class="card-body">
                            <h4 class="card-title">Completed Tasks</h4>
                            <p class="card-category">Last Campaign Performance</p>
                        </div>
                        <div class="card-footer">
                            <div class="stats">
                                <i class="material-icons">access_time</i> campaign sent 2 days ago
                            </div>
                        </div>
                    </div>
                </div>
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
                                            <tbody>
                                                <tr>
                                                    <th scope="row" class="todo">{{ $todo->todo }}</th>
                                                    <th>{{ $todo->deadline }}</th>
                                                </tr>
                                            </tbody>
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
                                <div class="card">
                                    <tbody>
                                        @auth
                                            @foreach ($buys as $buy)
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
