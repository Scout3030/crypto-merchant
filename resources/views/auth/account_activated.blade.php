<x-layouts.guest type="redirect">
    <h2 class="titleNoti">Account Activated Successfully</h2>
    <div class="card text-center">
        <div class="card-body textNoti">
            <div class="media-body">
                <p class="mb-0">Thanks for verifying the email address<br>
                You will shortly receive an email with login details to your account.</p>
                <br>
                <br>
                <p class="mb-0">Click here to <a href="{{ route('auth.showLoginForm') }}">Sign In</a></p>
            </div>
        </div>
    </div>
</x-layouts.guest>
