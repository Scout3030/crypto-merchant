<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

class MerchantController extends Controller {
    public function index() {
        return view('merchant/index');
    }
}
