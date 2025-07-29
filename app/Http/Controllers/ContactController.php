<?php

namespace App\Http\Controllers;

use App\Models\Lead;
use Illuminate\Support\Facades\Log;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Symfony\Component\Console\Input\Input;

class ContactController extends Controller
{
    public function store(Request $request) {
        // $validate = $request->validate([
        //     'g-recaptcha-response' => 'required|captcha'
        // ]);

        try {
            $validatedData = $request->validate([
                'name'      => 'required|string|max:255',
                'phone_number'      => 'required|numeric|digits_between:10,15',
                'email'             => 'required|email|max:255',
                'messages'          => 'required|string',
            ]);
            
            $sanitizedData = array_map(function ($value) {
                if (is_string($value)) {
                    $value = strip_tags(trim($value)); // Strip HTML tags and trim whitespace
                    $value = str_replace(["\r\n", "\n", "\r"], ' ', $value); // Replace newlines with a space
                }
                return $value;
            }, $validatedData);

            // Save the form data to the database
            Lead::create($sanitizedData);


            return redirect()->back()->with('success', 'Data successfully saved!')->withFragment('#formSection');
        } catch (\Exception $e) {
            // Log error for debugging (optional)
            Log::error($e->getMessage());
            return redirect()->back()->with('error', 'Failed to save data. Please try again.')->withFragment('#formSection');
        }

        // proses save
    }
}
