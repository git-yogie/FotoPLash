@include('template.header')
@include('template.nav')


@auth
    <div class="container">
        <div class="card px-4">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-4 text-center">
                        <img src="{{ Auth::user()->userpicture == null ? asset('avatar-1.png')  : Storage::url('public/assets/avatar/'.Auth::user()->userpicture) }}" alt="mdo" style="width: 200px;" class="rounded-circle">
                        <h2 class="fw-bold">{{ Auth::user()->name }}</h2>
                        <div class="d-grid gap-1 px-2">
                            <a href="{{ route('setting') }}" class="btn btn-primary btn-sm fw-bold" type="submit">Edit profile</a>
                        </div>
                    </div>
                    <div class="col-md-8">
                        <div class="d-flex justify-content-start align-items-baseline mb-3 text-decoration-none">

                        </div>
                        <div class="row">
                            <div class="col-md-3">
                                <div class="d-flex flex-column text-center">
                                    <h3 class="fw-bold">{{ $data['postcount'] }}</h3>
                                    <p>Postingan</p>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="d-flex flex-column text-center">
                                    <h3 class="fw-bold">10</h3>
                                    <p>Liked</p>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="d-flex flex-column text-center">
                                    <h3 class="fw-bold">10</h3>
                                    <p>Downloaded</p>
                                </div>
                            </div>
                        </div>
                        <p>
                           {{ Auth::user()->bio }}
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container z-1">
        @include('template.search')


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
<script src="https://cdn.jsdelivr.net/npm/masonry-layout@4.2.2/dist/masonry.pkgd.min.js"
integrity="sha384-GNFwBvfVxBkLMJpYMOABq3c+d3KnQxudP/mGPkzpZSTYykLBNsZEnG2D9G/X/+7D" crossorigin="anonymous"></script>


@include('template.footer')
