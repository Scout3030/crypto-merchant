<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\UserKycApplication;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

use App\Models\Country;
use App\Models\State;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class UserKycApplicationsController extends Controller
{
    public function create()
    {

        $data = UserKycApplication::where( 'user_id', Auth::id() )->first();

        if ( $data == null ) {
            $user_kyc = UserKycApplication::create([
                'user_id' => Auth::id(),
                'step' => 0
            ]);

            $data = $user_kyc;
        }

        /*
        switch ($data->step) {
            case 0:
                return view('kyc.step0');

                break;

            case 1:

                break;
            case 2:
                return 'step2';

                break;

            case 3:
                return 'step3';

                break;

                case 4:
                    return 'step4';

                    break;
        }
        */
        $countries = Country::all();
        return view('kyc.step1', compact('countries'));
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'full_name' => 'required',
            'date_of_birth' => 'required|date',
            'address' => 'required',
            'country' => 'required',
            'state' => 'required',
            'state_other' => Rule::requiredIf( $request->state == 'other' ),
            'city' => 'required',
            'city_other' => Rule::requiredIf( $request->city == 'other' ),
            'phone_number' => 'required',
            'skype_id' => 'required',
            'identification_document' => 'required',
            'other_document' => Rule::requiredIf( $request->identification_document == '999' ),
            'document_number' => 'required',
            'image' => 'required|mimes:jpg,png,jpeg,pdf'
        ]);

        if ( $validator->fails() ) {

            $states = State::select('iso2', 'name')->where('country_code', $request->country)->get();
            $cities = City::select('id', 'name')->where('state_code', $request->state)->get();

            return back()->withErrors( $validator )->withInput()->with('states', $states)->with('cities', $cities);
        }

        $input = $request->all();
        $input['step'] = 2;

        // Upload Image
        if ( $request->hasFile('image') ) {
            $input['upload_document'] = Storage::disk('local')->put( 'public/documents', $request->file('image') );
        }

        $user_kyc = UserKycApplication::where('user_id', Auth::id())->first();
        $user_kyc->update( $input );


        return back()->with('success', true);

    }
}
