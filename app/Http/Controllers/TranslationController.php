<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Level;
use App\Group;
use App\Translation;

class TranslationController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request, Level $level, $group_id)
    {
        if ($level->user_id !== $request->user()->id) {
            return abort(403);
        }

        $group = $level->groups()->findOrFail($group_id);

        $translations = Translation::orderBy('from', 'asc')
            ->where('group_id', $group->id)
            ->get();

        return view('translations/list', [
            'level'        => $level,
            'group'        => $group,
            'translations' => $translations
        ]);
    }

    public function create(Request $request, Level $level, $group_id)
    {
        if ($level->user_id !== $request->user()->id) {
            return abort(403);
        }

        $group = $level->groups()->findOrFail($group_id);

        return view('translations/create', [
            'level' => $level,
            'group' => $group
        ]);
    }

    public function store(Request $request, Level $level, $group_id)
    {
        $this->validate($request, [
            'from' => 'required|max:255',
            'to'   => 'required|max:255',
        ]);

        if ($level->user_id !== $request->user()->id) {
            return abort(403);
        }

        $group = $level->groups()->findOrFail($group_id);

        $translation = new Translation;
        $translation->from     = $request->input('from');
        $translation->to       = $request->input('to');
        $translation->group_id = $group->id;
        $translation->save();

        return redirect()->route('levels.groups.translations.index', [
            'level' => $level,
            'group' => $group
        ]);
    }

    public function show(Request $request, Level $level, $group_id, $translation_id)
    {
        if ($level->user_id !== $request->user()->id) {
            return abort(403);
        }

        $group = $level->groups()->findOrFail($group_id);

        $translation = $group->translations()->findOrFail($translation_id);

        return view('translations.show', [
            'level'       => $level,
            'group'       => $group,
            'translation' => $translation
        ]);
    }

    public function edit(Request $request, Level $level, $group_id, $translation_id)
    {
        if ($level->user_id !== $request->user()->id) {
            return abort(403);
        }

        $group = $level->groups()->findOrFail($group_id);

        $translation = $group->translations()->findOrFail($translation_id);

        return view('translations.edit', [
            'level'       => $level,
            'group'       => $group,
            'translation' => $translation
        ]);
    }

    public function update(Request $request, Level $level, $group_id, $translation_id)
    {
        $this->validate($request, [
            'from' => 'required|max:255',
            'to'   => 'required|max:255',
        ]);

        if ($level->user_id !== $request->user()->id) {
            return abort(403);
        }

        $group = $level->groups()->findOrFail($group_id);

        $translation = $group->translations()->findOrFail($translation_id);

        $translation->from = $request->input('from');
        $translation->to   = $request->input('to');
        $translation->save();

        return redirect()->route('levels.groups.translations.index', [
            'level' => $level,
            'group' => $group
        ]);
    }

    public function destroy(Request $request, Level $level, $group_id, $translation_id)
    {
        if ($level->user_id !== $request->user()->id) {
            return abort(403);
        }

        $group = $level->groups()->findOrFail($group_id);

        $translation = $group->translations()->findOrFail($translation_id);

        $translation->delete();

        return redirect()->route('levels.groups.translations.index', [
            'level' => $level,
            'group' => $group
        ]);
    }
}
