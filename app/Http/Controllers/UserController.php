<?php

namespace App\Http\Controllers;

use App\Http\Requests\ObjectRequest;
use App\Http\Requests\UserRequest;
use App\Models\User;
use Illuminate\Http\Request;
use function React\Promise\all;

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
        $id = auth()->id();
        $user = User::find($id);
        return view('home', ['user' => $user]);
    }

    public function showUpdateInfo()
    {
        $id = auth()->id();
        $user = User::find($id);
        return view('update', ['user' => $user]);
    }

    public function updateInfo(Request $request)
    {
        $id = auth()->id();
        $user = User::find($id);
        $user->fill($request->all())->save();
        return redirect('home');

    }

    public function showUsers()
    {
        $users = User::all();
        return view('users', ['users' => $users]);
    }
}
