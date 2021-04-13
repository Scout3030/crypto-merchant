<x-layouts.auth>
    <h2>Reset Password</h2>
    <p>Enter your email address to get reset password link</p>

    <form action="{{ route('auth.sendPasswordResetEmail') }}" class="formLogin" method="POST">
        @csrf
        <div class="mb-3">
            <label class="form-label">Email</label>
            <input name="email" class="form-control" placeholder="Enter Your Email" required="required" type="email">
        </div>
        <button class="btn btn-primary" type="submit">Get Reset Link</button>
    </form>
</x-layouts.auth>
