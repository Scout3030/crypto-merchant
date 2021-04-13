<x-layouts.auth>
    <h2>Sign In</h2>
    <p>Enter your email and password to access control panel.</p>

    <form class="formLogin" action="{{ route('auth.login') }}" method="POST">
        @csrf

        @if ($errors->any())
            <div class="alert alert-danger" role="alert">
                <svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="mr-2"><polyline points="9 11 12 14 22 4"></polyline><path d="M21 12v7a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11"></path></svg>
                @foreach ($errors->all() as $error)
                    <span>{{ $error }}</span>
                @endforeach
            </div>
        @endif

        @if ( Session::has('message') )
            <div class="alert alert-success" role="alert">
                <svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="mr-2">
                    <polyline points="9 11 12 14 22 4"></polyline>
                    <path d="M21 12v7a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11"></path>
                </svg> <strong>Sucess!</strong> You will receive and email with the OTP.'
            </div>
        @endif

        <div class="mb-3">
            <label class="form-label">Email</label>
            <input type="email" name="email" class="form-control" placeholder="Enter Your Email">
        </div>
        <div class="mb-3">
            <label class="form-label">Password</label>
            <input type="password" name="password" class="form-control" placeholder="Enter Your Password">
        </div>
        <div class="mb-3 form-check">
            <input type="checkbox" name="remember" class="form-check-input">
            <label class="form-check-label">Remember Me</label>
            <a class="forgotPass" href="{{ route('auth.showForgotPasswordForm') }}">Forgot Password?</a>
        </div>
        <button type="submit" class="btn btn-primary">Sign In</button>
        <div id="emailHelp" class="form-text">Don't have an account? <a href="{{ route('auth.showRegistrationForm') }}">Register</a></div>
    </form>
</x-layouts.auth>
