<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use Illuminate\Http\Request;


class TransactionController extends Controller
{
    public function showAllTransactions()
    {
        $transactions = new Transaction();
        $transactionsList = $transactions->all();

        return view('transactions', compact('transactionsList' ));
    }
}
