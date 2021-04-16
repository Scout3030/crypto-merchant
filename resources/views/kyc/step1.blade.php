<x-layouts.merchant>

    <div class="titleMain">
        <h1>KYC</h1>
        <p>Step 1: Personal Information</p>
    </div>

    <div class="content card">
        <div class="card-body">
            @if ( Session::has('success') )
                <div class="alert alert-success" role="alert">
                    <svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="mr-2">
                        <polyline points="9 11 12 14 22 4"></polyline>
                        <path d="M21 12v7a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11"></path>
                    </svg> <strong>Sucess!</strong> Registration created successfully!
                </div>
            @endif

            <form class="formLogin row" action="{{ route('kyc.store.step1') }}" method="POST" enctype="multipart/form-data">

                @csrf

                <input type="hidden" name="step" value="{{ $step }}">

                <div class="col-md-6 mb-3">
                    <label for="form-label">Full name</label>
                    <input type="text"
                        name="full_name"
                        class="form-control @error('full_name') validation @enderror"
                        placeholder="Enter Your Full Name"
                        value="{{ old('full_name') }}">
                    @error('full_name')
                        <div class="form-text validation pb-3">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-md-6 mb-3">
                    <label for="form-label">Date Of Birth</label>
                    <input type="date" name="date_of_birth" class="form-control @error('date_of_birth') validation @enderror" value="{{ old('date_of_birth') }}">
                    @error('date_of_birth')
                        <div class="form-text validation pb-3">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-md-6 mb-3">
                    <label for="form-label">Address</label>
                    <input type="text" name="address" class="form-control @error('address') validation @enderror" placeholder="Enter Your Address" value="{{ old('address') }}">
                    @error('address')
                        <div class="form-text validation pb-3">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-md-6 mb-3">
                    <label for="form-label">Country</label>
                    <select id="country" name="country" class="form-select @error('country') validation @enderror" onchange="selectCountry()">
                        <option selected disabled>Open this select menu</option>
                        @foreach ($countries as $country)
                        <option value="{{ $country->iso2 }}" {{ old('country') == $country->iso2 ? 'selected' : '' }}>{{ $country->name }}</option>
                        @endforeach
                    </select>
                    @error('country')
                        <div class="form-text validation pb-3">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-md-6 mb-3">
                    <label for="form-label">State</label>
                    <select id="state" name="state" class="form-select @error('state') validation @enderror">
                        @if ( Session::has('states') )
                            @foreach (Session::get('states') as $state)
                                <option value="{{ $state->iso2 }}" {{ old('state') == $state->iso2 ? 'selected' : '' }}>{{ $state->name }}</option>
                            @endforeach
                            <option value="other" {{ old('state') == 'other' ? 'selected' : '' }}>Other</option>
                        @endif
                    </select>
                    @error('state')
                        <div class="form-text validation pb-3">{{ $message }}</div>
                    @enderror

                    <input type="text"
                        id="other_state"
                        name="state_other"
                        class="form-control mt-2 @if(old('state') != 'other') d-none @endif @error('state_other') validation @enderror"
                        placeholder="Enter your Other State"
                        value="{{ old('state_other') }}">
                    @error('state_other')
                        <div class="form-text validation pb-3">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-md-6 mb-3">
                    <label for="form-label">City</label>
                    <select id="city" name="city" class="form-select @error('city') validation @enderror">
                        @if ( Session::has('cities') )
                            @foreach (Session::get('cities') as $city)
                                <option value="{{ $city->id }}" {{ old('city') == $city->id ? 'selected' : '' }}>{{ $city->name }}</option>
                            @endforeach
                            <option value="other" {{ old('city') == 'other' ? 'selected' : '' }}>Other</option>
                        @endif
                    </select>
                    @error('city')
                        <div class="form-text validation pb-3">{{ $message }}</div>
                    @enderror

                    <input type="text"
                        id="other_city"
                        name="city_other"
                        class="form-control mt-2 @if( old('city') != 'other' ) d-none @endif @error('city_other') validation @enderror"
                        placeholder="Enter your Other City"
                        value="{{ old('city_other') }}">
                    @error('city_other')
                        <div class="form-text validation pb-3">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-md-6 mb-3">
                    <label for="form-label">Phone Number</label>
                    <input type="text" name="phone_number" class="form-control @error('phone_number') validation @enderror" value="{{ old('phone_number') }}">
                    @error('phone_number')
                        <div class="form-text validation pb-3">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-md-6 mb-3">
                    <label for="form-label">Skype ID</label>
                    <input type="text" name="skype_id" class="form-control @error('skype_id') validation @enderror" value="{{ old('skype_id') }}">
                    @error('skype_id')
                        <div class="form-text validation pb-3">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-md-6 mb-3">
                    <label for="form-label">Identification Document</label>
                    <select id="identification_document" name="identification_document" class="form-select @error('identification_document') validation @enderror" onchange="viewInputDocument()">
                        <option value="1" {{ old('identification_document') == 1 ? 'checked' : '' }}>Passport</option>
                        <option value="2" {{ old('identification_document') == 2 ? 'checked' : '' }}>Certificate of incorporation</option>
                        <option value="3" {{ old('identification_document') == 3 ? 'checked' : '' }}>Share Certificates</option>
                        <option value="4" {{ old('identification_document') == 4 ? 'checked' : '' }}>MOU(s)</option>
                        <option value="5" {{ old('identification_document') == 5 ? 'checked' : '' }}>Article of Incorporation</option>
                        <option value="6" {{ old('identification_document') == 6 ? 'checked' : '' }}>Proof of Address</option>
                        <option value="7" {{ old('identification_document') == 7 ? 'checked' : '' }}>Bank Statements</option>
                        <option value="8" {{ old('identification_document') == 8 ? 'checked' : '' }}>Letter from bank for good standing</option>
                        <option value="999" {{ old('identification_document') == 999 ? 'checked' : '' }}>Other</option>
                    </select>
                    @error('identification_document')
                        <div class="form-text validation pb-3">{{ $message }}</div>
                    @enderror
                    <input type="text"
                        id="other_document"
                        name="other_document"
                        class="form-control mt-2 @if( old('other_document') == null ) d-none @endif @error('other_document') validation @enderror"
                        placeholder="Enter your Other Identification Document"
                        value="{{ old('other_document') }}">

                    @error('other_document')
                        <div class="form-text validation pb-3">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-md-6 mb-3">
                    <label for="form-label">Upload Document</label>
                    <input type="file" name="image" class="form-control @error('image') validation @enderror" accept="image/*,.pdf">
                    @error('image')
                        <div class="form-text validation pb-3">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-md-6 mb-3">
                    <label for="form-label">Document Number</label>
                    <input type="text" name="document_number" class="form-control @error('document_number') validation @enderror" value="{{ old('document_number') }}">
                    @error('document_number')
                        <div class="form-text validation pb-3">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-md-6 mb-3">
                    <label for="form-label">Tax ID (Optional)</label>
                    <input type="text" name="tax_id" class="form-control @error('tax_id') validation @enderror" value="{{ old('tax_id') }}">
                    @error('tax_id')
                        <div class="form-text validation pb-3">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-md-12 d-flex flex-row-reverse">
                    <button type="submit" class="btn btn-primary mt-3">Next</button>
                </div>
                <div class="col-md-12">
                    <ul class="nav nav-wizard">
                        <li><a class="nav-link inactive active" href="#">
                            <span>1</span>
                        </a></li>
                        <li><a class="nav-link" href="#">
                            <span>2</span>
                        </a></li>
                        <li><a class="nav-link" href="#">
                            <span>3</span>
                        </a></li>
                        <li><a class="nav-link inactive" href="#">
                            <span>4</span>
                        </a></li>
                    </ul>
                </div>
            </form>

        </div>

    </div>
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
