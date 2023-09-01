<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\Room;
use App\Models\Building;
use App\Models\Employee;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class TransactionController extends Controller
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
       
        $transactions = DB::table('transactions')
            ->select('transactions.*','items.item_code as item_code' ,'items.item_name as itemName', 'items.image as Image','items.condition as condition', 'rooms.room_name as room_name', 'buildings.building_name as building_name', 'employees.first_name as employee_name')
            ->leftJoin('items', 'items.id', '=', 'transactions.item_code')
            ->leftJoin('buildings', 'buildings.id', '=', 'transactions.building_id')
            ->leftJoin('employees', 'employees.id', '=', 'transactions.employee_id')
            ->leftJoin('rooms', 'rooms.id', '=', 'transactions.room_id')
            ->orderBy('id', 'desc')
            ->get();
        $items = Item::all();
        $buildings = Building::all();
        $rooms = Room::all();
        $employees = Employee::all();
        // dd($items);
        return view('transactions.transaction', compact('transactions', 'items', 'buildings', 'rooms', 'employees'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $state = 'Returned';
        $items = Item::all();
        // $items = DB::table('items')
        // ->select('transactions.*', 'items.*')
        // ->leftJoin('items', 'items.item_code', '=', 'transactions.item_code')
        // ->where('transactions.state', '=' , $state)
        // ->get();
        $buildings = Building::all();
        $rooms = Room::all();
        $employees = Employee::all();
        // dd($items);
        return view('transactions.addtrx', compact('items', 'buildings', 'rooms', 'employees'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'item_code' => 'required|',
            'room_id' => 'required',
            'employee_id' => 'required'
        ]);
        $building = Room::find($request->room_id);
        $trx = new Transaction;
        $trx->item_code = $request->item_code;
        $trx->state = 'Borrowed';
        $trx->building_id = $building->building_id;
        $trx->room_id = $request->room_id;
        $trx->employee_id = $request->employee_id;
        $trx->borrowed_date = Carbon::now();
        // dd($trx);
        $trx->save();
        return redirect()->route('transactions.index')->with('success', 'Trx created successfully');
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
        $trx = Transaction::find($id);
        return view('transactions.edittrx', compact('trx'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'returned_date' => 'required'
        ]);
        $trx = Transaction::find($id);
        // dd($trx->item_code);
        $trx->returned_date = $request->returned_date;
        $trx->state = 'Returned';
        $trx->save();
        $item = Item::find($trx->item_code);
        $item->condition = $request->condition;
        // dd($request->condition);
        $item->save();
        return redirect()->route('transactions.index')->with('success', 'Transaction returned successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $trx = Transaction::find($id);
        $trx->delete();
        return redirect()->route('transactions.index')->with('success', 'Transaction deleted successfully');
    }
}
