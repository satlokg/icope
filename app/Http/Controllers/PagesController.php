<?php

namespace App\Http\Controllers;

use App\Models\Answer;
use App\Models\Assessment;
use App\Models\Module;
use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function who($module_id = NULL, $device = NULL) {
        $module = Module::where('id', $module_id)->first();
        return view('pages.who', compact('module','device'));
        
    }
    public function assestment(Request $request, $module = NULL, $deviceToken = NULL) {
       
        if (empty($deviceToken)) {
            return $this->redirect('/pages/who/' . ($module + 1));
        }
        if ($request->post()) {
            $moduleIID = $request->moduleID - 1;
            $assestments = Assessment::where('moduleId',$moduleIID)->toArray();
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
        $assestments = Assessment::where('moduleId',$module)->toArray();
        $moduleID = $module + 1;
        return view('pages.assessment', compact('assestments','deviceToken','moduleID'));
        
    }
}
