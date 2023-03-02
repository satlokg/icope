<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Str;
use Auth;
use Validator;
class LoginController extends Controller
{
    public $successStatus = 200;


    public function getOtp(Request $req)
    {
        $validator = Validator::make($req->all(), [
            'email' => 'required|email',
        ]);
        
        if ($validator->fails()) {
        return response()->json(['status' => 'error','message' => $validator->errors()->all()], 200);

        }
        $peaple = User::where('email', $req->email)->first();

        $otp=random_int(100000, 999999);
        if ($peaple) {
            $peaple->email_otp = $otp;
            $peaple->created_at = now()->addMinutes(600);
            $peaple->save();
            $this->sendOtp($req->email,$otp);
        } else {
            $peaple = new User();
            $peaple->email = $req->email;
            $peaple->username = $req->email;
            $peaple->email_otp = $otp;
            $peaple->created_at = now()->addMinutes(600);
            $peaple->save();
            $this->sendOtp($req->email,$otp);
        }
        
        $data['message'] = 'OTP send successfully';
        return response()->json(['status' => 'success','success' => true, 'message' => 'OTP has been sent successfully. Please check your mail.','otp'=>$peaple->email_otp], 200);
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
    $validator = Validator::make($req->all(), [
        'email' => 'required|email',
        'otp' => 'required',
    ]);
    
    if ($validator->fails()) {
    return response()->json(['status' => 'error','message' => $validator->errors()->all()], 200);

    }
    $p = User::select('id','email','is_pretest_completed','created_at')->where('email', $req->email)->where('email_otp', $req->otp)->first();
    if(strtotime($p->created_at) < strtotime(now())) 
        {
            return response()->json(['success' => 0, 'message' => 'Otp Expired '], 200);
        }
    if ($p) {

        $p->email_otp = '';
        $p->save();
        Auth::loginUsingId($p->id, TRUE);
        $user=['is_pretest_completed'=>($p->is_pretest_completed==1)?true:false];
        $p->country='';
        if ($p->api_token !== NULL) {
            $token['token'] = $p->api_token;
        } else {
            $token['token'] = self::updateToken();
        }
        return response()->json(['status' => 'success','success' => true, 'message' => 'Otp verified','user'=>$user,'token'=>$token['token']], 200);
    } else {
        return response()->json(['success' => 0, 'message' => 'Wrong Otp'], 200);
    }
}
static function updateToken() {
    $token = Str::random(60);
    $user = User::find(Auth::user()->id);
    $user->forceFill([
        'api_token' => hash('sha256', $token),
    ])->save();

    return ['token' => $user->api_token];
}

}
