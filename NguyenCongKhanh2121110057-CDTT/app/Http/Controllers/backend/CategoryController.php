<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $list =Category::where('status', '!=', 0)->orderBy('created_at', 'desc')->get();
        return view("backend.Category.index", compact("list"));
    }
}
