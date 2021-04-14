<?php

namespace App\Http\Controllers;

use App\Models\UserKycApplication;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\Country;

class UserKycApplicationsController extends Controller
{
    public function create()
    {
        $countries = Country::all();

        return view('kyc.create', compact('countries'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'full_name' => 'required',
            'date_of_birth' => 'required|date',
            'address' => 'required',
            'phone_number' => 'required',
            'skype_id' => 'required',
            'identification_document' => 'required',
            'document_number' => 'required',
        ]);


        $input = $request->all();
        $input['user_id'] = Auth::id();

        

        UserKycApplication::create( $input );

        return back()->with('success', true);

    }
}
