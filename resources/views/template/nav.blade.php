@include('Auth.login')
<nav class="navbar bg-light sticky-bottom">
    <div class="container">
        <a href="{{ route('home') }}"
            class="d-flex align-items-center justify-content-start col-md-6 mb-md-0 text-dark text-decoration-none">
            <img src="{{ asset('assets/fs/sm.png') }}" class="" style="width: 32px;" alt="" srcset="">
            <h2 class="pl-2"> FotoPlash</h2>
        </a>
        <div class="d-flex align-items-baseline">
            @guest
                <button type="button" class="btn btn-outline-primary me-2" data-bs-toggle="modal"
                    data-bs-target="#modalSignin">Sign-in</button>
                <a href="{{ route('register') }}" type="button" class="btn btn-primary">Sign-up</a>
            @endguest
            @auth
                <a href="{{ route('home') }}" class="text-decoration-none text-dark  mx-2">
                    <h2><i class="bi bi-house-door{{ $data['title'] == 'home' ? '-fill' : '' }}"></i></h2>
                </a>
                <a href="{{ '/foto/create' }}" class="text-decoration-none text-dark  mx-2">
                    <h2><i class="bi bi-plus-square{{ $data['title'] == 'postingan' ? '-fill' : '' }}"></i></h2>
                </a>
                <div class="dropdown">
                    @if (Auth::user()->userpicture == null)
                        <img src="{{ asset('avatar-1.png') }}" alt="mdo" style="width: 35px;"
                            class="rounded-circle dropdown-toggle" type="button" id="dropdownMenuButton1"
                            data-bs-toggle="dropdown" aria-expanded="false">
                    @else
                        <img src="{{ Storage::url('public/assets/avatar/'.Auth::user()->userpicture) }}" alt="mdo" style="width: 35px;"
                            class="rounded-circle dropdown-toggle" type="button" id="dropdownMenuButton1"
                            data-bs-toggle="dropdown" aria-expanded="false">
                    @endif
                    <ul class="dropdown-menu  dropdown-menu-end" style="width:220px; ">
                        <li>
                            <a href="{{ route('profile') }}" class="dropdown-item d-flex gap-2 align-items-baseline"
                                href="{{ route('profile') }}">
                                <i class="bi bi-person-circle"></i>
                                Profile
                            </a>
                        </li>
                        {{-- <li>
                            <a class="dropdown-item d-flex gap-2 align-items-center" href="#">
                                <i class="bi bi-bookmark"></i>
                                Di simpan
                            </a>
                        </li> --}}
                        <li>
                            <a class="dropdown-item d-flex gap-2 align-items-center" href="{{ route('setting') }}">
                                <i class="bi bi-gear-wide-connected"></i>
                                Pengaturan
                            </a>
                        </li>
                        <li>
                            <a class="dropdown-item d-flex gap-2 align-items-center" href="{{ route('UserLikeList') }}">
                                <i class="bi bi-heart"></i>
                                Disukai
                            </a>
                        </li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li>
                            <a class="dropdown-item dropdown-item-danger d-flex gap-2 align-items-center"
                                href="{{ route('signOut') }}">
                                <svg class="bi" width="16" height="16">
                                    <use xlink:href="#trash" />
                                </svg>
                                Keluar
                            </a>
                        </li>
                    </ul>
                </div>
            @endauth
        </div>
    </div>
</nav>
