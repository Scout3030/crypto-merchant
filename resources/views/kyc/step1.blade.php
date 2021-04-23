<x-layouts.merchant>

    <div class="titleMain">
        <h1>Step 1: Personal Information</h1>
    </div>

    @livewire('kyc-step-one')

</x-layouts.merchant>


<script type="text/javascript">

    function selectCountry() {
        let country = document.getElementById( 'country' ).value

        axios.get( '/country-state/' + country )
        .then( function ( response ) {

            let city = document.getElementById( 'city' );
            city.innerHTML = '';
            city.classList.remove('d-none');

            let state_other = document.getElementById('other_state');
            state_other.classList.add('d-none');

            let city_other = document.getElementById('other_city');
            city_other.classList.add('d-none');


            let state = document.getElementById( 'state' );
            state.innerHTML = '<option selected disabled>Open this select menu</option>';
            state.setAttribute( 'onchange', 'selectState()' );

            response.data.forEach( element => {
                let option = document.createElement( 'option' );
                option.text = element.name;
                option.value = element.iso2
                state.add( option );
            });

            let option = document.createElement( 'option' );
            option.text = 'Other';
            option.value = 'other'
            state.add( option );
        })
        .catch( function (error) {
            console.log( error );
        });
    }

    function selectState() {
        let state = document.getElementById( 'state' ).value
        var city = document.getElementById( 'city' );

        city.innerHTML = '';

        if (state == 'other') {

            let option = document.createElement( 'option' );
                option.text = 'Other';
                option.value = 'other'

            city.add( option );
            city.value = 'other';

            let city_other = document.getElementById('other_city');
            city_other.classList.remove('d-none');

            let state_other = document.getElementById('other_state');
            state_other.classList.remove('d-none');

        } else {

            let city_other = document.getElementById('other_city');
            city_other.classList.add('d-none');

            let state_other = document.getElementById('other_state');
            state_other.classList.add('d-none');

            axios.get( '/country-state-city/' + state )
            .then( function ( response ) {

                city.classList.remove('d-none');
                city.setAttribute( 'onchange', 'selectCity()' );

                response.data.forEach( element => {
                    let option = document.createElement( 'option' );
                    option.text = element.name;
                    option.value = element.id
                    city.add(option);
                });

                let option = document.createElement( 'option' );
                option.text = 'Other';
                option.value = 'other'
                city.add( option );
            })
            .catch( function ( error ) {
                console.log( error );
            });

        }

    }

    function selectCity() {
        let city = document.getElementById( 'city' ).value
        let city_other = document.getElementById('other_city').classList;

        (city == 'other')
            ? city_other.remove('d-none')
            : city_other.add('d-none');


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
