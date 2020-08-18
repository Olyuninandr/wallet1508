<?php

namespace App\Http\Controllers;

use Auth;
use App\Models\Category;
use App\Models\Transaction;
use App\Http\Requests\CategoriesRequest;


class CategoryController extends Controller
{
    public function getCategoriesList($id=null)
    {
        if($id != 'null')
            $transaction = Transaction::find($id);
        $user_id = Auth::user()->id;

        $categoriesIncome = Category::where('user_id', $user_id)
            ->where('option', '=', '+')->get();
        $categoriesOutcome = Category::where('user_id', $user_id)
            ->where('option', '=', '-')->get();

        return view('transaction_form', compact('transaction','categoriesIncome', 'categoriesOutcome') );
    }

    public function deleteCategory($id)
    {
        Category::find($id)->delete();
        return redirect()->route('categories');
    }

    public function showAllCategories()
    {
        $user_id =Auth::user()->id;
        $categoriesIncome = Category::where('user_id', $user_id)
            ->where('option', '=', '+')->get();
        $categoriesOutcome = Category::where('user_id', $user_id)
            ->where('option', '=', '-')->get();
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
        $category->user_id =Auth::user()->id;
        $category->save();
        return redirect()->route('categories');
    }



}
