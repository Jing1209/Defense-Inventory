<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\Sponsor;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ItemController extends Controller
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
        $items = DB::table('items')
        ->select('items.*', 'categories.category_name as category_name', 'sponsors.sponsor_name as sponsor_name')
        ->leftJoin('categories', 'categories.id', 'items.category_id')
        ->leftJoin('sponsors', 'sponsors.id', 'items.sponsor_id')
        ->get();
        return view('items.item', compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        $sponsors = Sponsor::all();
        return view('items.additem', compact('categories', 'sponsors'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'item_code' => 'required',
            'item_name' => 'required',
            'category_id' => 'required',
            'sponsor_id' => 'required',
            'image' => 'required',
            'description' => 'required',
            'price' => 'required'
        ]);
        $items = new Item;
        $items->item_code = $request->item_code;
        $items->item_name = $request->item_name;
        $items->category_id = $request->category_id;
        $items->description = $request->description;
        $items->sponsor_id = $request->sponsor_id;
        $items->condition = $request->condition;
        $items->price = $request->price;
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $extension = $file->getClientOriginalName();
            $filename = time() . '.' . $extension;
            $file->move('images/item/', $filename);
            $items->image = $filename;
        }
        $items->save();
        return redirect()->route('items.index')->with('success', 'Item created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $item = Item::find($id);
        $categories = Category::all();
        $sponsors = Sponsor::all();
        return view('items.edititem', compact('categories', 'sponsors', 'item'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'item_code' => 'required',
            'item_name' => 'required',
            'category_id' => 'required',
            'sponsor_id' => 'required',
            'description' => 'required',
            'price' => 'required'
        ]);
        $items = Item::find($id);
        $items->item_code = $request->item_code;
        $items->item_name = $request->item_name;
        $items->category_id = $request->category_id;
        $items->description = $request->description;
        $items->sponsor_id = $request->sponsor_id;
        $items->condition = $request->condition;
        $items->price = $request->price;
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $extension = $file->getClientOriginalName();
            $filename = time() . '.' . $extension;
            $file->move('images/item/', $filename);
            $items->image = $filename;
        }
        $items->save();
        return redirect()->route('items.index')->with('success', 'Item updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $item = Item::find($id);
        $item->delete();
        return redirect()->route('items.index')->with('success', 'Item deleted successfully');
    }
}
