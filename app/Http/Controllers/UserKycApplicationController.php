<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\UserKycApplication;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

use App\Models\Country;
use App\Models\State;
use App\Models\UserKycApplicationDocument;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class UserKycApplicationController extends Controller
{
    public function step0()
    {
        $data = UserKycApplication::where( 'user_id', Auth::id() )->first();

        if ( $data == null ) {
            $data = UserKycApplication::create([
                'user_id' => Auth::id(),
                'step' => 0,
                'status' => true
            ]);
        }

        return view('kyc.step0');
    }

    public function step1()
    {
        $data = UserKycApplication::where( 'user_id', Auth::id() )->first();
        $data->step = 1;
        $data->save();

        return view('kyc.step1');
    }

    public function step2()
    {
        return view('kyc.step2');
    }

    public function step3()
    {
        return view('kyc.step3');
    }

    public function upload(Request $request)
    {
        $validator = Validator::make($request, [
            'identification_document' => 'required|min:1',
            'other_document' => Rule::requiredIf( $request->identification_document == '999' ),
            'document_number' => 'required',
            'file' => 'required'
        ]);

        if ( $validator->fails() ) {
            return response()->json([
                'status' => false,
                'msg' => 'Upload failed!'
            ]);
        }

        $input = $request->all();

        try {
            $input['image'] = Storage::disk('local')->put( 'public/documents/', $request->file('file') );
            $input['user_id'] = Auth::id();
            $input['status'] = true;

            UserKycApplicationDocument::create($input);

            return response()->json([
                'status' => true,
                'msg' => 'Upload corrected!'
            ]);
        } catch (\Throwable $th) {
            return response()->json([
                'status' => false,
                'msg' => 'Upload failed!'
            ]);
        }


    }
}
