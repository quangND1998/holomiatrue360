<?php

namespace App\Http\Controllers\Admin;

use App\User;
use Spatie\Permission\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreUsersRequest;
use App\Http\Requests\Admin\UpdateUsersRequest;

class UsersController extends Controller
{
    /**
     * Display a listing of User.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if ( Gate::allows(config('constants.USER_PERMISSION')) ||  Gate::allows(config('constants.CREATE_USER')) ) {
            $users = User::all();
            $roles = Role::get()->pluck('name', 'name');
            //return $roles;
            return view('admin.users.index', compact('users','roles'));
            
        }
      

        

    }

    /**
     * Show the form for creating new User.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //khac voi quyen user_permission thif tra ve loi
        if (Gate::allows(config('constants.USER_PERMISSION')) ||  Gate::allows(config('constants.CREATE_USER'))) {
            $roles = Role::get()->pluck('name', 'name');

             return view('admin.users.create', compact('roles'));
        }
        return abort(401);
      
    }

    /**
     * Store a newly created User in storage.
     *
     * @param  \App\Http\Requests\StoreUsersRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUsersRequest $request)
    {
        if (Gate::allows(config('constants.USER_PERMISSION')) ||  Gate::allows(config('constants.CREATE_USER'))) {
            $user = User::create($request->all());
            $roles = $request->input('roles') ? $request->input('roles') : [];
            $user->assignRole($roles);
    
            return redirect()->route('admin.users.index');
        }
        return abort(401);
    }


    /**
     * Show the form for editing User.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (Gate::allows(config('constants.USER_PERMISSION')) ||  Gate::allows(config('constants.CREATE_USER'))) {
            $roles = Role::get();

            $user = User::findOrFail($id);
    
            return view('admin.users.edit', compact('user', 'roles'));
        }
        return abort(401);
   
    }

    /**
     * Update User in storage.
     *
     * @param  \App\Http\Requests\UpdateUsersRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateUsersRequest $request, $id)
    {
        if (Gate::allows(config('constants.USER_PERMISSION')) ||  Gate::allows(config('constants.CREATE_USER'))) {
            $user = User::findOrFail($id);
            $user->update($request->all());
            $roles = $request->input('roles') ? $request->input('roles') : [];
            $user->syncRoles($roles);
    
            return redirect()->route('admin.users.index');
        }
        return abort(401);
    }

    /**
     * Remove User from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if  (Gate::allows(config('constants.USER_PERMISSION')) ||  Gate::allows(config('constants.CREATE_USER'))) {
            $user = User::findOrFail($id);
            $user->delete();
    
            return redirect()->route('admin.users.index');
        }
        return abort(401);
       
    }

    /**
     * Delete all selected User at once.
     *
     * @param Request $request
     */
    public function massDestroy(Request $request)
    {
        if  (Gate::allows(config('constants.USER_PERMISSION')) ||  Gate::allows(config('constants.CREATE_USER')))  {
            if ($request->input('ids')) {
                $entries = User::whereIn('id', $request->input('ids'))->get();
    
                foreach ($entries as $entry) {
                    $entry->delete();
                }
            }
        }
        return abort(401);
    }

}