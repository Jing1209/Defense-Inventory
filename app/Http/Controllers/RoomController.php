<?php

namespace App\Http\Controllers;

use App\Models\Room;
use App\Models\Building;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RoomController extends Controller
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
        $rooms = DB::table('rooms')
            ->select('rooms.*', 'buildings.building_name as building_name')
            ->leftJoin('buildings', 'buildings.id', 'rooms.building_id')
            ->paginate(5);
        return view('rooms.room', compact('rooms'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $buildings = Building::all();
        return view('rooms.addroom', compact('buildings'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'room_name' => 'required|unique:rooms',
            'building_id' => 'required'
        ]);
        $rooms = new Room;
        $rooms->building_id = $request->building_id;
        $rooms->room_name = $request->room_name;
        $rooms->save();
        return redirect()->route('rooms.index')->with('success', 'Room created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $rooms = DB::table('rooms')
            ->select('rooms.*', 'buildings.building_name as building_name')
            ->leftJoin('buildings', 'buildings.id', 'rooms.building_id')
            ->get();
        return view('rooms.room', compact('rooms'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $room =Room::find($id);
        $buildings = Building::all();
        return view('rooms.editroom', compact('room', 'buildings'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'room_name' => 'required',
            'building_id' => 'required'
        ]);
        $rooms = Room::find($id);
        $rooms->building_id = $request->building_id;
        $rooms->room_name = $request->room_name;
        $rooms->save();
        return redirect()->route('rooms.index')->with('success', 'Room created successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $rooms = Room::find($id);
        $rooms->delete();
        return back()->with('Success', 'Room delete successfully');
    }
}
