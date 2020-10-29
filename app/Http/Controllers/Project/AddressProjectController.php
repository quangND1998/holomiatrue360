<?php

namespace App\Http\Controllers\Project;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Project;
use App\Models\AddressProject;
use App\Http\Requests\Address\AddressRequest;
class AddressProjectController extends Controller
{
    



    public function show($id){
        $address = Project::with('address')->find($id);
        
        $project =Project::find($id);
        $count = 1;
    
        return view('client.address.index',compact('project','address', 'count'));
    }

    public function edit($name,$id){
        $address = AddressProject::find($id);
        $project = Project::find($address->project_id);
        return view('client.address.edit',compact('project','address','name'));

    }


    public function addressStore(AddressRequest $request){

        $address = AddressProject::create($request->all());
        return redirect('admin/project/'.$address->project_id.'/address');

    }

    public function updateAddress(AddressRequest $request,$name,$id){

        $address = AddressProject::findOrFail($id);
        $name = Project::find($address->project_id)->title;
        $address->update($request->all());
        return redirect('admin/project/'.$address->project_id.'/address');

    }
}