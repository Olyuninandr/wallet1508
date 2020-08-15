<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Transaction;
use App\Http\Requests\CategoriesRequest;


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

    public function submitCategory(CategoriesRequest $request)
    {
        $category = new Category();
        $category->name = $request->input('name');
        $category->option = $request->input('option');
        $category->save();
        return redirect()->route('categories');
    }
}
