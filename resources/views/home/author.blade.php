@include('template.header')
@include('template.nav')


    <div class="container">
        <div class="card px-4">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-4 text-center">
                        <img src="{{ $user->userpicture == null ? asset('avatar-1.png')  : Storage::url('public/assets/avatar/'.$user->userpicture) }}" alt="mdo" style="width: 200px;" class="rounded-circle">
                        <h2 class="fw-bold">{{ $user->name }}</h2>
                    </div>
                    <div class="col-md-8 py-3">
                        <div class="row">
                            <div class="col-md-3">
                                <div class="d-flex flex-column text-center">
                                    <h3 class="fw-bold">{{ $data['postcount'] }}</h3>
                                    <p>Postingan</p>
                                </div>
                            </div>
                        </div>
                        <p>
                           {{ $user->bio }}
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container z-1">
        @include('template.search')
    </div>
    @if (count($foto) == 0)
        <div class="alert alert-info text-center" style="width: 100%">
            <p>
               Tidak ada Foto
            </p>
        </div>

    @endif
    <div class="container columns">
        @foreach ($foto as $foto)
            <a href="{{ route('fotoShow', $foto->id) }}">
                <img data-bs-toggle="tooltip" data-bs-placement="bottom" data-bs-custom-class="custom-tooltip"
                    title="{{ $foto->judul }}" class="bd"
                    src="{{ Storage::url('public/assets/image/' . $foto->foto) }}" alt="{{ $foto->judul }}">
            </a>
        @endforeach

    </div>
<script src="https://cdn.jsdelivr.net/npm/masonry-layout@4.2.2/dist/masonry.pkgd.min.js"
integrity="sha384-GNFwBvfVxBkLMJpYMOABq3c+d3KnQxudP/mGPkzpZSTYykLBNsZEnG2D9G/X/+7D" crossorigin="anonymous"></script>


@include('template.footer')
