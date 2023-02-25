<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Assessment;
use App\Models\Module;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use DataTables;

class ModuleController extends Controller
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
        if ($req->ajax()) {
            $data = Module::orderBy('sequences','asc')->get();
            return DataTables::of($data)
                    ->addIndexColumn()
                    ->addColumn('detail', function($row){

                       $dt = html_entity_decode($row->detail);
                       return $dt;
                    })
                    ->addColumn('vdo_link', function($row){

                        $vlink = '<a href="'.$row->vdo_link.'" target="_blank">'.$row->vdo_link.'</a>';
                        return $vlink;

                     })
                     ->addColumn('presentation_link', function($row){

                        $plink = '<a href="'.$row->presentation_link.'" target="_blank">'.$row->presentation_link.'</a>';
                        return $plink;

                     })
                    ->addColumn('action', function($row){
                        $btn = '<a href="javascript:void(0)" onclick="assessment('.$row->id.');" class="btn btn-info btn-sm">Assessment</a>';
                        $btn .= '<a href="javascript:void(0)" onclick="editModule('.$row->id.');" class="btn btn-primary btn-sm">Edit</a>';
                        $btn .= '<a href="javascript:void(0)" onclick="uploadImages('.$row->id.');" class="btn btn-warning btn-sm">Upload Images</a>';
                        $btn .= '<button class="btn btn-danger" onclick=deleteModuleConfirmation("'.encrypt($row->id).'")>Delete</button>';
                        return $btn;

                    })
                    ->rawColumns(['action','detail','vdo_link','presentation_link'])
                    ->make(true);
        }
        return view('admin.modules.index');
    }
    public function add(Request $req)
    {
        request()->validate([
            "title" => "required",
            "description" => "required",
            // "detail" => "required",
            'file' => 'mimes:html|max:2048',
          ]);
          if($req->id != 0){
            $module=Module::find($req->id);
          }else{
            $module=new Module();
          }
          if($req->file != null){
            $design_file_name ="icope_" . md5(time()) . "_" . $req->file->getClientOriginalName();
            $design_file_path = "icope_" . md5(time()) . "_" . $req->file->getClientOriginalName();
            $path = public_path().'/pages';
            $uplaod = $req->file->move($path,$design_file_name);
            $module->file_link=$design_file_name;
        }
        $module->title=$req->title;
        $module->description=$req->description;
        $module->vdo_link=$req->vdo_link;
        $module->presentation_link=$req->presentation_link;
        $module->detail=$req->detail;
        $module->sequences=$req->sequences;
        $module->user_id=Auth::user()->id;
        if($module->save()){
            return response()->json([
                'status'=>'success'
            ]);
        }else{
            return response()->json([
                'status'=>'failed'
            ]);
        }
        dd($req->all());
    }
    public function getModuleById(Request $req){
        $module=Module::find($req->id);
        return $module;
    }

    function upload(Request $request)
    {
     $image_code = '';
     $images = $request->file('file');
     foreach($images as $image)
     {
    //   $new_name = rand() . '.' . $image->getClientOriginalExtension();
      $new_name=$image->getClientOriginalName();
      $image->move(public_path('assets/img'), $new_name);
      $image_code .= '<div class="col-md-3" style="margin-bottom:24px;"><img src="assets/img/'.$new_name.'" class="img-thumbnail" />'.$new_name.'</div>';
     }

     $output = array(
      'success'  => 'Images uploaded successfully',
      'image'   => $image_code
     );
    //  redirect()->route('route')->with('message', $output);
     return response()->json($output);
    }
    public function destroy($id)
    {
    	Module::find(decrypt($id))->delete();
    	Assessment::where('module_id',decrypt($id))->delete();
    	return response()->json(['success'=>"Module Deleted successfully.", 'status'=>true]);
    }
}
