@include('template.header')
@include('template.nav')

<div class="container">

    <div class="card mb-3">
        <div class="row g-0">
            <div class="col-md-8">
                <img src="{{ Storage::url('public/assets/image/' . $data['foto']) }}" alt="Lorem Picsum">
            </div>
            <div class="col-md-4">
                <div class="card-body">
                    <h5 class="card-title">
                        <h3>{{ $data['judul'] }}</h3>
                    </h5>
                    <hr>
                    <p class="card-text">{{ $data['deskripsi'] }}</p>
                    <hr>
                    <table>
                        <tr>
                            <td class='text-muted'>Ukuran File </td>
                            <td>: {{ $data['ukuran'] }}</td>
                        </tr>
                        <tr>
                            <td class='text-muted'>Dimensi </td>
                            <td>: {{ $data['dimensi'] }}</td>
                        </tr>
                        <tr>
                            <td class='text-muted'>Author </td>
                            <td>: <a href="{{ route('author',$data['author_username']) }}">{{ $data['author'] }}</a></td>
                        </tr>
                        <tr>
                            <td class='text-muted'>Di unduh  </td>
                            <td>: {{ $data['hit'] }} kali</td>
                        </tr>
                        <tr>
                            <td class='text-muted'>Tanggal Upload </td>
                            <td>: {{ $data['created'] }}</td>
                        </tr>

                    </table>
                    <p class="card-text rounded-2"><small class="text-muted">Uploaded {{ $data['diff'] }}</small></p>
                    <div class="d-flex justify-content-start mx-1">
                        @auth
                        <a href="{{ $data['liked'] != false ? route('DisLike',$data['liked']) : route('Like',$data['id']) }}" class="btn btn-sm">
                            <h4 class="bi bi-heart{{ $data['liked'] != false ? "-fill text-danger" : ""  }}"></h4> {{ $data['liked'] != false ? "Di sukai" : 'sukai' }}
                        </a>
                            @if ($data['user_id'] == Auth::user()->id)
                                <a href="{{ route('fotoEdit', $data['id']) }}" class="btn btn-sm">
                                    <h4 class="bi bi-pencil-square"></h4> Ubah
                                </a>
                                <a href="#" onclick="deleteP('{{ route('destroy', $data['id']) }}')" class="btn btn-sm">
                                    <h4 class="bi bi-trash3"></h4> Hapus
                                </a>
                            @endif
                        @endauth
                        <a href="{{ route('download', $data['foto']) }}" class="btn btn-sm">
                            <h4 class="bi bi-cloud-download"></h4> Unduh
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>




@include('template.footer')
