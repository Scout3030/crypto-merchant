<x-layouts.auth>
    <h2>Reset Password</h2>
    <p>Enter your email address to get reset password link</p>

    <form action="{{ route('auth.sendPasswordResetEmail') }}" class="formLogin" method="POST">
        @csrf

        @if ( Session::has('status') )
            <div class="alert alert-success" role="alert">
                <svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="mr-2">
                    <polyline points="9 11 12 14 22 4"></polyline>
                    <path d="M21 12v7a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11"></path>
                </svg> <strong>Sucess!</strong> {{ Session::get('status') }}
            </div>
        @endif

        <div class="mb-3">
            <label class="form-label">Email</label>
            <input name="email" class="form-control @error('email') validation @enderror" placeholder="Enter Your Email" type="text" value="{{ old('email') }}">
            @error('email')
                <div class="form-text validation pb-3">{{ $message }}</div>
            @enderror
        </div>
        <button class="btn btn-primary" type="submit">Get Reset Link</button>
    </form>
</x-layouts.auth>
