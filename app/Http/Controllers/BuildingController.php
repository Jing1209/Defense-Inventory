<?php

namespace App\Http\Controllers;

use App\Models\Building;
use Illuminate\Http\Request;

class BuildingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $buildings = Building::paginate(5);
        return view('buildings.building', compact('buildings'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('buildings.addbuild');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'building_name' => 'required|unique:buildings',
        ]);
        $buildings = new Building;
        $buildings->building_name = $request->building_name;
        $buildings->save();
        return redirect()->route('buildings.index')->with('success', 'building created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $building = Building::find($id);
        return view('building.building', compact('building'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $building = Building::find($id);
        return view('buildings.editbuild', compact('building'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        
        $request->validate([
            'building_name' => 'required',
        ]);
        $buildings = Building::find($id);
        $buildings->building_name = $request->building_name;
        $buildings->save();
        return redirect()->route('buildings.index')->with('success', 'Building created successfully');    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $building = Building::find($id);
        $building->delete();
        return back()->with('Success', 'Building delete successfully');
    }
}
