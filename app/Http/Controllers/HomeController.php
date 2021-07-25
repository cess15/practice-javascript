<?php

namespace App\Http\Controllers;

use App\Http\Requests\TeamRequest;
use App\Models\Team;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        return view('welcome');
    }

    public function edit($id)
    {
        $team = Team::findOrFail($id);

        return view('teams.edit', [
            'team' => $team
        ]);

    }

    public function update(TeamRequest $request, $id)
    {
        $team = Team::findOrFail($id);

        $team->update([
            'name' => $request->name,
            'price' => $request->price,
            'description' => $request->description
        ]);

        return redirect('/');
    }
}
