<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Assessment;
use App\Models\Module;
use Illuminate\Http\Request;

class AssessmentController extends Controller
{
    public function getModules(Request $req,){
        $email = $req->email;
        $module = Module::orderBy('id','desc')->get();
        return response()->json(['status' => 'success','success' => true, 'message' => 'success','data'=>$module], 200);
    }
    public function getAssessment(Request $req){
        $assessment = Assessment::where('moduleId', $req->module_id)->get();
        return response()->json(['status' => 1,'success' => true, 'message' => 'success','data'=>$assessment], 200);
    }
    public function getPrePostTest(Request $req){
        $assessment = Assessment::where('moduleId', $req->module_id)->get();
        return response()->json(['status' => 1,'success' => true, 'message' => 'success','data'=>$assessment], 200);
    }
    

}
