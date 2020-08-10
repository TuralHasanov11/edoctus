
<header class="main_menu">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-12">
                <nav class="navbar navbar-expand-lg navbar-light">
                    <a class="navbar-brand" href="/"> <img src="https://00e9e64bac3249d3444c5cadc72169931c89604e2cf75b2479-apidata.googleusercontent.com/download/storage/v1/b/medicusv1.appspot.com/o/images%2Flogo_2.PNG?qk=AD5uMEu_zMxij_4hihzACXfBmjk7SZRSVo3ojb9SPKKnRoHjhZEE0s-mxOxZDtUZwTTRm9p4LEf8RspyQvLPk6V6QmW56KqGPIVrInvm-kylkM9xtQjeMqG6sD4UFAZiODVNT7pMsnpJ6jPVQ11eqGbJGOXXtyCabniiwTrG-gc8w_dm4-SHv8vKnhi72zclceXwNGv_PlJJN6BgK_ac5DReDuu1lzxaDSLosBTP9LDRbjnYXWYv6E1J0RgvxT48rCx5DzGwVsGaXcjSdpeEFgdiZp93Rs4-LJy5SFXKCqA6avztWJnWENVqZInL5WqUfVQjjnbotHhZVgMtncb4GqPNK0jSLmjwUfpDaLttIKGMBWQwJsZN55ulGy31KWPoM5g6MiymLl3oYHebnX9FHJohUVr0395-rLalB3JF5E3UKcT1EM3rEQG-zyn-dZEHw4l-m46JzkvYNDGm-ZKbAJC1Yo_Lc-SINEx_3mXwPH03ZqI3bMkaLXJt3cvF4lduBtB-LAlRabTVfZGpWg0Egc-gaJTqtkxwPIDs3StFmUFJ5F2bBn2QnAqLGk0PjRnMBv6pMnOZfIe0OP6GNRLzJrCXExqvvsmmRw8TSsiXiJwSLinyU6SiIvBr8Y6un8dderZtH1ypGVrDez4DQ3M_XgJEXgQGy2CvVa6-Cuz1HKqgMmVJ8eWWc6z4iDiEruG0nB3XGDw_SUEuhVDl0GkhavZLqtTl7UXnlFrXDHjB6wAGWPywe4fy3wK9bZ5mqxeiNaS4F-Ng8Ao_ePfIVseDXCaeSGlOZVqzp4EKkIe9Lfv8ncWsbWee0C68nhaMIfpZufHspsWCJeoA&isca=1" alt="logo"> </a>
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
                                <a class="nav-link" href="/tests/1">Covid-19 testi</a>
                            </li>
                            <li class="nav-item">
                                
                                <a class="nav-link" href="/chat">
                                    @if (auth()->check() && auth()->user()->role=='d')
                                        İstifadəçilərlə Əlaqə
                                    @else
                                        Həkimlərlə Əlaqə
                                    @endif
                                </a>
                            </li>
                            
                            <li class="nav-item">
                                <a class="nav-link" href="/news">Bloq</a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link" href="/statistics">Statistika</a>
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
