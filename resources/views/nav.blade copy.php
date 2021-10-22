<div id="page-content-wrapper">
    <nav aria-label="breadcrumb" class="navbar navbar-expand-lg navbar-light bg-light border-bottom">
        <div class="container-fluid">
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
        </div>
    </nav>
</div>
 <div class="sidebar" data-color="purple" data-background-color="white">
            <div class="logo"><a href="http://www.creative-tim.com" class="simple-text logo-normal">
                    mysa
                </a></div>
            <div class="sidebar-wrapper">
                <ul class="nav">
                    <li class="nav-item active  ">
                        <a class="nav-link" href="./dashboard.html">
                            <i class="material-icons">dashboard</i>
                            <p>Dashboard</p>
                        </a>
                    </li>
                    <li class="nav-item ">
                        <a class="nav-link" href="./user.html">
                            <i class="material-icons">person</i>
                            <p>User Profile</p>
                        </a>
                    </li>
                    <li class="nav-item ">
                        <a class="nav-link" href="./tables.html">
                            <i class="material-icons">content_paste</i>
                            <p>Table List</p>
                        </a>
                    </li>
                    <li class="nav-item ">
                        <a class="nav-link" href="./typography.html">
                            <i class="material-icons">library_books</i>
                            <p>Typography</p>
                        </a>
                    </li>
                    <li class="nav-item ">
                        <a class="nav-link" href="./icons.html">
                            <i class="material-icons">bubble_chart</i>
                            <p>Icons</p>
                        </a>
                    </li>
                    <li class="nav-item ">
                        <a class="nav-link" href="./map.html">
                            <i class="material-icons">location_ons</i>
                            <p>Maps</p>
                        </a>
                    </li>
                    <li class="nav-item ">
                        <a class="nav-link" href="./notifications.html">
                            <i class="material-icons">notifications</i>
                            <p>Notifications</p>
                        </a>
                    </li>
                    <li class="nav-item ">
                        <a class="nav-link" href="./rtl.html">
                            <i class="material-icons">language</i>
                            <p>RTL Support</p>
                        </a>
                    </li>
                    <li class="nav-item active-pro ">
                        <a class="nav-link" href="./upgrade.html">
                            <i class="material-icons">unarchive</i>
                            <p>Upgrade to PRO</p>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
