<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transaction;


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
        $ballance = new Transaction();
        $card = $ballance->where('source', '=', 'bank')->get();
        $cash = $ballance->where('source', '=', 'cash')->get();

        $ballanceCard=0;
        foreach($card as $cardOperation){
            $ballanceCard += $cardOperation->amount;
        }

        $ballanceCash=0;
        foreach($cash as $cashOperation){
            $ballanceCash += $cashOperation->amount;
        }
        return view('home', compact('ballanceCard', 'ballanceCash'));
    }
}
