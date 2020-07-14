
<header class="main_menu">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-12">
                <nav class="navbar navbar-expand-lg navbar-light">
                    <a class="navbar-brand" href="/"> <img src="/storage/images/logo5.png" alt="logo"> </a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse"
                        data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <div class="collapse navbar-collapse main-menu-item justify-content-center"
                        id="navbarSupportedContent">
                        <ul class="navbar-nav align-items-center">
                            <li class="nav-item active">
                                <a class="nav-link" href="/">Əsas Səhifə</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="/tests">Testlər</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="/chat">Chat</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="/doctors">Həkimlər</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="/news">Bloq</a>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="/posts" id="navbarDropdown_1"
                                    role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Forum
                                </a>
                                <div class="dropdown-menu" aria-labelledby="navbarDropdown_1">
                                    <a class="dropdown-item" href="/posts">Forum</a>
                                    @can('create', App\Post::class)
                                        <a class="dropdown-item" href="/posts/create">Post paylaş</a>
                                    @endcan
                                </div>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="/about">Haqqımızda</a>
                            </li>
                        </ul>
                        <ul class="navbar-nav align-items-md-center ml-md-auto" style="font-size: 1rem">
                            <!-- Authentication Links -->
                            @guest
                                <li class="nav-item mx-1">
                                    <a class="btn btn_2 text-light" href="{{ route('login') }}">Daxil ol</a>
                                </li>
                                @if (Route::has('register'))
                                    <li class="nav-item mx-1">
                                        <a class="btn btn_2 text-light" href="{{ route('register') }}">Qeydiyyatdan keç</a>
                                    </li>
                                @endif
                            @else
                                <li class="nav-item dropdown">
                                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                        {{ Auth::user()->name }} <span class="caret"></span>
                                    </a>
    
                                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                        @if (Auth::user()->role==='a')
                                            <a class="dropdown-item" href="/admin">
                                                Admin paneli
                                            </a>
                                        @endif
                                        
                                        <a class="dropdown-item" href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                            document.getElementById('logout-form').submit();">
                                            <button class="btn btn-danger">Hesabdan ayrıl</button>
                                        </a>
                                        
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            @csrf
                                        </form>
                                    </div>
                                </li>
                            @endguest
                        </ul>
                    </div>
                    
                </nav>
            </div>
        </div>
    </div>
</header>
