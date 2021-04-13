<?php

namespace App\Http\Controllers;

use App\Models\UserKycApplication;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserKycApplicationsController extends Controller
{
    public function create()
    {
        return view('kyc.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'full_name' => 'required',
            'date_of_birth' => 'required|date',
            'address' => 'required',
            'city_id' => 'required',
            'phone_number' => 'required',
            'skype_id' => 'required',
            'identification_document' => 'required',
            'document_number' => 'required',
        ]);


        $input = $request->all();
        $input['user_id'] = 1; //Auth::id();

        UserKycApplication::create( $input );

        return back()->with('success', true);

    }
}
