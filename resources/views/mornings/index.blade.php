@extends('layout.app')

@section('title', 'morningリスト')

@section('pageCss')
    <link href="{{ asset('css/morning.css') }}" rel="stylesheet">
@endsection

@section('content')
    <h1>Morningリスト</h1>
     <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
    <div class="container">
        <div class=row>
            <div class="col-12">
                <div class="d-flex justify-content-center">
                    <div class="card col-7">
                        <div class="card-header">morninglist</div>
                        <div class="card-body">
                            <form method="POST" action="{{ route('mornings.store') }}">
                                @csrf
                                <div class="form-group">
                                    <input class="mr-5" name="time" type="time">
                                </div>
                                <button type="submit" class="btn blue-gradient btn-block">投稿する</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!--  <div class="col-12 morningtable">
                    @foreach ($mornings as $morning)
                        <div class="card-header text-center">
                            <span class="card-title">{{ $morning->time }}</span>
                        </div>
                        <div class="card-body p-1">
                            <span class="card-title">{{ $morning->day }}</span>
                        </div>
                        <div class='btn-toolbar' role="toolbar">
                            <form method="POST" action="{{ route('mornings.destroy', ['morning' => $morning]) }}">
                                @csrf
                                @method('DELETE')
                                <button type="submit">
                                    <i class="fas fa-trash-alt"></i>
                                </button>
                        </div>
                    @endforeach
                </div> -->
            <div class="col-12 morningtable">
                <table class="table table-bordered table table-hover table-sm">
                    <caption>List of mornings</caption>
                    <thead>
                        <tr>
                            <th scope="col">todo</th>
                            <th scope="col">期限</th>
                        </tr>
                    </thead>
                    @foreach ($mornings as $morning)
                        @if (Auth::user()->can('view', $morning))
                            <tbody>
                                <tr>
                                    <th scope="row" class="todo">{{ substr($morning->time, 0, 5) }}</th>
                                    <th>{{ $morning->day }}</th>
                                    <th>
                                        <div class='btn-toolbar' role="toolbar">
                                            <form method="POST"
                                                action="{{ route('mornings.destroy', ['morning' => $morning]) }}">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit">
                                                    <i class="fas fa-trash-alt"></i>
                                                </button>
                                        </div>
                                    </th>
                                </tr>
                            </tbody>
                        @endif
                    @endforeach
                </table>
            </div>
        </div>
    </div>
@endsection
