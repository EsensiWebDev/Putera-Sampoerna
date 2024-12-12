<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Symfony\Component\Console\Input\Input;

class ContactController extends Controller
{
    public function store(Request $request) {
        $validate = $request->validate([
            'g-recaptcha-response' => 'required|captcha'
        ]);


        // proses save
    }
}
