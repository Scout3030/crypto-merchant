<div>
    <form class="formLogin row">

        <div class="card shadow mb-5">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="form-label">Company Name <span class="text-danger">*</span></label>
                        <input type="text"
                            wire:model="company_name"
                            class="form-control @error('company_name') validation @enderror"
                            placeholder="Enter Company name"
                            >
                        @error('company_name')
                            <div class="form-text validation pb-3">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="form-label">Registration Number <span class="text-danger">*</span></label>
                        <input type="text"
                            wire:model="registration_number"
                            class="form-control @error('registration_number') validation @enderror"
                            placeholder="Enter Registration Number"
                            >
                        @error('registration_number')
                            <div class="form-text validation pb-3">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="form-label">Doing Business As <span class="text-danger">*</span></label>
                        <input type="text"
                            wire:model="doing_business_as"
                            class="form-control @error('doing_business_as') validation @enderror"
                            placeholder="Enter"
                            >
                        @error('doing_business_as')
                            <div class="form-text validation pb-3">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-md-6 mb-3"></div>

                    <div class="col-md-6 mb-3">
                        <label for="form-label">Company Address <span class="text-danger">*</span></label>
                        <input type="text"
                            wire:model="company_address"
                            class="form-control @error('company_address') validation @enderror"
                            placeholder="Enter Company Address"
                            >
                        @error('company_address')
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

                </div>
            </div>
        </div>

        <div class="card shadow mb-5">
            <div class="card-header">
                <h4 class="card-title">Directors</h4>
            </div>
            <div class="card-body">

                <div class="add-input">
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="form-label">Director Name <span class="text-danger">*</span></label>
                            <input type="text"
                                wire:model="director_name.0"
                                class="form-control @error('director_name.0') validation @enderror"
                                placeholder="Enter Director´s Name"
                                >
                            @error('director_name.0')
                                <div class="form-text validation pb-3">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="form-label">Director Address <span class="text-danger">*</span></label>
                            <input type="text"
                                wire:model="director_address.0"
                                class="form-control @error('director_address.0') validation @enderror"
                                placeholder="Enter Director´s Address"
                                >
                            @error('director_address.0')
                                <div class="form-text validation pb-3">{{ $message }}</div>
                            @enderror
                        </div>
                        <div wire:ignore class="col-md-6 mb-3">
                            <label for="form-label">Country <span class="text-danger">*</span></label>
                            <select id="director_country_0" class="form-control @error('director_country.0') validation @enderror">
                                <option selected disabled>Select Country</option>
                                @foreach ($countries as $country)
                                <option value="{{ $country->iso2 }}">{{ $country->name }}</option>
                                @endforeach
                            </select>
                            @error('director_country.0')
                                <div class="form-text validation pb-3">{{ $message }}</div>
                            @enderror
                        </div>
                        <div wire:ignore class="col-md-6 mb-3">
                            <label for="form-label">State <span class="text-danger">*</span></label>
                            <select id="director_state_0" class="form-control @error('director_state.0') validation @enderror">
                                <option selected disabled>Select State</option>
                            </select>
                            @error('director_state.0')
                                <div class="form-text validation pb-3">{{ $message }}</div>
                            @enderror

                            <input type="text"
                                id="director_state_other_0"
                                wire:model="director_state_other.0"
                                class="form-control mt-2 d-none @error('director_state_other.0') validation @enderror"
                                placeholder="Enter your Other State"
                                >
                            @error('director_state_other.0')
                                <div class="form-text validation pb-3">{{ $message }}</div>
                            @enderror
                        </div>
                        <div wire:ignore class="col-md-6 mb-3">
                            <label for="form-label">City <span class="text-danger">*</span></label>
                            <select id="director_city_0" class="form-control @error('director_city.0') validation @enderror">
                                <option selected disabled>Select City</option>
                            </select>
                            @error('director_city.0')
                                <div class="form-text validation pb-3">{{ $message }}</div>
                            @enderror

                            <input type="text"
                                id="director_city_other_0"
                                wire:model="director_city_other.0"
                                class="form-control mt-2 d-none @error('director_city_other.0') validation @enderror"
                                placeholder="Enter your Other City"
                                >
                            @error('director_city_other.0')
                                <div class="form-text validation pb-3">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>

                @foreach ($inputs as $key => $value )
                <div class="add-input">
                    <hr class="bg-dark">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="pull-right">
                                <button class="btn" wire:click.prevent="remove({{$key}})">Remove</button>
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="form-label">Director Name <span class="text-danger">*</span></label>
                            <input type="text"
                                wire:model="director_name.{{ $value }}"
                                class="form-control @error('director_name.'.$value) validation @enderror"
                                placeholder="Enter Director´s Name"
                                >
                            @error('director_name.'.$value)
                                <div class="form-text validation pb-3">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="form-label">Director Address <span class="text-danger">*</span></label>
                            <input type="text"
                                wire:model="director_address.{{ $value }}"
                                class="form-control @error('director_address.'.$value) validation @enderror"
                                placeholder="Enter Director´s Address"
                                >
                            @error('director_address.'.$value)
                                <div class="form-text validation pb-3">{{ $message }}</div>
                            @enderror
                        </div>
                        <div wire:ignore class="col-md-6 mb-3">
                            <label for="form-label">Country <span class="text-danger">*</span></label>
                            <select id="director_country_{{ $value }}"class="form-control @error('director_country.'.$value) validation @enderror">
                                <option selected disabled>Select Country</option>
                                @foreach ($countries as $country)
                                <option value="{{ $country->iso2 }}">{{ $country->name }}</option>
                                @endforeach
                            </select>
                            @error('director_country.'.$value)
                                <div class="form-text validation pb-3">{{ $message }}</div>
                            @enderror
                        </div>
                        <div wire:ignore class="col-md-6 mb-3">
                            <label for="form-label">State <span class="text-danger">*</span></label>
                            <select id="director_state_{{ $value }}" class="form-control @error('director_state.'.$value) validation @enderror">
                                <option selected disabled>Select State</option>
                            </select>
                            @error('director_state.'.$value)
                                <div class="form-text validation pb-3">{{ $message }}</div>
                            @enderror

                            <input type="text"
                                id="director_state_other_{{ $value }}"
                                wire:model="director_state_other.{{ $value }}"
                                class="form-control mt-2 d-none @error('director_state_other.'.$value) validation @enderror"
                                placeholder="Enter your Other State"
                                >
                            @error('director_state_other.'.$value)
                                <div class="form-text validation pb-3">{{ $message }}</div>
                            @enderror
                        </div>
                        <div wire:ignore class="col-md-6 mb-3">
                            <label for="form-label">City <span class="text-danger">*</span></label>
                            <select id="director_city_{{ $value }}" class="form-control @error('director_city.'.$value) validation @enderror">
                                <option selected disabled>Select City</option>
                            </select>
                            @error('director_city.'.$value)
                                <div class="form-text validation pb-3">{{ $message }}</div>
                            @enderror

                            <input type="text"
                                id="director_city_other_{{ $value }}"
                                wire:model="director_city_other.{{ $value }}"
                                class="form-control mt-2 d-none @error('director_city_other.'.$value) validation @enderror"
                                placeholder="Enter your Other City"
                                >
                            @error('director_city_other.'.$value)
                                <div class="form-text validation pb-3">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>
                @endforeach

            </div>
            <div class="card-footer">
                <a class="pull-right" wire:click.prevent="add({{$i}})">+ Add More Director</a>
            </div>
        </div>

        <div class="card shadow mb-5">
            <div class="card-header">
                <h4 class="card-title">Shareholders</h4>
            </div>
            <div class="card-body">

                <div class="add-input">
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="form-label">Shareholder´s Name <span class="text-danger">*</span></label>
                            <input type="text"
                                wire:model="holder_name.0"
                                class="form-control @error('holder_name.0') validation @enderror"
                                placeholder="Enter Shareholder´s Name"
                                >
                            @error('holder_name.0')
                                <div class="form-text validation pb-3">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="form-label">Shareholder´s Address <span class="text-danger">*</span></label>
                            <input type="text"
                                wire:model="holder_address.0"
                                class="form-control @error('holder_address.0') validation @enderror"
                                placeholder="Enter Shareholder´s Address"
                                >
                            @error('holder_address.0')
                                <div class="form-text validation pb-3">{{ $message }}</div>
                            @enderror
                        </div>
                        <div wire:ignore class="col-md-6 mb-3">
                            <label for="form-label">Country <span class="text-danger">*</span></label>
                            <select id="holder_country_0"class="form-control @error('holder_country.0') validation @enderror">
                                <option selected disabled>Select Country</option>
                                @foreach ($countries as $country)
                                <option value="{{ $country->iso2 }}">{{ $country->name }}</option>
                                @endforeach
                            </select>
                            @error('holder_country.0')
                                <div class="form-text validation pb-3">{{ $message }}</div>
                            @enderror
                        </div>
                        <div wire:ignore class="col-md-6 mb-3">
                            <label for="form-label">State <span class="text-danger">*</span></label>
                            <select id="holder_state_0" class="form-control @error('holder_state.0') validation @enderror">
                                <option selected disabled>Select State</option>
                            </select>
                            @error('holder_state.0')
                                <div class="form-text validation pb-3">{{ $message }}</div>
                            @enderror

                            <input type="text"
                                id="holder_state_other_0"
                                wire:model="holder_state_other.0"
                                class="form-control mt-2 d-none @error('holder_state_other.0') validation @enderror"
                                placeholder="Enter your Other State"
                                >
                            @error('holder_state_other.0')
                                <div class="form-text validation pb-3">{{ $message }}</div>
                            @enderror
                        </div>
                        <div wire:ignore class="col-md-6 mb-3">
                            <label for="form-label">City <span class="text-danger">*</span></label>
                            <select id="holder_city_0" class="form-control @error('holder_city.0') validation @enderror">
                                <option selected disabled>Select City</option>
                            </select>
                            @error('holder_city.0')
                                <div class="form-text validation pb-3">{{ $message }}</div>
                            @enderror

                            <input type="text"
                                id="holder_city_other_0"
                                wire:model="holder_city_other.0"
                                class="form-control mt-2 d-none @error('holder_city_other.0') validation @enderror"
                                placeholder="Enter your Other City"
                                >
                            @error('holder_city_other.0')
                                <div class="form-text validation pb-3">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>

                @foreach ($inputs_holders as $key => $value )
                <div class="add-input">
                    <hr class="bg-dark">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="pull-right">
                                <button class="btn" wire:click.prevent="removeHolder({{$key}})">Remove</button>
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="form-label">Shareholder´s Name <span class="text-danger">*</span></label>
                            <input type="text"
                                wire:model="holder_name.{{ $value }}"
                                class="form-control @error('holder_name.'.$value) validation @enderror"
                                placeholder="Enter Shareholder´s Name"
                                >
                            @error('holder_name.'.$value)
                                <div class="form-text validation pb-3">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="form-label">Shareholder´s Address <span class="text-danger">*</span></label>
                            <input type="text"
                                wire:model="holder_address.{{ $value }}"
                                class="form-control @error('holder_address.'.$value) validation @enderror"
                                placeholder="Enter Shareholder´s Address"
                                >
                            @error('holder_address.'.$value)
                                <div class="form-text validation pb-3">{{ $message }}</div>
                            @enderror
                        </div>
                        <div wire:ignore class="col-md-6 mb-3">
                            <label for="form-label">Country <span class="text-danger">*</span></label>
                            <select id="holder_country_{{ $value }}"class="form-control @error('holder_country.'.$value) validation @enderror">
                                <option selected disabled>Select Country</option>
                                @foreach ($countries as $country)
                                <option value="{{ $country->iso2 }}">{{ $country->name }}</option>
                                @endforeach
                            </select>
                            @error('holder_country.'.$value)
                                <div class="form-text validation pb-3">{{ $message }}</div>
                            @enderror
                        </div>
                        <div wire:ignore class="col-md-6 mb-3">
                            <label for="form-label">State <span class="text-danger">*</span></label>
                            <select id="holder_state_{{ $value }}" class="form-control @error('holder_state.'.$value) validation @enderror">
                                <option selected disabled>Select State</option>
                            </select>
                            @error('holder_state.'.$value)
                                <div class="form-text validation pb-3">{{ $message }}</div>
                            @enderror

                            <input type="text"
                                id="holder_state_other_{{ $value }}"
                                wire:model="holder_state_other.{{ $value }}"
                                class="form-control mt-2 d-none @error('holder_state_other.'.$value) validation @enderror"
                                placeholder="Enter your Other State"
                                >
                            @error('holder_state_other.'.$value)
                                <div class="form-text validation pb-3">{{ $message }}</div>
                            @enderror
                        </div>
                        <div wire:ignore class="col-md-6 mb-3">
                            <label for="form-label">City <span class="text-danger">*</span></label>
                            <select id="holder_city_{{ $value }}" class="form-control @error('holder_city.'.$value) validation @enderror">
                                <option selected disabled>Select City</option>
                            </select>
                            @error('holder_city.'.$value)
                                <div class="form-text validation pb-3">{{ $message }}</div>
                            @enderror

                            <input type="text"
                                id="holder_city_other_{{ $value }}"
                                wire:model="holder_city_other.{{ $value }}"
                                class="form-control mt-2 d-none @error('holder_city_other.'.$value) validation @enderror"
                                placeholder="Enter your Other City"
                                >
                            @error('holder_city_other.'.$value)
                                <div class="form-text validation pb-3">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>
                @endforeach

            </div>
            <div class="card-footer">
                <a class="pull-right" wire:click.prevent="addHolder({{$i_holders}})">+ Add More Shareholder</a>
            </div>
        </div>

        <div class="card shadow mb-5">
            <div class="card-body">

                <div class="row">
                    <div class="col-md-6">
                        <p>All fields marked with <span class="text-danger">*</span> are mandatory</p>
                    </div>
                    <div class="col-md-6 d-flex flex-row-reverse">
                        <button wire:click.prevent="store('draft')" class="btn-outline-primary mt-3">Save as Draft</button>
                        <button wire:click.prevent="store('next')" class="btn-outline-primary mt-3">Next</button>
                    </div>

                    <div class="col-md-12">
                        <ul class="nav nav-wizard">
                            <li><a class="nav-link" href="#!">
                                <span>1</span>
                            </a></li>
                            <li><a class="nav-link active" href="#!">
                                <span>2</span>
                            </a></li>
                            <li><a class="nav-link" href="#!">
                                <span>3</span>
                            </a></li>
                            <li><a class="nav-link" href="#!">
                                <span>4</span>
                            </a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

    </form>
</div>
