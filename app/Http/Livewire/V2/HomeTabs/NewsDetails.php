<?php

namespace App\Http\Livewire\V2\HomeTabs;

use Livewire\Component;
use Livewire\WithFileUploads;
use Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Request as MyRequest;
use Carbon\Carbon;
use Jantinnerezo\LivewireAlert\LivewireAlert;

class NewsDetails extends Component
{
    use WithFileUploads;
    use LivewireAlert;
    public $populartTab = true, $favouriteTab = false, $toRead = false, $myArticlesTab = false, $newArticleTab = false, $test, $articleEditId;

    public $category, $coverImage, $articleTitle, $articleContent, $fieldOfInterest,$articleCategories, $a, $description, $content, $heading, $popularArticles = [], $reference = null, $detailTab = false, $articleDetail= [], $articleComments= [], $relatedArticles = [], $editArticleTab = false, $articleToUpdate, $content1, $content2, $search, $interestFilter;

    public $rememberMychoice;
    public $myInterest = [];
    public $interests = [];
    // comment
    public $comment;
    public $businessSector = [];

    public $newsTags = [];
    // edit
    public $newsTagsEdit = [];
    public $fieldOfInterestEdit = [];

   // public $socialShareLink;

    public function mount(Request $request){
        $detailId = $request->route()->parameter('detailId') ? $request->route()->parameter('detailId') : null;
     $this->reference = $detailId;

     // edit

         $articleEditId = $request->route()->parameter('newsId') ? $request->route()->parameter('newsId') : null;
         $this->articleEditId =  $articleEditId;
    }

    // reset form

    public function resetArticleForm(){

        $this->articleTitle = '';
        $this->coverImage = '';
        $this->heading = '';
        $this->content = '';
        $this->newsTags = '';
        $this->fieldOfInterest = '';
    }

    public function changeTab($tab){

         $this->test=500000000000;
        if($tab == 'favouriteTab'){
            $this->populartTab = false;
            $this->favouriteTab = true;
            $this->toRead = false;
            $this->myArticlesTab = false;
            $this->newArticleTab = false;
        }else if($tab == 'toRead'){
            $this->populartTab = false;
            $this->favouriteTab = false;
            $this->toRead = true;
            $this->myArticlesTab = false;
            $this->newArticleTab = false;
        }else if($tab == 'myArticlesTab'){
            $this->populartTab = false;
            $this->favouriteTab = false;
            $this->toRead = false;
            $this->myArticlesTab = true;
            $this->newArticleTab = false;
        }else if($tab == 'newArticleTab'){
            $this->populartTab = false;
            $this->favouriteTab = false;
            $this->toRead = false;
            $this->myArticlesTab = false;
            $this->newArticleTab = true;
        }else if($tab == 'detail'){
            $this->populartTab = false;
            $this->favouriteTab = false;
            $this->toRead = false;
            $this->myArticlesTab = false;
            $this->newArticleTab = false;
            $this->detailTab = true;
        }else if($tab == 'edit'){
            $this->populartTab = false;
            $this->favouriteTab = false;
            $this->toRead = false;
            $this->myArticlesTab = false;
            $this->newArticleTab = false;
            $this->detailTab = false;
            $this->editArticleTab = true;
        }else{
            $this->populartTab = true;
            $this->favouriteTab = false;
            $this->toRead = false;
            $this->myArticlesTab = false;
            $this->newArticleTab = false;
        }

    }


    public function storeArticle($status){ // just to store article

            $this->validate([
                'articleTitle' => 'required|unique:articles,title',
                'content' => 'required',
                'coverImage' => 'required|image|mimes:jpg,png,jpeg|max:2048',
                'heading' => 'required|max:200',
                'fieldOfInterest' => 'required|exists:article_categories,id',
                'newsTags' => 'required|exists:business_sectors,id',
            ]);

            $extension = $this->coverImage->getClientOriginalExtension();
            $file_name = $this->coverImage->getClientOriginalName();
            $file_name = date('YmdHis').rand(1, 99999).'.'.$extension;
            $this->coverImage->storeAs('public/articles', $file_name);
            //$this->coverImage->store('articles', 'public');

            $article = new \App\Models\Article;
            $article->title = $this->articleTitle;
            $article->coverPicture = $file_name;
            $article->heading = $this->heading;
            $article->content = $this->content;
            $article->clientId= Auth::guard('client')->user()->id;
            $article->status = $status;
            $article->datePublished = $status == 1 ? Carbon::now() : null; // add null if there is no date published
            $result=$article->save();

            if($result){
                $articleId = $article->id; // global article id
                        // news tags
                 if(is_array($this->fieldOfInterest) && !is_null($article->id)){
                    foreach ($this->fieldOfInterest as $categoryId){
                        \App\Models\ArticleInterest::firstOrCreate([
                            'articleId' => $article->id,
                             'categoryId' => $categoryId
                         ]);
                }
            }

                   if(is_array($this->newsTags) && !is_null($article->id)){

                    foreach ($this->newsTags as $businessSectorId){
                           \App\Models\ArticleTag::firstOrCreate([
                            'articleId' => $article->id,
                             'sectorId' => $businessSectorId
                        ]);

                    }
                }

                $this->resetArticleForm();
                $this->alert('success', 'Article created successfully!');
            }else{
                // error
                $this->alert('error', "Couldn't create article, Please try again later!");
            }
    }



    // update article
    public function updateArticle($status){ // just to store article

            $this->validate([
                'articleTitle' => 'required|unique:articles,title,'.$this->articleEditId,
                'content' => 'required',
                'heading' => 'required|max:200',
                'fieldOfInterest' => 'exists:article_categories,id',
                'newsTags' => 'required|exists:business_sectors,id',
            ]);


            //$this->coverImage->store('articles', 'public');
        $article = \App\Models\Article::find($this->articleEditId);
        if($article){ // article is found
            $article->title = $this->articleTitle;
        if(is_file($this->coverImage)){
            $this->validate([
                'coverImage' => 'sometimes|image|mimes:jpg,png,jpeg|max:2048',
            ]);
            $extension = $this->coverImage->getClientOriginalExtension();
            $file_name = $this->coverImage->getClientOriginalName();
            $file_name = date('YmdHis').rand(1, 99999).'.'.$extension;
            $this->coverImage->storeAs('public/articles', $file_name);
            $article->coverPicture = $file_name;
            }
            $article->heading = $this->heading;
            $article->content = $this->content;
            $article->clientId= Auth::guard('client')->user()->id;
            $article->status = $status;
            $article->datePublished = $status == 1 ? Carbon::now() : null; // add null if there is no date published
            $result=$article->save();

            if($result){
                if(is_array($this->fieldOfInterest) && !is_null($article->id)){
                    foreach ($this->fieldOfInterest as $categoryId){
                        \App\Models\ArticleInterest::firstOrCreate([
                            'articleId' => $article->id,
                             'categoryId' => $categoryId
                              ]);
                }

            }

                   if(is_array($this->newsTags) && !is_null($article->id)){

                    foreach ($this->newsTags as $businessSectorId){
                           \App\Models\ArticleTag::firstOrCreate([
                            'articleId' => $article->id,
                             'sectorId' => $businessSectorId
                        ]);
                    }
                }

                // news category

                // show message
                $this->alert('success', 'Article updated successfully!');
            }else{
                // error
                $this->alert('error', "Couldn't updated article, Please try again later!");
            }

        }else{
            // article not found
                $this->alert('warning', "Invalid resource, Please try again later!");
        }
    }

// store my interest
    public function checkMyInterest(){
        if(is_array($this->interests)){
            if(isset($this->rememberMychoice) && $this->rememberMychoice){ // store in my db
             foreach ($this->interests as $categoryId){
                // lets check it is already existsing to update only the status
                // No neeed to delete always
                $exists=\App\Models\ClientArticleInterest::where('categoryId', $categoryId)->where('clientId', Auth::guard('client')->user()->id)->first();

                if($exists->count() > 0){
                    // update status
                    if($exists->status=='1'){
                      $exists->status = 0;
                    }else{
                      $exists->status = 1;
                    }
                    $result=$exists->save(); // let's first remove all the othrt active items
                }else{ // create news
                    //$this->alert('success', 'nnnn');
                    $myChoice = new \App\Models\ClientArticleInterest;
                    $myChoice->status = 1;
                    $myChoice->clientId = Auth::guard('client')->user()->id;
                    $myChoice->categoryId = $categoryId;
                    $result=$myChoice->save();
                }

                if($result){
                    $this->rememberMychoice=true; // tick remember my choice
                    $this->interests=$this->getClientInterests();
                    $this->alert('success', 'Settings updated successfully!');
                }else{
                    $this->alert('error', 'Error occured while saving Settings, Please try again later!');
                }
            }
            }else{
            // just change the filter
            $this->alert('success', 'Item added successfully!');
            }
        }
    }

    // get client previous interest
    public function getClientInterests(){
        $result =  \App\Models\ClientArticleInterest::where('status', 1)->where('clientId', Auth::guard('client')->user()->id)->get();
        if($result->count() > 0){
                   $this->rememberMychoice=true; // tick remember my choice
          $items = $result->pluck('categoryId')->toArray();; // get only active interests !!

         // dd('f');
        }else{ // instead return the local client interests
           // dd(sizeof($this->interests));
            // $items = sizeof($this->interests) < 0 ?   \App\Models\ArticleInterest::select('categoryId')->pluck('categoryId')->toArray() : $this->interests;
        $items=$this->interests;
        }

        return $items;
    }
// add to read
    public function addArticleToread($articleId){
        $exist=\App\Models\ArticleToread::where('articleId', $articleId)->where('clientId', Auth::guard('client')->user()->id)->first();
        $returnValue = true;
        if(!$exist && !is_null(Auth::guard('client')->user()->id)){
              $toRead=new \App\Models\ArticleToread;
              $toRead->clientId = Auth::guard('client')->user()->id;
              $toRead->articleId = $articleId;
              $result=$toRead->save();
              if(!$result){
                // show error
                    $returnValue = false;
              }
        }
        if($returnValue){
         $this->alert('success', 'Article added to Read successfully!');
        }else{
            $this->alert('error', "Couldn't add article To Read, Please try again later!");
        }
    }

    // add to favourite
    public function addArticleToFafourite($articleId){
        $returnValue = true;
        $exist=\App\Models\ArticleToread::where('articleId', $articleId)->where('clientId', Auth::guard('client')->user()->id)->first();

      if(!$exist && !is_null(Auth::guard('client')->user()->id)){
              $toRead=new \App\Models\ArticleToread;
              $toRead->clientId = Auth::guard('client')->user()->id;
              $toRead->articleId = $articleId;
              $result=$toRead->save();
              if($result){
                // show success message
                $returnValue = false;
              }
        }
if($returnValue){
    $this->alert('success', 'Article added to favourite successfully!');
    }else{
    $this->alert('error', "Couldn't add article  to favourite, Please try again later!");
        }
    }
    // add likes
    public function addArticleLike($articleId){
        $returnValue = true;
        $exist=\App\Models\ArticleLike::where('articleId', $articleId)->where('clientId', Auth::guard('client')->user()->id)->first();

        if(!$exist && !is_null(Auth::guard('client')->user()->id)){
              $like=new \App\Models\ArticleLike;
              $like->clientId = Auth::guard('client')->user()->id;
              $like->articleId = $articleId;
              $result=$like->save();

              if(!$result){
                // show success message
                $returnValue = false;
              }
        }else{
                return  $this->alert('info', "Like already exists!");
        }
        if($returnValue){
         $this->alert('success', 'Like added successfully!');
        }else{
            $this->alert('error', "Couldn't add like, Please try again later!");
        }
    }

    // add comments
    public function addArticleView($articleId){
        $exist=\App\Models\ArticleView::where('articleId', $articleId)->where('clientId', Auth::guard('client')->user()->id)->first();

        if(!$exist && !is_null(Auth::guard('client')->user()->id)){
              $view=new \App\Models\ArticleToread;
              $view->clientId = Auth::guard('client')->user()->id;
              $view->articleId = $articleId;
              $result=$view->save();
        }
    }

    public function addArticleComment($articleId){
             $this->validate([
                'comment' => 'required',
             ]);
             if(is_null(Auth::guard('client')->user()->id)){
                return   $this->alert('error', 'Something went wrong, Please try again later!');
             }
              $comment = new \App\Models\ArticleComment;
              $comment->clientId = Auth::guard('client')->user()->id;
              $comment->articleId = $articleId;
              $comment->comment = $this->comment;
              $result=$comment->save();
              if($result){
                // show success message
             //   dd(\App\Models\ArticleComment::all());
                $this->alert('success', 'Comment added successfully!');
              }else{
                // shwo an error
                $this->alert('error', 'Comment not addedm, Please try again later!');
              }
    }

    // get news per category
    public function getCategoryArticles($categoryId){
            return \App\Models\ArticleInterest::join('articles', 'article_interests.articleId', '=', 'articles.id')
                ->where('article_interests.categoryId', '=', $categoryId)
                ->when($this->search, function($query){
                    return $query->where('articles.title', 'like','%'.$this->search.'%')->where('articles.heading', 'like','%'.$this->search.'%');
                })->get();
    }

    // get to ready

        public function getArticlesToread($categoryId){

               return \App\Models\ArticleToread::join('articles', 'article_toreads.articleId', '=', 'articles.id')
               ->where('article_toreads.clientId', Auth::guard('client')->user()->id)
                ->when($this->search, function($query){
                    return $query->where('articles.title', 'like','%'.$this->search.'%')->where('articles.heading', 'like','%'.$this->search.'%');
                })->get();
        }

        // favourite
        public function getFavouriteArticles($categoryId){

            return \App\Models\FavouriteArticle::join('articles', 'favourite_articles.articleId', '=', 'articles.id')
            ->where('favourite_articles.clientId', Auth::guard('client')->user()->id)
            ->when($this->search, function($query){
                    return $query->where('articles.title', 'like','%'.$this->search.'%')->where('articles.heading', 'like','%'.$this->search.'%');
                })->get();
        }
        // get my articles
        public function getMyArticles(){

            return \App\Models\Article::where('clientId', Auth::guard('client')->user()->id)
            ->when($this->search, function($query){
                    return $query->where('articles.title', 'like','%'.$this->search.'%')->where('articles.heading', 'like','%'.$this->search.'%');
                })->get();
        }
// catregory filter
    public function categoryFilter(){
       return  \App\Models\ArticleInterest::select('categoryId')
                      ->when($this->interests, function($query){
                        if($this->populartTab){
                         return $query->whereIn('categoryId', $this->interests);
                            }
                          })->groupBy('categoryId')
                           ->with('category')
                           ->get();

        }

    public function render()
    {
        $socialShareLink = '';
        if(!is_null($this->reference)){
           $this->articleDetail= \App\Models\Article::where('id', $this->reference)->with(['Client', 'ArticleInterest', 'ArticleLikes', 'ArticleViews', 'articleComments'])->first();
           $this->addArticleView($this->reference);
         //  $this->alert('error', 'jhsdjksdjkj');
           //$this->articleComments=\App\Models\ArticleComment::where('clientId', Auth::guard('client')->user()->id)->with('client')->get();
           $this->changeTab('detail');
        // Share link
            $socialShareLink = \Share::page(
            'http://ihuzo.rw/client/news/detail/'.$this->articleDetail->id ?? '',
            $this->articleDetail->title ?? '',
        )
        ->facebook()
        ->twitter()
        ->linkedin()
        ->whatsapp()
        ->telegram();

                    // Related articles
        $this->relatedArticles =  \App\Models\Article::join('article_interests', 'article_interests.articleId', '=', 'articles.id')->whereIn('article_interests.categoryId', $this->articleDetail->ArticleInterest->pluck('categoryId'))->with(['Client', 'ArticleInterest', 'ArticleLikes', 'ArticleViews', 'ArticleComments'])->limit(8)->get();
        }

        // edit request
        if(!is_null($this->articleEditId)){

                $article= \App\Models\Article::where('id', $this->articleEditId)->with('articleInterest')->first();
                if($article){
                    $this->changeTab('edit');  // siit to edit article tab
                    $this->articleToUpdate= $article;
                     $this->heading =  $article->heading;
                     $this->articleTitle = $article->title;
                     $this->content = $article->content;

                         $this->newsTagsEdit = \App\Models\ArticleTag::select('sectorId')
           ->where('articleId', $article->id)
           ->pluck('sectorId')
           ->toArray();

            $this->fieldOfInterestEdit = \App\Models\ArticleTag::select('sectorId')
           ->where('articleId', $article->id)
           ->pluck('sectorId')
           ->toArray();

                }else{
                    $this->alert('warning', 'Article not found');
                     $this->changeTab('myArticleTab'); // back to my article
                }

        }
        $this->interests = $this->getClientInterests();
        $this->popularArticles= $this->categoryFilter();
        $this->favouriteArticles =  $this->categoryFilter();
        $this->toReadArticles =  $this->categoryFilter();
        $this->myArticles =  $this->categoryFilter();

        $this->articleCategories = \App\Models\ArticleCategory::where('status', 1)->get();
        $this->clientInterests = \App\Models\ClientArticleInterest::where('clientId', Auth::guard('client')->user()->id)->get();


         //$clinentInterests = \App\Models\ClientArticleInterest::where('clientId', Auth::guard('client')->user()->id)->with('articleCategory')->get();


         // business sectors
         $this->businessSectors = \App\Models\BusinessSector::all();
        return view('livewire.v2.home-tabs.news-details');
    }
}
