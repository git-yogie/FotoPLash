@include('template.header')
@include('template.nav')
<link rel="stylesheet" href="{{ asset('cropter/ijaboCropTool.min.css') }}">

<div class="container">
    <div class="row">
        <div class="col-md-5">
            <div class="card">
                <div class="card-header">
                    <h3>User profile</h3>
                </div>
                <div class="card-body">
                    <div class="container text-center">
                        @if (Auth::user()->userpicture == null)
                            <img src="{{ asset('avatar-1.png') }}" alt="mdo" style="width: 200px;"
                                class="rounded-circle image-preview">
                        @else
                            <img src="{{ Storage::url('public/assets/avatar/'.Auth::user()->userpicture) }}" alt="mdo" style="width: 200px;" class="rounded-circle image-preview shadow">
                        @endif
                    </div>
                    <div class="container">
                        <form action="{{ route('profile.update') }}" method="POST" class="needs-validation"
                            novalidate>
                            @csrf
                            <div class="form-floating mb-3">
                                <input type="email" value="{{ $user->email }}" name="email"
                                    class="form-control  @error('email') is-invalid @enderror" id="floatingInput"
                                    placeholder="name@example.com">
                                <label for="floatingInput">Email</label>
                                <div class="invalid-feedback">
                                    {{ $errors->first('email') }}
                                </div>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="text" name="nama" value="{{ $user->name }}"
                                    class="form-control  @error('nama') is-invalid @enderror" id="floatingInput"
                                    placeholder="name@example.com">
                                <label for="floatingInput">Nama lengkap</label>
                                <div class="invalid-feedback">
                                    {{ $errors->first('nama') }}
                                </div>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="text" name="username" value="{{ $user->username }}"
                                    class="form-control @error('username') is-invalid @enderror" id="floatingInput"
                                    placeholder="Username">
                                <label for="floatingInput">Nama pengguna</label>
                                <div class="invalid-feedback">
                                    {{ $errors->first('username') }}
                                </div>
                            </div>


                            <div class="d-grid gap-1 px-2">
                                <div class="text-mute text-center mb-3" style="font-size:12px; ">Isi sandi untuk
                                    memperbarui Sandi</div>
                                <button class="btn btn-primary btn-sm fw-bold" type="submit">Perbarui</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-7">
            <div class="card mb-1">
                <div class="card-header">
                    <h3>User Data</h3>
                </div>
                <div class="card-body">
                    <div class="col-md-12">
                        <label for="formFileMultiple" class="form-label">User Picture</label>
                        <input class="form-control" name="avatar" type="file" id="foto">
                    </div>
                    <form action="{{ route('bio_update') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="col-md-12 mt-2 mb-3">
                            <div class="form-floating ">
                                <textarea class="form-control" style="height: 200px" name="bio"
                                    id="floatingTextarea">{{Auth::user()->bio }}</textarea>
                                <label for="floatingTextarea">Bio</label>
                            </div>
                        </div>
                        <button class="btn btn-primary btn-sm fw-bold" type="submit">Perbarui Bio</button>
                    </form>
                </div>
            </div>
            <div class="card">
                <div class="card-header">
                    <h6>Sandi masuk</h6>
                </div>
                <div class="card-body">
                    <form action="{{ route('password.update') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-floating mb-3">
                            <input type="password" name="passwordLama"
                            value=""
                                class="form-control @error('password') is-invalid @enderror" id="floatingInput"
                                placeholder="Sandi">
                            <label for="floatingInput">Sandi lama</label>
                            <div class="invalid-feedback">
                                {{ $errors->first('password') }}
                            </div>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="password" name="passwordBaru"
                            value=""
                                class="form-control @error('password') is-invalid @enderror" id="floatingInput"
                                placeholder="Sandi">
                            <label for="floatingInput">Sandi baru</label>
                            <div class="invalid-feedback">
                                {{ $errors->first('password') }}
                            </div>
                        </div>
                        <button class="btn btn-primary btn-sm fw-bold" type="submit">Perbarui Sandi</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="{{ asset('cropter/ijaboCropTool.min.js') }}"></script>
<script>
    $('#foto').ijaboCropTool({
        preview: '.image-previewer',
        setRatio: 1,
        allowedExtensions: ['jpg', 'jpeg', 'png'],
        buttonsText: ['upload', 'kembali'],
        buttonsColor: ['#3498db', '#e74c3c', -15],
        processUrl: '{{ route("userpicture") }}',
        withCSRF: ['_token', '{{ csrf_token() }}'],
        onSuccess: function(message, element, status) {
            window.location.reload(true)
        },
        onError: function(message, element, status) {
            alert(message);
        }
    });
</script>

@include('template.footer')
