<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Article;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    //
    public function index($id)
    {
        $article = Article::find(decryptId($id));
        $socialShareLink = \Share::page(
            config('app.url') . '/v2/news/'. encryptId($article->id),
            $article->title,
        )
        ->facebook()
        ->twitter()
        ->linkedin()
        ->whatsapp()
        ->telegram();
        return view('client.v2.__single_news', compact('article','socialShareLink'));
    }
    public function news()
    {
        return view('client.news');
    }
}
