<?php

namespace App\Http\Controllers\UserProfile;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
class UserProfileController extends Controller
{
    


    public function index(){
        if (Auth::check()){
            $user = Auth::user();
        }
        
        return view('client.user-profile.index',compact('user'));
    }
}