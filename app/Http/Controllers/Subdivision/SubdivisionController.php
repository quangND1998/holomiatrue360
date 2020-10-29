<?php

namespace App\Http\Controllers\Subdivision;
use App\Models\SubdivisionView;
use App\Models\Project;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Subdivision\CreateSubdivisionRequest;
use App\Http\Requests\Subdivision\UpdateSubdivisionRequest;
use ZipArchive;
use File;
use App\Models\ShowFlat;
use App\Models\Ground;
use App\Http\Controllers\Traits\FileUploadTrait;
use App\Models\ModelAR;

class SubdivisionController extends Controller
{


     use FileUploadTrait;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storesubdivision(CreateSubdivisionRequest $request, $id)
    {
        $subdivision = new SubdivisionView();

        if($request->hasFile('folder_image')){
            $file =$request->file('folder_image');
            $extracto ='subdivision';
            $subdivision->folder_image = $this->uploadfloder_image($file,$extracto);


        }
        $subdivision->title = $request->title;
        $project = Project::findOrFail($id);
        $subdivision->project_id = $project->id;
        $subdivision->save();
        return redirect('admin/project/'.$id.'/subdivision');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function showSubdivision($id)
    {
        $subdivisions = Project::with('subdivision')->find($id);
        $project = Project::find($id);
        return view('client.subdivision.index',compact('subdivisions','project'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
       $subdivision = SubdivisionView::find($id);
       $project = Project::find($subdivision->project_id);
       return view('client.subdivision.edit',compact('subdivision','project'));
    }
 
    public function createsubdivision($id){
        $project = Project::findOrFail($id);
        return view('client.subdivision.create',compact('project'));
    }
    public function manager($id)
    {
       $subdivision = SubdivisionView::find($id);
       $project = Project::find($subdivision->project_id);
       return view('client.subdivision.manager',compact('subdivision','project'));
    }
    //model AR
    public function viewModelAR($id){
        $subdivision = SubdivisionView::with('model_ar')->find($id);
        $project = Project::find($subdivision->project_id);
        return view('client.subdivision.model_ar.index',compact('subdivision','project'));
    }
    public function create_model_ar($id){
        $subdivision = SubdivisionView::with([
            'model_ar' => function ($query){
                $query->select(['id','model_glb','model_usdz','subdivision_id']);
            },

        ])->find($id);
        $project = Project::find($subdivision->project_id);

        return view('client.subdivision.model_ar.create',compact('subdivision','project'));
    }
    public function update_model_ar($id){
        $model_ar = ModelAR::findOrFail($id);
        $subdivision = SubdivisionView::findOrFail($model_ar->subdivision_id);
        $project = Project::find($subdivision->project_id);
        return view('client.subdivision.model_ar.edit',compact('model_ar','project'));
    }

   //Ground
    public function createground($id){
        $subdivision = SubdivisionView::with('ground')->findOrFail($id);
        $project = Project::find($subdivision->project_id);
        $count =1;
        return view('client.subdivision.ground.index',compact('subdivision','project','count'));
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateSubdivisionRequest $request, $id)
    {
        $subdivision = SubdivisionView::find($id);
        $attribute =$subdivision->folder_image;
        if($request->hasFile('folder_image')){
            $file =$request->file('folder_image');
            $extracto ='subdivision';
            $subdivision->folder_image = $this->updatefloder_image($file,$extracto,$attribute);

        }
        $subdivision->title = $request->title;
        $subdivision->save();
        return  redirect('admin/project/'.$subdivision->project_id.'/subdivision');
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

    public function manageSubdivision($id){

        $project = Project::with([
            'showflat' => function ($query){
                $query->select(['id','title','project_id']);
            },
            'subdivision.ground' => function ($query){
                $query->select(['id','title','subdivision_id']);
            },
            // 'subdivision.model_ar' => function ($query){
            //     $query->select(['id','model_glb','model_usdz','subdivision_id']);
            // },



        ])->find($id);

        //return $project->toJson();
        return view('client.subdivision.managerTreeView',compact('project'));

    }



    public function addSubdivision(Request $request,$id)
    {

        $project = Project::findOrFail($id);
        if($request->input('title') !=null){

          $subdivision =  SubdivisionView::create([
                'title' => $request->input('title'),
                'project_id' => $project->id
            ]);
        }

        if($request->input('showflat') != null){
            ShowFlat::create([
                'title' => $request->input('showflat'),
                'project_id' => $project->id
            ]);
        }
        if($request->input('ground') != null){
            Ground::create([
                'title' => $request->input('ground'),
                'subdivision_id' =>$request->parent_id
            ]);
        }

        return back()->with('success', 'New Category added successfully.');

    }
    public function showArea($tile,$id){
        $subdivision = SubdivisionView::find($id);
        // dd($subdivision->ground);
        return view('public.project.subdivision.subdivision',['subdivision'=>$subdivision]);
    }
}
