<x-layouts.auth>
    <h2>Sign In</h2>
    <p>Enter your email and password to access control panel.</p>

    <form class="formLogin" action="">
        <div class="mb-3">
            <label class="form-label">Email</label>
            <input type="email" class="form-control" placeholder="Enter Your Email">
        </div>
        <div class="mb-3">
            <label class="form-label">Password</label>
            <input type="password" class="form-control" placeholder="Enter Your Password">
        </div>
        <div class="mb-3 form-check">
            <input type="checkbox" class="form-check-input">
            <label class="form-check-label">Remember Me</label>
            <a class="forgotPass" href="#">Forgot Password?</a>
        </div>
        <button type="submit" class="btn btn-primary">Sign In</button>
        <div id="emailHelp" class="form-text">Don't have an account? <a href="#">Register</a></div>
    </form>
</x-layouts.auth>
