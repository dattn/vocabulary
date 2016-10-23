<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Level;

class LevelController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
        $levels = Level::orderBy('label', 'asc')
            ->where('user_id', $request->user()->id)
            ->get();

        return view('levels.list', [
            'levels' => $levels
        ]);
    }

    public function create()
    {
        return view('levels.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'label' => 'required|max:255',
        ]);

        $level = new Level;
        $level->label   = $request->input('label');
        $level->user_id = $request->user()->id;
        $level->save();

        return redirect()->route('levels.index');
    }

    public function show(Request $request, Level $level)
    {
        if ($level->user_id !== $request->user()->id) {
            return abort(403);
        }

        return view('levels.show', [
            'level' => $level
        ]);
    }

    public function edit(Request $request, Level $level)
    {
        if ($level->user_id !== $request->user()->id) {
            return abort(403);
        }

        return view('levels.edit', [
            'level' => $level
        ]);
    }

    public function update(Request $request, Level $level)
    {
        $this->validate($request, [
            'label' => 'required|max:255',
        ]);

        if ($level->user_id !== $request->user()->id) {
            return abort(403);
        }

        $level->label = $request->input('label');
        $level->save();

        return redirect()->route('levels.index');
    }

    public function destroy(Request $request, Level $level)
    {
        if ($level->user_id !== $request->user()->id) {
            return abort(403);
        }

        $level->delete();

        return redirect()->route('levels.index');
    }
}
