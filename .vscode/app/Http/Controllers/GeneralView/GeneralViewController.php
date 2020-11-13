<?php

namespace App\Http\Controllers\GeneralView;
use App\Models\GeneralView;
use App\Models\InfoProject;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Project;
use App\Http\Controllers\Traits\FileUploadTrait;
use ZipArchive;

use App\Models\ModelAR;
class GeneralViewController extends Controller
{

    use FileUploadTrait;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $generalviews = GeneralView::with([
        //     'model_ar' => function ($query){
        //         $query->select(['id','model_glb','model_usdz','view_id']);
        //     },
        //     // 'subdivision.model_ar' => function ($query){
        //     //     $query->select(['id','model_glb','model_usdz','subdivision_id']);
        //     // },



        // ])->get();

        // /return view('client.generalview.index',compact('generalviews'));

        
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
    public function show($id){
        
    }
    
    public function storePresentImg(Request $request ,$id)
    {
        $genelralview = GeneralView::where('project_id',$id)->first();
        if($genelralview ==null){
            $genelralview = new GeneralView();
            $project = Project::findOrFail($id);
            $genelralview->project_id =$project->id;
        }
        $extracto ='general/present';
        if($request->hasFile('folder_present_image')){
            $file =$request->file('folder_present_image');

            if($file->getClientOriginalExtension()=="zip" ){
                
                $genelralview->folder_present_image = $this->UploadFilePresent($file,$extracto);

            }
        }

        $genelralview->save();
        return redirect('admin/project/'.$id.'/general');
    }


    public function updatePresentImg(Request $request ,$id)
    {
        $genelralview = GeneralView::find($id);
        $project_id = $genelralview->project_id;
        $extracto ='general/present';
        $attribute =$genelralview->folder_present_image;
        if($request->hasFile('folder_present_image')){
            $file =$request->file('folder_present_image');
         
            $genelralview->folder_present_image = $this->UpdateFilePresent($file,$extracto,$attribute);

        }

        $genelralview->save();
        return redirect('admin/project/'.$project_id.'/general');
    }



    public function storeImgNight_Day(Request $request, $id){

        $genelralview = GeneralView::where('project_id',$id)->first();
        if($genelralview ==null){
            $genelralview = new GeneralView();
            $project = Project::findOrFail($id);
            $genelralview->project_id = $project->id;
        }

        if($request->hasFile('folder_img_night')){
            $file =$request->file('folder_img_night');
      
            $destinationpath ='general/night';
            $path = $this->uploadfloder_image($file,$destinationpath);


            $genelralview->folder_img_night = $path;  

        }

        if($request->hasFile('folder_img_day')){
            $file =$request->file('folder_img_day');
           
            $destinationpath ='general/day';
            $path = $this->uploadfloder_image($file,$destinationpath);

             $genelralview->folder_img_day = $path;  

        }
        $genelralview->save();
        return redirect('admin/project/'.$id.'/general');
  
} 

public function updateImgNight_Day(Request $request, $id){

    $genelralview = GeneralView::find($id);
    $project_id = $genelralview->project_id;
    if($request->hasFile('folder_img_night')){
        $file =$request->file('folder_img_night');

        $destinationpath ='general/night';
        $attribute = $genelralview->folder_img_night;
        $genelralview->folder_img_night  = $this->updatefloder_image($file,$destinationpath,$attribute);

    }

    if($request->hasFile('folder_img_day')){
        $file =$request->file('folder_img_day');

        $destinationpath ='general/day';
        $attribute = $genelralview->folder_img_day;
        $genelralview->folder_img_day  = $this->updatefloder_image($file,$destinationpath,$attribute);


    }
    $genelralview->save();
 
    return redirect('admin/project/'.$project_id.'/general');

} 

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function showGeneral($id)
    {
        $generalview = GeneralView::with([
            'model_ar' => function ($query){
                $query->select(['id','model_glb','model_usdz','view_id']);
            },
            // 'subdivision.model_ar' => function ($query){
            //     $query->select(['id','model_glb','model_usdz','subdivision_id']);
            // },



        ])->where('project_id',$id)->first();
        // return $generalview;
        $project =Project::find($id);
        return view('client.generalview.index',compact(['generalview','project']));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function createpresent($id)
    {
        $project = Project::findOrFail($id);
   
        return view('client.generalview.create_present_img',compact('project'));
    }

    public function editPresent($id)
    {
        $genelralview = GeneralView::find($id);
        $project = Project::find($genelralview->project_id);
        return view('client.generalview.edit_present_img',compact('genelralview','project'));
    }

    public function show_img_night($id)
    {
        $project = Project::findOrFail($id);
  
        return view('client.generalview.show_img_night',compact('project'));
    }

    public function edit_img_night($id)
    {
        $genelralview = GeneralView::find($id);
        $project = Project::find($genelralview->project_id);
        return view('client.generalview.eidt_night_folder',compact('genelralview','project'));
    }
    public function show_img_day($id)
    {
        $project = Project::findOrFail($id);
        return view('client.generalview.show_img_day',compact('project'));
    }

    public function edit_img_day($id)
    {
        $genelralview = GeneralView::find($id);
          $project = Project::find($genelralview->project_id);
        return view('client.generalview.edit_day_folder',compact('genelralview','project'));
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
}
