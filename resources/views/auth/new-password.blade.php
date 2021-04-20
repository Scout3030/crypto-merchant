<x-layouts.guest>

    <div class="row justify-content-center h-100 align-items-center">
        <div class="col-lg-6 col-md-4">
            <img class="logoLogin" src="{{ asset('img/logo.png') }}" alt="">
        </div>
        <div class="col-lg-6 col-md-8">
            <div class="contLogin w-100">
                <h2>New Password</h2>
                <p>Enter your new desired password</p>

                <form class="formLogin" action="{{ route('auth.new.password') }}" method="POST">
                    @method('put')
                    @csrf

                    <div class="mb-3">
                        <label for="current_password" class="form-label">Current Password</label>
                        <input id="current_password"
                               type="password"
                               name="current_password"
                               class="form-control @error('current_password') validation @enderror"
                               placeholder="Enter Your Current Password"
                        >
                        @error('current_password')
                        <div class="form-text validation pb-3">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="password" class="form-label">New Password</label>
                        <input id="password"
                               type="password"
                               name="password"
                               class="form-control @error('password') validation @enderror"
                               placeholder="Enter Your New Password"
                               autocomplete="off"
                        >
                        @error('password')
                            <div class="form-text validation pb-3">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="password_confirmation" class="form-label">Confirm Password</label>
                        <input id="password_confirmation"
                               type="password"
                               name="password_confirmation"
                               class="form-control @error('password_confirmation') validation @enderror"
                               placeholder="Enter Your New Password"
                               autocomplete="off"
                        >
                        @error('password_confirmation')
                            <div class="form-text validation pb-3">{{ $message }}</div>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary">Reset Password</button>
                </form>

            </div>
        </div>
    </div>

</x-layouts.guest>
