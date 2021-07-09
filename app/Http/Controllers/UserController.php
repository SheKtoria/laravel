<?php

namespace App\Http\Controllers;

use App\Events\SendMail;
use App\Http\Requests\ObjectRequest;
use App\Http\Requests\UserRequest;
use App\Mail\Mail;
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
    public function index()
    {
        return view('home', ['user' => auth()->user()]);
    }

    public function getLocation(Request $request)
    {
        $response = file_get_contents('http://api.ipapi.com/'.$request->input('ip').'?access_key=608be249c170a6cdbcb7a69cbf44bd1b&format=1');
        $userGeodata = json_decode($response);
        $user = auth()->user();
        $user->latitude = $userGeodata->latitude;
        $user->longitude = $userGeodata->longitude;
        $user->address = $userGeodata->city;
        $user->save();
        return response()->json($user);
    }

    public function showUpdateInfo()
    {
        return view('update', ['user' => auth()->user()]);
    }

    public function updateInfo(UserRequest $request)
    {
        $article = auth()->user();
        $article->fill($request->all());
        if ($article->getDirty() == null) {
            return redirect('home');
        }
        auth()->user()->update();
        event(new SendMail(auth()->user()));
        return redirect('home');
    }

    public function showUsers()
    {
        return view('users', ['users' => User::all()]);
    }
    public function goToUserProfile($user_id){
        return view('userProfile', ['user' => User::find($user_id)]);
    }
}
