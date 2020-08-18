<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Transaction;
use Auth;

class MonthlyController extends Controller
{
    public function monthlyReport($month=null)
    {
        $user_id = Auth::user()->id;

        if(empty($month)) $month = date('m');
        $monthWord = date('F', mktime(0,0,0, $month));
        $balance = new Transaction();
        $monthIncome = $balance->whereMonth('date', $month)
            ->where('user_id', $user_id)
            ->where('amount', '>', '0')
            ->get('amount')
            ->sum('amount');

        $monthConsumption = (-1) * ($balance->whereMonth('date', $month)
                ->where('user_id', $user_id)
                ->where('amount', '<', '0')
                ->get('amount')
                ->sum('amount'));

        return view('monthly_spent', compact('month', 'monthWord', 'monthIncome', 'monthConsumption'));
    }
}
