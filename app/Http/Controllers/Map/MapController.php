<?php

namespace App\Http\Controllers\Map;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Map\MapRequest;
use App\Models\Map;
use App\Http\Controllers\Traits\FileUploadTrait;
use App\Models\Project;

class MapController extends Controller
{
    use FileUploadTrait;
    public function show($id){
        $project_map = Project::with([
            'address' => function ($query){
                $query->select(['id', 'address', 'latitude', 'longtitude', 'project_id']);
            },
            'map'   => function ($query){
                $query->select(['id', 'title','folder_image', 'project_id']);
            },
        ])->findOrFail($id);
        $project = Project::find($id);
        $count =1;
        return view('client.map.index',compact('project_map','project','count'));
     }
    public function map_store( MapRequest $request , $id){

        $map = new Map();
        if ($request->hasFile('folder_image')) {
            $file =$request->file('folder_image');
            $destinationpath ='map/';
            $map->folder_image = $this->image($file,$destinationpath);

        }
        $map->title = $request->title;

        $map->project_id = $id;
        $map->save();
        return redirect('admin/project/'.$id.'/map');
    }

    public function edit($name,$id)
    {
        $map = Map::find($id);
        $project = Project::find($map->project_id);

        return view('client.map.edit',compact('map','project','name'));
    }


    public function update( MapRequest $request ,$name, $id){
        $map = Map::find($id);
        $idx =$map->project_id;
        $name = Project::find($map->project_id)->title;
        if ($request->hasFile('folder_image')) {
            $file =$request->file('folder_image');
            $destinationpath ='map/';
            $attribute = $map->folder_image;
            $map->folder_image = $this->update_image($file,$destinationpath,$attribute);
        }

        $map->title = $request->title;
        $map->save();
        return redirect('admin/project/'.$idx.'/map');
    }



}
