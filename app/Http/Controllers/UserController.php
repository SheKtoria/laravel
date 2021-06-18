<?php

namespace App\Http\Controllers;

use App\Http\Requests\ObjectRequest;
use App\Models\PersonalInfo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
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
        $users = PersonalInfo::where('user_id', $id)->get();
        return view('home', ['users' => $users]);
    }

    public function showUpdateInfo(ObjectRequest $request)
    {
        $user = auth()->user();
        $id = $user->id;
        $data = PersonalInfo::where('user_id', $id)->get();
        return view('update', ['data' => $data]);
    }

    public function updateInfo(Request $request)
    {
        $user = auth()->user();
        $id = $user->id;
        PersonalInfo::where('user_id', $id)->update(array(
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
