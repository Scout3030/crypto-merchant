<div>
    <form class="formLogin row">

        <div class="card shadow mb-5">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="form-label">Full name <span class="text-danger">*</span></label>
                        <input type="text"
                            wire:model="full_name"
                            class="form-control @error('full_name') validation @enderror"
                            placeholder="Enter Your Full Name"
                            >
                        @error('full_name')
                            <div class="form-text validation pb-3">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="form-label">Date Of Birth <span class="text-danger">*</span></label>
                        <input type="date"
                            wire:model="date_of_birth"
                            class="form-control @error('date_of_birth') validation @enderror"
                            >
                        @error('date_of_birth')
                            <div class="form-text validation pb-3">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="form-label">Address <span class="text-danger">*</span></label>
                        <input type="text"
                            wire:model="address"
                            class="form-control @error('address') validation @enderror"
                            placeholder="Enter Your Address"
                            >
                        @error('address')
                            <div class="form-text validation pb-3">{{ $message }}</div>
                        @enderror
                    </div>
                    <div wire:ignore class="col-md-6 mb-3">
                        <label for="form-label">Country <span class="text-danger">*</span></label>
                        <select id="country"class="form-control @error('country') validation @enderror">
                            <option selected disabled>Select Country</option>
                            @foreach ($countries as $country)
                            <option value="{{ $country->iso2 }}">{{ $country->name }}</option>
                            @endforeach
                        </select>
                        @error('country')
                            <div class="form-text validation pb-3">{{ $message }}</div>
                        @enderror
                    </div>
                    <div wire:ignore class="col-md-6 mb-3">
                        <label for="form-label">State <span class="text-danger">*</span></label>
                        <select id="state" class="form-control @error('state') validation @enderror">
                            <option selected disabled>Select State</option>
                        </select>
                        @error('state')
                            <div class="form-text validation pb-3">{{ $message }}</div>
                        @enderror

                        <input type="text"
                            id="other_state"
                            wire:model="state_other"
                            class="form-control mt-2 d-none @error('state_other') validation @enderror"
                            placeholder="Enter your Other State"
                            >
                        @error('state_other')
                            <div class="form-text validation pb-3">{{ $message }}</div>
                        @enderror
                    </div>
                    <div wire:ignore class="col-md-6 mb-3">
                        <label for="form-label">City <span class="text-danger">*</span></label>
                        <select id="city" class="form-control @error('city') validation @enderror">
                            <option selected disabled>Select City</option>
                        </select>
                        @error('city')
                            <div class="form-text validation pb-3">{{ $message }}</div>
                        @enderror

                        <input type="text"
                            id="other_city"
                            wire:model="city_other"
                            class="form-control mt-2 d-none @error('city_other') validation @enderror"
                            placeholder="Enter your Other City"
                            >
                        @error('city_other')
                            <div class="form-text validation pb-3">{{ $message }}</div>
                        @enderror
                    </div>
                    <div wire:ignore class="col-md-6 mb-3">
                        <label for="form-label">Phone Number <span class="text-danger">*</span></label>
                        <select id="phone_code" class="form-control @error('phone_number') validation @enderror">
                            @foreach ($countries as $country)
                            <option value="{{ $country->phonecode }}">{{ $country->phonecode }}</option>
                            @endforeach
                        </select>
                        <input type="text"
                            wire:model="phone_number"
                            class="form-control mt-2 @error('phone_number') validation @enderror"
                            placeholder="Enter Phone Number"
                            >
                        @error('phone_number')
                            <div class="form-text validation pb-3">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="form-label">Skype ID <span class="text-danger">*</span></label>
                        <input type="text"
                            wire:model="skype_id"
                            class="form-control @error('skype_id') validation @enderror"
                            placeholder="Enter Skype ID"
                            >
                        @error('skype_id')
                            <div class="form-text validation pb-3">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="form-label">Tax ID (Optional)</label>
                        <input type="text"
                            wire:model="tax_id"
                            class="form-control @error('tax_id') validation @enderror"
                            placeholder="Enter Tax ID"
                            >
                        @error('tax_id')
                            <div class="form-text validation pb-3">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>
        </div>

        <div class="card shadow mb-5">
            <div class="card-header">
                <div class="card-title">
                    <h4>DOCUMENTS</h4>
                </div>
            </div>
            <div class="card-body">
                <div class="row mb-4">
                    <div wire:ignore class="col-md-4 mb-3">
                        <label for="form-label">Identification Document  <span class="text-danger">*</span></label>
                        <select id="identification_document"
                            name="identification_document"
                            class="form-select @error('identification_document') validation @enderror">
                            <option value="" selected disabled>Enter Identification Document</option>
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
                        @error('identification_document')
                            <div class="form-text validation pb-3">{{ $message }}</div>
                        @enderror

                        <input type="text"
                            id="other_document"
                            name="other_document"
                            class="form-control mt-2 d-none @error('other_document') validation @enderror"
                            placeholder="Enter your Other Identification Document"
                            >
                        @error('other_document')
                            <div class="form-text validation pb-3">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-4 mb-3">
                        <label for="form-label">Document Number <span class="text-danger">*</span></label>
                        <input type="text"
                            id="document_number"
                            name="document_number"
                            class="form-control @error('document_number') validation @enderror"
                            placeholder="Enter Document Number"
                            >
                        @error('document_number')
                            <div class="form-text validation pb-3">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-4 mb-3">
                        <div id="actions">
                            <span class="btn btn-success fileinput-button disabled">
                                <i class="flaticon-381-networking"></i>
                                <span>UPLOAD</span>
                            </span>

                            <button class="start d-none">Start</button>
                        </div>
                    </div>
                </div>

                <div class="row mb-4">
                    <div class="col-12">

                        <div class="fallback">
                            <input name="file" type="file" multiple />
                        </div>

                        <div class="table table-striped files" id="previews">
                            <div id="template" class="file-row row">
                                <!-- This is used as the file preview template -->
                                <div class="col-xs-12 col-lg-3">
                                    <span class="preview" style="width:160px;height:160px;">
                                        <img data-dz-thumbnail />
                                    </span>
                                    <br/>
                                    <button class="btn btn-primary start" style="display:none;">
                                        <i class="glyphicon glyphicon-upload"></i>
                                        <span>Empezar</span>
                                    </button>
                                    <button data-dz-remove class="btn btn-warning cancel">
                                        <i class="icon-ban-circle fa fa-ban-circle"></i>
                                        <span>Cancelar</span>
                                    </button>
                                    <button data-dz-remove class="btn btn-danger delete">
                                        <i class="icon-trash fa fa-trash"></i>
                                        <span>Eliminar</span>
                                    </button>
                                </div>
                                <div class="col-xs-12 col-lg-9">
                                    <p class="name" data-dz-name></p>
                                    <p class="size" data-dz-size></p>
                                    <div>
                                        <strong class="error text-danger" data-dz-errormessage></strong>
                                    </div>
                                    <div>
                                        <div class="progress progress-striped active" role="progressbar" aria-valuemin="0" aria-valuemax="100" aria-valuenow="0">
                                            <div class="progress-bar progress-bar-success" style="width:0%;" data-dz-uploadprogress></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        {{-- <div class="dropzone-here">Drop files here to upload.</div> --}}


                    </div>
                </div>
            </div>
        </div>

        <div class="card shadow mb-5">
            <div class="card-body">

                <div class="row">
                    <div class="col-md-6">
                        <p>All fields marked with <span class="text-danger">*</span> are mandatory</p>
                    </div>
                    <div class="col-md-6 d-flex flex-row-reverse">
                        <button wire:click.prevent="store('draft')" class="btn-next mt-3">Save as Draft</button>
                        <button wire:click.prevent="store('next')" class="btn-next mt-3">Next</button>
                    </div>

                    <div class="col-md-12">
                        <ul class="nav nav-wizard">
                            <li><a class="nav-link active" href="#">
                                <span>1</span>
                            </a></li>
                            <li><a class="nav-link" href="#">
                                <span>2</span>
                            </a></li>
                            <li><a class="nav-link" href="#">
                                <span>3</span>
                            </a></li>
                            <li><a class="nav-link" href="#">
                                <span>4</span>
                            </a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

    </form>
</div>
