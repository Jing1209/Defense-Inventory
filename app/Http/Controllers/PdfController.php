<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class PdfController extends Controller
{
    public function allrecord(){
        $transactions = DB::table('transactions')
        ->select('transactions.*','items.item_code as item_code' ,'items.item_name as itemName', 'items.image as Image','items.condition as condition', 'rooms.room_name as room_name', 'buildings.building_name as building_name', 'employees.first_name as employee_name')
        ->leftJoin('items', 'items.id', '=', 'transactions.item_code')
        ->leftJoin('buildings', 'buildings.id', '=', 'transactions.building_id')
        ->leftJoin('employees', 'employees.id', '=', 'transactions.employee_id')
        ->leftJoin('rooms', 'rooms.id', '=', 'transactions.room_id')
        ->orderBy('id', 'desc')
        ->get();
        return view('pdf.allrecord', compact('transactions'));
    }
    public function thisweek(){
        $transactions = DB::table('transactions')
        ->select('transactions.*','items.item_code as item_code' ,'items.item_name as itemName', 'items.image as Image','items.condition as condition', 'rooms.room_name as room_name', 'buildings.building_name as building_name', 'employees.first_name as employee_name')
        ->leftJoin('items', 'items.id', '=', 'transactions.item_code')
        ->leftJoin('buildings', 'buildings.id', '=', 'transactions.building_id')
        ->leftJoin('employees', 'employees.id', '=', 'transactions.employee_id')
        ->leftJoin('rooms', 'rooms.id', '=', 'transactions.room_id')
        ->whereBetween('transactions.created_at', 
                        [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()]
                    )
        ->orderBy('id', 'desc')
        ->get();
        return view('pdf.thisweek', compact('transactions'));
    }
    public function borrowed(){
        $transactions = DB::table('transactions')
        ->select('transactions.*','items.item_code as item_code' ,'items.item_name as itemName', 'items.image as Image','items.condition as condition', 'rooms.room_name as room_name', 'buildings.building_name as building_name', 'employees.first_name as employee_name')
        ->leftJoin('items', 'items.id', '=', 'transactions.item_code')
        ->leftJoin('buildings', 'buildings.id', '=', 'transactions.building_id')
        ->leftJoin('employees', 'employees.id', '=', 'transactions.employee_id')
        ->leftJoin('rooms', 'rooms.id', '=', 'transactions.room_id')
        ->where('transactions.state', 'Borrowed')
        ->orderBy('id', 'desc')
        ->get();
        return view('pdf.borrowed', compact('transactions'));
    }
    public function returned(){
        $transactions = DB::table('transactions')
        ->select('transactions.*','items.item_code as item_code' ,'items.item_name as itemName', 'items.image as Image','items.condition as condition', 'rooms.room_name as room_name', 'buildings.building_name as building_name', 'employees.first_name as employee_name')
        ->leftJoin('items', 'items.id', '=', 'transactions.item_code')
        ->leftJoin('buildings', 'buildings.id', '=', 'transactions.building_id')
        ->leftJoin('employees', 'employees.id', '=', 'transactions.employee_id')
        ->leftJoin('rooms', 'rooms.id', '=', 'transactions.room_id')
        ->where('transactions.state', 'Returned')
        ->orderBy('id', 'desc')
        ->get();
        return view('pdf.returned', compact('transactions'));
    }
}
