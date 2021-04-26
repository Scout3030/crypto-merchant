<?php

namespace App\Http\Livewire;

use App\Models\Country;
use App\Models\UserKycApplication;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;
use Livewire\Component;

class KycStepOne extends Component
{
    public $kyc;
    public $countries, $states, $cities;
    public $full_name, $date_of_birth, $address, $country, $state, $state_other,
        $city, $city_other, $phone_code, $phone_number, $skype_id, $tax_id, $documents = 0;


    protected $listeners = [
        'setCountry' => 'setCountry',
        'setState' => 'setState',
        'setCity' => 'setCity',
        'setCodePhone' => 'setCodePhone',
        'setDocuments' => 'setDocuments',
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

    public function setCodePhone($item)
    {
        $this->phone_code = $item;
    }

    public function setDocuments()
    {
        $this->documents++;
    }

    protected function rules()
    {
        return [
            'full_name' => 'required',
            'date_of_birth' => 'required|date',
            'address' => 'required',
            'country' => 'required',
            'state' => 'required',
            'state_other' => Rule::requiredIf( $this->state == 'other' ),
            'city' => 'required',
            'city_other' => Rule::requiredIf( $this->city == 'other' ),
            'phone_number' => 'required',
            'skype_id' => 'required',
            'documents' => 'required|min:1'
        ];
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function mount()
    {
        $this->countries = Country::all();

        $this->kyc = UserKycApplication::where('user_id', Auth::id())->first();

        if ( $this->kyc != null) {
            $this->full_name = $this->kyc->full_name;
        } else {

        }
    }

    public function render()
    {
        return view('livewire.kyc-step-one');
    }

    public function store( $status )
    {
        $this->validate();

        $this->kyc->update([
            'full_name' => $this->full_name,
            'date_of_birth' => $this->date_of_birth,
            'address' => $this->address,
            'country' => $this->country,
            'state' => $this->state,
            'state_other' => $this->state_other,
            'city' => $this->city,
            'city_other' => $this->city_other,
            'phone_number' => $this->phone_number,
            'skype_id' => $this->skype_id,
            'tax_id' => $this->tax_id,
            'step' => 2,
            'status' => $status == 'next' ? true : false
        ]);

        session()->flash('success', true);

        return redirect()->route('kyc.step2');

    }
}
