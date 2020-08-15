<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use Illuminate\Http\Request;


class TransactionController extends Controller
{
    public function showAllTransactions()
    {
        $transactionsList = (new Transaction)->orderBy('date', 'asc')->get();
        foreach($transactionsList as $transaction){
            $transaction->date = \Carbon\Carbon::parse($transaction->date)->format('d M');
            if($transaction->amount < 0) {
                $transaction->amount=$transaction->amount*(-1);
                $transaction->option='Расход';
            }
            else {
                $transaction->option = 'Доход';
            }
        }

        return view('transactions', compact('transactionsList' ));
    }
}
