<div class="h-100  text-white  text-dark border rounded-5 mb-3">
    <h2 class="text-dark">Cari Foto</h2>
    <form action="{{ $data['title'] == 'home' ? route('home') : route('postingan') }}" method="GET" >
        <input type="search" class="form-control" value="{{ $data['search'] }}" name="search" placeholder="Search">
    </form>
  </div>