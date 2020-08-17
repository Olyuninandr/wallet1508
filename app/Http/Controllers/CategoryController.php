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

    public function getCategory ($id)
    {
        $category = Category::find($id);
        return view('categories_form', compact('category'));
    }

    public function submitCategory(CategoriesRequest $request, $id=null)
    {
        if($id!=null) $category = Category::find($id);
        else $category = new Category();

        $category->name = $request->input('name');
        $category->option = $request->input('option');
        $category->save();
        return redirect()->route('categories');
    }

}
