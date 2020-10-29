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

class AmentitiesController extends Controller
{
    use FileUploadTrait;
    public function getAmentities($id){
        $project = Project::findOrFail($id);
        $amentities = Project::with('amentities')->find($id);
        return view('client.amentities.index',compact('amentities','project'));
    }

    public function createAmentities($id){
        $project = Project::findOrFail($id);

        $public = public_path().'/amentities/2Dimage/';
        $folder = public_path().'/amentities/2Dimage/';
        $dir = new DirectoryIterator($folder);

        $allFolders =[];
        foreach ($dir as $fileinfo) {
            if ($fileinfo->isDir() && !$fileinfo->isDot()) {
                $allFolders[]= $fileinfo->getFilename();
            }
        }
     
        return view('client.amentities.create',compact('project','allFolders'));
    }

    public function store(Request $request,$id){
        $project = Project::findOrFail($id);
        $amentities = new Amentities();
        $public = public_path().'/amentities/2Dimage/';

        if($request->title !=null && $request->title ==null){

            $public = public_path().'/amentities/2Dimage/';
           
                $this->createFolder($public,$request->title);
        }
        $allFolders =[];
        if($request->parent_id !=null){
            $nameParent = $request->parent_id;
            $this->createFolderChild($public,$nameParent,$request->title);
            $dir = new DirectoryIterator($public.$nameParent);

           
            foreach ($dir as $fileinfo) {
                if ($fileinfo->isDir() && !$fileinfo->isDot()) {
                    $allFolders[]= $fileinfo->getFilename();
                }
            }
        }
 
        return view('client.amentities.create',compact('project','allFolders'));
    }
}
