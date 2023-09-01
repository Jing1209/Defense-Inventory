<?php

namespace App\Http\Controllers;

use App\Models\Sponsor;
use Illuminate\Http\Request;

class SponsorController extends Controller
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
        $sponsors = Sponsor::paginate(5);
        return view('sponsor.sponsor', compact('sponsors'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('sponsor.addspon');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'sponsor_name' => 'required|unique:sponsors',
        ]);
        $sponsors = new Sponsor;
        $sponsors->sponsor_name = $request->sponsor_name;
        $sponsors->save();
        return redirect()->route('sponsors.index')->with('success', 'Sponsor created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $sponsor = Sponsor::find($id);
        return view('sponsor.sponsor', compact('sponsor'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $sponsor = Sponsor::find($id);
        return view('sponsor.editspon', compact('sponsor'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'sponsor_name' => 'required',
        ]);
        $sponsors = Sponsor::find($id);
        $sponsors->sponsor_name = $request->sponsor_name;
        $sponsors->save();
        return redirect()->route('sponsors.index')->with('success', 'Sponsor created successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $sponsor = Sponsor::find($id);
        $sponsor->delete();
        return back()->with('Success', 'Sponsor delete successfully');
    }
}
