<?php

namespace App\Http\Controllers;

use App\Models\Band;
use Illuminate\Http\Request;

class BandController extends Controller
{
    public function index(){
        $bands = Band::orderBy('created_at', 'DESC')->get();
        return view('Bands.index', compact('bands'));
    }

    public function store(Request $request, Band $band)
    {
        try {
            $validatedData = $request->validate([
                'band_name' => 'required|string',
                'genre' => 'required|string',
                'year_started' => 'required|string',
                'membersCount' => 'required|string',

            ]);

            $band->band_name = $validatedData['band_name'];
            $band->genre = $validatedData['genre'];
            $band->year_started = $validatedData['year_started'];
            $band->membersCount = $validatedData['membersCount'];
            $band->save();

            return redirect()->route('bands.store')->with('success', 'Band created successfully.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'An error occurred while creating the user.');
        }
    }


    public function edit($id)
    {
        $band = Band::findOrFail($id);
        return view('bands.band-update', compact('band'));
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'band_name' => 'required|string',
            'genre' => 'required|string',
            'year_started' => 'required|string',
            'membersCount' => 'required|string',
        ]);

        $band = Band::findOrFail($id);

        $band->band_name = $validatedData['band_name'];
        $band->genre = $validatedData['genre'];
        $band->year_started = $validatedData['year_started'];
        $band->membersCount = $validatedData['membersCount'];
        $band->save();

        return redirect()->route('bands.index')->with('success', 'User updated successfully.');
    }

    public function destroy($id)
    {
        $band = Band::findOrFail($id);
        $band->delete();
        return redirect()->route('bands.index')->with('success', 'Task deleted successfully.');
    }
}
