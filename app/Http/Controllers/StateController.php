<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\State;
use Illuminate\Http\Request;

class StateController extends Controller
{
    public function getStatesByCountry()
    {
        if ( request()->ajax() ) {
            $states = State::where('country_code', request()->get('country'))->orderBy('name')->get();
            return response()->json($states);
        }
    }

    public function getCitiesByState()
    {
        if ( request()->ajax() ) {
            $cities = City::where('state_code', request()->get('state'))->orderBy('name')->get();
            return response()->json($cities);
        }
    }
}
