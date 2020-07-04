<?php

namespace App\Http\Controllers;


use App\Location;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class UserController extends Controller
{
    public function profile()
    {

        $user = User::find(Auth::user()->id);
        $state_list = Location::select('state')->distinct()->get();


        return view('users.profile', compact('user', 'state_list'));
    }

    public function profileDetail(Request $request, $id)
    {
        $user = User::find($id);
        //dd($user);
        return view('users.profile-detail', compact('user'));

    }

    public function profileUpdate(Request $request)
    {
        //dd($request);
        $this->validate($request,[
            'email' => 'required|unique:users',
        ]);

        User::where('id', Auth::user()->id)->update([
            'email' => $request->email,
            'state' => $request->state,
            'city' => $request->city,
            'locally' => $request->locally,

        ]);

        return back();

    }

    public function userskills(){
        return view('users.skills');
    }


//    Admin Functions
    public function dashboard(){
        return view('admin.dashboard');
    }


    public function addnewlocation(){
        return view('admin.add-new-location');
    }



    public function addnewlocationstore(Request $request)
    {
        $this->validate($request,[
            'locally' => ['required','unique:locations'],

        ]);
        //dd($request);
         Location::create([
            'country' => $request['country'],
            'state' => $request['state'],
            'state_slug' => Str::slug($request->state),
            'city' => $request['city'],
            'city_slug' => Str::slug($request['city']),
            'locally' => $request['locally'],
            'locally_slug' => Str::slug($request['locally'])

        ]);
        return redirect()->back()->with('message', 'success|Record updated.');
    }

    //User profile dropdown
    function fetch(Request $request)
    {
        $select = $request->get('select');
        $value = $request->get('value');
        $dependent = $request->get('dependent');
        //dd($request);

        $data = DB::table('locations')
            ->select($dependent)
            ->where($select, $value)
            ->distinct()
            ->get();
        //dd($data);
        $output = '<option value="">Select '.ucfirst($dependent).'</option>';
        foreach($data as $row)
        {
            $output .= '<option value="'.$row->$dependent.'">'.$row->$dependent.'</option>';
        }
        echo $output;
    }
}
