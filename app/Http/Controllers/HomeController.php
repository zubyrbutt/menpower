<?php

namespace App\Http\Controllers;

use App\Location;
use App\User;
use Illuminate\Http\Request;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['home', 'search']]);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function home()
    {
        $users = User::select(['id', 'name', 'skill', 'city', 'locally'])->where('city', '!=', null)->where('skill', '!=', null)->paginate(9);
        $locations = Location::select('state')->get();

        return view('welcome', compact('users', 'locations'));
    }


    public function search(Request $request)
    {

        {
            if ($request->ajax()) {
                $output = '';
                $query = $request->get('query');
                if ($query != '') {
                    $data = Location::where('city', 'like', '%' . $query . '%')
                        ->orWhere('locally', 'like', '%' . $query . '%')
                        ->paginate(7);

                } else {
                    $data = Location::orderBy('id', 'desc')
                        ->paginate(5);
                }
                $total_row = $data->count();
                if ($total_row > 0) {
                    foreach ($data as $row) {
                        $output .=
                            '<a href="' . $row->locally_slug . '" class="card-link link-text">'
                            . $row->locally .
                            '</a>
                            <a href="'.$row->city_slug.'"> '. $row->city .'</a>
                            <span class="badge badge-light">  10</span><hr>';
                    }
                } else {
                    $output = '
       <tr>
        <td align="center" colspan="5">No Data Found</td>
       </tr>
       ';
                }
                $data = array(
                    'table_data' => $output,
                    'total_data' => $total_row
                );

                echo json_encode($data);
            }
        }
    }

    public function skillfilter(Request $request, $post)
    {
        //dd($post);
        if($post != '')
        {
            $users = User::
            where('city', $post)->where('skill', '!=' , null)
                ->orWhere('skill', $post)->orWhere('area',$post)->where('skill', '!=', null)->get();
        }
        $locations = Location::select('state')->get();

        return view('welcome', compact('users', 'locations'));

    }

//    public function cityfilter(Request $request, $city)
//    {
//        //dd($location);
//        $users = User::where('city', $city)->paginate(9);
//        $locations = Location::select('state')->get();
//
//        return view('welcome', compact('users', 'locations'));
//    }
//
//    public function areafilter($area)
//    {
//        //dd($area);
//        $users = User::where('area', $area)->paginate(9);
//        $locations = Location::select('state')->get();
//
//        return view('welcome', compact('users', 'locations'));
//    }


}
