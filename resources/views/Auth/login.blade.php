<div class="modal modal-signin fade " tabindex="-1" role="dialog" id="modalSignin">
    <div class="modal-dialog" role="document">
        <div class="modal-content rounded-4 shadow">
            <div class="modal-header p-5 pb-4 border-bottom-0">
                <!-- <h5 class="modal-title">Modal title</h5> -->
                <h2 class="fw-bold mb-0">Login</h2>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body p-5 pt-0">
                @if ($message = Session::get('error_login'))
                    <div id="LoginError" data-message="{{ $message }}"></div>
                    <div class="alert alert-danger" role="alert">
                        {{$message}}
                    </div>
                @endif
                <form action="{{ route('signIn') }}" method="POST" class="">
                    @csrf
                    <div class="form-floating mb-3">
                        <input type="email" name="email" class="form-control rounded-3" id="floatingInput"
                            placeholder="name@example.com">
                        <label for="floatingInput">Email</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="password" name="password" class="form-control rounded-3" id="floatingPassword"
                            placeholder="Password">
                        <label for="floatingPassword">Password</label>
                    </div>
                    <button class="w-100 mb-2 btn btn-lg rounded-3 btn-primary" type="submit">Sign up</button>
                </form>
            </div>
        </div>
    </div>
</div>
