@include('template.header')
@include('template.nav')

<div class="container">
    @include('template.search')
</div>

<div class="container columns">
    @if (count($foto) == 0)
        <div class="alert alert-info text-center" style="width: 100%">
            <p>
               Belum ada Foto
            </p>
        </div>

    @endif
    @foreach ($foto as $foto )
    <a href="{{route('fotoShow',$foto->id) }}">
        <img class="bd" src="{{ Storage::url('public/assets/image/'.$foto->foto) }}" alt="Lorem Picsum">
    </a>
    @endforeach



</div>

@include('template.footer')
