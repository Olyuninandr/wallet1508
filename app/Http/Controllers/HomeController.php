<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transaction;
use App\Models\Category;


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
        $category = new Category();
        $ballance = new Transaction();

        $categoryList = $category->where('option', '=', '-')->get(['name', 'id'])->toArray();

        $spentTotal = [];
        foreach($categoryList as $category){
            $spentTotal[] = $ballance->where('category_id', '=', $category['id'])
                ->get(['amount', 'category_id'])
                ->sum('amount');
        }
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
        return view('home', compact('spentTotal','categoryList', 'ballanceCard', 'ballanceCash'));
    }
}
