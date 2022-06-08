<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Game;

class GameController extends Controller
{
    //
    public function index() {
        $games = Game::all();
        return view('index', compact('games'));
    }

    public function create() {
        return view('create');
    }

    public function store(Request $request) {
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'price' => 'required'
        ]);
        $show = Game::create($validatedData);

        return redirect('/games')->with('success', 'Game is successfully saved');
    }

    public function show($id) {
        //
    }

    public function edit($id) {
        $game = Game::findOrFail($id);
        return view('edit', compact('game'));
    }

    public function update(Request $request, $id) {
        $validatedData = $request->validate([
            'name'=> 'required|max:255',
            'price'=> 'required'
        ]);
        Game::whereId($id)->update($validatedData);
        return redirect('/games')->with('success', 'Game Data is successfully updated');
    }

    public function destroy($id) {
        $game = Game::findOrFail($id);
        $game->delete();

        return redirect('/games')->with('success','Game Data is successfully deleted');

    }
}
