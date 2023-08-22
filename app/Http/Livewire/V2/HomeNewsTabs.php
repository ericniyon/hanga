<?php

namespace App\Http\Livewire\V2;

use Livewire\Component;

class HomeNewsTabs extends Component
{
       public string $tab = '';
       public $article_id;

    protected $queryString = ['tab'];

    public function mount()
    {

        $this->article_id = session()->get('article_id');
        $this->tab = request()->query('tab', 'news');
    }
    public function render()
    {
        return view('livewire.v2.home-news-tabs');
    }
        public function activateImpactTab($tab)
    {
        $this->tab = $tab;
    }
}
