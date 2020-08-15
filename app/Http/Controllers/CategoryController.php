<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Transaction;

use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function getCategoriesList($id=null)
    {
        if($id != 'null')
            $transaction = Transaction::find($id);

        $categoriesIncome = Category::where('option', '=', '+')->get();
        $categoriesOutcome = Category::where('option', '=', '-')->get();

        return view('transaction_form', compact('transaction','categoriesIncome', 'categoriesOutcome') );
    }

    public function showAllCategories()
    {

        $categoriesIncome = Category::where('option', '=', '+')->get();
        $categoriesOutcome = Category::where('option', '=', '-')->get();

        return view('categories', compact('categoriesIncome', 'categoriesOutcome') );
    }
}
