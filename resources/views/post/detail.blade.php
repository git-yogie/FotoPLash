@include('template.header')
@include('template.nav')

<div class="container">

    <div class="card mb-3">
        <div class="row g-0">
            <div class="col-md-8">
                <img src="{{ Storage::url('public/assets/image/'.$data['foto']) }}" alt="Lorem Picsum">
            </div>
            <div class="col-md-4">
                <div class="card-body">
                    <h5 class="card-title"><h3>{{ $data['judul'] }}</h3></h5>
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
                            <td>: {{ $data['author'] }}</td>
                        </tr>
                        <tr>
                            <td class='text-muted'>Tanggal Upload </td>
                            <td>: {{ $data['created'] }}</td>
                        </tr>

                    </table>
                    <p class="card-text"><small class="text-muted">di Upload {{ $data['diff'] }}</small></p>
                    <a href="{{ route('download',$data['foto']) }}" class="btn btn-primary">Download</a>
                    @auth
                    @if ($data['user_id'] == Auth::user()->id)
                    <a href="{{ route('fotoEdit',$data['id']) }}" class="btn btn-primary">Edit</a>
                    <a href="{{ route('destroy',$data['id']) }}" class="btn btn-danger">Hapus</a>
                    @endif

                    @endauth
                </div>
            </div>
        </div>
    </div>
</div>




@include('template.footer')
