<x-layouts.merchant>

    <div class="titleMain">
        <h1>Step 2: Know Your Business</h1>
    </div>

    @livewire('kyc-step-two')

</x-layouts.merchant>

<script type="text/javascript">

    $(document).ready(function () {

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

        $('#director_country_0').select2({
            theme: 'flat',
            destroy: true
        }).on('select2:select', function (e) {

            $('#director_city_0').empty();
            $('#director_state_0').empty();

            $('#director_city_other_0').addClass('d-none');
            $('#director_state_other_0').addClass('d-none');

            var data = e.params.data;

            if(data.id.length > 0) {
                Livewire.emit('setCountryDirector', data.id, 0);
                selectStateDirector(data.id, 0);
            }
        });

        $('#holder_country_0').select2({
            theme: 'flat',
            destroy: true
        }).on('select2:select', function (e) {

            $('#holder_city_0').empty();
            $('#holder_state_0').empty();

            $('#holder_city_other_0').addClass('d-none');
            $('#holder_state_other_0').addClass('d-none');

            var data = e.params.data;

            if(data.id.length > 0) {
                Livewire.emit('setCountryHolder', data.id, 0);
                selectStateHolder(data.id, 0);
            }
        });

    });

    Livewire.on('resultAdd', id => {
        $('#director_country_'+id).select2({
            theme: 'flat',
            destroy: true
        }).on('select2:select', function (e) {

            $('#director_city_'+id).empty();
            $('#director_state_'+id).empty();

            $('#director_city_other_'+id).addClass('d-none');
            $('#director_state_other_'+id).addClass('d-none');

            var data = e.params.data;

            if(data.id.length > 0) {
                Livewire.emit('setCountryDirector', data.id, id);
                selectStateDirector(data.id, id);
            }
        });
    })

    Livewire.on('resultAddHolder', id => {
        $('#holder_country_'+id).select2({
            theme: 'flat',
            destroy: true
        }).on('select2:select', function (e) {

            $('#holder_city_'+id).empty();
            $('#holder_state_'+id).empty();

            $('#holder_city_other_'+id).addClass('d-none');
            $('#holder_state_other_'+id).addClass('d-none');

            var data = e.params.data;

            if(data.id.length > 0) {
                Livewire.emit('setCountryHolder', data.id, id);
                selectStateHolder(data.id, id);
            }
        });
    })

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

    function selectStateDirector(country, id) {
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
                    $('#director_city_'+id).append('<option value="other">Other</option>');

                    $('#director_city_other_'+id).removeClass('d-none');
                    $('#director_state_other_'+id).removeClass('d-none');
                } else {
                    arg.forEach(function(item){
                        $('#director_state_'+id).append('<option value="'+item.iso2+'">'+ item.name +'</option>');
                    });
                }

                $('#director_state_'+id).append('<option value="other">Other</option>');

                $('#director_state_'+id).select2({
                    theme: 'flat',
                    destroy: true,
                }).on('select2:select', function (e) {

                    var data = e.params.data;

                    if(data.id.length > 0) {
                        Livewire.emit('setStateDirector', data.id, id);
                        selectCityDirector(data.id, id);
                    }
                });

                $('.loading').hide();
            }
        })

    }

    function selectCityDirector(state, id) {

        $('.loading').show();
        $('#director_city_'+id).empty();

        if ( state == 'other') {
            $('#director_city_'+id).append('<option value="other">Other</option>');

            $('#director_city_other_'+id).removeClass('d-none');
            $('#director_state_other_'+id).removeClass('d-none');

            Livewire.emit('setCityDirector', 'other', id);

            $('.loading').hide();

        } else {

            $('#director_city_other_'+id).addClass('d-none');
            $('#director_state_other_'+id).addClass('d-none');

            $.ajax({
                url: '{{ route("country.state.city") }}',
                type: 'GET',
                dataType: 'json',
                data: {
                    state: state
                },
                success: function (arg) {

                    arg.forEach(function(item){
                        $('#director_city_'+id).append('<option value="'+item.id+'">'+ item.name +'</option>');
                    });

                    $('#director_city_'+id).append('<option value="other">Other</option>');

                    $('#director_city_'+id).select2({
                        theme: 'flat',
                        destroy: true,
                    }).on('select2:select', function (e) {

                        var data = e.params.data;

                        Livewire.emit('setCityDirector', data.id, id);

                        (data.id == 'other')
                            ? $('#director_city_other_'+id).removeClass('d-none')
                            : $('#director_city_other_'+id).addClass('d-none');
                    });

                    $('.loading').hide();
                }
            })
        }
    }

    function selectStateHolder(country, id) {
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
                    $('#holder_city_'+id).append('<option value="other">Other</option>');

                    $('#holder_city_other_'+id).removeClass('d-none');
                    $('#holder_state_other_'+id).removeClass('d-none');
                } else {
                    arg.forEach(function(item){
                        $('#holder_state_'+id).append('<option value="'+item.iso2+'">'+ item.name +'</option>');
                    });
                }

                $('#holder_state_'+id).append('<option value="other">Other</option>');

                $('#holder_state_'+id).select2({
                    theme: 'flat',
                    destroy: true,
                }).on('select2:select', function (e) {

                    var data = e.params.data;

                    if(data.id.length > 0) {
                        Livewire.emit('setStateHolder', data.id, id);
                        selectCityHolder(data.id, id);
                    }
                });

                $('.loading').hide();
            }
        })

    }

    function selectCityHolder(state, id) {

        $('.loading').show();
        $('#holder_city_'+id).empty();

        if ( state == 'other') {
            $('#holder_city_'+id).append('<option value="other">Other</option>');

            $('#holder_city_other_'+id).removeClass('d-none');
            $('#holder_state_other_'+id).removeClass('d-none');

            Livewire.emit('setCityHolder', 'other', id);

            $('.loading').hide();

        } else {

            $('#holder_city_other_'+id).addClass('d-none');
            $('#holder_state_other_'+id).addClass('d-none');

            $.ajax({
                url: '{{ route("country.state.city") }}',
                type: 'GET',
                dataType: 'json',
                data: {
                    state: state
                },
                success: function (arg) {

                    arg.forEach(function(item){
                        $('#holder_city_'+id).append('<option value="'+item.id+'">'+ item.name +'</option>');
                    });

                    $('#holder_city_'+id).append('<option value="other">Other</option>');

                    $('#holder_city_'+id).select2({
                        theme: 'flat',
                        destroy: true,
                    }).on('select2:select', function (e) {

                        var data = e.params.data;

                        Livewire.emit('setCityHolder', data.id, id);

                        (data.id == 'other')
                            ? $('#holder_city_other_'+id).removeClass('d-none')
                            : $('#holder_city_other_'+id).addClass('d-none');
                    });

                    $('.loading').hide();
                }
            })
        }
    }

</script>
