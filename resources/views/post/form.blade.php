@include('template.header')
@include('template.nav')

<div class="container">
    <div class="card mb-3">
        <div class="card-header">
            <h5 class="card-title">{{ isset($foto) ? 'edit' : 'Upload' }} Foto</h5>
        </div>
        <div class="row g-0">
            <div class="col-md-4 p-2">
                    <img src="{{ isset($foto) ? Storage::url('public/assets/image/'.$foto->foto) : '' }}" id="show_image" alt="" srcset="">
              </div>
              <div class="col-md-8">
                <div class="card-body">
                    <form class="row" action="{{ isset($foto) ? route('fotoUpdate',$foto->id) :route('fotoStore') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="col-md-12">
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control @error('foto') is-invalid

                                @enderror" value="{{ isset($foto) ? $foto->judul : '' }}" name="judul">
                                <label for="floatingInput">Judul</label>
                                <div class="invalid-feedback">
                                    {{ $errors->first('foto') }}
                                </div>
                              </div>
                        </div>
                        <div class="col-md-12 mt-2">
                            <div class="form-floating ">
                                <textarea class="form-control" style="height: 200px"  name="deskripsi" id="floatingTextarea">{{ isset($foto) ? $foto->deskripsi : '' }}</textarea>
                                <label for="floatingTextarea">Deskripsi</label>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <label for="formFileMultiple" class="form-label">Foto</label>
                            <input class="form-control @error('foto') is-invalid

                            @enderror"  name="foto" type="file" id="foto">
                            <div class="invalid-feedback">
                                {{ $errors->first('foto') }}
                            </div>
                        </div>

                        <div class="col-12 mt-3">
                            <button class="btn btn-primary" type="submit">{{ isset($foto) ? 'edit' : 'Upload' }}  Foto</button>
                        </div>
                    </form>
                </div>
              </div>
        </div>
    </div>
</div>

@include('template.footer')
