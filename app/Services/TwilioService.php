<?php

namespace App\Services;

use Twilio\Rest\Client;

class TwilioService
{
    protected $client;

    public function __construct()
    {
        $sid = env('TWILIO_SID'); // Make sure these are set in your .env file
        $token = env('TWILIO_AUTH_TOKEN');
        $this->client = new Client($sid, $token);
    }

    public function sendOTP($phoneNumber, $otp)
    {
        $message = $this->client->messages->create(
            $phoneNumber, // To
            [
                'from' => env('TWILIO_PHONE_NUMBER'),
                'body' => "Your OTP code is: $otp"
            ]
        );

        return $message->sid; // Optionally return the SID or other relevant info
    }
}
