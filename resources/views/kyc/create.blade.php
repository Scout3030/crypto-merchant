<x-layouts.merchant>
    <main class="">

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

        <form class="formLogin" action="{{ route('kyc.store') }}" method="POST" enctype="multipart/form-data">

            @csrf

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="">Full name</label>
                        <input type="text" name="full_name" class="form-control" required>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="">Date Of Birth</label>
                        <input type="date" name="date_of_birth" class="form-control" required>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="">Address</label>
                        <input type="text" name="address" class="form-control" required>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="">Country</label>
                        <select id="country_id" class="form-control" required>
                            <option value="1">Prueba</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="">state</label>
                        <select id="state_id" class="form-control" required>
                            <option value="1">Prueba</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="">City</label>
                        <select id="city_id" name="city_id" class="form-control" required>
                            <option value="1">Prueba</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="">Phone Number</label>
                        <input type="text" name="phone_number" class="form-control" required>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="">Skype ID</label>
                        <input type="text" name="skype_id" class="form-control" required>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="">Identification Document</label>
                        <select name="identification_document" class="form-control" required>
                            <option value="1">Passport</option>
                            <option value="2">Certificate of incorporation</option>
                            <option value="3">Share Certificates</option>
                            <option value="4">MOU(s)</option>
                            <option value="5">Article of Incorporation</option>
                            <option value="6">Proof of Address</option>
                            <option value="7">Bank Statements</option>
                            <option value="8">Letter from bank for good standing</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="">Upload Document</label>
                        <input type="file" name="upload_document" class="form-control" accept="image/*,.pdf" required>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="">Document Number</label>
                        <input type="text" name="document_number" class="form-control" required>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="">Tax ID (Optional)</label>
                        <input type="text" name="tax_id" class="form-control">
                    </div>
                </div>
                <div class="col-12">
                    <button type="submit" class="btn btn-primary mt-4 pull-right">Next</button>
                </div>
            </div>
        </form>
    </main>
</x-layouts.merchant>
