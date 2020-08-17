<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Transaction;

class MonthlyController extends Controller
{
    public function monthlyReport($month=null)
    {
        if(empty($month)) $month = date('m');
        $monthWord = date('F', mktime(0,0,0, $month));
        $balance = new Transaction();
        $monthIncome = $balance->whereMonth('date', $month)
            ->where('amount', '>', '0')
            ->get('amount')
            ->sum('amount');

        $monthConsumption = (-1) * ($balance->whereMonth('date', $month)
                ->where('amount', '<', '0')
                ->get('amount')
                ->sum('amount'));

        return view('monthly_spent', compact('month', 'monthWord', 'monthIncome', 'monthConsumption'));
    }
}
