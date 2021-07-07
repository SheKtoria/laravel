<?php


namespace App\Http\Controllers;

use App\Http\Requests\ObjectRequest;
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
        return view('addObject', ['categories' => Categories::all()]);
    }

    public function addObject(Request $request)
    {
        $object = new Objects();
        $category = explode(' ', $request->input('selectCategory'));
        $object->object_name = $request->input('objectName');
        $object->destination = $request->input('destination');
        $object->contact_info = $request->input('contact');
        $object->other_info = $request->input('otherInfo');
        $object->category = $category[0];
        $object->user_id = auth()->id();
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
        return view('welcome', ['objects' => Objects::with('users')
            ->join('categories', 'categories.id', '=', 'objects.category')
            ->get()]);
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
        return view('welcome', ['objects' => Objects::orderby($type)->get()]);
    }
}
