<?php

namespace App\View\Components\V2\News;

use Illuminate\View\Component;

class PopularArticles extends Component
{
	public $populartArticles = [];
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
        $this->populars = [];
     
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
       	$articles = \App\Models\Article::with(['Client', 'ArticleInterest', 'ArticleLikes', 'ArticleViews', 'articleComments'])->limit(4)->get(); 
    	// get popural articles
        return view('components.v2.news.popular-articles',  compact('articles'));
    }
}
