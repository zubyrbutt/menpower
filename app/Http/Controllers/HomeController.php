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
        $users = User::latest()->paginate(5);
        $locations = Location::all();
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
//                        ->orWhere('City', 'like', '%'.$query.'%')
//                        ->orWhere('PostalCode', 'like', '%'.$query.'%')
//                        ->orWhere('Country', 'like', '%'.$query.'%')
//                        ->orderBy('CustomerID', 'desc')
                        ->paginate(7);

                } else {
                    $data = Location::orderBy('id', 'desc')
                        ->paginate(5);
                }
                $total_row = $data->count();
                if ($total_row > 0) {
                    foreach ($data as $row) {
                        $output .=
                            '<a href="#" class="card-link link-text">'
                            . $row->locally . ' - '
                            . $row->city .
                            '</a><span class="badge badge-light">  10</span><hr>';
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

}
