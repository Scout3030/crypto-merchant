<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\State;
use Illuminate\Http\Request;

class StatesController extends Controller
{
    public function getStatesByCountry($country_code)
    {
        $states = State::where('country_code', $country_code)->orderBy('name')->get();
        return response()->json($states);
    }

    public function getCitiesByState($state_code)
    {
        $cities = City::where('state_code', $state_code)->orderBy('name')->get();
        return response()->json($cities);
    }
}
