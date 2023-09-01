<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\Room;
use App\Models\User;
use App\Models\Sponsor;
use App\Models\Building;
use App\Models\Employee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {       
        $countAll = Item::count(); 
        $countGood = DB::table('items')->where('items.condition','=','Good')->count();
        $countMedium = DB::table('items')->where('items.condition','=','Medium')->count();
        $countBad = DB::table('items')->where('items.condition','=','Bad')->count();
        $countBroken = DB::table('items')->where('items.condition','=','Broken')->count();
        $countEmp = Employee::count();
        $countSponsor = Sponsor::count();
        $countTrx = Building::count();
        $countRoom = Room::count();
        $transactions = DB::table('transactions')
                    ->select('transactions.*','items.item_code as item_code','items.item_name as itemName', 'items.image as Image', 'rooms.room_name as room_name', 'buildings.building_name as building_name', 'employees.first_name as employee_name')
                    ->leftJoin('items', 'items.id', '=', 'transactions.item_code')
                    ->leftJoin('buildings', 'buildings.id', '=', 'transactions.building_id')
                    ->leftJoin('employees', 'employees.id', '=', 'transactions.employee_id')
                    ->leftJoin('rooms', 'rooms.id', '=', 'transactions.room_id')
                    ->orderBy('id', 'desc')
                    ->get();
        // dd($transactions);
        return view('home', compact('countEmp', 'countSponsor', 'countTrx', 'countRoom', 'transactions', 'countGood', 'countMedium', 'countBad', 'countBroken', 'countAll'));
    }
}
