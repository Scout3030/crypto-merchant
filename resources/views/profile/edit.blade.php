<x-layouts.merchant>

    <div class="titleMain">
        <h1>Profile</h1>
        <p>Edit information</p>
    </div>

    <div class="content card">
        <div class="card-body">
            <livewire:profile-edit />
        </div>
    </div>
</x-layouts.merchant>


<script type="text/javascript">
    $(document).ready(function() {

        $('#timezone').select2();
        $('#timezone').on('change', function (e) {
            var data = $('#timezone').select2('val');
            Livewire.emit('setTimezone', data);
        });


    });
</script>
