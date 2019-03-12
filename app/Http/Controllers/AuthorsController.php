<?php

namespace App\Http\Controllers;

use App\Models\Author;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\AuthorRequest;

class AuthorsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['index', 'show']]);
    }

	public function index()
	{
		$authors = Author::paginate();
		return view('authors.index', compact('authors'));
	}

    public function show(Author $author)
    {
        return view('authors.show', compact('author'));
    }

	public function create(Author $author)
	{
		return view('authors.create_and_edit', compact('author'));
	}

	public function store(AuthorRequest $request)
	{
		$author = Author::create($request->all());
		return redirect()->route('authors.show', $author->id)->with('message', 'Created successfully.');
	}

	public function edit(Author $author)
	{
        $this->authorize('update', $author);
		return view('authors.create_and_edit', compact('author'));
	}

	public function update(AuthorRequest $request, Author $author)
	{
		$this->authorize('update', $author);
		$author->update($request->all());

		return redirect()->route('authors.show', $author->id)->with('message', 'Updated successfully.');
	}

	public function destroy(Author $author)
	{
		$this->authorize('destroy', $author);
		$author->delete();

		return redirect()->route('authors.index')->with('message', 'Deleted successfully.');
	}
}