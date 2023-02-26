<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Assessment;
use App\Models\Module;
use App\Models\Answer;
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
        $assessment = Assessment::where('moduleId', $req->module_id)->where('is_first_question', 1)->get();
        return response()->json(['status' => 1,'success' => true, 'message' => 'success','data'=>$assessment], 200);
    }
    public function submitAssessmentQuestions(Request $request){
        $moduleIID = ($this->request->module_id);
                    $deviceToken = $this->request->device_id;
                    $assestments = Assestments::where('moduleId', $moduleIID)->get()->toArray();
                    $totalQuestion = 0;
                    $CorrectAnswer = 0;
                    foreach ($assestments as $assestment) {
                        $qu = "question_" . $assestment->id;
                        if ($this->request->$qu == $assestment->answer) {
                            $CorrectAnswer++;
                        }
                        $totalQuestion++;
                    }
                    $Answer = Answers::where(userID,$deviceToken)->where('moduleId', $moduleIID)->first();
                    if (!$Answer) {
                        $Answer= new Answer();
                    }
                
                    $Answer->moduleId = $moduleIID;
                    $Answer->userID = $deviceToken;   ///$this->request->data->userID;
                    $Answer->answer = json_encode($request->all());
                    $Answer->status = 1;
                if( $Answer->save()){
                    return response()->json(['status' => 1,'success' => true, 'message' => 'Thanks for submitting the assessment. You have answered' . $CorrectAnswer . " correct answers out of " . $totalQuestion], 200);
                }else{
                    return response()->json(['status' => 0,'success' => false, 'message' => 'something went wrong'], 200);
                }

    }
    public function submitQuestionnaireQuestions(Request $request){
        $assestments = Assessment::where('is_first_question' , '1')->get()->toArray();
            $totalQuestion = 0;
            $CorrectAnswer = 0;
            foreach ($assestments as $assestment) {
                $qu = "question_" . $assestment->id;
                if ($this->request->$qu == $assestment->answer) {
                    $CorrectAnswer++;
                }
                $totalQuestion++;
            }
            $type_id = time() . '__' . $request->userID . '__' . time();
            $Answer = Answers::where(userID,$deviceToken)->where('moduleId', $moduleIID)->first();
                    if (!$Answer) {
                        $Answer= new Answer();
                    }
                $Answer->type = 'questionnaire';
                $Answer->type_id = $type_id;
                $Answer->attempted_correct_questions = $CorrectAnswer;
                $Answer->attempted_total_questions = $totalQuestion;
                $Answer->countryCode = $request->countryCode;
                $Answer->userID = $request->userID;
                $Answer->answer = json_encode($request->all());
                $Answer->status = 1;
                $Answer->created = date('Y-m-d H:i:s');
                if( $Answer->save()){
                    return response()->json(['status' => 1,'success' => true, 'message' => 'Thanks for submitting the assessment. You have answered' . $CorrectAnswer . " correct answers out of " . $totalQuestion], 200);
                }else{
                    return response()->json(['status' => 0,'success' => false, 'message' => 'something went wrong'], 200);
                }
    }
    

}
