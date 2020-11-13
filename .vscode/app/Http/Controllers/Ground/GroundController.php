<?php

namespace App\Http\Controllers\Ground;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Ground\GroundRequest;
use App\Models\Ground;
use App\Models\SubdivisionView;
use Illuminate\Support\Facades\Gate;
use App\Http\Controllers\Traits\FileUploadTrait;
use App\Models\Project;

class GroundController extends Controller
{
    use FileUploadTrait;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
    public function storeGround(GroundRequest $request ,$id)
    {
        $ground =  new Ground();
        $subdivision = SubdivisionView::find($id);
        if ($request->hasfile('image')) {
            $files =$request->file('image');
            $destinationpath ='ground/';
            $ground->image = $this->image($files,$destinationpath);

        }
        $ground->title = $request->title;
        $ground->subdivision_id =$id;

        $ground->save();
        return redirect('admin/project/'.$id.'/subdivision/createground');
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
        $ground = Ground::findOrFail($id);
        $subdivision = SubdivisionView::find($ground->subdivision_id);
        $project = Project::find($subdivision->project_id);

  
        return view('client.subdivision.ground.edit',compact('ground','subdivision','project'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updateGround(GroundRequest $request, $id)
    {
        $ground = Ground::find($id);
        $subdivision = SubdivisionView::find($ground->subdivision_id);
    
        if ($request->hasfile('image')) {
            $files =$request->file('image');
            $destinationpath ='ground/';
            $attribute = $ground->image;
            $ground->image = $this->update_image($files,$destinationpath,$attribute);

        }
        $ground->title = $request->title;

        $ground->save();
        return redirect('admin/project/'.$ground->subdivision_id.'/subdivision/createground');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if(Gate::allows(config('constants.CREATE_PROJECT_PERMISSION'))){
            $ground = Ground::findOrFail($id);
            $idx = $ground->subdivision_id;

            $attribute = $ground->image;
            $extension = " ";
            $this->DeleteFolder($attribute,$extension);
            $ground->delete();
        
    
            return redirect('admin/project/'.$idx.'/subdivision/createground');
        }
        return abort(401);
    }
    public function showGround($title,$id)
    {
        $ground = Ground::find($id);
        if($ground){
            return view('public.project.subdivision.ground',['ground'=>$ground]);
        }
    }
}
