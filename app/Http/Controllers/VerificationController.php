<?php

namespace App\Http\Controllers;

use Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use NextApps\VerificationCode\VerificationCode;

class VerificationController extends Controller
{
    public function verify(Request $request) {
        return view('email-verify');
    }   

    public function check(Request $request) {
        $user = \Auth::user();
        $email = $user->email;
        $code = $request['code'];
        $result = VerificationCode::verify($code, $email);
        if ($result) {
            $user->markEmailAsVerified();
            return back()->with('success', 'Email verified successfully!'); 
        }
        return back()->with('error', 'Verification code is not valid!'); 
    }
}