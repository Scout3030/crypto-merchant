<x-layouts.merchant>

    <div class="titleMain">
        <h1>Step 1: Personal Information</h1>
    </div>

    @livewire('kyc-step-one')

</x-layouts.merchant>


<script type="text/javascript">

    $(document).ready(function () {

        $('#phone_code').select2({
            theme: 'flat'
        });

        $('#country').select2({
            theme: 'flat',
            destroy: true
        }).on('select2:select', function (e) {

            $('#city').empty();
            $('#state').empty();

            $('#other_city').addClass('d-none');
            $('#other_state').addClass('d-none');

            var data = e.params.data;

            if(data.id.length > 0) {
                Livewire.emit('setCountry', data.id);
                selectState(data.id);
            }
        });
    });

    function selectState(country) {

        $('.loading').show();

        $.ajax({
            url: '{{ route("country.state") }}',
            type: 'GET',
            dataType: 'json',
            data: {
                country: country
            },
            success: function (arg) {

                if ( arg.length == 0){
                    $('#city').append('<option value="other">Other</option>');

                    $('#other_city').removeClass('d-none');
                    $('#other_state').removeClass('d-none');
                } else {
                    arg.forEach(function(item){
                        $('#state').append('<option value="'+item.iso2+'">'+ item.name +'</option>');
                    });
                }

				$('#state').append('<option value="other">Other</option>');

                $('#state').select2({
                    theme: 'flat',
                    destroy: true,
                }).on('select2:select', function (e) {

                    var data = e.params.data;

                    if(data.id.length > 0) {
                        Livewire.emit('setState', data.id);
                        selectCity(data.id);
                    }
                });

                $('.loading').hide();
            }
        })

    }

    function selectCity(state) {

        $('.loading').show();
        $('#city').empty();

        if ( state == 'other') {
            $('#city').append('<option value="other">Other</option>');

            $('#other_city').removeClass('d-none');
            $('#other_state').removeClass('d-none');

            Livewire.emit('setCity', 'other');

            $('.loading').hide();

        } else {

            $('#other_city').addClass('d-none');
            $('#other_state').addClass('d-none');

            $.ajax({
                url: '{{ route("country.state.city") }}',
                type: 'GET',
                dataType: 'json',
                data: {
                    state: state
                },
                success: function (arg) {

                    arg.forEach(function(item){
                        $('#city').append('<option value="'+item.id+'">'+ item.name +'</option>');
                    });

                    $('#city').append('<option value="other">Other</option>');

                    $('#city').select2({
                        theme: 'flat',
                        destroy: true,
                    }).on('select2:select', function (e) {

                        var data = e.params.data;

                        Livewire.emit('setCity', data.id);

                        (data.id == 'other')
                            ? $('#other_city').removeClass('d-none')
                            : $('#other_city').addClass('d-none');
                    });

                    $('.loading').hide();
                }
            })
        }
    }

    function viewInputDocument() {
        var input_document = document.getElementById('other_document');

        input_document.classList.add( 'd-none' );

        let identification_document = document.getElementById('identification_document').value;

        if (identification_document == '999') {

            input_document.classList.remove( 'd-none' );
        }
    }

</script>


<script>
    // Get the template HTML and remove it from the doument
    var previewNode = document.querySelector("#template");
    previewNode.id = "";
    var previewTemplate = previewNode.parentNode.innerHTML;
    previewNode.parentNode.removeChild(previewNode);

    var myDropzone = new Dropzone(document.body, {
        url: "https://www.jose-aguilar.com/scripts/javascript/dropzone/multiple/upload.php",
        paramName: "file",
        acceptedFiles: 'image/*',
        maxFilesize: 2,
        maxFiles: 3,
        thumbnailWidth: 160,
        thumbnailHeight: 160,
        thumbnailMethod: 'contain',
        parallelUploads: 20,
        previewTemplate: previewTemplate,
        autoQueue: true,
        previewsContainer: "#previews",
        clickable: ".fileinput-button"
    });

    myDropzone.on("addedfile", function(file) {
        $('.dropzone-here').hide();
        // Hookup the start button
        file.previewElement.querySelector(".start").onclick = function() { myDropzone.enqueueFile(file); };
    });

    // Update the total progress bar
    myDropzone.on("totaluploadprogress", function(progress) {
        document.querySelector("#total-progress .progress-bar").style.width = progress + "%";
    });

    myDropzone.on("sending", function(file) {
        // Show the total progress bar when upload starts
        document.querySelector("#total-progress").style.opacity = "1";
        // And disable the start button
        file.previewElement.querySelector(".start").setAttribute("disabled", "disabled");
    });

    // Hide the total progress bar when nothing's uploading anymore
    myDropzone.on("queuecomplete", function(progress) {
        //document.querySelector("#total-progress").style.opacity = "0";
    });

    // Setup the buttons for all transfers
    // The "add files" button doesn't need to be setup because the config
    // `clickable` has already been specified.
    document.querySelector("#actions .start").onclick = function() {
        myDropzone.enqueueFiles(myDropzone.getFilesWithStatus(Dropzone.ADDED));
    };

    /*$('#previews').sortable({
        items:'.file-row',
        cursor: 'move',
        opacity: 0.5,
        containment: "parent",
        distance: 20,
        tolerance: 'pointer',
        update: function(e, ui){
            //actions when sorting
        }
    });*/
</script>

