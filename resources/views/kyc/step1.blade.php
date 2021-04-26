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
        }).on('select2:select', function (e) {

            var data = e.params.data;

            if(data.id.length > 0) {
                Livewire.emit('setCodePhone', data.id);
            }
        });

        $('#identification_document').select2({
            theme: 'flat'
        }).on('select2:select' , function (e) {

            if ( e.params.data.id > 0 | e.params.data.id != null ) {
                $('#other_document').addClass('d-none');

                if ( e.params.data.id == '999' ) {
                    $('#other_document').removeClass('d-none');
                }

                $('.fileinput-button').removeClass('disabled');

            } else {
                $('.fileinput-button').addClass('disabled');
            }

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

        $("#document_number").keyup(function() {

            if( $(this).val().length > 0 ) {
                $('.fileinput-button').removeClass('disabled');
            }
            else {
                $('.fileinput-button').addClass('disabled');
            }
        });

        $("#other_document").keyup(function() {

            if( $(this).val().length > 0 ) {
                $('.fileinput-button').removeClass('disabled');
            }
            else {
                $('.fileinput-button').addClass('disabled');
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

</script>


<script>
    // Get the template HTML and remove it from the doument
    var previewNode = document.querySelector("#template");
    previewNode.id = "";
    var previewTemplate = previewNode.parentNode.innerHTML;
    previewNode.parentNode.removeChild(previewNode);

    var myDropzone = new Dropzone(document.body, {
        url: '{{ route("kyc.upload") }}',
        init: function() {
            this.on("sending", function(file, xhr, formData) {
                formData.append( '_token', '{{ csrf_token() }}' );
                formData.append( 'identification_document', $('#identification_document').val() );
                formData.append( 'other_document', $('#other_document').val() );
                formData.append( 'document_number', $('#document_number').val() );
            });
        },
        paramName: "file",
        acceptedFiles: 'image/*,.pdf',
        maxFilesize: 2,
        maxFiles: 3,
        thumbnailWidth: 160,
        thumbnailHeight: 160,
        thumbnailMethod: 'contain',
        parallelUploads: 20,
        previewTemplate: previewTemplate,
        autoQueue: true,
        previewsContainer: "#previews",
        clickable: ".fileinput-button",
        success:function(file, response) {
            // Do what you want to do with your response
            // This return statement is necessary to remove progress bar after uploading.
            alert(response.msg);

            $('.fileinput-button').addClass('disabled');
            $("#other_document").val('');
            $("#document_number").val('');
            $("#identification_document").val('');

            Livewire.emit('setDocuments');
        }
    });

    myDropzone.on("addedfile", function(file) {
        $('.dropzone-here').hide();
        // Hookup the start button
        file.previewElement.querySelector(".start").onclick = function() { myDropzone.enqueueFile(file); };
    });

    // Update the total progress bar
    myDropzone.on("totaluploadprogress", function(progress) {
        //document.querySelector("#total-progress .progress-bar").style.width = progress + "%";
    });

    myDropzone.on("sending", function(file) {
        // Show the total progress bar when upload starts
        //document.querySelector("#total-progress").style.opacity = "1";
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
</script>

