<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
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

        $user_id = Auth::user()->id;
        $categoryList = $category->where('user_id', $user_id)
            ->where('option', '=', '-')
            ->get(['name', 'id'])
            ->toArray();

        $spentTotal = [];
        foreach($categoryList as $category){
            $spentTotal[] = $ballance->where('user_id', $user_id)
                ->where('category_id', '=', $category['id'])
                ->get('amount')
                ->sum('amount');
        }

        $balanceCard = $ballance->where('user_id', $user_id)
            ->where('source', '=', 'bank')->get('amount')->sum('amount');
        $balanceCash = $ballance->where('user_id', $user_id)
            ->where('source', '=', 'cash')->get('amount')->sum('amount');


        return view('home', compact('spentTotal','categoryList', 'balanceCard',
            'balanceCash'));
    }
}
