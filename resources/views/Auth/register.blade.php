@include('template.header')
<div class="container">
<div class="text-center mb-5">
    <h3>Daftar FotoPlash</h3>
</div>
    <div class="card">
        <div class="card-header">
            Daftar
        </div>
        <div class="card-body">
            <form action="{{ route('registerProcess') }}" method="POST" class="row g-3 needs-validation" novalidate>
                @csrf
                <div class="col-md-6">
                    <label for="validationCustom01" class="form-label">Nama</label>
                    <input type="text" class="form-control @error('nama')
                        is-invalid
                    @enderror" name="nama" value="{{ old('nama') }}" id="validationCustom01" required>
                    @error('nama')
                    <div class="invalid-feedback">
                        {{ $errors->first('nama') }}
                    </div>
                    @enderror

                </div>
                <div class="col-md-6">
                    <label for="validationCustomUsername" class="form-label">Email</label>
                    {{-- <div class="input-group has-validation"> --}}
                        <span class="input-group-text" id="inputGroupPrepend">@</span>
                        <input type="text" value="{{ old('email') }}" class="form-control @error('email')
                        is-invalid
                    @enderror" name="email" id="validationCustomUsername"
                            aria-describedby="inputGroupPrepend" required>
                            @error('email')
                            <div class="invalid-feedback">
                                {{ $errors->first('email') }}
                            </div>
                            @enderror
                    </div>
                </div>
                <div class="col-md-6">
                    <label for="validationCustom03"  class="form-label">Password</label>
                    <input type="password"  class="form-control  @error('password')
                    is-invalid
                @enderror" name="password" id="validationCustom03" required>
                    @error('password')
                    <div class="invalid-feedback">
                        {{ $errors->first('password') }}
                    </div>
                    @enderror
                </div>
                <div class="col-md-6">
                    <label for="validationCustom05" class="form-label">Phone</label>
                    <input type="number" value="{{ old('phone') }}" class="form-control  @error('phone')
                    is-invalid
                @enderror" name="phone" id="validationCustom05" required>
                    @error('phone')
                    <div class="invalid-feedback">
                        {{ $errors->first('phone') }}
                    </div>
                    @enderror
                </div>
                <div class="col-12 ">
                    <button class="btn btn-primary" type="submit">Daftar</button>
                </div>
            </form>
        </div>
    </div>

</div>
@include('template.footer')
