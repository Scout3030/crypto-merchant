<?php

namespace App\Http\Livewire;

use App\Models\Country;
use App\Models\UserKycApplication;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class KycStepOne extends Component
{
    public $countries;
    public $fullname, $date_of_birth, $address, $country, $state, $state_other,
        $city, $city_other, $code_phone, $phone_number, $skypeId, $tax;


    protected $listeners = [
        'setPermission' => 'setPermission',
    ];

    public function setPermission($item)
    {
        if ( in_array( (int) $item, $this->permissions_selected) ) {

            unset($this->permissions_selected[$item]);

        } else {
            array_push($this->permissions_selected, (int) $item);
        }

    }

    protected function rules()
    {
        return [
            'name' => 'required|min:3|max:26',
        ];
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function mount()
    {
        $this->countries = Country::all();

        $kyc = UserKycApplication::where('user_id', Auth::id())->first();

        if ( $kyc != null) {
            $this->fullname = $kyc->full_name;
        } else {

        }
    }

    public function render()
    {
        return view('livewire.kyc-step-one');
    }
}
