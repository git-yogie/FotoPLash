<div class="text-white  text-dark  mb-3">
    <h2 class="text-dark">Cari Foto</h2>
    <form action="{{ $data['search_route'] }}" method="GET" >
        <input type="search" class="form-control" value="{{ $data['search'] }}" name="search" placeholder="Search">
    </form>
  </div>
