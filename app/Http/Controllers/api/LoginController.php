<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Str;
class LoginController extends Controller
{
    public $successStatus = 200;


    public function getOtp(Request $req)
    {
        $peaple = User::where('email', $req->email)->first();

        $otp=random_int(100000, 999999);
        if ($peaple) {
            $peaple->email_otp = $otp;
            $peaple->save();
            $this->sendOtp($req->email,$otp);
        } else {
            $peaple = new User();
            $peaple->email = $req->email;
            $peaple->username = $req->email;
            $peaple->email_otp = $otp;
            $peaple->save();
            $this->sendOtp($req->email,$otp);
        }
        $data['message'] = 'OTP send successfully';
        return response()->json(['status' => 1,'success' => true, 'message' => 'OTP send successfully','otp'=>$peaple->email_otp], 200);
    }

    function sendOtp($email, $otp)
    {
        $details = [
            'otp' => $otp,
            'message' => 'This is verification otp'
        ];

        Mail::to($email)->send(new \App\Mail\OtpMail($details));
    }

public function validateOtp(Request $req){
    $p = User::select('id','email')->where('email', $req->email)->where('email_otp', $req->otp)->first();
    if ($p) {

        $p->email_otp = '';
        $p->save();
        $p->pre_evaluation=false;
        $p->country='';
        return response()->json(['status' => 1,'success' => true, 'message' => 'Otp verified','data'=>$p], 200);
    } else {
        return response()->json(['success' => 0, 'message' => 'Wrong Otp'], 200);
    }
}


}
