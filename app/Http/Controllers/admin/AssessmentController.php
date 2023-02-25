<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Aoption;
use App\Models\Assessment;
use Illuminate\Http\Request;
use DataTables;
use Illuminate\Support\Facades\Validator;
use PhpOption\Option;

class AssessmentController extends Controller
{
     /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $req)
    {
        $mid = $req->mid;
        if ($req->ajax()) {
            $data = Assessment::where('module_id',$req->mid)->orderBy('sequences','asc')->get();
            return DataTables::of($data)
                    ->addIndexColumn()
                    ->addColumn('option', function($row){
                        $dt='<ul>';
                       foreach($row->aoptions as $option){
                        $dt .= '<li>'.$option->option.' (<b>Correct: </b>'.$option->correct.')</li>';
                       }
                       $dt .= '</ul>';
                       return $dt;
                    })
                    ->addColumn('action', function($row){
                        $btn   = '<a href="'.route('edit.assessment',['id'=>encrypt($row->id)]).'" class="edit btn btn-primary btn-sm">Edit</a>
                        <button class="btn btn-danger" onclick=deleteAssessmentConfirmation("'.encrypt($row->id).'")>Delete</button>';
                        return $btn;

                    })
                    ->rawColumns(['action','option'])
                    ->make(true);
                    //
        }
        return view('admin.modules.index',compact('mid'));
    }
    public function getAssessmentById(Request $req){
        $module=Assessment::where('id',$req->id)->with('aoptions')->first();
        return $module;
    }
    public function editAssessment($id){
        $assessment = Assessment::select('*')->where('id', decrypt($id))->with('aoptions')->first(); //dd($assessment);
        return view('admin.assessment.edit',compact('id','assessment'));
        return response()->json(['status' => 1,'success' => true, 'message' => 'success','data'=>$assessment], 200);
      }
    public function preAssessment(Request $req, $type)
    {
        $type = $type;
        if ($req->ajax()) {
            $data = Assessment::where('type','pre')->latest()->get();
            return DataTables::of($data)
                    ->addIndexColumn()
                    ->addColumn('option', function($row){
                        $dt='<ul>';
                       foreach($row->aoptions as $option){
                        $dt .= '<li>'.$option->option.' (<b>Correct: </b>'.$option->correct.')</li>';
                       }
                       $dt .= '</ul>';
                       return $dt;
                    })
                    ->addColumn('action', function($row){
                        $btn   = '<a href="javascript:void(0)" onclick="editAssessment('.$row->id.');" class="edit btn btn-primary btn-sm">Edit</a>
                        <button class="btn btn-danger" onclick=deleteAssessmentConfirmation("'.encrypt($row->id).'")>Delete</button>';
                        return $btn;

                    })
                    ->rawColumns(['action','option'])
                    ->make(true);
        }
        return view('admin.assessment.index',compact('type'));
    }

    public function postAssessment(Request $req, $type)
    {
        $type = $type;
        if ($req->ajax()) {
            $data = Assessment::where('type','post')->latest()->get();
            return DataTables::of($data)
                    ->addIndexColumn()
                    ->addColumn('option', function($row){
                        $dt='<ul>';
                       foreach($row->aoptions as $option){
                        $dt .= '<li>'.$option->option.' (<b>Correct: </b>'.$option->correct.')</li>';
                       }
                       $dt .= '</ul>';
                       return $dt;
                    })
                    ->addColumn('action', function($row){
                        $btn   = '<a href="javascript:void(0)" onclick="editAssessment('.$row->id.');" class="edit btn btn-primary btn-sm">Edit</a>
                        <button class="btn btn-danger" onclick=deleteAssessmentConfirmation("'.encrypt($row->id).'")>Delete</button>';
                        return $btn;

                    })
                    ->rawColumns(['action','option'])
                    ->make(true);
        }
        return view('admin.assessment.index',compact('type'));
    }
    public function add(Request $req,$type=NULL)
    {
        //  dd($req->all());
        request()->validate([
            "title" => "required",
            // "options.*"=>"required",
          ]);

          if($req->id != 0){
            $assessment=Assessment::find($req->id);
          }else{
            $assessment=new Assessment();
          }

        $assessment->title=$req->title;
        $assessment->sequences=$req->sequences;
        $assessment->module_id=$req->module_id;
        $assessment->type=$req->type;
        if($assessment->save()){
            if($req->id>0){
                Aoption::where('assessment_id',$req->id)->delete();
            }

            // dd($req->options);
            foreach($req->options as $option){
                $opt=new Aoption();
                $opt->assessment_id=$assessment->id;
                $opt->option= $option['option'];
                (isset($option['correct']))?$opt->correct= $option['correct']:'no';
                $opt->save();
            }
            return response()->json([
                'status'=>'success',
                'module'=>$assessment->module_id
            ]);
        }else{
            return response()->json([
                'status'=>'failed'
            ]);
        }
        dd($req->all());
    }
    public function destroy($id)
    {
    	Assessment::find(decrypt($id))->delete();
        Aoption::where('assessment_id',decrypt($id))->delete();
    	return response()->json(['success'=>"Assessment Deleted successfully.", 'status'=>true]);
    }
}
