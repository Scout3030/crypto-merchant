<x-layouts.guest>

    <div class="row justify-content-center h-100 align-items-center">
        <div class="col-lg-6 col-md-4">
            <img class="logoLogin" src="{{ asset('img/logo.png') }}" alt="">
        </div>
        <div class="col-lg-6 col-md-8">
            <div class="contLogin w-100">
                <h2>Sign In</h2>
                <p class="mb-4">Enter your email and password to access control panel.</p>

                <form class="formLogin" action="{{ route('auth.login') }}" method="POST">
                    @csrf

                    @if ( Session::has('status') )
                    <div class="alert alert-success" role="alert">
                      <svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="mr-2">
                        <polyline points="9 11 12 14 22 4"></polyline>
                        <path d="M21 12v7a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11"></path>
                      </svg> <strong>Success!</strong> You will receive and email with the OTP.'
                    </div>
                    @endif

                    @if ( Session::has('success') )
                    <div class="alert alert-success" role="alert">
                      <svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="mr-2">
                        <polyline points="9 11 12 14 22 4"></polyline>
                        <path d="M21 12v7a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11"></path>
                      </svg> <strong>Success!</strong> Your account is registered. You will shortly receive and email to activate your account.
                    </div>
                    @endif

                    <div class="mb-3">
                        <label class="form-label">Email</label>
                        <input type="text" name="email" class="form-control @error('email') validation @enderror" placeholder="Enter Your Email" value="{{ old('email') }}">
                        @error('email')
                            <div class="form-text validation pb-3">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Password</label>
                        <input type="password" name="password" class="form-control @error('password') validation @enderror" placeholder="Enter Your Password">
                        @error('password')
                            <div class="form-text validation pb-3">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3 form-check">
                        <input type="checkbox" name="remember" class="form-check-input" {{ old('remember') ? "checked" : '' }}>
                        <label class="form-check-label">Remember Me</label>
                        <a class="forgotPass" href="{{ route('auth.showForgotPasswordForm') }}">Forgot Password?</a>
                    </div>
                    <button type="submit" class="btn btn-primary">Sign In</button>
                    <div id="emailHelp" class="form-text">Don't have an account? <a href="{{ route('auth.showRegistrationForm') }}">Register</a></div>
                </form>

            </div>
        </div>
    </div>

</x-layouts.guest>
