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
    public function index(Request $request)
    {
        $id = auth()->id();
        $user = User::find($id);

        return view('home', ['user' => $user]);
    }
    public function getLocation(Request $request)
    {
        $result = file_get_contents('http://api.ipapi.com/' .$request->input('ip') .'?access_key=608be249c170a6cdbcb7a69cbf44bd1b&format=1');
        $json_object = json_decode($result);
        $id = auth()->id();
        $user = User::find($id);
        $user->location = $json_object->latitude.','.$json_object->longitude;
        $user->address = $json_object->city;
        $user->save();
        return json_encode($request);
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
        $user->update($request->all());
        $user->save();
//        return new User();
        return redirect('home');

    }

    public function showUsers()
    {
        $users = User::all();
        return view('users', ['users' => $users]);
    }
}
