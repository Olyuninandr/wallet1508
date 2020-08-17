<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Transaction;
use App\Http\Requests\TransactionRequest;


class TransactionController extends Controller
{
    public function showAllTransactions()
    {
        $transactionsList = (new Transaction)->orderBy('date', 'asc')->paginate(4);
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

    public function submitTransaction(TransactionRequest $request, $id=null)
    {
        if($id != null) $transaction=Transaction::find($id);
        else $transaction = new Transaction();

        $category_id=$request->input('category');
        $category = Category::find($category_id);

        $amount = $request->input('amount');
        if($category->option == '-') $amount = (-1)*$amount;

        $transaction->amount = $amount;
        $transaction->category_id = $request->input('category');
        $transaction->source = $request->input('source');
        $transaction->date = $request->input('date');
        $transaction->save();
        return redirect()->route('transactions');
    }

    public function deleteTransaction($id)
    {
        Transaction::find($id)->delete();
        return redirect()->route('transactions');
    }


}
