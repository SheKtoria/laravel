<?php

namespace App\Http\Controllers;

use App\Models\PersonalInfo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $user = auth()->user();
        $id = $user->id;
        $users = DB::table('personal_info')->where('user_id', $id)->get();
        return view('home', ['users' => $users]);
    }

    public function showUpdateInfo()
    {
        $user = auth()->user();
        $id = $user->id;
        $data = DB::table('personal_info')->where('user_id', $id)->get();
        return view('update', ['data' => $data]);
    }

    public function updateInfo(Request $request)
    {
        $user = auth()->user();
        $id = $user->id;
        $dataCandidats = new PersonalInfo();
        $validated = $request->validate([
            'number'    => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|max:11',
            'firstName' => 'required|string|min:1|max:15',
            'lastName'  => 'required|string|min:1|max:15',
            'address'   => 'required|regex:/(^[-0-9A-Za-z.,\/ ]+$)/',
        ]);
        $dataCandidats->updateById($id, array(
                'first_name'     => $request->input('firstName'),
                'last_name'      => $request->input('lastName'),
                'birthday'       => $request->input('birthday'),
                'address'        => $request->input('address'),
                'phone_number'   => $request->input('number'),
                'ex_information' => $request->input('other'),
                'user_id'        => $id
            )
        );
        return redirect('home');

    }
}
