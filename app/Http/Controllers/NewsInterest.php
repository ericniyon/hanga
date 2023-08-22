<?php

namespace App\Http\Controllers;

use App\Models\ArticleCategory;
use App\Models\ArticleInterest;
use Illuminate\Http\Request;

class NewsInterest extends Controller
{
    public function index()
    {
        $articleInterest = ArticleCategory::query()->orderBy('id', 'DESC')->get();
        return view('admin.news.interest', compact('articleInterest'));
    }
    public function store(Request $request, ArticleCategory $category)
    {


        $validated = $request->validate([
            'name' => 'required|unique:article_categories|max:255',
            'detail' => 'required',
        ]);


        $category = new ArticleCategory();
        $category->name = $request->name;

        $category->detail = $request->detail;
        $category->status = 1;
        $category->save();
        return redirect()->back()->with('success', 'Category created successfully');
    }
}
