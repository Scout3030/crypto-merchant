<x-layouts.auth>
    <h2>Enter the OTP</h2>
    <p>Don't have an account? Create your account, it takes less than a minute</p>

    <form class="formLogin" action="{{ route('auth.login.verify') }}" method="POST">
        @csrf

        @if ( Session::has('success') )
            <div class="alert alert-success" role="alert">
                <svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="mr-2">
                    <polyline points="9 11 12 14 22 4"></polyline>
                    <path d="M21 12v7a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11"></path>
                </svg> <strong>Sucess!</strong> Your account is registered. You will shortly receive and email to activate your account.
            </div>
        @endif

        @if ($errors->any())
            <div class="alert alert-danger" role="alert">
                <svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="mr-2"><polyline points="9 11 12 14 22 4"></polyline><path d="M21 12v7a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11"></path></svg>
                @foreach ($errors->all() as $error)
                    <span>{{ $error }}</span>
                @endforeach
            </div>
        @endif


        <div class="mb-3">
            <label class="form-label">OTP</label>
            <input type="text" name="otp_token" class="form-control" placeholder="Enter the OTP" required>
        </div>
        <button type="submit" class="btn btn-primary">Send</button>
    </form>
</x-layouts.auth>
