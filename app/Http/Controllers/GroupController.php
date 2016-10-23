<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Level;
use App\Group;

class GroupController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request, Level $level)
    {
        if ($level->user_id !== $request->user()->id) {
            return abort(403);
        }

        $groups = Group::orderBy('label', 'asc')
            ->where('level_id', $level->id)
            ->get();

        return view('groups/list', [
            'level'  => $level,
            'groups' => $groups
        ]);
    }

    public function create(Request $request, Level $level)
    {
        if ($level->user_id !== $request->user()->id) {
            return abort(403);
        }

        return view('groups/create', [
            'level'  => $level
        ]);
    }

    public function store(Request $request, Level $level)
    {
        $this->validate($request, [
            'label' => 'required|max:255',
        ]);

        if ($level->user_id !== $request->user()->id) {
            return abort(403);
        }

        $group = new Group;
        $group->label    = $request->input('label');
        $group->level_id = $level->id;
        $group->save();

        return redirect()->route('levels.groups.index', [
            'level' => $level
        ]);
    }

    public function show(Request $request, Level $level, $group_id)
    {
        if ($level->user_id !== $request->user()->id) {
            return abort(403);
        }

        $group = $level->groups()->findOrFail($group_id);

        return view('groups.show', [
            'level' => $level,
            'group' => $group
        ]);
    }

    public function edit(Request $request, Level $level, $group_id)
    {
        if ($level->user_id !== $request->user()->id) {
            return abort(403);
        }

        $group = $level->groups()->findOrFail($group_id);

        return view('groups.edit', [
            'level' => $level,
            'group' => $group
        ]);
    }

    public function update(Request $request, Level $level, $group_id)
    {
        $this->validate($request, [
            'label' => 'required|max:255',
        ]);

        if ($level->user_id !== $request->user()->id) {
            return abort(403);
        }

        $group = $level->groups()->findOrFail($group_id);

        $group->label = $request->input('label');
        $group->save();

        return redirect()->route('levels.groups.index', [
            'level' => $level
        ]);
    }

    public function destroy(Request $request, Level $level, $group_id)
    {
        if ($level->user_id !== $request->user()->id) {
            return abort(403);
        }

        $group = $level->groups()->findOrFail($group_id);

        $group->delete();

        return redirect()->route('levels.groups.index', [
            'level' => $level
        ]);
    }
}
