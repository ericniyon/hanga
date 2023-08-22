<?php

namespace App\Http\Livewire\V2\HomeTabs;

use Livewire\Component;
use App\Models\Article;

class News extends Component
{
    public $selectedArticalsCategory, $NewsDetailed=false,$GiveComment=false;
    public $newsTitle;
    public $newsDescription;
    public $createdAt;


    public function NewsDetails($NewsID)
    {
        //
        $this->NewsDetailed = true;

        $article = Article::find($NewsID);
        $this->newsTitle = $article->title;
        $this->newsDescription = $article->content;
        $this->createdAt = $article->created_at;
    }
    public function comment()
    {
        //
        $this->GiveComment = !$this->GiveComment;
    }

    public function render()
    {
        $news = \App\Models\Article::query()
            ->where('status', 1)
            ->orderBy('created_at', 'desc')
            ->when($this->selectedArticalsCategory, function ($query) {
                return $query->where('categoryId', $this->selectedArticalsCategory);
            })
            ->get();
        return view('livewire.v2.home-tabs.news',compact('news'));
    }
}
