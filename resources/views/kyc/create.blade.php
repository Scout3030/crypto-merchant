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
                    </svg> <strong>Sucess!</strong> Your account is registered. You will shortly receive and email to activate your account.
                </div>
            @endif

            @if ($errors->any())
                <div class="alert alert-danger" role="alert">
                    <svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="mr-2"><polyline points="9 11 12 14 22 4"></polyline><path d="M21 12v7a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11"></path></svg>
                    @foreach ($errors->all() as $error)
                        <span>{{ $error }}</span>
                    @endforeach
                </div>
            @endif

            <form class="row" action="{{ route('kyc.store') }}" method="POST" enctype="multipart/form-data">

                @csrf

                <div class="col-md-6 mb-3">
                    <label for="form-label">Full name</label>
                    <input type="text" name="full_name" class="form-control @error('full_name') is-invalid @enderror" placeholder="Enter Your Full Name">
                    @error('full_name')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-md-6 mb-3">
                    <label for="form-label">Date Of Birth</label>
                    <input type="date" name="date_of_birth" class="form-control" required>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="form-label">Address</label>
                    <input type="text" name="address" class="form-control" placeholder="Enter Your Address" required>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="form-label">Country</label>
                    <select id="country" name="country" class="form-select" aria-label="Default select example" onchange="selectCountry()" required>
                        <option selected disabled>Open this select menu</option>
                        @foreach ($countries as $country)
                        <option value="{{ $country->iso2 }}">{{ $country->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="form-label">State</label>
                    <select id="state" name="state" class="form-control" disabled required>
                        <option selected disabled>Open this select menu</option>
                    </select>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="form-label">City</label>
                    <select id="city" name="city" class="form-control" disabled required></select>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="form-label">Phone Number</label>
                    <input type="text" name="phone_number" class="form-control" required>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="form-label">Skype ID</label>
                    <input type="text" name="skype_id" class="form-control" required>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="form-label">Identification Document</label>
                    <select id="identification_document" name="identification_document" class="form-control" required onchange="viewInputDocument()">
                        <option value="1">Passport</option>
                        <option value="2">Certificate of incorporation</option>
                        <option value="3">Share Certificates</option>
                        <option value="4">MOU(s)</option>
                        <option value="5">Article of Incorporation</option>
                        <option value="6">Proof of Address</option>
                        <option value="7">Bank Statements</option>
                        <option value="8">Letter from bank for good standing</option>
                        <option value="999">Other</option>
                    </select>
                    <input type="text" id="other_document" name="other_document" class="form-control mt-2 d-none" placeholder="Enter your Other Identification Document">
                </div>
                <div class="col-md-6 mb-3">
                    <label for="form-label">Upload Document</label>
                    <input type="file" name="upload_document" class="form-control" accept="image/*,.pdf" required>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="form-label">Document Number</label>
                    <input type="text" name="document_number" class="form-control" required>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="form-label">Tax ID (Optional)</label>
                    <input type="text" name="tax_id" class="form-control">
                </div>
                <div class="col-md-12 d-flex flex-row-reverse">
                    <button type="submit" class="btn btn-primary">Next</button>
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
        console.log( country );

        axios.get( '/country-state/' + country )
        .then( function ( response ) {

            let state = document.getElementById( 'state' );

            state.innerHTML = '<option selected disabled>Open this select menu</option>';
            state.removeAttribute( 'disabled' );
            state.setAttribute( 'onchange', 'selectState()' );

            let city = document.getElementById( 'city' );
            city.innerHTML = '';

            response.data.forEach( element => {
                let option = document.createElement( 'option' );
                option.text = element.name;
                option.value = element.iso2
                state.add( option );
            });
        })
        .catch( function (error) {
            console.log( error );
        });
    }

    function selectState() {
        let state = document.getElementById( 'state' ).value
        console.log( state );

        axios.get( '/country-state-city/' + state )
        .then( function ( response ) {

            let city = document.getElementById( 'city' );

            city.innerHTML = '';
            city.removeAttribute( 'disabled' );

            response.data.forEach( element => {
                let option = document.createElement( 'option' );
                option.text = element.name;
                option.value = element.id
                city.add(option);
            });
        })
        .catch( function ( error ) {
            console.log( error );
        });
    }

    function viewInputDocument() {
        var input_document = document.getElementById('other_document');

        input_document.classList.add( 'd-none' );
        input_document.removeAttribute( 'required' );

        let identification_document = document.getElementById('identification_document').value;

        if (identification_document == '999') {

            input_document.classList.remove( 'd-none' );
            input_document.setAttribute( 'required', 'true' );
        }
    }

</script>
