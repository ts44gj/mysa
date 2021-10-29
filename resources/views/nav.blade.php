<div id="page-content-wrapper">
    <nav class="navbar navbar-expand-lg navbar-light bg-warning">
        @guest
            <a class="navbar-brand" href="{{ route('top') }}">mysa</a>
        @endguest
        @auth
            <a class="navbar-brand" href="{{ route('userTop') }}">mysa</a>
        @endauth
        <div class="">
            <ul class="navbar-nav">
                @guest
                    <li class="nav-item active"><a class="nav-link" href="{{ route('register') }}">ユーザー登録</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('login') }}">ログイン</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('top') }}">Home</a></li>
                @endguest
                @auth
                    <li class="nav-item active"><a class="nav-link" href="{{ route('userTop') }}">Home</a></li>
                    <li class="nav-item "><a class="nav-link" href="{{ route('todos.index') }}">todo</a></li>
                    <li class="nav-item "><a class="nav-link" href="{{ route('buys.index') }}">buylist</a></li>
                    <li class="nav-item "><a class="nav-link" href="{{ route('mornings.index') }}">morninglist</a></li>
                    <li class="nav-item "><a class="nav-link" href="{{ route('memos.index') }}">memolist</a></li>
                    <li class="nav-item "><a class="nav-link" href="#">myself</a></li>
                    <!-- Dropdown -->
                    <li class="dropdown nav-item">
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
            </ul>

        </div>
    </nav>
</div>
