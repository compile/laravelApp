<?php

namespace App\Http\Controllers;

use App\Models\Work;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\WorkRequest;
use Illuminate\Support\Facades\DB;

class WorksController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', ['except' => []]);
    }

	public function index()
	{
		$works = Work::paginate();
		return view('works.index', compact('works'));
	}

    public function show(Work $work)
    {
        return view('works.show', compact('work'));
    }

	public function create(Work $work)
	{


	    $authors = DB::table('authors')->get(['id','name']);//作者
	    $channels = DB::table('channels')->get(['id','title']);//专辑分类
        $thumbs   = DB::table('thumbs')->get(['path']);//缩略图选择
		return view('works.create_and_edit', compact('work','authors','channels','thumbs'));
	}

	public function store(WorkRequest $request)
	{
		$work = Work::create($request->all());
		return redirect()->route('works.show', $work->id)->with('message', 'Created successfully.');
	}

	public function edit(Work $work)
	{
        $authors = DB::table('authors')->get(['id','name']);//作者
        $channels = DB::table('channels')->get(['id','title']);//专辑分类
        $thumbs   = DB::table('thumbs')->get(['path']);//缩略图选择
        $this->authorize('update', $work);
		return view('works.create_and_edit', compact('work','authors','channels','thumbs'));
	}

	public function update(WorkRequest $request, Work $work)
	{
		$this->authorize('update', $work);
		$work->update($request->all());

		return redirect()->route('works.show', $work->id)->with('message', 'Updated successfully.');
	}

	public function destroy(Work $work)
	{
		$this->authorize('destroy', $work);
		$work->delete();

		return redirect()->route('works.index')->with('message', 'Deleted successfully.');
	}
}
