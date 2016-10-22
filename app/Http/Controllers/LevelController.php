<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Level;

class LevelController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $levels = Level::orderBy('label', 'asc')
            ->where('user_id', $request->user()->id)
            ->get();

        return view('levels/list', [
            'levels' => $levels
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('levels/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'label' => 'required|max:255',
        ]);

        $level = new Level;
        $level->label   = $request->label;
        $level->user_id = $request->user()->id;
        $level->save();

        return redirect()->route('levels.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $id)
    {
        $level = Level::where([
            'id'      => $id,
            'user_id' => $request->user()->id
        ])->first();

        if ($level === null) {
            return abort(404);
        }

        return view('levels/show', [
            'level' => $level
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $id)
    {
        $level = Level::where([
            'id'      => $id,
            'user_id' => $request->user()->id
        ])->first();

        if ($level === null) {
            return abort(404);
        }

        return view('levels/edit', [
            'level' => $level
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'label' => 'required|max:255',
        ]);

        $level = Level::where([
            'id'      => $id,
            'user_id' => $request->user()->id
        ])->first();

        if ($level === null) {
            return abort(404);
        }

        $level->label = $request->input('label');
        $level->save();

        return redirect()->route('levels.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
