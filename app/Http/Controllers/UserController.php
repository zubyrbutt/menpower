<?php

namespace App\Http\Controllers;


use App\Location;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function profile()
    {

        $user = User::find(Auth::user()->id);
        $locations = Location::distinct(['state'])->get();

        return view('users.profile', compact('user', 'locations'));
    }

    public function profileDetail(Request $request, $id){
        $user = User::find($id);
        //dd($user);
        return view('users.profile-detail', compact('user'));


    }
}
