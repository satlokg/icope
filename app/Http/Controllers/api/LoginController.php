<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\UserToken;
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
        return response()->json(['status' => 'success','success' => true, 'message' => 'OTP has been sent successfully. Please check your mail.'], 200);
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
        'device_id' => 'required',
    ]);
    
    if ($validator->fails()) {
    return response()->json(['status' => 'error','message' => $validator->errors()->all()], 200);

    }
    $p = User::select('id','email','is_pretest_completed','created_at')->where('email', $req->email)->where('email_otp', $req->otp)->first();
    if ($p) {
        if(strtotime($p->created_at) < strtotime(now())) 
        {
            return response()->json(['success' => 'failed', 'message' => 'Otp Expired '], 200);
        }
        $p->email_otp = '';
        $p->save();
        Auth::loginUsingId($p->id, TRUE);
        $user=['is_pretest_completed'=>($p->is_pretest_completed==1)?true:false];
        $p->country='';
        $token = UserToken::firstOrNew(
            ['user_id' => Auth::user()->id],
            ['device_id' =>  request('device_id')]
        );
            $token->device_type =  request('device_type');
            $token->expire_at = now()->addMinutes(env('EXPIRE_TIME'));
        $token->save(); 
        if ($token->api_token !== NULL) {
            $tkn['token'] = $token->api_token;
            $tkn['expire_at'] = $token->expire_at;
            
        } else {
            $tkn = self::updateToken($req->device_id);
        }
        return response()->json(['status' => 'success','success' => true, 'message' => 'Otp verified','user'=>$user,'token'=>$tkn], 200);
    } else {
        return response()->json(['success' => 0, 'message' => 'Wrong Otp'], 200);
    }
}
static function updateToken($device_id) {
    $token = Str::random(60);
    $tkn = UserToken::where('device_id',$device_id)->where('user_id',Auth::user()->id)->first();
    $tkn->api_token = hash('sha256', $token);
    $tkn->expire_at = now()->addMinutes(60);
    $tkn->save();

    return ['token' => $tkn->api_token,'expire_at'=>$tkn->expire_at];
}
public function refreshToken(Request $req) {
    $token = Str::random(60);
    $tkn = UserToken::where('device_id',$req->device_id)->where('api_token',$req->token)->whereHas('user', function($q) use($req){
        $q->where('email',$req->email);
    })->first();
    if($tkn){
        $tkn->api_token = hash('sha256', $token);
        $tkn->expire_at = now()->addMinutes(env('EXPIRE_TIME'));
        $tkn->save();
        return response()->json(['status' => 'success','success' => true, 'message' => 'token refreshed','token'=>$tkn->api_token, 'expire_at'=>$tkn->expire_at ], 200);

    }else{
        return response()->json(['status' => 'failed', 'message' => 'Unauthenticate'], 401);
    }
    

    return ['token' => $tkn->api_token];
}
}
