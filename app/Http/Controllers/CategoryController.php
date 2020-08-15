<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function getCategoriesList()
    {
        $categoriesIncome = Category::where('option', '=', '+')->get();
        $categoriesOutcome = Category::where('option', '=', '-')->get();

        return view('transaction_form', compact('categoriesIncome', 'categoriesOutcome') );
    }
}
