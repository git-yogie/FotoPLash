@include('Auth.login')
<header
    class=" d-flex flex-wrap align-items-center justify-content-center justify-content-md-between py-3 mb-4 container">
    <a href="/" class="d-flex align-items-center col-md-3 mb-2 mb-md-0 text-dark text-decoration-none">
        <h2>FotoPlash</h2>
    </a>

    <ul class="nav nav-pills">
        <li class="nav-item"><a href="{{ route('home') }}"
                class="nav-link  {{ $data['title'] == 'home' ? 'active' : '' }}" aria-current="page">Home</a></li>
        <li class="nav-item"><a href="{{ route('postingan') }}"
                class="nav-link  {{ $data['title'] == 'postingan' ? 'active' : '' }}">Postingan Saya</a></li>
    </ul>

    <div class="col-md-3 text-end">
        @auth
            <div class="dropdown">
                <a class="btn btn-primary dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                    data-bs-toggle="dropdown" aria-expanded="false">
                    {{ Auth::user()->name }}
                </a>

                <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                    <li><a class="dropdown-item " href="{{ route('signOut') }}">Keluar</a></li>
                </ul>
            </div>
        @endauth
        @guest
        <button type="button" class="btn btn-outline-primary me-2"  data-bs-toggle="modal" data-bs-target="#modalSignin">Sign-in</button>
        <a href="{{ route('register') }}" type="button" class="btn btn-primary">Sign-up</a>
        @endguest

    </div>
</header>
