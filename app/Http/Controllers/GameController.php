<?php

namespace App\Http\Controllers;

use App\Models\Game;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class GameController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $games = Game::all();
        return view('games.index', compact('games'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('games.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'genre' => 'required|string|max:255',
            'release_year' => 'nullable|integer|min:1900|max:' . date('Y'),
            'description' => 'nullable|string',
            'image_path' => 'nullable|url|max:2048',
        ]);

        Game::create($request->all());
        return redirect()->route('games.index')->with('success', 'Играта беше добавена успешно!');
    }

    /**
     * Display the specified resource. 
     *
     * @param  \App\Models\Game  $game
     * @return \Illuminate\Http\Response
     */
    public function show(Game $game)
    {
        return view('games.show', compact('game'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Game  $game
     * @return \Illuminate\Http\Response
     */
    public function edit(Game $game)
    {
        return view('games.edit', compact('game'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Game  $game
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Game $game)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'genre' => 'required|string|max:255',
            'release_year' => 'nullable|integer|min:1900|max:' . date('Y'),
            'description' => 'nullable|string',
            'image_path' => 'nullable|url|max:2048',
        ]);

        $game->update($request->all());
        return redirect()->route('games.index')->with('success', 'Играта беше обновена успешно!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Game  $game
     * @return \Illuminate\Http\Response
     */
    public function destroy(Game $game)
    {
        if ($game->image_path) {
            Storage::delete(str_replace('storage/', 'public/', $game->image_path));
        }
        $game->delete();
        return redirect()->route('games.index')->with('success', 'Играта беше изтрита успешно!');
    }
}
