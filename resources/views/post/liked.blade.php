@include('template.header')
@include('template.nav')

<div class="container">
<h1>Foto yang disukai</h1>
@if (count($foto) == 0)
<div class="alert alert-info text-center" style="width: 100%">
    <p>
       Belum ada Foto yang disukai
    </p>
</div>

@endif
@foreach ($foto as $foto)
<a href="{{ route('fotoShow',$foto->id) }}">
<div class="card mb-3" style="max-width: 740px; min-height: 120px;">
    <div class="row g-0">
            <div class="col-md-4">
                <img src="{{ Storage::url('public/assets/image/' . $foto->foto) }}" class="img-fluid m-2" alt="...">
            </div>
            <div class="col-md-8">
                <div class="card-body">
                    <h5 class="card-title">{{ $foto->judul }}</h5>
                    <p class="card-text"><small class="text-muted">Uploaded {{ $foto->created_at->diffForHumans() }}</small></p>
                </div>
            </div>
        </div>
    </div>
</a>
    @endforeach
</div>




@include('template.footer')
