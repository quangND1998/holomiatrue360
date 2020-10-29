<?php

namespace App\Http\Controllers\ShowFlat;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\ShowFlat;
use App\Http\Controllers\Traits\FileUploadTrait;
use App\Models\Project;
use Spatie\Permission\Commands\Show;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Str;
class ShowFlatController extends Controller
{
    use FileUploadTrait;


    public function showFlat($id){
        $projectShowflat = Project::with('showflat')->find($id);
        $project = Project::find($id);
        $count=1;
 
        return view('client.showflat.index',compact('projectShowflat','project','count'));
    }



    public function storeShowFlat( Request $request ,$id){

        $showflat = new ShowFlat();

        $showflat->title = $request->title;

        if($request->hasFile('folder_flat')){
            $file =$request->file('folder_flat');
            $extracto ='showflat';
            $showflat->folder_flat = $this->UploadZipFile($file,$extracto);
        }
        $project = Project::findOrFail($id);
        $showflat->project_id = $project->id;
        $showflat->save();
        return redirect('admin/project/'.$showflat->project_id.'/showflat');

    }


    public function edit($name,$id){
        $showflat = ShowFlat::findOrFail($id);
        $project = Project::find($showflat->project_id);

        return view('client.showflat.edit',compact('showflat','project','name'));
    }

    public function update( Request $request ,$name,$id){
        $showflat = ShowFlat::find($id);
        $name = Project::find($showflat->project_id)->title;
        $idx = $showflat->project_id;
        $showflat->title = $request->title;
        if($request->hasFile('folder_flat')){
            $file =$request->file('folder_flat');
            $attribute =  $showflat->folder_flat;
            $extracto ='showflat';
            $showflat->folder_flat = $this->UpdateFile($file,$extracto,$attribute);

        }
        $showflat->save();
        return redirect('admin/project/'.$idx.'/showflat');

    }
    public function destroy($id)
    {
        if(Gate::allows(config('constants.CREATE_PROJECT_PERMISSION'))){
            $showflat = ShowFlat::findOrFail($id);
            $idx = $showflat->project_id;

            $attribute = $showflat->folder_flat;
            $extension = "/index.html";
            $this->DeleteFolder($attribute,$extension);
            $showflat->delete();
            return redirect('admin/project/'.$idx.'/showflat');
        }
        return abort(401);
    }

}
