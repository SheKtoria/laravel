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
        $result = file_get_contents('http://api.ipapi.com/' . $request->input('ip') . '?access_key=608be249c170a6cdbcb7a69cbf44bd1b&format=1');
        $json_object = json_decode($result);
        $user = User::find(auth()->id());
        $user->latitude = $json_object->latitude;
        $user->longitude = $json_object->longitude;
        $user->address = $json_object->city;
        $user->save();

        return response()->json($user);
    }
    public function showUpdateInfo()
    {
        return view('update', ['user' => auth()->user()]);
    }

    public function updateInfo(UserRequest $request)
    {
        auth()->user()
            ->fill($request->all())
            ->update();

        return redirect('home');
    }

    public function showUsers()
    {
        return view('users', ['users' => User::all()]);
    }
}
