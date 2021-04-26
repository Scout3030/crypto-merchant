<?php

namespace App\Http\Livewire;

use App\Models\Country;
use App\Models\UserKycApplication;
use App\Models\UserKycApplicationPerson;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Illuminate\Validation\Rule;

class KycStepTwo extends Component
{
    public $kyc;
    public $countries, $states, $cities;
    public $company_name, $registration_number, $doing_business_as,
        $company_address, $country, $state, $state_other, $city, $city_other, $status;

    public $director_name, $director_address, $director_country, $director_state, $director_state_other, $director_city, $director_city_other;
    public $inputs = [];
    public $i = 1;

    public $holder_name, $holder_address, $holder_country, $holder_state, $holder_state_other, $holder_city, $holder_city_other;
    public $inputs_holders = [];
    public $i_holders = 1;

    protected $listeners = [
        'setCountry' => 'setCountry',
        'setState' => 'setState',
        'setCity' => 'setCity',

        'setCountryDirector' => 'setCountryDirector',
        'setStateDirector' => 'setStateDirector',
        'setCityDirector' => 'setCityDirector',

        'setCountryHolder' => 'setCountryHolder',
        'setStateHolder' => 'setStateHolder',
        'setCityHolder' => 'setCityHolder',
    ];

    public function setCountry($item)
    {
        $this->country = $item;
    }

    public function setState($item)
    {
        $this->state = $item;
    }

    public function setCity($item)
    {
        $this->city = $item;
    }

    public function setCountryDirector($item, $id)
    {
        $this->director_country[$id] = $item;
    }

    public function setStateDirector($item, $id)
    {
        $this->director_state[$id] = $item;
    }

    public function setCityDirector($item, $id)
    {
        $this->director_city[$id] = $item;
    }

    public function setCountryHolder($item, $id)
    {
        $this->holder_country[$id] = $item;
    }

    public function setStateHolder($item, $id)
    {
        $this->holder_state[$id] = $item;
    }

    public function setCityHolder($item, $id)
    {
        $this->holder_city[$id] = $item;
    }

    public function add($i)
    {
        $i = $i + 1;
        $this->i = $i;
        array_push($this->inputs, $i);
        $this->emit('resultAdd', $i);
    }

    public function remove($i)
    {
        unset($this->inputs[$i]);
        unset($this->director_country[$i]);
        unset($this->director_state[$i]);
        unset($this->director_city[$i]);
    }

    public function addHolder($i)
    {
        $i = $i + 1;
        $this->i_holders = $i;
        array_push($this->inputs_holders, $i);
        $this->emit('resultAddHolder', $i);
    }

    public function removeHolder($i)
    {
        unset($this->inputs_holders[$i]);

        unset($this->holder_country[$i]);
        unset($this->holder_state[$i]);
        unset($this->holder_city[$i]);
    }

    public function render()
    {
        return view('livewire.kyc-step-two');
    }

    protected function rules()
    {
        return [
            'company_name' => 'required',
            'registration_number' => 'required',
            'doing_business_as' => 'required',
            'company_address' => 'required',
            'country' => 'required',
            'state' => 'required',
            'state_other' => Rule::requiredIf( $this->state == 'other' ),
            'city' => 'required',
            'city_other' => Rule::requiredIf( $this->city == 'other' ),

            'director_name.0' => 'required',
            'director_address.0' => 'required',
            'director_country.0' => 'required',
            'director_state.0' => 'required',
            'director_city.0' => 'required',

            'director_name.*' => 'required',
            'director_address.*' => 'required',
            'director_country.*' => 'required',
            'director_state.*' => 'required',
            'director_city.*' => 'required',

            'holder_name.0' => 'required',
            'holder_address.0' => 'required',
            'holder_country.0' => 'required',
            'holder_state.0' => 'required',
            'holder_city.0' => 'required',

            'holder_name.*' => 'required',
            'holder_address.*' => 'required',
            'holder_country.*' => 'required',
            'holder_state.*' => 'required',
            'holder_city.*' => 'required',
        ];
    }

    protected $messages = [
        'director_name.0.required' => 'Director name field is required',
        'director_address.0.required' => 'Director address field is required',
        'director_country.0' => 'Director country field is required',
        'director_state.0' => 'Director state field is required',
        'director_state_other.0' => 'Director state other field is required',
        'director_city.0' => 'Director city field is required',
        'director_city_other.0' => 'Director city other field is required',

        'director_name.*.required' => 'Director name field is required',
        'director_address.*.required' => 'Director address field is required',
        'director_country.*' => 'Director country field is required',
        'director_state.*' => 'Director state field is required',
        'director_state_other.*' => 'Director state other field is required',
        'director_city.*' => 'Director city field is required',
        'director_city_other.*' => 'Director city other field is required',

        'holder_name.0.required' => 'Shareholder name field is required',
        'holder_address.0.required' => 'Shareholder address field is required',
        'holder_country.0' => 'Shareholder country field is required',
        'holder_state.0' => 'Shareholder state field is required',
        'holder_state_other.0' => 'Shareholder state other field is required',
        'holder_city.0' => 'Shareholder city field is required',
        'holder_city_other.0' => 'Shareholder city other field is required',

        'holder_name.*.required' => 'Shareholder name field is required',
        'holder_address.*.required' => 'Shareholder address field is required',
        'holder_country.*' => 'Shareholder country field is required',
        'holder_state.*' => 'Shareholder state field is required',
        'holder_state_other.*' => 'Shareholder state other field is required',
        'holder_city.*' => 'Shareholder city field is required',
        'holder_city_other.*' => 'Shareholder city other field is required',
    ];

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function mount()
    {
        $this->countries = Country::all();

        $this->kyc = UserKycApplication::where('user_id', Auth::id())->first();

        if ( $this->kyc != null) {
            $this->company_name = $this->kyc->company_name;
        } else {

        }
    }

    public function store( $status )
    {
        $this->validate();

        $this->kyc->update([
            'company_name' => $this->company_name,
            'registration_number' => $this->registration_number,
            'doing_business_as' => $this->doing_business_as,
            'company_address' => $this->company_address,
            'company_country' => $this->country,
            'company_state' => $this->state,
            'company_state_other' => $this->state_other,
            'company_city' => $this->city,
            'company_city_other' => $this->city_other,
            'step' => 3,
            'status' => $status == 'next' ? true : false
        ]);

        foreach ($this->director_name as $key => $value) {
            UserKycApplicationPerson::create([
                'user_id' => Auth::id(),
                'person_name' => $this->director_name[$key],
                'person_address' => $this->director_address[$key],
                'country' => $this->director_country[$key],
                'state' => $this->director_state[$key],
                'state_other' => $this->director_state_other[$key] ?? null,
                'city' => $this->director_city[$key],
                'city_other' => $this->director_city_other[$key] ?? null,
                'type_person' => (int) UserKycApplicationPerson::DIRECTOR,
                'status' => $status == 'next' ? true : false
            ]);
        }

        foreach ($this->holder_name as $key => $value) {
            UserKycApplicationPerson::create([
                'user_id' => Auth::id(),
                'person_name' => $this->holder_name[$key],
                'person_address' => $this->holder_address[$key],
                'country' => $this->holder_country[$key],
                'state' => $this->holder_state[$key],
                'state_other' => $this->holder_state_other[$key] ?? null,
                'city' => $this->holder_city[$key],
                'city_other' => $this->holder_city_other[$key] ?? null,
                'type_person' => (int) UserKycApplicationPerson::SHAREHOLDER,
                'status' => $status == 'next' ? true : false
            ]);
        }

        $this->inputs = [];
        $this->inputs_holders = [];

        session()->flash('success', true);

        return redirect()->route('kyc.step3');

    }
}
