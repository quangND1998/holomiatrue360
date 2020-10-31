<?php

namespace App\Http\Controllers\Project;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Support\Facades\Gate;
use App\Models\GeneralView;
use Illuminate\Support\Facades\Auth;
use App\Models\InfoProject;
use Illuminate\Http\Response;
use App\Http\Requests\Project\CreateProjectRequest;
use App\Models\ModelAR;
use App\Models\ShowFlat;
use App\Models\SubdivisionView;
use Illuminate\Support\Facades\Redirect;

class ProjectController extends Controller
{
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index(Request $request)
    {

        

            $projects = Project::with([
                'info','general'
            ])->paginate(7);
            $count=1;
            //return $projects;
 
            return view('client.project.index1',compact('projects','count'))->with('i', ($request->input('page', 1) - 1) * 7);;
        //return csrf_token();


    }



    public function view( $id)
    {
            $project = Project::find($id);
           // dd($project);
            //return $projects;

            return view('client.project.manager',compact('project'));
        //return csrf_token();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateProjectRequest $request)
    {
        if(Gate::allows(config('constants.CREATE_PROJECT_PERMISSION'))){
            $project = new Project();
            $project->title = $request->title;
            $project->user_id = Auth::user()->id;
            $project->save();
            if($project !=null){
                $general = new GeneralView();
                $general->project_id = $project->id;
                $general->save();
            }
            if($general !=null){
                $model_ar = new ModelAR();
                $model_ar->view_id = $general->id;
                $model_ar->save();
            }

                    // return view('info.create',with($project->id)));
            // return view('info.create',['project'=>$project,'projectid'=>$project->id]);
            // return view('info.create',['project'=>$project]);  
            return redirect()->route('admin.info.showProject', ['id' => $project->id]);
        }
        return view('errors.404');
    }

    public function createNewGeneral(Request $request,$id)
    {
            $general = new GeneralView();
            $general->project_id=   $id;
            $general->save();
            return $general;//tra ve id cho thang genealview
    }



    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }


    public function infoProject($id){
        $project = Project::find($id)->with('info:id,logo,thumbnail,phone,link_register,link_film,project_id')->get();
        return $project;

    }
    public function public_project($title){
        $project = Project::where('title',$title)->first();
        // dd($project->showflat);
        $data = $project->general;
        $info = $project->info;
        return view('public.project.index',['project'=>$project,'data'=>$data,'info'=>$info]);
     }
    // public function returndata($id){
    //     $project = Project::find($id);
    //     $info = $project->general;
    //     return $info->toJson();
    // }
    public function general_view_modelar($title,$id){
        $general_view = GeneralView::find($id);
        $model_glb = $general_view->model_ar->model_glb;
        $model_usdz = $general_view->model_ar->model_usdz;
        return view('public.project.modelar',['model_glb'=>$model_glb,'model_usdz'=>$model_usdz]);
    }
    public function subdivision_view_modelar($title,$id){
        $subdivision_view = SubdivisionView::find($id);
        $model_glb = $subdivision_view->model_ar->model_glb;
        $model_usdz = $subdivision_view->model_ar->model_usdz;
        return view('public.project.modelar',['model_glb'=>$model_glb,'model_usdz'=>$model_usdz]);
    }
    public function map_project($title){
        $project = Project::where('title',$title)->first(); 
        // dd($project->address);
        return view('public.project.map',['map'=>$project->address]);
    }
    public function showflat($title,$id){
        $showflat = ShowFlat::find($id);
        return view('public.project.showflat',['showflat'=>$showflat]);
    }
}