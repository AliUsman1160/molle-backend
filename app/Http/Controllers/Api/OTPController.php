<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\TwilioService;

class OTPController extends Controller
{
    protected $twilio;

    public function __construct(TwilioService $twilio)
    {
        $this->twilio = $twilio;
    }

    public function sendOTP(Request $request)
    {
        $request->validate([
            'phone_number' => 'required|string',
            'otp' => 'required|string'
        ]);

        $phoneNumber = $request->input('phone_number');
        $otp = $request->input('otp');

        try {
            $this->twilio->sendOTP($phoneNumber, $otp);
            return response()->json(['message' => 'OTP sent successfully.']);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Failed to send OTP.', 'error' => $e->getMessage()], 500);
        }
    }
}
