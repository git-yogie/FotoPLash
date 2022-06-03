@include('template.header')
<div class="container">

    <div class="card m-auto p-3 mt-3" style="width: 350px">
        <div class="text-center">
            <img src="{{ asset('assets/fs/full.png') }}" style="width:90px;" alt="">
            <h5 class=" fw-bold text-mute text-center" style="color: #95a5a6 ;">Buat akun untuk mulai berbagi Foto anda.
            </h5>
        </div>
        <div class="card-body">
            <hr>
            <form action="{{ route('registerProcess') }}" method="POST" class="needs-validation" novalidate>
                @csrf
                <div class="form-floating mb-3">
                    <input type="email" value="{{ old('email') }}" name="email"
                        class="form-control  @error('email') is-invalid @enderror" id="floatingInput"
                        placeholder="name@example.com">
                    <label for="floatingInput">Email</label>
                    <div class="invalid-feedback">
                        {{ $errors->first('email') }}
                    </div>
                </div>
                <div class="form-floating mb-3">
                    <input type="text" name="nama" value="{{ old('nama') }}"
                        class="form-control  @error('nama') is-invalid @enderror" id="floatingInput"
                        placeholder="name@example.com">
                    <label for="floatingInput">Nama lengkap</label>
                    <div class="invalid-feedback">
                        {{ $errors->first('nama') }}
                    </div>
                </div>
                <div class="form-floating mb-3">
                    <input type="text" name="username" value="{{ old('username') }}"
                        class="form-control @error('username') is-invalid @enderror" id="floatingInput"
                        placeholder="Username">
                    <label for="floatingInput">Nama pengguna</label>
                    <div class="invalid-feedback">
                        {{ $errors->first('username') }}
                    </div>
                </div>
                <div class="form-floating mb-3">
                    <input type="password" name="password" class="form-control @error('password') is-invalid @enderror"
                        id="floatingInput" placeholder="Sandi">
                    <label for="floatingInput">Sandi</label>
                    <div class="invalid-feedback">
                        {{ $errors->first('password') }}
                    </div>
                </div>

                <div class="d-grid gap-1 px-2">
                    <div class="text-mute text-center mb-3" style="font-size:12px; ">Dengan mendaftar berarti
                        anda<strong> menyetujui</strong> segala ketentuan dari FotoPlash</div>
                    <button class="btn btn-primary btn-sm fw-bold" type="submit">Daftar</button>
                </div>
            </form>
        </div>
    </div>

    @include('template.footer')
