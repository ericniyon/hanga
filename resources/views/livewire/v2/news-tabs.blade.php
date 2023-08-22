@section('title')
 | News
@endsection
<div>

    <!--Start Discount And coupons Tab-->


    <div class="tab-pane active" id="discount-coupons" role="tabpanel" aria-labelledby="reviews-tab">

        <div class="row">


            <div class="col-12 h-20px">
                <div wire:loading class="w-100 h-100">
                    <div class="h-100 w-100 d-flex  align-items-center justify-content-center">
                        <div>Please wait ... &nbsp;</div>
                        <img src="http://app.ihuzo.rw/assets/loader.svg" alt="" class="h-30px">
                    </div>
                </div>
            </div>

            <div class="col-lg-3" x-data="{ open: true }">
                <h4 class="mb-3 d-lg-none d-flex justify-content-between align-items-center">
                    Filter By
                    </span>
                </h4>
                <div class="card bg-light-light shadow-none rounded-0 my-2 border overflow-hidden">

                    <div class="card-body p-2 bg-light-light ">

                        <div
                            style="{{ $favouriteTab ? 'background-color: #EE881B;' : '' }} border-bottom: dashed 2px gray;">
                            <a href="#" wire:click="changeTab('favouriteTab')">
                                <div class="  rounded-0 my-2 p-3 d-flex justify-content-between align-items-start">

                                    <h5 class="mb-0">
                                        <span class="svg-icon">
                                            <svg width="14" height="24" viewBox="0 0 14 24" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M0 2.089V24.001L6.546 17.741L13.091 24.001V2.089C13.0855 1.53321 12.8609 1.00206 12.466 0.610913C12.0711 0.21977 11.5378 0.000235894 10.982 2.59533e-09L10.905 0.001H10.909H2.183L2.11 2.59533e-09C1.55428 -2.75475e-05 1.021 0.219285 0.626088 0.610269C0.231172 1.00125 0.0065335 1.53231 0.001 2.088V2.089H0Z"
                                                    fill="black" />
                                            </svg>

                                        </span>
                                        My Favorites
                                    </h5>

                                </div>
                            </a>
                        </div>


                        <div class=""
                            style="{{ $toRead ? 'background-color: #EE881B;' : '' }} border-bottom: dashed 2px gray;">
                            <a href="#" wire:click="changeTab('toRead')">
                                <div class="rounded-0 my-1 p-3 d-flex justify-content-between align-items-start">
                                    <h5 class="mb-0">
                                        <span class="svg-icon">
                                            <svg width="20" height="20" viewBox="0 0 20 20" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M19.9588 17.4947L19.104 14.1865L16.5396 4.26196L15.6848 0.953773C15.643 0.79063 15.5706 0.637661 15.4719 0.503612C15.3731 0.369563 15.2499 0.257064 15.1093 0.172547C14.9687 0.0880293 14.8135 0.0331519 14.6525 0.0110525C14.4915 -0.0110468 14.3278 6.49015e-05 14.1709 0.0437528L10.9887 0.932361C10.8566 0.967265 10.7313 1.02519 10.6179 1.10366C10.5258 0.866831 10.3678 0.663942 10.1641 0.520915C9.96052 0.377888 9.7205 0.301217 9.47476 0.3007H6.17919C5.87441 0.300983 5.58068 0.41931 5.3553 0.632589C5.12992 0.41931 4.83618 0.300983 4.5314 0.3007H1.23584C0.908073 0.3007 0.593733 0.436055 0.361968 0.67699C0.130204 0.917924 0 1.2447 0 1.58543V18.7152C0 19.056 0.130204 19.3827 0.361968 19.6237C0.593733 19.8646 0.908073 20 1.23584 20H4.5314C4.83618 19.9997 5.12992 19.8813 5.3553 19.6681C5.58068 19.8813 5.87441 19.9997 6.17919 20H9.47476C9.80252 20 10.1169 19.8646 10.3486 19.6237C10.5804 19.3827 10.7106 19.056 10.7106 18.7152V4.79727L10.9681 5.81435L13.5324 15.7389L14.3872 19.0471C14.456 19.3215 14.6108 19.5642 14.8272 19.7368C15.0435 19.9093 15.3091 20.002 15.5819 20C15.6897 20.0009 15.7971 19.9865 15.9011 19.9571L19.0834 19.0685C19.2409 19.026 19.3887 18.9511 19.5178 18.8481C19.647 18.7451 19.7549 18.6162 19.8352 18.469C19.9979 18.1737 20.0423 17.8238 19.9588 17.4947ZM11.8743 6.00706L15.8496 4.89363L18.1977 13.9938L14.2224 15.1073L11.8743 6.00706ZM6.17919 1.15719H9.47476C9.58401 1.15719 9.68879 1.20231 9.76605 1.28262C9.8433 1.36293 9.8867 1.47186 9.8867 1.58543V14.861H5.76724V1.58543C5.76724 1.47186 5.81064 1.36293 5.8879 1.28262C5.96515 1.20231 6.06993 1.15719 6.17919 1.15719ZM1.23584 1.15719H4.5314C4.64066 1.15719 4.74544 1.20231 4.8227 1.28262C4.89995 1.36293 4.94335 1.47186 4.94335 1.58543V4.58315H0.823892V1.58543C0.823892 1.47186 0.867293 1.36293 0.944548 1.28262C1.0218 1.20231 1.12658 1.15719 1.23584 1.15719ZM4.5314 19.1435H1.23584C1.12658 19.1435 1.0218 19.0984 0.944548 19.018C0.867293 18.9377 0.823892 18.8288 0.823892 18.7152V5.43964H4.94335V18.7152C4.94335 18.8288 4.89995 18.9377 4.8227 19.018C4.74544 19.0984 4.64066 19.1435 4.5314 19.1435ZM9.47476 19.1435H6.17919C6.06993 19.1435 5.96515 19.0984 5.8879 19.018C5.81064 18.9377 5.76724 18.8288 5.76724 18.7152V15.7175H9.8867V18.7152C9.8867 18.8288 9.8433 18.9377 9.76605 19.018C9.68879 19.0984 9.58401 19.1435 9.47476 19.1435ZM10.9578 1.96015C10.9831 1.91028 11.0182 1.86644 11.0608 1.83142C11.1033 1.7964 11.1524 1.77097 11.2049 1.75673L14.3872 0.868124H14.4902C14.5806 0.866852 14.669 0.896566 14.7416 0.952679C14.8142 1.00879 14.867 1.08819 14.8918 1.1786L15.6436 4.07996L11.6581 5.17198L10.9166 2.28133C10.8999 2.228 10.8949 2.17146 10.902 2.11587C10.9092 2.06028 10.9282 2.00707 10.9578 1.96015ZM19.1143 18.0407C19.0603 18.1392 18.9717 18.2121 18.8671 18.2442L15.6848 19.1328C15.5784 19.159 15.4664 19.1414 15.3722 19.0834C15.2781 19.0255 15.2093 18.9319 15.1802 18.8223L14.4284 15.9316L18.414 14.8182L19.1555 17.7196C19.1722 17.7729 19.1771 17.8294 19.17 17.885C19.1629 17.9406 19.1438 17.9938 19.1143 18.0407Z"
                                                    fill="black" />
                                            </svg>
                                        </span>
                                        To Read
                                    </h5>

                                </div>
                            </a>
                        </div>


                        <div
                            style="{{ $myArticlesTab ? 'background-color: #EE881B;' : '' }}  border-bottom: dashed 2px gray; color: white;">
                            <a href="#" wire:click="changeTab('myArticlesTab')">
                                <div class="rounded-0 my-2 p-3 d-flex justify-content-between align-items-start">
                                    <h5 class="mb-0">
                                        <span class="svg-icon">
                                            <svg width="20" height="20" viewBox="0 0 20 20" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M19.9588 17.4947L19.104 14.1865L16.5396 4.26196L15.6848 0.953773C15.643 0.79063 15.5706 0.637661 15.4719 0.503612C15.3731 0.369563 15.2499 0.257064 15.1093 0.172547C14.9687 0.0880293 14.8135 0.0331519 14.6525 0.0110525C14.4915 -0.0110468 14.3278 6.49015e-05 14.1709 0.0437528L10.9887 0.932361C10.8566 0.967265 10.7313 1.02519 10.6179 1.10366C10.5258 0.866831 10.3678 0.663942 10.1641 0.520915C9.96052 0.377888 9.7205 0.301217 9.47476 0.3007H6.17919C5.87441 0.300983 5.58068 0.41931 5.3553 0.632589C5.12992 0.41931 4.83618 0.300983 4.5314 0.3007H1.23584C0.908073 0.3007 0.593733 0.436055 0.361968 0.67699C0.130204 0.917924 0 1.2447 0 1.58543V18.7152C0 19.056 0.130204 19.3827 0.361968 19.6237C0.593733 19.8646 0.908073 20 1.23584 20H4.5314C4.83618 19.9997 5.12992 19.8813 5.3553 19.6681C5.58068 19.8813 5.87441 19.9997 6.17919 20H9.47476C9.80252 20 10.1169 19.8646 10.3486 19.6237C10.5804 19.3827 10.7106 19.056 10.7106 18.7152V4.79727L10.9681 5.81435L13.5324 15.7389L14.3872 19.0471C14.456 19.3215 14.6108 19.5642 14.8272 19.7368C15.0435 19.9093 15.3091 20.002 15.5819 20C15.6897 20.0009 15.7971 19.9865 15.9011 19.9571L19.0834 19.0685C19.2409 19.026 19.3887 18.9511 19.5178 18.8481C19.647 18.7451 19.7549 18.6162 19.8352 18.469C19.9979 18.1737 20.0423 17.8238 19.9588 17.4947ZM11.8743 6.00706L15.8496 4.89363L18.1977 13.9938L14.2224 15.1073L11.8743 6.00706ZM6.17919 1.15719H9.47476C9.58401 1.15719 9.68879 1.20231 9.76605 1.28262C9.8433 1.36293 9.8867 1.47186 9.8867 1.58543V14.861H5.76724V1.58543C5.76724 1.47186 5.81064 1.36293 5.8879 1.28262C5.96515 1.20231 6.06993 1.15719 6.17919 1.15719ZM1.23584 1.15719H4.5314C4.64066 1.15719 4.74544 1.20231 4.8227 1.28262C4.89995 1.36293 4.94335 1.47186 4.94335 1.58543V4.58315H0.823892V1.58543C0.823892 1.47186 0.867293 1.36293 0.944548 1.28262C1.0218 1.20231 1.12658 1.15719 1.23584 1.15719ZM4.5314 19.1435H1.23584C1.12658 19.1435 1.0218 19.0984 0.944548 19.018C0.867293 18.9377 0.823892 18.8288 0.823892 18.7152V5.43964H4.94335V18.7152C4.94335 18.8288 4.89995 18.9377 4.8227 19.018C4.74544 19.0984 4.64066 19.1435 4.5314 19.1435ZM9.47476 19.1435H6.17919C6.06993 19.1435 5.96515 19.0984 5.8879 19.018C5.81064 18.9377 5.76724 18.8288 5.76724 18.7152V15.7175H9.8867V18.7152C9.8867 18.8288 9.8433 18.9377 9.76605 19.018C9.68879 19.0984 9.58401 19.1435 9.47476 19.1435ZM10.9578 1.96015C10.9831 1.91028 11.0182 1.86644 11.0608 1.83142C11.1033 1.7964 11.1524 1.77097 11.2049 1.75673L14.3872 0.868124H14.4902C14.5806 0.866852 14.669 0.896566 14.7416 0.952679C14.8142 1.00879 14.867 1.08819 14.8918 1.1786L15.6436 4.07996L11.6581 5.17198L10.9166 2.28133C10.8999 2.228 10.8949 2.17146 10.902 2.11587C10.9092 2.06028 10.9282 2.00707 10.9578 1.96015ZM19.1143 18.0407C19.0603 18.1392 18.9717 18.2121 18.8671 18.2442L15.6848 19.1328C15.5784 19.159 15.4664 19.1414 15.3722 19.0834C15.2781 19.0255 15.2093 18.9319 15.1802 18.8223L14.4284 15.9316L18.414 14.8182L19.1555 17.7196C19.1722 17.7729 19.1771 17.8294 19.17 17.885C19.1629 17.9406 19.1438 17.9938 19.1143 18.0407Z"
                                                    fill="black" />
                                            </svg>
                                        </span>
                                        My Articles
                                    </h5>

                                </div>
                            </a>
                        </div>


                        <button type="button" wire:click="changeTab('newArticleTab')"
                            class="btn btn-outline-info rounded border-2 my-2 w-md-190px w-100">Create New
                            Article</button>


                        <br>


                        <div class="card-body p-2 bg-white">
                            <!--Start My Interest-->

                            <p style="font-size: 22px; color: #2A337E;">My Interest <b
                                    style="color: #2A337E; padding-left: 50px;"> {{ count($interests) }} </b></p>
                            @foreach ($articleCategories as $category)
                                @php
                                    $index = 1;
                                @endphp
                                <div
                                    class=" shadow-none rounded-0 my-2 p-3 d-flex justify-content-between align-items-start">
                                    <h5 class="mb-0">
                                        {{ $category->name }}
                                    </h5>
                                    <label class="checkbox checkbox-info">
                                        <input type="checkbox" wire:model="interests.{{ $category->id }}"
                                            wire:click="checkMyInterest" value="{{ $category->id }}"
                                            {{ in_array($category->id, $interests) ? 'checked' : '' }}>
                                        <span class="border-info border-2 rounded-sm"></span>
                                    </label>
                                </div>
                                @php
                                    $index += 1;
                                @endphp
                            @endforeach


                            <div class="custom-control custom-switch">
                                <input type="checkbox" class="custom-control-input mx-6" id="customSwitches"
                                    wire:model.defer="rememberMychoice" wire:click="checkMyInterest">
                                <label class="custom-control-label checkbox checkbox-info" for="customSwitches">Remember
                                    my choice</label>
                            </div>


                            <!--End My Interest-->
                        </div>
                    </div>

                </div>
            </div>

            <div class="col-lg-9">

                <div style="display: {{ $populartTab ? 'block' : 'none' }}">
                    @if (isset($populartTab) && $populartTab)
                        <x-v2.news.search />
                        <div class="row">
                            <x-v2.news.popular-articles />
                            @if ($popularArticles->count() > 0)
                                @foreach ($popularArticles as $popularArticle)
                                    @php
                                        $articles = $this->getCategoryArticles($popularArticle->categoryId);
                                    @endphp
                                    <x-v2.news.single-news-item :articles="$articles" :name="$popularArticle->category->name">
                                    </x-v2.news.single-news-item>
                                @endforeach
                                <br>
                            @else
                                <div class="col-lg-12">
                                    <p>No such results found, Please try again later</p>
                                </div>
                            @endif
                        </div>
                    @endif
                </div>
                <!--end of popular contents ----->

                <!-- end of popular articles -->

                <!-- favourite articles -->
                <div style="display: {{ $favouriteTab ? 'block' : 'none' }}">
                    @if (isset($favouriteTab) && $favouriteTab)
                        <x-v2.news.search />
                        <div class="row">
                            @if ($favouriteArticles->count() > 0)
                                @foreach ($favouriteArticles as $favouriteArticle)
                                    @php
                                        $articles = $this->getCategoryArticles($favouriteArticle->categoryId);
                                    @endphp
                                    <x-v2.news.single-news-item :articles="$articles" :name="$favouriteArticle->category->name">
                                    </x-v2.news.single-news-item>
                                @endforeach
                                <br>
                            @else
                                <div class="col-lg-12">
                                    <p>No such results found, Please try again later</p>
                                </div>
                            @endif
                        </div>
                    @endif
                </div>

                <!--End Single New Article-->


                <!-- toRead articles -->
                <div style="display: {{ $toRead ? 'block' : 'none' }}">
                    @if (isset($toRead) && $toRead)
                        <x-v2.news.search />
                        <div class="row">
                            @if ($toReadArticles->count() > 0)
                                @foreach ($toReadArticles as $toReadArticle)
                                    @php
                                        $articles = $this->getCategoryArticles($toReadArticle->categoryId);
                                    @endphp
                                    <x-v2.news.single-news-item :articles="$articles" :name="$toReadArticle->category->name">
                                    </x-v2.news.single-news-item>
                                @endforeach
                                <br>
                            @else
                                <div class="col-lg-12">
                                    <p>No such results found, Please try again later</p>
                                </div>
                            @endif
                        </div>
                    @endif
                </div>
                <!-- end of toRead articles-->


                <!-- myarticles articles -->
                <div style="display: {{ $myArticlesTab ? 'block' : 'none' }}">
                    @if (isset($myArticlesTab) && $myArticlesTab)
                        <x-v2.news.search />
                        <div class="row">
                            @if ($myArticles->count() > 0)
                                @foreach ($myArticles as $myArticle)
                                    @php
                                        $articles = $this->getCategoryArticles($myArticle->categoryId);
                                    @endphp
                                    <x-v2.news.single-news-item :articles="$articles" :name="$myArticle->category->name">
                                    </x-v2.news.single-news-item>
                                @endforeach
                                <br>
                            @else
                                <div class="col-lg-12">
                                    <p>No such results found, Please try again later</p>
                                </div>
                            @endif
                        </div>
                    @endif
                </div>
                <!-- end of myarticles articles -->


                <!-- new articles articles -->
                <div style="display: {{ $newArticleTab ? 'block' : 'none' }}">
                    @if (isset($newArticleTab) && $newArticleTab)
                        <form method="post" enctype="multipart/form-data">
                            <!--Start  Article Part 2-->
                            <div class="row bg-white">
                                <div class="col-md-2"></div>
                                <div class="col-md-8">
                                    <br>
                                    <h4>New Article</h4>
                                    <br>
                                    <div class="form-group">
                                        <label>Title</label> <small style="float:right;"
                                            class="form-text">Required</small>
                                        <input type="text" class="form-control" style="border:solid 1px #121B65;"
                                            wire:model="articleTitle">
                                        @error('articleTitle')
                                            <p class="text-danger">{{ $message }} </p>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label>Heading</label> <small style="float:right;"
                                            class="form-text">Required</small>
                                        <textarea class="form-control" cols="3" rows="2" wire:model="heading"
                                            style="border:solid 1px #121B65;"></textarea>
                                        @error('heading')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label>Cover image</label> <small style="float:right;"
                                            class="form-text">Required</small>
                                        <div class="custom-file">
                                            <input type="file" wire:model="coverImage" class="custom-file-input">
                                            <label class="custom-file-label" for="customFile"
                                                style="border:solid 1px #121B65;"> </label>
                                            @error('coverImage')
                                                <p class="text-danger">{{ $message }} </p>
                                            @enderror
                                        </div>
                                        <div class="form-group" wire:ignore>
                                            <label>Paragraph</label> <small style="float:right;"
                                                class="form-text"></small>
                                            <textarea type="text" input="content" id="summernote" class="form-control summernote">{{ $content }}</textarea>

                                            @error('content')
                                                <p class="text-danger">{{ $message }} </p>
                                            @enderror

                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-2"></div>

                            </div>
                            <!--end Article Part 2-->
                            <br>
                            <!--Start  bussiness tags-->
                            <div class="row  bg-white mb-4">

                                <div class="col-md-2"></div>

                                <div class="col-md-8">
                                    <br>
                                    <h4>News tags</h4>
                                    <br>

                                    <div class="row">
                                        @foreach ($businessSectors as $businessSector)
                                            <div class="col-md-4">
                                                <div class="checkbox-list">
                                                    <label class="checkbox checkbox-info">
                                                        <input type="checkbox"
                                                            wire:model="newsTags.{{ $businessSector->id }}"
                                                            value="{{ $businessSector->id }}">
                                                        {{ $businessSector->name }}
                                                        <span class="border-info border-2 rounded-sm"></span>
                                                    </label>
                                                </div>
                                            </div>
                                        @endforeach
                                        @error('newsTags')
                                            <br>
                                            <div class="text-danger"> {{ $message }} </div>
                                        @enderror
                                    </div>
                                    <br>
                                </div>
                                <div class="col-md-2"></div>

                            </div>
                            <!--end bussiness tags-->
                            <!--Start  Article Part 3-->
                            <div class="row  bg-white">

                                <div class="col-md-2"></div>

                                <div class="col-md-8">
                                    <br>
                                    <h4>Field Of Interest</h4>
                                    <br>

                                    <div class="row">
                                        @foreach ($articleCategories as $category)
                                            <div class="col-md-4">
                                                <div class="checkbox-list">
                                                    <label class="checkbox checkbox-info">
                                                        <input type="checkbox"
                                                            wire:model="fieldOfInterest.{{ $category->id }}"
                                                            value="{{ $category->id }}"> {{ $category->name }}
                                                        <span class="border-info border-2 rounded-sm"></span>
                                                    </label>
                                                </div>
                                            </div>
                                        @endforeach
                                        @error('fieldOfInterest')
                                            <br>
                                            <div class="text-danger"> {{ $message }} </div>
                                        @enderror
                                    </div>
                                    <br>
                                </div>
                                <div class="col-md-2"></div>
                            </div>
                            <!--end Article Part 3-->
                            <br>

                            <div class="row">
                                <div class="col-md-3"></div>
                                <div class="col-md-3">
                                    <button wire:click="storeArticle('0')"
                                        class="btn btn-info rounded border-2 my-2 w-md-150px w-100"
                                        type="button">Save As Draft</button>
                                </div>
                                <div class="col-md-3">
                                    <button wire:click="storeArticle('1')"
                                        class="btn btn-primary rounded border-2 my-2 w-md-150px w-100"
                                        type="button">Publish Article</button>
                                </div>
                                <div class="col-md-3"></div>
                            </div>


                            <script>
                                $('#summernote').summernote({
                                    placeholder: 'Enter article content.',
                                    tabsize: 2,
                                    height: 400,
                                    focus: true,
                                    callbacks: {
                                        onChange: function(e) {
                                            @this.set('content', e);
                                        },
                                    }
                                });
                            </script>
                    @endif
                </div>
                <!-- update / edit  articles articles -->
                <div style="display: {{ $editArticleTab ? 'block' : 'none' }}">
                    @if (isset($editArticleTab) && $editArticleTab)
                        <form method="post" enctype="multipart/form-data">
                            @csrf
                            <!--Start  Article Part 2-->
                            <div class="row bg-white">
                                <div class="col-md-2"></div>
                                <div class="col-md-8">
                                    <br>
                                    <h4>Edit Article</h4>
                                    <br>


                                    <div class="form-group">
                                        <label>Title</label> <small style="float:right;"
                                            class="form-text">Required</small>
                                        <input type="text" class="form-control" style="border:solid 1px #121B65;"
                                            wire:model.defer="articleTitle">
                                        @error('articleTitle')
                                            <p class="text-danger">{{ $message }} </p>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label>Heading</label> <small style="float:right;"
                                            class="form-text">Required</small>
                                        <textarea class="form-control" cols="3" rows="2" wire:model.defer="heading"
                                            style="border:solid 1px #121B65;"></textarea>
                                        @error('heading')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label>Cover image</label> <small style="float:right;"
                                            class="form-text">Required</small>
                                        <div class="custom-file">
                                            <input type="file" wire:model="coverImage" class="custom-file-input">
                                            <label class="custom-file-label" for="customFile"
                                                style="border:solid 1px #121B65;" required> </label>
                                            @error('coverImage')
                                                <p class="text-danger">{{ $message }} </p>
                                            @enderror
                                        </div>
                                        <div class="form-group" wire:ignore>
                                            <label>Paragraph</label> <small style="float:right;"
                                                class="form-text"></small>
                                            <textarea type="text" input="content" id="summernote" class="form-control summernote">{{ $content }}</textarea>

                                            @error('content')
                                                <p class="text-danger">{{ $message }} </p>
                                            @enderror

                                        </div>

                                    </div>
                                </div>
                                <div class="col-md-2"></div>

                            </div>
                            <!--end Article Part 2-->
                            <br>


                            <!--Start  bussiness tags-->
                            <div class="row  bg-white mb-4">

                                <div class="col-md-2"></div>

                                <div class="col-md-8">
                                    <br>
                                    <h4>News tags</h4>
                                    <br>

                                    <div class="row">
                                        @foreach ($businessSectors as $businessSector)
                                            <div class="col-md-4">
                                                <div class="checkbox-list">
                                                    <label class="checkbox checkbox-info">
                                                        <input type="checkbox"
                                                            wire:model.defer="newsTags.{{ $businessSector->id }}"
                                                            value="{{ $businessSector->id }}"
                                                            {{ in_array($businessSector->id, $newsTagsEdit) ? 'checked' : '' }}>
                                                        {{ $businessSector->name }}
                                                        <span class="border-info border-2 rounded-sm"></span>
                                                    </label>
                                                </div>
                                            </div>
                                        @endforeach
                                        @error('newsTags')
                                            <br>
                                            <div class="text-danger"> {{ $message }} </div>
                                        @enderror
                                    </div>
                                    <br>
                                </div>
                                <div class="col-md-2"></div>

                            </div>
                            <!--end bussiness tags-->
                            <!--Start  Article Part 3-->
                            <div class="row  bg-white">

                                <div class="col-md-2"></div>

                                <div class="col-md-8">
                                    <br>
                                    <h4>Field Of Interest</h4>
                                    <br>

                                    <div class="row">
                                        @foreach ($articleCategories as $category)
                                            <div class="col-md-4">
                                                <div class="checkbox-list">
                                                    <label class="checkbox checkbox-info">
                                                        {{ in_array($category->id, $fieldOfInterestEdit) ? 'checked' : '' }}
                                                        <input type="checkbox"
                                                            wire:model.defer="fieldOfInterest.{{ $category->id }}"
                                                            value="{{ $category->id }}"
                                                            {{ in_array($category->id, $fieldOfInterestEdit) ? 'checked' : '' }}>
                                                        {{ $category->name }}
                                                        <span class="border-info border-2 rounded-sm"></span>
                                                    </label>
                                                </div>
                                            </div>
                                        @endforeach
                                        @error('fieldOfInterest')
                                            <br>&nbsp;<div class="text-danger"> {{ $message }} </div>
                                        @enderror
                                    </div>
                                    <br>
                                </div>
                                <div class="col-md-2"></div>
                            </div>
                            <!--end Article Part 3-->
                            <br>

                            <div class="row">
                                <div class="col-md-3"></div>
                                @if ($articleToUpdate->status == 0)
                                    <div class="col-md-3">
                                        <button wire:click="updateArticle('1')"
                                            class="btn btn-primary rounded border-2 my-2 w-md-150px w-100"
                                            type="button">Publish Article</button>
                                    </div>
                                    <div class="col-md-3">
                                        <button wire:click="updateArticle('0')"
                                            class="btn btn-info rounded border-2 my-2 w-md-150px w-100"
                                            type="button">Save As Draft</button>
                                    </div>
                                @else
                                    <div class="col-md-3">
                                        <button wire:click="updateArticle('1')"
                                            class="btn btn-primary rounded border-2 my-2 w-md-150px w-100"
                                            type="button">Update Article</button>
                                    </div>
                                @endif
                                <div class="col-md-3"></div>
                            </div>
                            <script>
                                $('#summernote').summernote({
                                    placeholder: 'Enter article content.',
                                    tabsize: 2,
                                    height: 400,
                                    focus: true,
                                    callbacks: {
                                        onChange: function(e) {
                                            @this.set('content', e);
                                        },
                                    }
                                });
                            </script>
                    @endif
                </div>
                <!-- news detail -->
                <div style="display: {{ $detailTab ? 'block' : 'none' }}">
                    <div class="mx-4 my-4">
                        @if (isset($detailTab) && $detailTab)
                            <a href="{{ url('client/news') }}">
                                <p style="color: black;"> <i class="fa fa-arrow-left" aria-hidden="true"></i> Take Me
                                    Back</p>
                            </a>

                            <div style="background-color: #F6F6F6;" class="mt-3">
                                <div class="row">
                                    <div class="col-sm-9 col-xxl-9 py-4">
                                        <h3 class="ml-2 text-md-auto">
                                            <strong>{{ $articleDetail->title ?? '' }}</strong></h3>
                                    </div>
                                    <div class="col-sm-3 col-xxl-9 my-4">
                                        <div style="float: right;" class="mr-4">
                                            <a href="#" title="Add article to my favourite"
                                                wire:click="addArticleToFafourite({{ $articleDetail->id ?? '' }})">
                                                <svg width="20" height="33" viewBox="0 0 24 37"
                                                    fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M19.9997 1.00153V0.676766L20.0032 1.00147L20.1384 1.00001C20.9436 1.00145 21.6882 1.26937 22.2162 1.70678C22.7386 2.13953 22.9921 2.68522 23 3.20966V34.7195L12.6256 26.4208L12.001 25.9212L11.3763 26.4208L1 34.7197V4.203H1.00183V3.20811C1.00972 2.68393 1.26323 2.13845 1.78558 1.70594C2.31354 1.26878 3.05805 1.00115 3.8629 1L3.99068 1.00147L3.99068 1.00153H4.00214H19.9924H19.9997Z"
                                                        stroke="#5C5C5C" stroke-width="2" />
                                                </svg>

                                            </a><br>
                                            <a href="#" title="Read article later"
                                                wire:click="addArticleToread({{ $articleDetail->id ?? '' }})">
                                                <svg width="25" height="25" viewBox="0 0 36 37"
                                                    fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M35.9258 32.2906L34.3872 26.3358L29.7713 8.47158L28.2327 2.51684C28.1574 2.22318 28.0271 1.94784 27.8494 1.70655C27.6717 1.46526 27.4499 1.26276 27.1968 1.11063C26.9437 0.958502 26.6643 0.859722 26.3744 0.819943C26.0846 0.780165 25.7901 0.800166 25.5077 0.878804L19.7796 2.4783C19.542 2.54113 19.3163 2.64538 19.1122 2.78663C18.9464 2.36034 18.662 1.99514 18.2955 1.7377C17.9289 1.48025 17.4969 1.34224 17.0546 1.34131H11.1225C10.5739 1.34182 10.0452 1.55481 9.63953 1.93871C9.23385 1.55481 8.70512 1.34182 8.15653 1.34131H2.22451C1.63453 1.34131 1.06872 1.58495 0.651543 2.01863C0.234367 2.45231 0 3.04051 0 3.65383V34.4875C0 35.1008 0.234367 35.689 0.651543 36.1227C1.06872 36.5563 1.63453 36.8 2.22451 36.8H8.15653C8.70512 36.7995 9.23385 36.5865 9.63953 36.2026C10.0452 36.5865 10.5739 36.7995 11.1225 36.8H17.0546C17.6445 36.8 18.2103 36.5563 18.6275 36.1227C19.0447 35.689 19.2791 35.1008 19.2791 34.4875V9.43514L19.7425 11.2659L24.3584 29.1301L25.897 35.0849C26.0207 35.5787 26.2994 36.0156 26.6889 36.3262C27.0784 36.6369 27.5564 36.8036 28.0473 36.8C28.2414 36.8016 28.4347 36.7757 28.622 36.7229L34.3501 35.1234C34.6337 35.0469 34.8996 34.9119 35.1321 34.7266C35.3645 34.5412 35.5588 34.3091 35.7034 34.0442C35.9962 33.5127 36.0761 32.8828 35.9258 32.2906ZM21.3738 11.6128L28.5293 9.60857L32.7559 25.9889L25.6004 27.9931L21.3738 11.6128ZM11.1225 2.88299H17.0546C17.2512 2.88299 17.4398 2.9642 17.5789 3.10876C17.7179 3.25332 17.7961 3.44939 17.7961 3.65383V27.5499H10.381V3.65383C10.381 3.44939 10.4592 3.25332 10.5982 3.10876C10.7373 2.9642 10.9259 2.88299 11.1225 2.88299ZM2.22451 2.88299H8.15653C8.35319 2.88299 8.54179 2.9642 8.68085 3.10876C8.81991 3.25332 8.89803 3.44939 8.89803 3.65383V9.04972H1.48301V3.65383C1.48301 3.44939 1.56113 3.25332 1.70019 3.10876C1.83925 2.9642 2.02785 2.88299 2.22451 2.88299ZM8.15653 35.2583H2.22451C2.02785 35.2583 1.83925 35.1771 1.70019 35.0325C1.56113 34.888 1.48301 34.6919 1.48301 34.4875V10.5914H8.89803V34.4875C8.89803 34.6919 8.81991 34.888 8.68085 35.0325C8.54179 35.1771 8.35319 35.2583 8.15653 35.2583ZM17.0546 35.2583H11.1225C10.9259 35.2583 10.7373 35.1771 10.5982 35.0325C10.4592 34.888 10.381 34.6919 10.381 34.4875V29.0916H17.7961V34.4875C17.7961 34.6919 17.7179 34.888 17.5789 35.0325C17.4398 35.1771 17.2512 35.2583 17.0546 35.2583ZM19.724 4.32832C19.7697 4.23855 19.8328 4.15965 19.9094 4.09661C19.986 4.03358 20.0743 3.98779 20.1689 3.96217L25.897 2.36267H26.0824C26.2452 2.36038 26.4042 2.41387 26.5348 2.51487C26.6655 2.61588 26.7606 2.75878 26.8053 2.92153L28.1586 8.14398L20.9845 10.1096L19.6498 4.90645C19.6198 4.81045 19.6108 4.70868 19.6237 4.60862C19.6365 4.50856 19.6708 4.41277 19.724 4.32832ZM34.4057 33.2734C34.3085 33.4506 34.149 33.5818 33.9608 33.6395L28.2327 35.239C28.0412 35.2863 27.8394 35.2545 27.67 35.1502C27.5006 35.046 27.3767 34.8775 27.3244 34.6802L25.9711 29.477L33.1452 27.4728L34.4799 32.6953C34.5099 32.7912 34.5189 32.893 34.506 32.9931C34.4932 33.0931 34.4589 33.1889 34.4057 33.2734Z"
                                                        fill="#5C5C5C" />
                                                </svg>

                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row mx-2 my-2">
                                <div class="col-md-12 mt-5">
                                    {!! $articleDetail->content ?? '' !!}
                                </div>
                            </div>
                            <div class="row bg-white mx-2 my-2">
                                <div class="col-md-8 mt-4">
                                    <p> {{ Carbon\Carbon::parse($articleDetail->datePublished)->format('H:i, dS M y') ?? '' }}
                                    </p>
                                    <p><strong>{{ $articleDetail->client->name ?? '' }}</strong></p>
                                </div>
                                <div class="col-md-1 mt-4">
                                    <p class="float-right text-muted">
                                        <a href="#"
                                            wire:click="addArticleLike({{ $articleDetail->id ?? '' }})">
                                            <svg width="32" height="30" viewBox="0 0 32 30" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M31.9999 14.7379C31.9999 12.7017 30.3516 11.6352 28.1216 11.6352H21.6253C22.1101 9.88989 22.304 8.24157 22.304 6.78718C22.304 1.16352 20.7526 0 19.3952 0C18.5225 0 17.8438 0.09696 16.9712 0.581758C16.6803 0.775678 16.5834 0.969597 16.4864 1.26048L15.5168 6.4963C14.4502 9.21117 11.8323 11.6352 9.69922 13.2835V27.1487C10.4749 27.1487 11.2506 27.5365 12.2202 28.0213C13.2867 28.5061 14.3533 29.0879 15.5168 29.0879H24.728C26.6672 29.0879 28.1216 27.5365 28.1216 26.1791C28.1216 25.8882 28.1216 25.6943 28.0246 25.5004C29.1881 25.0156 30.0607 24.046 30.0607 22.7855C30.0607 22.2038 29.9638 21.719 29.7699 21.2342C30.5455 20.7494 31.2243 19.8767 31.2243 18.9071C31.2243 18.3254 30.9334 17.7436 30.6425 17.2588C31.4182 16.6771 31.9999 15.7075 31.9999 14.7379V14.7379ZM29.9638 14.7379C29.9638 15.9983 28.7033 16.0953 28.5094 16.6771C28.3155 17.3558 29.2851 17.5497 29.2851 18.7132C29.2851 19.8767 27.8307 19.8767 27.6368 20.5554C27.4428 21.3311 28.1216 21.525 28.1216 22.6886V22.8825C27.9276 23.8521 26.4732 23.949 26.1824 24.3369C25.8915 24.8217 26.1824 25.0156 26.1824 26.0821C26.1824 26.6639 25.5036 27.0517 24.728 27.0517H15.5168C14.7411 27.0517 13.9654 26.6639 12.9958 26.1791C12.2202 25.7913 11.4445 25.4034 10.6688 25.2095V15.0287C13.0928 13.1865 16.1955 10.4716 17.359 7.07806V6.88414L18.2317 2.03615C18.6195 1.93919 18.9104 1.93919 19.3952 1.93919C19.5891 1.93919 20.3648 3.10271 20.3648 6.78718C20.3648 8.24157 20.0739 9.79293 19.5891 11.6352H19.3952C18.8134 11.6352 18.4256 12.023 18.4256 12.6048C18.4256 13.1865 18.8134 13.5744 19.3952 13.5744H28.1216C29.0911 13.5744 29.9638 14.0592 29.9638 14.7379Z"
                                                    fill="black" />
                                                <path
                                                    d="M7.75677 29.0879H1.93919C0.872637 29.0879 0 28.2152 0 27.1487V13.5743C0 12.5078 0.872637 11.6351 1.93919 11.6351H7.75677C8.82333 11.6351 9.69597 12.5078 9.69597 13.5743V27.1487C9.69597 28.2152 8.82333 29.0879 7.75677 29.0879ZM1.93919 13.5743V27.1487H7.75677V13.5743H1.93919Z"
                                                    fill="black" />
                                            </svg>
                                        </a>
                                        <br>

                                        {{ isset($articleDetail->ArticleLikes) ? number_format($articleDetail->ArticleLikes->count(), 0) : 0 }}

                                    </p>
                                </div>
                                <div class="col-md-1 float-md-right mt-4">
                                    <p class="float-right font-weight-bold">
                                        <svg width="40" height="32" viewBox="0 0 40 32" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M15.7179 2.88466H15.5804C13.3346 2.88466 11.1884 3.31333 9.21757 4.0955L9.33542 4.05461C7.5373 4.71428 5.92154 5.79685 4.62253 7.2123L4.61468 7.22021C3.51627 8.37691 2.89071 9.9079 2.86257 11.5083V11.5149C2.87666 12.8014 3.29472 14.0503 4.05683 15.0828L4.04504 15.067C4.91488 16.2716 6.03127 17.2742 7.31879 18.007L7.36986 18.0334L9.53577 19.297L8.754 21.1858C9.25947 20.8859 9.72085 20.5936 10.1381 20.3087L11.1203 19.6122L12.3027 19.8365C13.3281 20.0343 14.5079 20.1491 15.7153 20.153H15.8554C18.1012 20.153 20.2475 19.7243 22.2183 18.9422L22.1004 18.9831C23.8985 18.3234 25.5143 17.2408 26.8133 15.8254L26.8212 15.8175C27.9041 14.7148 28.5733 13.1979 28.5733 11.5228C28.5733 9.84766 27.9041 8.33081 26.8212 7.22813C25.5421 5.82868 23.9529 4.7535 22.1829 4.09022L22.1004 4.06252C20.1018 3.27553 17.9738 2.87503 15.8279 2.88202H15.7101H15.7166L15.7179 2.88466ZM15.7179 0.00659501L15.9157 0.005276C18.6905 0.005276 21.3344 0.571128 23.7386 1.59599L23.6063 1.54587C25.8252 2.43237 27.7875 3.86601 29.3131 5.71523L29.3315 5.73897C30.6357 7.28748 31.4293 9.30819 31.4293 11.5162C31.4293 13.7242 30.6357 15.7462 29.321 17.3066L29.3315 17.2934C27.8268 19.1286 25.8921 20.5574 23.7019 21.4509L23.6063 21.4852C21.3331 22.46 18.6879 23.0271 15.913 23.0271L15.7074 23.0258H15.7179C14.3535 23.0227 12.9922 22.8951 11.6506 22.6446L11.7894 22.6657C9.95229 23.978 7.89338 24.9425 5.71335 25.5121L5.5824 25.5411C5.073 25.673 4.42218 25.7983 3.76088 25.8894L3.66398 25.8999H3.59719C3.42792 25.8979 3.26511 25.8341 3.13887 25.7205C2.99825 25.6022 2.90668 25.4352 2.88221 25.2523V25.2483C2.86719 25.2028 2.85967 25.1551 2.85995 25.1072V25.0993C2.85995 25.0492 2.86388 24.999 2.87173 24.9502L2.87042 24.9555C2.87894 24.9078 2.89438 24.8615 2.91626 24.8183L2.91495 24.821L2.96994 24.7075L3.04851 24.5835L3.13756 24.4701L3.24232 24.3567L3.33137 24.2512C3.40644 24.1615 3.57755 23.9742 3.84469 23.6893C4.11183 23.4044 4.3052 23.1832 4.4248 23.0258C4.5444 22.8684 4.71158 22.6512 4.92634 22.3742C5.12538 22.1223 5.31002 21.8387 5.46978 21.5393L5.48418 21.509C5.64045 21.2091 5.79322 20.8793 5.94251 20.5197C4.22624 19.5501 2.7481 18.2046 1.61723 16.5825L1.58973 16.5403C0.559801 15.069 0.00473146 13.3138 0 11.5136V11.5109C0.00629074 9.3912 0.752083 7.34115 2.10698 5.71919L2.0952 5.7337C3.59988 3.89854 5.53461 2.46971 7.72474 1.57621L7.82033 1.54191C10.0936 0.567171 12.7388 0 15.5136 0L15.7245 0.001319H15.714L15.7179 0.00659501ZM34.064 26.2877C34.2124 26.6473 34.3652 26.9771 34.5223 27.2769C34.6965 27.6067 34.8811 27.8903 35.0893 28.1541L35.0802 28.1422C35.2958 28.4192 35.463 28.6364 35.5817 28.7938C35.7004 28.9512 35.8938 29.1723 36.1618 29.4573C36.429 29.7386 36.6001 29.9259 36.6751 30.0191C36.69 30.0341 36.7197 30.0693 36.7642 30.1247C36.8087 30.1801 36.8436 30.2179 36.869 30.2381C36.9003 30.2725 36.9292 30.3091 36.9554 30.3476L36.958 30.3502C36.9857 30.3882 37.0111 30.4278 37.034 30.4689L37.0366 30.4742L37.0916 30.5876L37.1361 30.7222L37.1479 30.8673L37.1256 31.0124C37.0902 31.2058 36.9882 31.3805 36.8375 31.5057L36.8362 31.507C36.7683 31.5647 36.6897 31.6083 36.605 31.6353C36.5202 31.6622 36.431 31.672 36.3425 31.6639H36.3452C33.391 31.279 30.5801 30.1533 28.17 28.3902L28.221 28.4258C27.0412 28.6513 25.6832 28.7819 24.2951 28.7859H24.2925C20.5361 28.8806 16.8388 27.8311 13.6843 25.7746L13.7576 25.8194C14.621 25.8792 15.2757 25.9091 15.7219 25.9091H15.8096C18.2387 25.9091 20.5814 25.5398 22.7853 24.8526L22.6177 24.8975C24.7515 24.2624 26.7633 23.2683 28.568 21.9574L28.5104 21.997C30.2385 20.75 31.6845 19.1483 32.7532 17.2974L32.7912 17.2248C33.7769 15.487 34.2926 13.519 34.2866 11.5175C34.2866 10.2961 34.0994 9.11957 33.751 8.01557L33.7733 8.09735C35.5615 9.05467 37.1096 10.4097 38.3002 12.0596L38.3264 12.0979C39.4186 13.5974 40.0051 15.4099 40 17.2697C40.0029 19.0875 39.4426 20.8609 38.3971 22.3426L38.4155 22.3149C37.2936 23.9308 35.8287 25.2749 34.1269 26.2494L34.0614 26.2837L34.064 26.2877Z"
                                                fill="black" />
                                        </svg>
                                        <br>{{ $articleComments ? number_format($articleComments->count(), 0) : 0 }}
                                    </p>
                                </div>
                                <div class="col-md-2 mt-4">
                                    <a href="" data-toggle="modal" data-target="#shareArticle"
                                        class="btn btn-warning rounded border-2 text-black">
                                        Share
                                    </a>
                                </div>
                            </div>
                            @if (isset($detailTab) && $detailTab)
                                @foreach ($articleDetail->articleComments as $comment)
                                    <div class="d-flex align-items-center mx-4 my-2">
                                        <div
                                            class="d-none d-md-inline-flex symbol symbol-50 symbol-circle  mr-5 align-self-start align-self-xxl-start mt-2 shadow">
                                            <div class="symbol-label symbol-circle bg-light-primary text-primary font-weight-boldest"
                                                style="background-image: url(setting.png);">
                                                {{ var_export($comment->client->profile_photo_url) }}
                                            </div>
                                        </div>
                                        <div class="d-flex flex-column flex-grow-1 mt-4"
                                            style="background-color: #FFFFFF94">
                                            <div
                                                class="d-flex flex-column flex-md-row align-items-md-center mt-0 mb-1 justify-content-between rounded-2">
                                                <span class="font-weight-boldest font-size-12" style="color: black;">
                                                    {{ $comment->client->name }}
                                                </span>

                                            </div>
                                            <div class="p-4 shadow flex-grow-1 mt-3"
                                                style="border: solid 1px #F5841F;">
                                                <p class="mb-0">
                                                    {{ $comment->comment }}
                                                </p>
                                            </div>

                                        </div>


                                    </div>
                                @endforeach
                            @endif
                            <div class="row mt-3">
                                <div class="col-lg-9">
                                    <textarea class="form-control" rows="6" wire:model="comment" required=""></textarea>
                                    @error('comment')
                                        <div class="text-danger"> {{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-sm-2">
                                    <div
                                        class="d-none d-md-inline-flex symbol symbol-50 symbol-circle  mr-5 align-self-start align-self-xxl-start mt-2 shadow">
                                        <div class="symbol-label symbol-circle bg-light-primary text-primary font-weight-boldest"
                                            style="background-image: url({{ auth('client')->user()->profile_photo_url }});">

                                        </div>
                                    </div>
                                </div>
                            </div>
                            <br>
                            <div class="row">

                                <div class="col-sm-2"><button class="btn btn-info" type="button"
                                        wire:click="addArticleComment({{ $articleDetail->id }})">Comment</button>
                                </div>
                            </div>
                            <br>
                            <div class="row bottom-border">
                                <div class="col-lg-12" style="border-bottom: dashed 2px gray;"><b
                                        style="font-size: 17px; color:black; ">Related Articles</b>
                                </div>

                                <!--Start Single New Article-->
                                @foreach ($relatedArticles as $relatedArticle)
                                    <div class="col-xxl-6 col-md-6">

                                        <div
                                            class=" mb-7 p-4 min-h-150px  d-flex align-items-md-center flex-column flex-md-row">
                                            <!--begin::Symbol-->
                                            <div class="">
                                                <img class="w-md-125px w-100 h-125px object-cover align-self-start mr-md-2 rounded-lg shadow-sm" src="{{ asset('storage/public/articles/'.$relatedArticle->coverPicture) ? asset('storage/public/articles/'.$relatedArticle->coverPicture) :  asset('images/v2/black.PNG') }}" alt="Logo">
                                            </div>
                                            <!--end::Symbol-->
                                            <!--begin::Section-->
                                            <div class="d-flex flex-column flex-grow-1 justify-content-center ml-2">
                                                <!--begin::Title-->
                                                <a href="{{ url('client/news/detail/' . $relatedArticle->id) }}"
                                                    class="font-size-h5 text-hover-primary mb-1 ml-2"
                                                    style="color:#141414;">
                                                    {{ $relatedArticle->title }}
                                                </a>
                                                <!--end::Title-->
                                                <!--begin::Desc-->
                                                <span class="ml-2"
                                                    style="font-size: 12px; font-family: Roboto; color: #282828; ">
                                                    {{ $relatedArticle->heading }}
                                                </span>
                                                <!--begin::Desc-->
                                                <small
                                                    style="padding:5px; font-size: 13px; color: #141414; font-family: Roboto;">
                                                    {{ Carbon\Carbon::parse($relatedArticle->datePublished)->format('H:i ,dS M y') ?? '' }}</small>
                                                <div>

                                                </div>
                                                <!--end::Section-->
                                            </div>
                                        </div>
                                    </div>
                                    @if ($loop->even)
                                        <div class="col-lg-12" style="border-bottom: dashed 2px gray;"></div>
                                    @endif
                                @endforeach
                                <!--End Single New Article-->
                            </div>
                    </div>


                    <!----- share model --->
                    <div class="modal fade" id="shareArticle" role="dialog">
                        <div class="modal-dialog modal-dialog-centered modal-md">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">
                                        Share article on
                                    </h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>

                                <div class="modal-body text-center">
                                    <link rel="stylesheet"
                                        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"
                                        integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w=="
                                        crossorigin="anonymous" referrerpolicy="no-referrer" />
                                    <style>
                                        ul li {
                                            display: inline-block;
                                            padding: 9px 9px 9px;
                                        }

                                        .fab {

                                            color: #121B65
                                        }
                                    </style>
                                    {!! $socialShareLink !!}
                                </div>
                                <div class="modal-footer">

                                    <button type="button"
                                        class="btn btn-secondary text-capitalize font-weight-bolder rounded"
                                        data-dismiss="modal">
                                        Close</button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!----- share model --->


                </div>

                <!--end of news detail -->

                <div class="col-md-2"></div>
                @endif
            </div>
            <!--end Article Part 2-->
            </form>
        </div>
        <!-- end of newarticles articles -->



    </div>




</div>
</div>
</div>

</div>


</div>
