<?php

namespace App\Http\Controllers;

use App\Models\Lead;
use Illuminate\Support\Facades\Log;
use Illuminate\Http\Request;
use Google_Client;
use Google_Service_Sheets;
use Google_Service_Sheets_ValueRange;

class ContactController extends Controller
{
    protected $spreadsheetId = '1JCLCGN4UtaNp1akvF5ZaVjaMGxp2O4OInHqHnMMrP40'; // Replace with your Google Spreadsheet ID

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

            $this->sendDataToGoogleSheets($sanitizedData);
            return redirect()->back()->with('success', 'Data successfully saved!')->withFragment('#formSection');
        } catch (\Exception $e) {
            // Log error for debugging (optional)
            Log::error($e->getMessage());
            return redirect()->back()->with('error', 'Failed to save data. Please try again.')->withFragment('#formSection');
        }

        // proses save
    }

     protected function sendDataToGoogleSheets(array $data)
    {
        // Set up Google Sheets client
        $submissionDate = now()->toDateTimeString();

        $client = new Google_Client();
        $client->setAuthConfig(storage_path('app/psf-leads-api.json')); // Path to your service account JSON key
        $client->addScope(Google_Service_Sheets::SPREADSHEETS);

        $service = new Google_Service_Sheets($client);
        // Data to append to Google Sheets
        $values = [
            [
                'Auto Sheets',
                $data['name'],
                $data['phone_number'],
                $data['email'],
                $data['messages'],
                $submissionDate,
                $submissionDate,
            ]
        ];

        // Prepare the range where to append data in the Google Sheet
        $range = 'Contact Form'; // Adjust this if necessary

        $body = new Google_Service_Sheets_ValueRange([
            'values' => $values
        ]);

        $params = [
            'valueInputOption' => 'RAW',
        ];

        // Append the data to the spreadsheet
        $service->spreadsheets_values->append($this->spreadsheetId, $range, $body, $params);
    }
}
