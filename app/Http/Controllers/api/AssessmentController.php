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
        return response()->json(['status' => 'success','success' => true, 'message' => 'success','data'=>$assessment], 200);
    }
    public function getPrePostTest(Request $req){
        $assessment = Assessment::where('is_first_question', 1)->get();
        return response()->json(['status' => 'success','success' => true, 'message' => 'success','data'=>$assessment], 200);
    }
    public function submitAssessmentQuestions(Request $request){
        $moduleIID = ($request->module_id);
                    $deviceToken = $request->device_id;
                    $assestments = Assestments::where('moduleId', $moduleIID)->get();
                    $totalQuestion = 0;
                    $CorrectAnswer = 0;
                    foreach ($assestments as $assestment) {
                        $qu = "question_" . $assestment->id;
                        if ($request->$qu == $assestment->answer) {
                            $CorrectAnswer++;
                        }
                        $totalQuestion++;
                    }
                    $Answer = Answer::where('userID',$deviceToken)->where('moduleId', $moduleIID)->first();
                    if (!$Answer) {
                        $Answer= new Answer();
                    }
                
                    $Answer->moduleId = $moduleIID;
                    $Answer->userID = $deviceToken;   ///$this->request->data->userID;
                    $Answer->answer = json_encode($request->all());
                    $Answer->status = 1;
                if( $Answer->save()){
                    return response()->json(['status' => 'success','success' => true, 'message' => base64_encode('Thanks for submitting the assessment. You have answered ' . $CorrectAnswer . " correct answers out of " . $totalQuestion)], 200);
                }else{
                    return response()->json(['status' => 'failed','success' => false, 'message' => 'something went wrong'], 200);
                }

    }
    public function submitQuestionnaireQuestions(Request $request){
        $assestments = Assessment::where('is_first_question' , '1')->get();
        $moduleIID = ($request->module_id);
                    $deviceToken = $request->device_id;
            $totalQuestion = 0;
            $CorrectAnswer = 0;
            foreach ($assestments as $assestment) {
                $qu = "question_" . $assestment->id;
                if ($request->$qu == $assestment->answer) {
                    $CorrectAnswer++;
                }
                $totalQuestion++;
            }
            $type_id = time() . '__' . $request->userID . '__' . time();
            $Answer = Answer::where('userID',$deviceToken)->where('moduleId', $moduleIID)->first();
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
                    return response()->json(['status' => 'success','success' => true, 'message' => base64_encode('Thanks for submitting the assessment. You have answered ' . $CorrectAnswer . " correct answers out of " . $totalQuestion)], 200);
                }else{
                    return response()->json(['status' => 'failed','success' => false, 'message' => 'something went wrong'], 200);
                }
    }
    function searchContent(Request $request) {
        $response = array('status' => 'failed', 'message' => 'HTTP method not allowed');
        $dataArray = [];
        if ($request->post) {
            if ($request->param) {


                $keyword = @$request->param;
                if (!empty($keyword)) {
                    $condition[] = ['Modules.status' => 1];
                    $condition[] = [
                        'OR' => [
                            'Modules.title LIKE' => '%' . $keyword . '%',
                            'Modules.description LIKE' => '%' . $keyword . '%',
                        ]
                    ];
                    $query = Module::find('all')->where($condition);

                    if ($query) {
                        foreach ($query as $key => $data) {
                            $dataArray[$key]['id'] = $data->id;
                            $dataArray[$key]['module_name'] = $data->name;
                            $title_count = substr_count($data->title, $keyword);
                            $description_count = substr_count($data->description, $keyword);
                            $dataArray[$key]['count'] = ((int) $title_count + (int) $description_count);
                        }
                        $response = array('status' => 'success', 'data' => $dataArray);
                    }
                }
            } else {
                $response = array('status' => 'failed', 'message' => 'Please enter params.');
            }
        }


        $this->response->type('application/json');
        $this->response->body(json_encode($response));
        return $this->response;
    }

}
