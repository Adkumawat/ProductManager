<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $categorys = Category::withCount('products')->with('products')->get();

        return view('categorys.index', compact('categorys'));
    }
}
