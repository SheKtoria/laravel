<?php

namespace App\Http\Controllers;

use App\Http\Requests\ObjectRequest;
use App\Http\Requests\UserRequest;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
//    public function __construct()
//    {
//        $this->middleware('auth');
//    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $id = auth()->id();
        $users = User::find($id)->get();
        return view('home', ['users' => $users]);
    }

    public function showUpdateInfo()
    {
        $id = auth()->id();
        $data = User::find($id)->get();
        return view('update', ['data' => $data]);
    }

    public function updateInfo(Request $request)
    {
        $id = auth()->id();
        $user = User::find($id);
        $user->first_name = $request->input('firstName');
        $user->last_name = $request->input('lastName');
        $user->birthday = $request->input('birthday');
        $user->address = $request->input('address');
        $user->phone_number = $request->input('number');
        $user->ex_information = $request->input('other');
        $user->save();
        return redirect('home');

    }

    public function showUsers()
    {
        $users = User::all();
        return view('users', ['users' => $users]);
    }
}
