<?php

namespace App\Http\Controllers\ModelAr;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\ModelAR;
use App\Models\GeneralView;
use App\Http\Controllers\Traits\FileUploadTrait;
use App\Models\Project;
use App\Models\SubdivisionView;

class ModelArController extends Controller
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
 

    public function generalstore(Request $request,$id)
    {


        $model_ar = ModelAR::where('view_id',$id)->first();
        if($model_ar ==null){
            $model_ar = new ModelAR();
            $general = GeneralView::findOrFail($id);
            $model_ar->view_id = $general->id;
        }
        $project_id = GeneralView::find($id)->project_id;

        if($request->hasFile('model_glb')){

            $model_glb =$request->file('model_glb');
            $destinationpath ='model/glb';
            $model_ar->model_glb = $this->UploadFileGLB_Usdz($model_glb, $destinationpath);
        }
        if($request->hasFile('model_usdz')){

            $model_usdz =$request->file('model_usdz');
            $destinationpath ='model/usdz';
            $model_ar->model_usdz = $this->UploadFileGLB_Usdz($model_usdz, $destinationpath);
        }
        $model_ar->save();
        return redirect('/admin/project/'.$project_id.'/general');
    }

    public function subdivisionstore(Request $request,$id)
    {

        $model_ar = ModelAR::where('subdivision_id',$id)->first();
        if($model_ar ==null){
            $model_ar = new ModelAR();
            $subdivision = SubdivisionView::findOrFail($id);
            $model_ar->subdivision_id = $subdivision->id;
        }
        // $model_ar = ModelAR::find($id);
        if($request->hasFile('model_glb')){

            $file =$request->file('model_glb');
            $destinationpath ='model/glb';
            $model_ar->model_glb = $this->UploadFileGLB_Usdz($file, $destinationpath);
        }
        if($request->hasFile('model_usdz')){

            $file =$request->file('model_usdz');
            $destinationpath ='model/usdz';
            $model_ar->model_usdz = $this->UploadFileGLB_Usdz($file, $destinationpath);
        }
        $subdivision = SubdivisionView::findOrFail($id);
        $model_ar->save();

        return redirect('admin/project/'.$id.'/subdivision/model_ar');
    }


    public function show($id){
        $models_ar = GeneralView::with([
            'model_ar' => function ($query){
                $query->select(['id','model_glb','model_usdz','view_id']);
            },

      

        ])->find($id);
    
        return view('client.model_ar.index',compact('models_ar'));
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function createAndroid_IOS($id)
    {

        $generalview = GeneralView::with('model_ar')->find($id);
        $project = Project::find($generalview->id);



        return view('client.model_ar.create_android_ios',compact('generalview','project'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function editAndroid_IOS($id)
    {
        $model_ar = ModelAR::findOrFail($id);

        $generalview = GeneralView::findOrFail($model_ar->view_id);
        $project = Project::find($generalview->project_id);

        return view('client.model_ar.edit_android_ios',compact('model_ar','project'));
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
        
        $model_ar = ModelAR::find($id);
        $project_id = GeneralView::find($model_ar->view_id)->project_id;

        if($request->hasFile('model_glb')){

            $file =$request->file('model_glb');
            $attribute = $model_ar->model_glb;
            $destinationpath ='model/glb';
            $model_ar->model_glb = $this->UpdateFileGlb_Usdz($file, $destinationpath,$attribute);
            
        }
        if($request->hasFile('model_usdz')){

            $file =$request->file('model_usdz');
            $attribute = $model_ar->model_usdz;
            $destinationpath ='model/usdz';
            $model_ar->model_usdz = $this->UpdateFileGlb_Usdz($file, $destinationpath,$attribute);
            
        }
        $model_ar->save();
        return redirect('/admin/project/'.$project_id.'/general');
        
    }
    public function updatesubdivision(Request $request, $id)
    {
        
        $model_ar = ModelAR::find($id);
        $subdivision = SubdivisionView::find($model_ar->subdivision_id);

        if($request->hasFile('model_glb')){

            $file =$request->file('model_glb');
            $attribute = $model_ar->model_glb;
            $destinationpath ='model/glb';
            $model_ar->model_glb = $this->UpdateFileGlb_Usdz($file, $destinationpath,$attribute);
            
        }
        if($request->hasFile('model_usdz')){

            $file =$request->file('model_usdz');
            $attribute = $model_ar->model_usdz;
            $destinationpath ='model/usdz';
            $model_ar->model_usdz = $this->UpdateFileGlb_Usdz($file, $destinationpath,$attribute);
            
        }
        $model_ar->save();
        return redirect('admin/project/'.$subdivision->id.'/subdivision/model_ar');
        
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

}
