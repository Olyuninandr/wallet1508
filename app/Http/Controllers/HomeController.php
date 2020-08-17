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
    public function index($month=null)
    {
        $category = new Category();
        $ballance = new Transaction();

        $month = date('m');
//        dd($month);
        $monthIncome = $ballance->whereMonth('date', $month)->where('amount','>','0')->get('amount')->sum('amount');
        $monthConsumption = (-1)*($ballance->whereMonth('date', $month)->where('amount','<','0')->get('amount')->sum('amount'));

        $categoryList = $category->where('option', '=', '-')->get(['name', 'id'])->toArray();

        $spentTotal = [];
        foreach($categoryList as $category){
            $spentTotal[] = $ballance->where('category_id', '=', $category['id'])
                ->get('amount')
                ->sum('amount');
        }

        $balanceCard = $ballance->where('source', '=', 'bank')->get('amount')->sum('amount');
        $balanceCash = $ballance->where('source', '=', 'cash')->get('amount')->sum('amount');


        return view('home', compact('spentTotal','categoryList', 'balanceCard',
            'balanceCash', 'monthIncome', 'monthConsumption'));
    }
}
