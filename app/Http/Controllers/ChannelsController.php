<?php

namespace App\Http\Controllers;

use App\Models\Channel;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\ChannelRequest;

class ChannelsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['index', 'show']]);
    }

	public function index()
	{
		$channels = Channel::paginate();
		return view('channels.index', compact('channels'));
	}

    public function show(Channel $channel)
    {
        return view('channels.show', compact('channel'));
    }

	public function create(Channel $channel)
	{
		return view('channels.create_and_edit', compact('channel'));
	}

	public function store(ChannelRequest $request)
	{
		$channel = Channel::create($request->all());
		return redirect()->route('channels.show', $channel->id)->with('message', 'Created successfully.');
	}

	public function edit(Channel $channel)
	{
        $this->authorize('update', $channel);
		return view('channels.create_and_edit', compact('channel'));
	}

	public function update(ChannelRequest $request, Channel $channel)
	{
		$this->authorize('update', $channel);
		$channel->update($request->all());

		return redirect()->route('channels.show', $channel->id)->with('message', 'Updated successfully.');
	}

	public function destroy(Channel $channel)
	{
		$this->authorize('destroy', $channel);
		$channel->delete();

		return redirect()->route('channels.index')->with('message', 'Deleted successfully.');
	}
}