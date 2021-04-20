<x-layouts.merchant>

    <div class="titleMain">
        <h1>User</h1>
        <p>Change password</p>
    </div>

    <div class="content card">
        <div class="card-body">
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
                <button type="submit" class="btn btn-primary">Save</button>
            </form>
        </div>
    </div>

</x-layouts.merchant>
