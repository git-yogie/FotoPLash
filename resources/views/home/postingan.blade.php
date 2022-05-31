@include('template.header')
@include('template.nav')


@auth
    <div class="container z-1">
        @include('template.search')
        <nav class="nav nav-pills flex-column flex-sm-row">
            <a href="{{ route('fotoCreate') }}" class="flex-sm-fill text-sm-center nav-link active" aria-current="page"
                href="#">Upload Foto baru</a>
        </nav>

    </div>
    <div class="container columns">
        @foreach ($foto as $foto)
            <a href="{{ route('fotoShow', $foto->id) }}">
                <img data-bs-toggle="tooltip" data-bs-placement="bottom" data-bs-custom-class="custom-tooltip"
                    title="{{ $foto->judul }}" class="bd"
                    src="{{ Storage::url('public/assets/image/' . $foto->foto) }}" alt="{{ $foto->judul }}">
            </a>
        @endforeach

    </div>
@endauth

@guest
    <div class="container py-5 text-center">
        <h1 class="display-5 fw-bold">Login Untuk Akses</h1>
        <p class="fs-5">Untuk mulai mengupload Foto Login atau daftar akun FotoPlash</p>
        <button type="button" class="btn btn-outline-primary me-2" data-bs-toggle="modal"
            data-bs-target="#modalSignin">Sign-in</button>
        <a href="{{ route('register') }}" type="button" class="btn btn-primary">Sign-up</a>
    </div>
@endguest
<script src="https://cdn.jsdelivr.net/npm/masonry-layout@4.2.2/dist/masonry.pkgd.min.js"
integrity="sha384-GNFwBvfVxBkLMJpYMOABq3c+d3KnQxudP/mGPkzpZSTYykLBNsZEnG2D9G/X/+7D" crossorigin="anonymous"></script>


@include('template.footer')
