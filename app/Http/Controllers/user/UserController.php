<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\Aoption;
use App\Models\Assessment;
use App\Models\Module;
use App\Models\Person;
use App\Models\SubmitAssessment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('checkSession')->except(['getOtp','sendOtp','validateOtp']);
    }
    public function getOtp(Request $req)
    {
        $this->validate($req,[
            'email'=>'required|email',
         ]);
        $peaple = Person::where('email', $req->email)->first();

        $otp=random_int(100000, 999999);
        if ($peaple) {
            $peaple->otp = $otp;
            $peaple->save();
            $this->sendOtp($req->email,$otp);
        } else {
            $peaple = new Person();
            $peaple->email = $req->email;
            $peaple->name = $req->name;
            $peaple->otp = $otp;
            $peaple->save();
            $this->sendOtp($req->email,$otp);
        }
        $data['message'] = 'OTP send successfully';
        return response()->json(['status' => 1,'success' => true, 'message' => 'OTP send successfully','otp'=>$peaple->otp], 200);
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
    if($req->otp==''){
        return response()->json(['success' => 0, 'message' => 'Please enter OTP'], 200);
    }

    $p = Person::select('id','email')->where('email', $req->email)->where('otp', $req->otp)->first();
    if ($p) {

        $p->otp = '';
        $p->save();
        $p->pre_evaluation=false;
        $p->country='';
        Session::put('sessdata', $p);
        return response()->json(['status' => 1,'success' => true, 'message' => 'Otp verified','data'=>$p], 200);
    } else {
        return response()->json(['success' => 0, 'message' => 'Wrong Otp'], 200);
    }
}
public function module(Request $req){
    $s=Session::get('sessdata');
    $email = $s->email;
        $module = Module::select('id','title','description','detail','vdo_link','presentation_link','file_link')
        ->latest()->withCount(['is_attempted'=> function($query) use($email){
            $query->where('email', $email);
        }])->get();
    return view('user.module', compact('module'));
    }
public function getAssessment(Request $req,$mid){
    $s=Session::get('sessdata');
    $email = $s->email;
        $module = Module::select('id','title','description','detail','vdo_link','presentation_link','file_link')
        ->latest()->withCount(['is_attempted'=> function($query) use($email){
            $query->where('email', $email);
        }])->get();
        $mod=Module::select('id','title','description','detail','vdo_link','presentation_link','file_link')->where('id', decrypt($mid))->first();
    $assessment = Assessment::select('id','title')->where('module_id', decrypt($mid))->with('aoptions')->get(); //dd($assessment);
    return view('user.assessment', compact('module','mod','mid','assessment'));
 }
 public function getPostAssessment(Request $req){
    $s=Session::get('sessdata');
    $email = $s->email;

    $assessment = Assessment::select('id','title')->where('type', 'post')->with('aoptions')->get(); //dd($assessment);
    return view('user.post-assessment', compact('assessment'));
 }
 public function getAssessmentByModuleId($module_id){
   $assessment = Assessment::select('id','title')->where('module_id', decrypt($module_id))->with('aoptions')->get(); //dd($assessment);
   return response()->json(['status' => 1,'success' => true, 'message' => 'success','data'=>$assessment], 200);
 }


 public function submitAssessment(Request $req){ //dd($req->all());
    $s=Session::get('sessdata');
    $email = $s->email;
    $res =0;
    if(isset($req->module_id)){
        SubmitAssessment::where('module_id',decrypt($req->module_id))->where('email',$email)->delete();
    }else{
        SubmitAssessment::where('type','post')->where('email',$email)->delete();
    }
    foreach($req->data as $assessment){
        if(isset($assessment['option_id'])){
        $subAss = new SubmitAssessment();
        $subAss->email = $email;
        $subAss->module_id = (isset($req->module_id))?decrypt($req->module_id):0;
        $subAss->type = (isset($req->module_id))?NULL:'post';
        $subAss->assessment_id = $assessment['assessment_id'];
        $subAss->aoption_id = $assessment['option_id'];
        $correct = Aoption::where('id',$assessment['option_id'])->first()->correct;
        $subAss->correct = $correct;
            if($subAss->save()){
                $res = $res+1;
            }else{
                return response()->json(['status' => 0,'success' => false, 'message' => 'error'], 500);
            }
        }

    }
    if($res>0){
        if(isset($req->module_id)){
            $data['total_questions']=Assessment::where('module_id',decrypt($req->module_id))->count();
            $data['total_answered']=SubmitAssessment::where('module_id',decrypt($req->module_id))->where('email',$email)->count();
            $data['correct_anwswered'] = SubmitAssessment::where('module_id',decrypt($req->module_id))->where('email',$email)->where('correct','yes')->count();
            return response()->json(['status' => 1,'success' => true, 'message' => 'success','data'=>$data], 200);
        }else{
            $data['total_questions']=Assessment::where('type','post')->count();
            $data['total_answered']=SubmitAssessment::where('type','post')->where('email',$email)->count();
            $data['correct_anwswered'] = SubmitAssessment::where('type','post')->where('email',$email)->where('correct','yes')->count();
            return response()->json(['status' => 1,'success' => true, 'message' => 'success','data'=>$data], 200);
        }

    }else{
        $data['messages']= 'Plaese give atleast one answer';
        return response()->json(['status' => 1,'success' => false, 'message' => 'success','data'=>$data], 200);
    }


}
}
