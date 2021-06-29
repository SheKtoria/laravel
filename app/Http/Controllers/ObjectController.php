<?php


namespace App\Http\Controllers;

use App\Models\Categories;
use App\Models\Objects;
use Illuminate\Http\Request;

class ObjectController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $categories = Categories::all();
        return view('addObject', ['categories' => $categories]);
    }

    public function addObject(Request $request)
    {
        $id = auth()->id();
        $object = new Objects();
        $object->object_name = $request->input('objectName');
        $object->destination = $request->input('destination');
        $object->contact_info = $request->input('contact');
        $object->other_info = $request->input('otherInfo');
        $object->category = $request->input('selectCategory');
        $object->user_id = $id;
        $object->save();

        return redirect('home');
    }

    public function changeStatus(Request $request)
    {
        $id = $request->input('id');
        $status = $request->input('status');
        $object = Objects::find($id);
        $object->status = $status;
        $object->save();
        return json_encode(['message' => $status]);

    }

    public function welcome()
    {
        $data = Objects::with('users')->get();

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

    public function sorting($type)
    {
        $data = Objects::orderby($type)->get();
        return view('welcome', ['objects' => $data]);
    }
}
