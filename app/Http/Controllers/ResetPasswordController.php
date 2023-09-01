<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ResetPasswordController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $trx = DB::table('transactions')
            ->select('transactions.*','items.item_code as item_code' ,'items.item_name as itemName', 'items.image as Image','items.condition as condition', 'rooms.room_name as room_name', 'buildings.building_name as building_name', 'employees.first_name as employee_name')
            ->leftJoin('items', 'items.id', '=', 'transactions.item_code')
            ->leftJoin('buildings', 'buildings.id', '=', 'transactions.building_id')
            ->leftJoin('employees', 'employees.id', '=', 'transactions.employee_id')
            ->leftJoin('rooms', 'rooms.id', '=', 'transactions.room_id')
            ->orderBy('id', 'desc')
            ->get();
        return view('transactions.pdf',compact('trx'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'password' => 'required',
            'confirm_password' =>'required_with:password|same:password'
        ]);
        $pro = User::find($id);
        $pro->password = $request->password;
        $pro->save();
        return redirect()->route('settings.index')->with('success', 'Profile updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
