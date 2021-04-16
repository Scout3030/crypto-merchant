<x-layouts.guest>

    <div class="row justify-content-center h-100 align-items-center">
        <div class="col-lg-6 col-md-4">
            <img class="logoLogin" src="{{ asset('img/logo.png') }}" alt="">
        </div>
        <div class="col-lg-6 col-md-8">
            <div class="contLogin w-100">
                <h2>One Time Password</h2>
                <p>Enter the OTP, you have received at your registered email address</p>

                <form class="formLogin" action="{{ route('auth.login.verify') }}" method="POST">
                    @csrf

                    @if ( Session::has('message') )
                        @include('partials.notification')
                    @endif

                    <div class="mb-3">
                        <label class="form-label">One Time Password</label>
                        <input type="password" name="otp_token" class="form-control @error('otp_token') validation @enderror" placeholder="Enter the OTP">
                        @error('otp_token')
                            <div class="form-text validation pb-3">{{ $message }}</div>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary">Verify</button>
                    <div class="form-text">Did not recieve the OTP code?
                        <a class="send-otp-button" href="#"
                            onclick="event.preventDefault();
                            console.log('here')
                            document.getElementById('send').submit();"
                        >
                            Send it again
                        </a>
                    </div>
                </form>
                <form id="send" action="{{ route('auth.send.otp.code') }}" method="POST" style="display: none;">
                    @csrf
                    <input type="hidden" value="{{ Session::get('otp-email') }}">
                </form>

            </div>
        </div>
    </div>

</x-layouts.guest>
