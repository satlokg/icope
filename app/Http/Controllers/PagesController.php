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
            return redirect()->to('/pages/who/' . ($module + 1));
        }
        if ($request->post()) {
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
       
        if ($request->post()) {
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
}
