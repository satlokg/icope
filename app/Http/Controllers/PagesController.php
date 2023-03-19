<?php

namespace App\Http\Controllers;

use App\Models\Answer;
use App\Models\Assessment;
use App\Models\Module;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;

class PagesController extends Controller
{
    public function who($module_id = NULL, $device = NULL) {
        $module = Module::where('id', $module_id)->first();
        return view('pages.who', compact('module','device'));
        
    }
    public function assestment(Request $request, $module = NULL, $deviceToken = NULL) {
       
        if (empty($deviceToken)) {
            return redirect()->to('/pages/who/' . ($module + 1));
        }
        if($request->isMethod('post')){
            $request->request->remove('_token');
            $moduleIID = $request->moduleID - 1;
            $assestments = Assessment::where('moduleId',$moduleIID)->get();
            $totalQuestion = 0;
            $CorrectAnswer = 0;
            foreach ($assestments as $assestment) {
                $qu = "question_" . $assestment->id;
                if (@$request->$qu == $assestment->answer) {
                    $CorrectAnswer++;
                }
                $totalQuestion++;
            }
            $faqs = Answer::Where('userID',$deviceToken)->where('moduleId',$moduleIID)->first();
            if (!$faqs) {
                $faqs = new Answer();
            }
            $faqs->moduleId = $moduleIID;
            $faqs->userID = $deviceToken;   ///$this->request->data->userID;
            $faqs->answer = json_encode($request->all());
            $faqs->status = 1;

            
            $faqs->created = date('Y-m-d H:i:s');
            $faqs->save();
            //echo "<pre>"; print_r($this->request->data); die;
            echo "Thanks for submitting the assessment. You have answered " . $CorrectAnswer . " correct answers out of " . $totalQuestion;
            die;
        }
        $assestments = Assessment::where('moduleId',$module)->get();
        $moduleID = $module + 1;
        return view('pages.assessment', compact('assestments','deviceToken','moduleID'));
        
    }
    public function assestment2(Request $request, $MODULEID = NULL, $deviceToken = NULL) {
       
        if($request->isMethod('post')){
            $req_dump = '-------------------------' . date('Y-m-d H:i:s') . '---------------------';
            $req_dump .= print_r($request->all(), TRUE);
            $fp = fopen('request.log', 'a');
            fwrite($fp, $req_dump);
            fclose($fp);
            $moduleIID = $request->moduleID - 1;
            $assestments = Assessment::where('moduleId',$moduleIID)->get();
            $totalQuestion = 0;
            $CorrectAnswer = 0;
            foreach ($assestments as $assestment) {
                $qu = "question_" . $assestment->id;
                if ($request->$qu == $assestment->answer) {
                    $CorrectAnswer++;
                }
                $totalQuestion++;
            }
            $faqs = Answer::Where('userID',$deviceToken)->where('moduleId',$moduleIID)->first();
            if (!$faqs) {
                $faqs = new Answer();
            }
            $faqs->moduleId = $moduleIID;
            $faqs->userID = $deviceToken;   ///$this->request->data->userID;
            $faqs->answer = json_encode($request->all());
            $faqs->status = 1;

            
            $faqs->created = date('Y-m-d H:i:s');
            $faqs->save();
            //echo "<pre>"; print_r($this->request->data); die;
            echo "Thanks for submitting the assessment. You have answered " . $CorrectAnswer . " correct answers out of " . $totalQuestion;
            die;
        }
        //$assestments = $this->Assestments->find('all')->where(['Assestments.moduleId' => $MODULEID]);
        ////echo "<pre>"; print_r($assestments); die;
        //$this->set('assestments', $assestments);
        //$this->set('deviceToken', $deviceToken);
        $moduleID = $MODULEID+1;
        $this->set('moduleID', $moduleID);
        die;
    }

    public function questionnaire(Request $request) {
        
        $layoutTitle = 'Questionnaire';
        $questionnaireType = 'pre';
        $deviceToken = $request->query('device-token');
        $countryCode = ($request->query('country_code'))??'';
        if ($request->query('questionnaire-type') && $request->query('questionnaire-type') == 'post') {
            $questionnaireType = 'post';
        }
        $assestments = Assessment::where('is_first_question',1)->orderBy('moduleId','asc')->orderBy('id', 'asc')->get();
        if($request->isMethod('post')){
            
            $totalQuestion = 0;
            $CorrectAnswer = 0;
            foreach ($assestments as $assestment) {
                $qu = "question_" . $assestment->id;
                if (@$request->$qu == $assestment->answer) {
                    $CorrectAnswer++;
                }
                $totalQuestion++;
            }
            if ($questionnaireType == 'post') {
                $faqs = new Answer();
                $type_id = time() . '__' . $request->userID . '__' . time();
                $faqs->type = 'questionnaire';
                $faqs->type_id = $type_id;
                $faqs->attempted_correct_questions = $CorrectAnswer;
                $faqs->attempted_total_questions = $totalQuestion;
                $faqs->countryCode = $request->countryCode;
                $faqs->userID = $request->userID;
                $faqs->answer = json_encode($request->all());
                $faqs->status = 1;
                
                $faqs->created = date('Y-m-d H:i:s');
                $faqs->save();
                echo URL::to('/').'/pages/questionnairepostresult?message='.base64_encode($type_id);
                die;
            } else {
                $usr = User::where('email' , base64_decode($deviceToken))->first();
                if ($usr) {
                    $usr->is_pretest_completed= 1;
                    $usr->save();
                }

                $msg = "Thanks for submitting the assessment. You have answered " . $CorrectAnswer . " correct answers out of " . $totalQuestion;
                echo URL::to('/').'/pages/questionnairepreresult?message='.base64_encode($msg);
                die;
            }
            //echo "<pre>"; print_r($this->request->data); die;
            //echo "Thanks for submitting the assessment. You have answered " . $CorrectAnswer . " correct answers out of " . $totalQuestion;
            //die;
       
        
        }
        return view('pages.questionnaire', compact('assestments','deviceToken','questionnaireType','countryCode'));
    }
    public function questionnairepreresult(Request $request) {

        
        $layoutTitle = 'Questionnaire';
        $result = 'Invalid request';
        if ($request->query('message')) {
            $result = base64_decode($request->query('message'));
        }
        return view('pages.questionnairepreresult', compact('result'));
    }

    public function questionnairepostresult(Request $request) {
        
        $layoutTitle = 'Questionnaire';
        $result = 'Invalid request';
        if ($request->query('message')) {
            $type_id = base64_decode($request->query('message'));
            $result = Answer::where('type', 'questionnaire')->where('type_id',$type_id)->first();
            $assestments = Assessment::where('is_first_question', 1)->orderBy('moduleId','asc')->orderBy('id', 'asc')->get();
            return view('pages.questionnairepostresult', compact('assestments','result'));
        }
        return view('pages.questionnairepostresult', compact('result'));
    }
}
