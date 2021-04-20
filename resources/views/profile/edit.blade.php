<x-layouts.merchant>

    <div class="titleMain">
        <h1>Profile</h1>
        <p>Edit information</p>
    </div>

    <div class="content card">
        <div class="card-body">
            @if ( Session::has('success') )
                <div class="alert alert-success" role="alert">
                    <svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="mr-2">
                        <polyline points="9 11 12 14 22 4"></polyline>
                        <path d="M21 12v7a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11"></path>
                    </svg> <strong>Success!</strong> Registration created successfully!
                </div>
            @endif

            <livewire:profile-edit />

        </div>

    </div>
</x-layouts.merchant>


<script type="text/javascript">

</script>
