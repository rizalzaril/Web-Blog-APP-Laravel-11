<?php

namespace App\Http\Controllers;

use App\Models\Category; // Ensure you have a Category model
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        // Fetch all categories from the database
        $categories = Category::all();

        // Return the view and pass the categories to it
        return view('components.categories', compact('categories'));
    }
}
