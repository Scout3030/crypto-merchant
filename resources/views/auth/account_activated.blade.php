<x-layouts.guest type="redirect">
    <h2 class="titleNoti">Account Activated Successfully</h2>
    <div class="card text-center">
        <div class="card-body textNoti">
            <div class="media-body">
                <p class="mb-0">Thanks for verifying the email address<br>
                You will be redirected to login screen in <span id="timeLeft">10 seconds</span> automatically OR</p>
                <br>
                <br>
                <p class="mb-0">Click here to <a href="{{ route('auth.showLoginForm') }}">Sign In</a></p>
            </div>
        </div>
    </div>
    <script>
      let timeLeft = 10;
      const countdownTimer = setInterval(() => {
        if (timeLeft <= 0) {
          clearInterval(countdownTimer);
          window.location.replace('{{ route('auth.login') }}');
        } else {
          document.getElementById('timeLeft').innerHTML = [
            timeLeft.toString(),
            'second'.concat(timeLeft >= 2 ? 's' : '')
          ].join(' ');
        }

        timeLeft -=1;
      }, 1000);
    </script>
</x-layouts.guest>
