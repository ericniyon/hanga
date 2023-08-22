<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;

class NewsInfo extends Controller
{
        public function index($id)
    {
        $articleDetail = Article::find($id);
        // dd($articleDetail->title);

        return view('client.v2.news_info', compact('articleDetail'));
    }
}
