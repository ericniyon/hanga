<?php

namespace App\View\Components\V2\News;

use Illuminate\View\Component;
use Illuminate\Http\Request; 
class SingleNewsItem extends Component
{

	public $categoryName, $name, $articles;			
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($name, $articles)
    {
        //
        $this->categoryName=$name;
        $this->articles=$articles;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.v2.news.single-news-item');
    }
}
