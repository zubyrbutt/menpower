<?php

namespace App\Http\Controllers;


use App\Location;
use App\Notifications\HireMe;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
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

        return view('users.profile-detail', compact('user'));

    }

    public function profileUpdate(Request $request)
    {
        //dd($request);
        $this->validate($request, [
            'state' => 'required',
            'city' => 'required',
            'locally' => 'required',
        ]);

        User::where('id', Auth::user()->id)->update([

            'state' => $request->state,
            'city' => $request->city,
            'locally' => $request->locally,

        ]);

        return back();
    }

    public function updatelocation()
    {
        $state_list = Location::select('state')->distinct()->get();
        return view('users.updatelocation', compact('state_list'));
    }

    public function updatelocationstore(Request $request)
    {
        $this->validate($request, [
            'state' => 'required',
            'city' => 'required',
            'locally' => 'required',
        ]);

        User::where('id', Auth::user()->id)->update([

            'state' => $request->state,
            'city' => $request->city,
            'locally' => $request->locally,
            'area' => Str::slug($request['locally']),

        ]);
        return redirect()->back()->with('success', 'Post was successfully added!');
    }

    public function userskills()
    {
        return view('users.skills');
    }

    public function changenameform()
    {
        return view('users.change-name');
    }

    public function userchangename(Request $request)
    {
        //dd($request);
        $this->validate($request, [
            'name' => 'required',
        ]);

        User::where('id', Auth::user()->id)->update([

            'name' => $request->name,
        ]);
        return redirect()->back()->with('success', 'Post was successfully added!');
    }


//    Admin Functions
    public function dashboard()
    {
        return view('admin.dashboard');
    }


    public function addnewlocation()
    {
        return view('admin.add-new-location');
    }


    public function addnewlocationstore(Request $request)
    {
        $this->validate($request, [
            'locally' => ['required', 'unique:locations'],

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
        //dd($request);
        $select = $request->get('select');
        $value = $request->get('value');
        $dependent = $request->get('dependent');
        //dd($request);

        $data = DB::table('locations')
            ->select($dependent)
            ->where($select, $value)
            ->distinct()
            ->get();

        // dd($data);
        $output = '<option value="">Select ' . ucfirst($dependent) . '</option>';

        foreach ($data as $row) {
            $output .= '<option value="' . $row->$dependent . '">' . $row->$dependent . '</option>';
        }
        echo $output;
    }

    public function notification()
    {
        $user = Auth::user();
        $user->notify(new HireMe(User::findOrFail(200)));

//        foreach(Auth::user()->unreadnotifications as $notification){
//            dd($notification);
//        }

    }


}
