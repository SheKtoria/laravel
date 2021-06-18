<?php


namespace App\Http\Controllers;

use App\Models\Categories;
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
        $categories = Categories::get();
        return view('addObject', ['categories' => $categories]);
    }

    public function addObject(Request $request)
    {
        $user = auth()->user();
        $id = $user->id;
        $objectName = $request->input('objectName');
        $destination = $request->input('destination');
        $contact = $request->input('contact');
        $otherInfo = $request->input('otherInfo');
        $category = $request->input('selectCategory');
        $validated = $request->validate([
            'contact'     => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|max:11',
            'objectName'  => 'required|string|min:1|max:40',
            'destination' => 'required|regex:/(^[-0-9A-Za-z.,\/ ]+$)/',
        ]);
        DB::table('objects')->where('user_id', $id)->insert(array(
                'object_name'  => $objectName,
                'destination'  => $destination,
                'contact_info' => $contact,
                'other_info'   => $otherInfo,
                'user_id'      => $id,
                'category'     => $category
            )
        );
        return redirect('home');
    }

    public function changeStatus(Request $request)
    {
        $id = $request->input('id');
        $status = $request->input('status');
        Objects::where('id', $id)->update(['status' => $status]);
       // $data = Objects::with('users')->get();
        return json_encode(['message' => $status]);

    }

    public function welcome()
    {
        $data = \App\Models\Objects::with('users')->get();

        return view('welcome', ['objects' => $data]);
    }

    public function category($category)
    {
        $data = Objects::where('category', $category)->get();
        if ($category == 'All') {
            $data = Objects::get();
        }
        return view('welcome', ['objects' => $data]);
    }
    public function sorting($type){
        $data = Objects::orderby($type)->get();
        return view('welcome', ['objects' => $data]);
    }
}
