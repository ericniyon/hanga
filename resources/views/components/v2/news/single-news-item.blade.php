       <div class="row bottom-border">

    @if($articles->count() > 0)
    <div class="col-lg-12">
    <h4 class="mt-3 ml-4"><b style="font-size: 18px; color:#F5841F;"> {{ $categoryName ?? '' }}</b> &nbsp;<small style="font-size: 11px; color:black;" > {{ $articles->count() ?? 0 }} Articles </small></h4>

</div>

    <!--Start Single New Article-->
    @if($articles->count() > 0)
  @foreach($articles as $article)
<div class="col-xxl-6 col-md-6">
    <div class="mb-7 p-4 min-h-150px  d-flex align-items-md-center flex-column flex-md-row">
        <!--begin::Symbol-->
        <div class="">
            <img class="w-md-125px w-100 h-125px object-cover align-self-start mr-md-2 rounded-lg shadow-sm" src="{{ asset('storage/public/articles/'.$article->coverPicture) ? asset('storage/public/articles/'.$article->coverPicture) :  asset('images/v2/black.PNG') }}" alt="Logo">
        </div>
        <!--end::Symbol-->
        <!--begin::Section-->
        <div class="d-flex flex-column flex-grow-1 justify-content-center ml-2">
            <!--begin::Title-->
            <a href="{{ url('client/news/detail/'.$article->id) }}" class="font-size-h5 text-hover-primary mb-1 ml-2" style="color:#141414;">
             {{ $article->title }}
                                        </a>
            <!--end::Title-->
            <!--begin::Desc-->
            <span class="ml-2" style="font-size: 12px; font-family: Roboto; color: #282828; ">
                {{ $article->heading }}
                </span>
            <!--begin::Desc-->
            <small style="padding:5px; font-size: 13px; color: #141414; font-family: Roboto;">   {{ isset($article) ? Carbon\Carbon::parse($article->datePublished)->format('H:i ,dS M y'): '-' }}</small>

        <!--end::Section-->
           @if($article->clientId == Auth::guard('client')->user()->id)

<a href="{{ url('client/news/edit/'.$article->id) }}">
<button class="btn btn-info btn-xs"><i class="fa fa-edit"></i> Edit</button>
</a>
@endif
    </div>


</div>


</div>
@if($loop->even || $loop->last)
<div class="col-xxl-12 col-md-12 mb-2" style="border-bottom: dashed 2px gray;"></div>
@endif
@endforeach
<!--End Single New Article-->

@endif
@endif
</div>
