<?php

namespace App\Http\Controllers\Amentities;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Amentities;
use App\Models\Project;
use DirectoryIterator;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use App\Http\Controllers\Traits\FileUploadTrait;
use Illuminate\Support\Str;
class AmentitiesController extends Controller
{
    use FileUploadTrait;
    //lấy danh sách folder trong folder TenDuAn/2Dimage
    public function getAll($id){
           $project = Project::findOrFail($id);
        $projectName =Str::slug($project->title);
     
        $amentities = Project::with('amentities')->find($id);
    //    return $amentities;
        $public = public_path().'/amentities'.'/';
    
        $allFolders = $this->getAllFolder($public,$projectName.'/2Dimage');
    
        return view('client.amentities.index',compact('project','amentities','allFolders'));


    }
    
    public function newFolder($id,$name){
        $amentities = Amentities::find($id);
        $project = Project::findOrFail($amentities->project_id);
        $projectName =Str::slug($project->title);
        
        $public = public_path().'/amentities/'.$projectName.'/2Dimage/';
        $allFolders  = $this->getAllFolder($public,$name);
        $images = $this->getAllImage($public,$name);

        return view('client.amentities.viewChild',compact('project','amentities','allFolders','images'));
    }
    public function showImage($id,$name){
        $amentities = Amentities::find($id);
        $project = Project::findOrFail($amentities->project_id);
        $projectName =Str::slug($project->title);
        $public =  $public = public_path().'/amentities/'.$projectName.'/2Dimage/'.Str::slug($amentities->title, '-').'/';

        $images= $this->getAllImage($public,$name);
        return view('client.amentities.showImage',compact('project','amentities','images','name'));
    }

    public function create3Dimage($id){
        $project = Project::findOrFail($id);
      
        return view('client.amentities.create',compact('project'));
    }

    public function createAmentities($id){
        $project =Project::findOrFail($id);
        $projectName = Str::slug($project->title);

        $public = public_path().'/amentities/'.$projectName.'/2Dimage';
        $folder = public_path().'/amentities/'.$projectName;
        $dir = new DirectoryIterator($folder);

        $allFolders =[];
        $allFolders = $this->getAllFolder($folder,'/2Dimage');
    
 
        return view('client.amentities.index',compact('project','allFolders'));
    }

    public function store(Request $request,$id){
        $project = Project::findOrFail($id);
        $projectName = Str::slug($project->title);
        $amentities = new Amentities();
        $public = public_path().'/amentities/'.$projectName.'/2DImage/';
        if($request->parent_id ==null ){
           $path = $this->createFolder($public,Str::slug($request->title));
           if ($request->hasFile('images')) {
                $files= $request->images;
                $this->uploadMultiple($path,$files);
            }
        $amentities->title = $request->title;
        $amentities->folder_image ='amentities/'.$projectName.'/2DImage/';
        $amentities->project_id = $project->id;
        $amentities->save();
        }
      
        $allFolders =[];
        if($request->parent_id !=null){
            $nameParent = $request->parent_id;
            $pathChild= $this->createFolderChild($public,$nameParent,Str::slug($request->title));
            $dir = new DirectoryIterator($public.$nameParent);
            if ($request->hasFile('images')) {
                $files= $request->images;
                $this->uploadMultiple($pathChild,$files);
            }
        }
    
        return redirect('admin/project/'.$project->id.'/amentities');
    }

    public function store3Dimage(Request $request ,$id)
    {
      
            $amentities = new Amentities();
     
            $amentities->project_id =$id;
            $projectName = Project::findOrFail($id)->title;
            $extracto ='amentities/'.Str::slug($projectName).'/360image';
            if($request->hasFile('folder_image')){
                $file =$request->file('folder_image');

                if($file->getClientOriginalExtension()=="zip" ){
                    
                    $amentities->folder_image = $this->UploadFilePresent($file,$extracto);

                }
            }

            $amentities->save();
            return redirect('admin/project/'.$id.'/general');
    }
    
}