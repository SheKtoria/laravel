<?php


namespace App\Http\Controllers;

use App\Models\Objects;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ObjectController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('addObject');
    }

    public function addObject(Request $request)
    {
        $user = auth()->user();
        $id = $user->id;
        $objectName = $request->input('objectName');
        $destination = $request->input('destination');
        $contact = $request->input('contact');
        $type = $request->input('type');
        $otherInfo = $request->input('otherInfo');
        $validated = $request->validate([
            'contact'     => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|max:11',
            'type'        => 'required|string|min:1|max:15',
            'objectName'  => 'required|string|min:1|max:40',
            'destination' => 'required|regex:/(^[-0-9A-Za-z.,\/ ]+$)/',
        ]);
        DB::table('objects')->where('user_id', $id)->insert(array(
                'object_name'  => $objectName,
                'destination'  => $destination,
                'contact_info' => $contact,
                'type'         => $type,
                'other_info'   => $otherInfo,
                'user_id'      => $id
            )
        );
        return redirect('home');
    }

    public function changeStatus(Request $request)
    {
        $id = $request->input('id');
        $status = $request->input('status');
        if ($status == 'not save') {
           Objects::where('id', $id)->update(['status' => 'save']);
        }elseif ($status == 'save') {
            Objects::where('id', $id)->update(['status' => 'not save']);

        }
        $data = Objects::with('users')->get();
        return view('/welcome', ['objects' => $data]);

    }
    public function welcome(){
        $data = \App\Models\Objects::with('users')->get();
        return view('welcome', ['objects' =>$data]);
    }
}
