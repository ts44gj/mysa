
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            @guest
                <li class="breadcrumb-item"><a href="{{ route('register') }}">ユーザー登録</a></li>
                <li class="breadcrumb-item"><a href="{{ route('login') }}">ログイン</a></li>
                <li class="breadcrumb-item"><a href="{{ route('top') }}">Home</a></li>
            @endguest
            @auth
                <li class="breadcrumb-item"><a href="{{ route('top') }}">Home</a></li>
                <li class="breadcrumb-item"><a href="{{ route('todos.index') }}">todo</a></li>
                <li class="breadcrumb-item"><a href="{{ route('buys.index') }}">buylist</a></li>
                <li class="breadcrumb-item"><a href="#">myself</a></li>
                <!-- Dropdown -->
                <li class="breadcrumb-item dropdown">
                    <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true"
                        aria-expanded="false">
                    </a>
                    <div class="dropdown-menu dropdown-menu-right dropdown-primary" aria-labelledby="navbarDropdownMenuLink">
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
<div class="d-flex" id="wrapper">
            <!-- Sidebar-->
            <div class="border-end bg-white" id="sidebar-wrapper">
                <div class="sidebar-heading border-bottom bg-light">Start Bootstrap</div>
                <div class="list-group list-group-flush">
                    <a class="list-group-item list-group-item-action list-group-item-light p-3" href="#!">Dashboard</a>
                    <a class="list-group-item list-group-item-action list-group-item-light p-3" href="#!">Shortcuts</a>
                    <a class="list-group-item list-group-item-action list-group-item-light p-3" href="#!">Overview</a>
                    <a class="list-group-item list-group-item-action list-group-item-light p-3" href="#!">Events</a>
                    <a class="list-group-item list-group-item-action list-group-item-light p-3" href="#!">Profile</a>
                    <a class="list-group-item list-group-item-action list-group-item-light p-3" href="#!">Status</a>
                </div>
            </div>
