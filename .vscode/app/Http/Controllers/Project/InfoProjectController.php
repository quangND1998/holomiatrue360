<?php

namespace App\Http\Controllers\Project;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\InfoProject;
use App\Models\Project;
use App\Http\Requests\Project\CreateInfoRequest;
use App\Http\Requests\Project\UpdateInfoRequest;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\File; 
use App\Http\Controllers\Traits\FileUploadTrait;
use Illuminate\Support\Str;
use App\Models\Amentities;
class InfoProjectController extends Controller
{
    
    use FileUploadTrait;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $infoes = InfoProject::all();
        // return view('info.index',compact('infoes'));

        //return csrf_token();
        return view();
    }
    public function getinfo($id)
    {
        if(Gate::allows(config('constants.CREATE_PROJECT_PERMISSION')) || Gate::allows(config('constrants.USER_PERMISSION'))){
        $project = Project::with([
            'info' => function ($query){
                $query->select(['id','address','logo','thumbnail','phone','link_register','link_film','published','project_id','link_website']);
            },

        ])->findOrFail($id);

        // //return csrf_token();
        return view('client.project_info.index',compact('project'));
        }
        return view('errors.404');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request,$id)
    {
        // if(Gate::allows(config('constants.3DTEAM_PERMISSION')) || Gate::allows(config('constrants.USER_PERMISSION'))){
        //     return view('info.ce');
        // }

    }

    public function createinfo($id){

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateInfoRequest $request)
    {

        if(Gate::allows(config('constants.CREATE_PROJECT_PERMISSION')) ){
            $infoProject = new InfoProject();

            if($request->hasFile('logo')){

                $logo = $request->file('logo');
                 $destinationPath = 'uploads/logos/';
                $infoProject->logo = $this->image($logo,$destinationPath);
            }
            if($request->hasFile('thumbnail')){
                $thumbnail = $request->file('thumbnail');
                $destinationPath = 'uploads/thumbnails/';

                $infoProject->thumbnail =  $this->image($thumbnail,$destinationPath);
            }
            $infoProject->phone = $request->phone;
            $infoProject->link_register = $request->link_register;
            $infoProject->link_film = $request->link_film;
            $infoProject->project_id = $request->project_id;
            $infoProject->link_website = $request->link_website;
            $infoProject->address = $request->address;
            $infoProject->published = $request->pushlished;

            $infoProject->save();
          
            
            return redirect('/admin/project/'.$infoProject->project_id.'/info');


    }
    return view('errors.503');
}

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function showProject($id)
    {
        if(Gate::allows(config('constants.CREATE_PROJECT_PERMISSION')) ){
        $project = Project::findOrFail($id);
        //return $project;
        return view('client.project_info.create1',compact('project'));
        }
        return view('errors.503');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function editProject($id)
    {
        $inforproject = InfoProject::where('project_id',$id)->first();
        $project = Project::find($id);
       
        return view('client.project_info.edit',compact(['inforproject','project']));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateInfoRequest $request, $id)
    {
        $infoProject =  InfoProject::find($id);

        $project = Project::where('id',$infoProject->project_id)->first();
        $oldname = $project->title;
        if($request->hasFile('logo')){


            $logo = $request->file('logo');
                $destinationpath = 'uploads/logos/';
                $attribute = $infoProject->logo;
                $infoProject->logo =$this-> update_image($logo,$destinationpath,$attribute);

        }

        if($request->hasFile('thumbnail')){


            $thumbnail = $request->file('thumbnail');
                $destinationpath = 'uploads/thumbnails/';
                $attribute = $infoProject->thumbnail;
                $infoProject->thumbnail = $this->update_image($thumbnail,$destinationpath,$attribute);;
        }
        $project->title = $request->title;
        $infoProject->phone = $request->phone;
        $infoProject->link_register = $request->link_register;
        $infoProject->link_film = $request->link_film;
        $infoProject->link_website = $request->link_website;
        $infoProject->address = $request->address;
        $infoProject->published = $request->published;
        $project->save();
        $infoProject->save();
        // rename(realpath(dirname(__FILE__)).'/'.Str::slug($oldname),realpath(dirname(__FILE__)).'/'.Str::slug($request->title))
        $path = 'amentities';
        
        rename($path.'/'.Str::slug($oldname),$path.'/'.Str::slug($request->title));

        $amentities = Amentities::where('project_id',$infoProject->project_id)->where('title','!=' ,'')->update(['folder_image' => $path.'/'.Str::slug($request->title).'/2DImage/']);
        $amentities1 = Amentities::where('project_id',$infoProject->project_id)->where('title','=' ,'')->first();
        if($amentities1 != null){
            $folder_image = $amentities1->folder_image;

            $newPath =  explode('/360image',$folder_image)[1];
            $amentities1->update(['folder_image' => $path.'/'.Str::slug($request->title).'/360image'.$newPath]);
        }

        // return redirect()->route('admin.info.show', ['id' =>  $infoProject->project_id]);
        return redirect('admin/project');
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
