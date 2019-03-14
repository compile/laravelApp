<?php

namespace App\Http\Controllers;

use App\Models\Thumb;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\ThumbRequest;

class ThumbsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['index', 'show']]);
    }

	public function index()
	{
		$thumbs = Thumb::paginate();
		return view('thumbs.index', compact('thumbs'));
	}

    public function show(Thumb $thumb)
    {
        return view('thumbs.show', compact('thumb'));
    }

	public function create(Thumb $thumb)
	{
		return view('thumbs.create_and_edit', compact('thumb'));
	}

	public function store(ThumbRequest $request)
	{

	    print_r($request->all());



		$thumb = Thumb::create($request->all());
		return redirect()->route('thumbs.show', $thumb->id)->with('message', 'Created successfully.');
	}

	public function edit(Thumb $thumb)
	{
        $this->authorize('update', $thumb);
		return view('thumbs.create_and_edit', compact('thumb'));
	}

	public function update(ThumbRequest $request, Thumb $thumb)
	{
		$this->authorize('update', $thumb);
		$thumb->update($request->all());

		return redirect()->route('thumbs.show', $thumb->id)->with('message', 'Updated successfully.');
	}

	public function destroy(Thumb $thumb)
	{
		$this->authorize('destroy', $thumb);
		$thumb->delete();

		return redirect()->route('thumbs.index')->with('message', 'Deleted successfully.');
	}

    public function upload(Request $request, Thumb $thumb)
    {
        if ($request->isMethod('POST')) {
            $files = $request->file("file");
            if ($files->isValid()) {
                $oragnalName = $files->getClientOriginalName();
                $ext = $files->getClientOriginalExtension();
                $type = $files->getClientMimeType();
                $realPath = $files->getRealPath();
                $file_new_name = date('Ymd') . '/' . uniqid() . '.' . $ext;

                echo $file_new_name;

                $bool = Storage::disk('public')->put($file_new_name, file_get_contents($realPath));
                var_dump($bool);


                $test = array('path'=>$file_new_name,'status'=>'2','order'=>'1');
                $thumb = Thumb::create($test);

                //return json_encode(['status'=>1,'filepath'=>$file_new_name]);
                return redirect()->route('thumbs.index')->with('message', 'Deleted successfully.');

            }
        }
        return view('upload');
    }
}
