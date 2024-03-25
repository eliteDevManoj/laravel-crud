<div class="home text-center text-white d-flex mx-auto flex-column">
    <header class="home-header">
        <div>
            <h3 class="float-md-start mb-0">{{ config('app.name', 'Laravel') }}</h3>
            <nav class="nav nav-masthead justify-content-center float-md-end">
                <a class="nav-link nav-link-active" aria-current="page" href="#">Home</a>
                <a class="nav-link" href="#">Features</a>
                <a class="nav-link" href="#">Contact</a>

                @guest
                        @if (Route::has('login'))
                            <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                        @endif

                        @if (Route::has('register'))
                            <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                        @endif
                    @else
                        <a class="dropdown" href="#">
                            <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button" aria-expanded="false">
                                {{ Auth::user()->name }}
                            </a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="#">Action</a></li>
                                <li>
                                    <a class="dropdown-item" href="{{ route('register') }}"
                                        onclick="event.preventDefault();
                                        document.getElementById('logout-form').submit();">
                                        logout
                                    </a>
                                </li>
                            </ul>
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                        </form>
                @endguest
            </nav>
        </div>
    </header>

    <div class="container d-flex">