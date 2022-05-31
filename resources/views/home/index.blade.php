@include('template.header')
@include('template.nav')

<div class="container">
    @include('template.search')
</div>

<div class="container columns">
    @foreach ($foto as $foto )
    <a href="{{route('fotoShow',$foto->id) }}">
        <img class="bd" src="{{ Storage::url('public/assets/image/'.$foto->foto) }}" alt="Lorem Picsum">
    </a>
    @endforeach



</div>

@include('template.footer')
