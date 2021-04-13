<x-layouts.auth>
    <h2>Reset Password</h2>
    <p>Enter your new desired password.</p>

    <form class="formLogin" action="{{ $processUrl ? $processUrl : route('auth.update.password') }}" method="POST">
        @csrf

        @if ($errors->any())
        <div class="alert alert-danger" role="alert">
            <svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="mr-2">
                <polyline points="9 11 12 14 22 4"></polyline>
                <path d="M21 12v7a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11"></path>
            </svg>
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
            <label class="form-label">New Password</label>
            <input type="password" name="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" placeholder="Enter Your Password">
            @if ($errors->has('password'))
            <span class="invalid-feedback">
                <strong>{{ $errors->first('password') }}</strong>
            </span>
            @endif
        </div>
        <div class="mb-3">
            <label class="form-label">Confirm Password</label>
            <input type="password" name="password_confirmation" class="form-control{{ $errors->has('password_confirmation') ? ' is-invalid' : '' }}" placeholder="Enter Your Password">
            @if ($errors->has('password_confirmation'))
            <span class="invalid-feedback">
                <strong>{{ $errors->first('password_confirmation') }}</strong>
            </span>
            @endif
        </div>
        <input name="token" type="hidden" value={{ $token }}>
        <input name="email" type="hidden" value={{ $email }}>
        <button type="submit" class="btn btn-primary">Reset Password</button>
    </form>
</x-layouts.auth>
