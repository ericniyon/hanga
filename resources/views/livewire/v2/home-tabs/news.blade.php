<div class="row">
       <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.css" rel="stylesheet">

    <div class="col-12 h-20px">
        <div wire:loading class="w-100 h-100">
            <div class="h-100 w-100 d-flex  align-items-center justify-item->-center">
                <div>{{ __('app.Please wait') }}... &nbsp;</div>
                <img src="{{ asset('assets/loader.svg') }}" alt="" class="h-30px">
            </div>
        </div>
    </div>

    <div class="col-lg-3" x-data="{ open: true }">
        @include('partials.v2._filter_by_title')
        <div class="accordion accordion-light accordion-light-borderless accordion-svg-toggle" id="accordion1">
            

            <div class="card bg-light-light shadow-none rounded-0 my-2 border overflow-hidden">
                <div class="card-header">
                    <div class="card-title collapsed pr-3" data-toggle="collapse" data-target="#collapse3">
                        <div class="card-label pl-4">
                            <span class="svg-icon">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M14 10l-2 1m0 0l-2-1m2 1v2.5M20 7l-2 1m2-1l-2-1m2 1v2.5M14 4l-2-1-2 1M4 7l2-1M4 7l2 1M4 7v2.5M12 21l-2-1m2 1l2-1m-2 1v-2.5M6 18l-2-1v-2.5M18 18l2-1v-2.5" />
                                </svg>
                            </span>
                            {{ __('News Categories') }}
                        </div>
                        <span class="svg-icon svg-icon-primary">
                            @include('partials.icons._sort')
                        </span>
                    </div>
                </div>
                <div id="collapse3" class="collapse " data-parent="#accordion1">
                    <div class="card-body p-2 bg-white ">
                        {{-- <div class="p-2">
                             <input type="text" class="form-control form-control-sm"
                                    placeholder="Filter business sector" title="Filter business sector">
                         </div> --}}
                        <div class="p-2">
                            <div class="checkbox-list">
                                {{-- @foreach ($businessSectors as $businessSector)
                                    <label class="checkbox checkbox-info">
                                        <input type="checkbox" value="{{ $businessSector->id }}"
                                               wire:model="selectedBusinessSectors"
                                               wire:key="selectedBusinessSectors_{{ $businessSector->id }}"
                                               class="check-services">
                                        {{ $businessSector->nameLocale }}
                                        <span class="rounded-sm"></span>
                                    </label>
                                @endforeach --}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>


        </div>
    </div>

    <div class="col-lg-9">
        @if ($NewsDetailed == false)
            <div class="row  justify-content-center mb-5">

                <div class="col-md-12 " style="justify-content: center">
                    @foreach(\App\Models\FeatureContent::where('tab','News')->get() as $key=>$content)
                {!! $content->content !!}
                @endforeach
                </div>
            </div>

            <div class="row my-4 justify-content-center">
                <div class="col-12">
                    <x-search-input wire:model.debounce.500ms="search" />
                </div>
            </div>
        @endif
        <div class="row">

            {{-- <livewire:v2.news-tabs/> --}}

            @if ($NewsDetailed == false)
                @foreach ($news as $item)
                    <div class="col-md-6">
                        <div class="col-lg-12">
                            <style>
                                p {
                                    font-size: 14px !important;
                                    margin-left: 2rem;
                                    text-align: justify
                                }
                                h3{
                                    padding: 10px 15px !important;
                                    line-height: 30px !important;
                                    text-align: justify !important;
                                    font-size: 14px!important;
                                    color: #464e5f !important
                                }
                                h3 span{
                                    padding:5rem !important
                                }
                            </style>
                            <!-- myarticles articles -->
                            <div style="display: block"
                                class="mt-2 flex-column flex-md-row align-items-center mb-9 card tw-rounded-lg  border-0 overflow-hidden tw-p-4 tw-shadow">
                                <div class="row bottom-border">


                                    <div class="col-md-4">
                                        <img class="w-md-150px w-100 h-150px object-cover align-self-start mr-md-2 rounded-lg shadow-sm mr-1"
                                            src="{{ asset('/storage/articles/'.$item->coverPicture) }}"
                                            alt="Logo">


                                    </div>

                                    <div class="col-md-8">
                                        @if (auth('client')->check())
                                            <a href="{{ route('client.news-details', encryptId($item->id)) }}"
                                                class="font-size-h5 text-hover-primary  font-bold"
                                                style="color:#141414;">
                                                <h5 style="font-weight: 900; font-size:1.5rem; margin-left: 2.5rem; word-spacing: 1.5px">
                                                    {{ $item->title }}
                                                </h5>
                                            </a>
                                        @else
                                            <a href="{{ route('v2.single_news',encryptId($item->id)) }}"
                                                class="font-size-h5 text-hover-primary  font-bold"
                                                style="color:#141414;">
                                                <h5 style="font-weight: 900; font-size:1.5rem; margin-left: 2.5rem; word-spacing: 1.5px">
                                                    {{ $item->title }}
                                                </h5>
                                            </a>


                                        @endif
                                        <div  style="font-weight: 200; font-size:1rem; margin-left: 2.5rem;margin-top:1rem">
                                            {{ $item->created_at->format('F d Y') }}
                                        </div>
                                    </div>
                                    {!! Str::limit($item->content, 500) !!}

                                    <a  href="{{ route('v2.single_news',encryptId($item->id)) }}">Read More</a>
                                </div>

                            </div>
                            <!-- end of myarticles articles -->

                        </div>

                    </div>
                @endforeach
            @else
                <!-- news detail -->
                <div class="col-md-12">
                    <div style="display: ">
                        <div class="mx-4 my-4">
                            <a href="http://127.0.0.1:8000/client/news">
                                <p style="color: black;"> <i class="fa fa-arrow-left" aria-hidden="true"></i> Take Me
                                    Back</p>
                            </a>

                            <div style="background-color: #F6F6F6;" class="mt-3">
                                <div class="row">
                                    <div class="col-sm-9 col-xxl-9 py-4">
                                        <h3 class="ml-2 text-md-auto">
                                            <strong>{{ $newsTitle }}</strong>
                                        </h3>
                                    </div>
                                    <div class="col-sm-3 col-xxl-9 my-4">
                                        <div style="float: right;" class="mr-4">
                                            <a href="#" title="Add article to my favourite"
                                                wire:click="addArticleToFafourite()">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                    fill="currentColor" class="bi bi-bookmark" viewBox="0 0 16 16">
                                                    <path
                                                        d="M2 2a2 2 0 0 1 2-2h8a2 2 0 0 1 2 2v13.5a.5.5 0 0 1-.777.416L8 13.101l-5.223 2.815A.5.5 0 0 1 2 15.5V2zm2-1a1 1 0 0 0-1 1v12.566l4.723-2.482a.5.5 0 0 1 .554 0L13 14.566V2a1 1 0 0 0-1-1H4z" />
                                                </svg>

                                            </a><br>
                                            <a href="#" title="Read article later"
                                                wire:click="addArticleToread()">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                    fill="currentColor" class="bi bi-star" viewBox="0 0 16 16">
                                                    <path
                                                        d="M2.866 14.85c-.078.444.36.791.746.593l4.39-2.256 4.389 2.256c.386.198.824-.149.746-.592l-.83-4.73 3.522-3.356c.33-.314.16-.888-.282-.95l-4.898-.696L8.465.792a.513.513 0 0 0-.927 0L5.354 5.12l-4.898.696c-.441.062-.612.636-.283.95l3.523 3.356-.83 4.73zm4.905-2.767-3.686 1.894.694-3.957a.565.565 0 0 0-.163-.505L1.71 6.745l4.052-.576a.525.525 0 0 0 .393-.288L8 2.223l1.847 3.658a.525.525 0 0 0 .393.288l4.052.575-2.906 2.77a.565.565 0 0 0-.163.506l.694 3.957-3.686-1.894a.503.503 0 0 0-.461 0z" />
                                                </svg>

                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row mx-2 my-2">
                                <div class="col-md-12 mt-5">
                                    <p>
                                        {!! $newsDescription !!}
                                    </p>
                                </div>
                            </div>
                            <div class="row bg-white mx-2 my-2">
                                <div class="col-md-8 mt-4">
                                    <p> Created on: {{ $createdAt }}
                                    </p>
                                    {{-- <p class="btn btn-primary" wire:click='comment'><strong>
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                fill="currentColor" class="bi bi-yelp" viewBox="0 0 16 16">
                                                <path
                                                    d="m4.188 10.095.736-.17a.824.824 0 0 0 .073-.02.813.813 0 0 0 .453-1.255 1.025 1.025 0 0 0-.3-.258 2.782 2.782 0 0 0-.428-.198l-.808-.295a76.035 76.035 0 0 0-1.364-.493C2.253 7.3 2 7.208 1.783 7.14c-.041-.013-.087-.025-.124-.038a2.143 2.143 0 0 0-.606-.116.723.723 0 0 0-.572.245 1.625 1.625 0 0 0-.105.132 1.555 1.555 0 0 0-.155.309c-.15.443-.225.908-.22 1.376.002.423.013.966.246 1.334a.785.785 0 0 0 .22.24c.166.114.333.129.507.141.26.019.513-.045.764-.103l2.447-.566.003.001Zm8.219-3.911a4.185 4.185 0 0 0-.8-1.14 1.602 1.602 0 0 0-.275-.21 1.591 1.591 0 0 0-.15-.073.723.723 0 0 0-.621.031c-.142.07-.294.182-.496.37-.028.028-.063.06-.094.089-.167.156-.353.35-.574.575-.34.345-.677.691-1.01 1.042l-.598.62a2.79 2.79 0 0 0-.298.365 1 1 0 0 0-.157.364.813.813 0 0 0 .007.301c0 .005.002.009.003.013a.812.812 0 0 0 .945.616.774.774 0 0 0 .074-.014l3.185-.736c.251-.058.506-.112.732-.242.151-.088.295-.175.394-.35a.787.787 0 0 0 .093-.313c.05-.434-.178-.927-.36-1.308ZM6.706 7.523c.23-.29.23-.722.25-1.075.07-1.181.143-2.362.201-3.543.022-.448.07-.89.044-1.34-.022-.372-.025-.799-.26-1.104C6.528-.077 5.644-.033 5.04.05c-.185.025-.37.06-.553.104a7.589 7.589 0 0 0-.543.149c-.58.19-1.393.537-1.53 1.204-.078.377.106.763.249 1.107.173.417.41.792.625 1.185.57 1.036 1.15 2.066 1.728 3.097.172.308.36.697.695.857.022.01.045.018.068.025.15.057.313.068.469.032l.028-.007a.809.809 0 0 0 .377-.226.732.732 0 0 0 .053-.055Zm-.276 3.161a.737.737 0 0 0-.923-.234.976.976 0 0 0-.145.09 1.909 1.909 0 0 0-.346.354c-.026.033-.05.077-.08.104l-.512.705c-.29.395-.577.791-.861 1.193-.185.26-.346.479-.472.673l-.072.11c-.152.235-.238.406-.282.559a.73.73 0 0 0-.03.314c.013.11.05.217.108.312.031.047.064.093.1.138a1.548 1.548 0 0 0 .257.237 4.482 4.482 0 0 0 2.196.76 1.593 1.593 0 0 0 .349-.027 1.57 1.57 0 0 0 .163-.048.797.797 0 0 0 .278-.178.731.731 0 0 0 .17-.266c.059-.147.098-.335.123-.613l.012-.13c.02-.231.03-.502.045-.821.025-.49.044-.98.06-1.469l.033-.87a2.09 2.09 0 0 0-.055-.623.93.93 0 0 0-.117-.27Zm5.783 1.362a2.199 2.199 0 0 0-.498-.378l-.112-.067c-.199-.12-.438-.246-.719-.398-.43-.236-.86-.466-1.295-.695l-.767-.407c-.04-.012-.08-.04-.118-.059a1.908 1.908 0 0 0-.466-.166.993.993 0 0 0-.17-.018.738.738 0 0 0-.725.616.946.946 0 0 0 .01.293c.038.204.13.406.224.583l.41.768c.228.434.459.864.696 1.294.152.28.28.52.398.719.023.037.048.077.068.112.145.239.261.39.379.497a.73.73 0 0 0 .596.201 1.55 1.55 0 0 0 .168-.029 1.584 1.584 0 0 0 .325-.129 4.06 4.06 0 0 0 .855-.64c.306-.3.577-.63.788-1.006.03-.053.055-.109.076-.165a1.58 1.58 0 0 0 .051-.161c.013-.056.022-.111.029-.168a.792.792 0 0 0-.038-.327.73.73 0 0 0-.165-.27Z" />
                                            </svg>
                                            Give a
                                            comment</strong></p> --}}
                                </div>
                                <div class="col-md-3 mt-4 flex" style="display: flex; justify-content: end">
                                    <p class="float-right text-muted mr-3">
                                        {{-- <a href="#" wire:click="addArticleLike()">

                                        </a> --}}
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                            fill="currentColor" class="bi bi-hand-thumbs-up" viewBox="0 0 16 16">
                                            <path
                                                d="M8.864.046C7.908-.193 7.02.53 6.956 1.466c-.072 1.051-.23 2.016-.428 2.59-.125.36-.479 1.013-1.04 1.639-.557.623-1.282 1.178-2.131 1.41C2.685 7.288 2 7.87 2 8.72v4.001c0 .845.682 1.464 1.448 1.545 1.07.114 1.564.415 2.068.723l.048.03c.272.165.578.348.97.484.397.136.861.217 1.466.217h3.5c.937 0 1.599-.477 1.934-1.064a1.86 1.86 0 0 0 .254-.912c0-.152-.023-.312-.077-.464.201-.263.38-.578.488-.901.11-.33.172-.762.004-1.149.069-.13.12-.269.159-.403.077-.27.113-.568.113-.857 0-.288-.036-.585-.113-.856a2.144 2.144 0 0 0-.138-.362 1.9 1.9 0 0 0 .234-1.734c-.206-.592-.682-1.1-1.2-1.272-.847-.282-1.803-.276-2.516-.211a9.84 9.84 0 0 0-.443.05 9.365 9.365 0 0 0-.062-4.509A1.38 1.38 0 0 0 9.125.111L8.864.046zM11.5 14.721H8c-.51 0-.863-.069-1.14-.164-.281-.097-.506-.228-.776-.393l-.04-.024c-.555-.339-1.198-.731-2.49-.868-.333-.036-.554-.29-.554-.55V8.72c0-.254.226-.543.62-.65 1.095-.3 1.977-.996 2.614-1.708.635-.71 1.064-1.475 1.238-1.978.243-.7.407-1.768.482-2.85.025-.362.36-.594.667-.518l.262.066c.16.04.258.143.288.255a8.34 8.34 0 0 1-.145 4.725.5.5 0 0 0 .595.644l.003-.001.014-.003.058-.014a8.908 8.908 0 0 1 1.036-.157c.663-.06 1.457-.054 2.11.164.175.058.45.3.57.65.107.308.087.67-.266 1.022l-.353.353.353.354c.043.043.105.141.154.315.048.167.075.37.075.581 0 .212-.027.414-.075.582-.05.174-.111.272-.154.315l-.353.353.353.354c.047.047.109.177.005.488a2.224 2.224 0 0 1-.505.805l-.353.353.353.354c.006.005.041.05.041.17a.866.866 0 0 1-.121.416c-.165.288-.503.56-1.066.56z" />
                                        </svg>


                                        1

                                    </p>
                                    <p class="float-right font-weight-bold ml-3">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                            fill="currentColor" class="bi bi-chat-dots" viewBox="0 0 16 16">
                                            <path
                                                d="M5 8a1 1 0 1 1-2 0 1 1 0 0 1 2 0zm4 0a1 1 0 1 1-2 0 1 1 0 0 1 2 0zm3 1a1 1 0 1 0 0-2 1 1 0 0 0 0 2z" />
                                            <path
                                                d="m2.165 15.803.02-.004c1.83-.363 2.948-.842 3.468-1.105A9.06 9.06 0 0 0 8 15c4.418 0 8-3.134 8-7s-3.582-7-8-7-8 3.134-8 7c0 1.76.743 3.37 1.97 4.6a10.437 10.437 0 0 1-.524 2.318l-.003.011a10.722 10.722 0 0 1-.244.637c-.079.186.074.394.273.362a21.673 21.673 0 0 0 .693-.125zm.8-3.108a1 1 0 0 0-.287-.801C1.618 10.83 1 9.468 1 8c0-3.192 3.004-6 7-6s7 2.808 7 6c0 3.193-3.004 6-7 6a8.06 8.06 0 0 1-2.088-.272 1 1 0 0 0-.711.074c-.387.196-1.24.57-2.634.893a10.97 10.97 0 0 0 .398-2z" />
                                        </svg> <br>

                                    </p>
                                    <p class="float-right font-weight-bold ml-3">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                            fill="currentColor" class="bi bi-share" viewBox="0 0 16 16">
                                            <path
                                                d="M13.5 1a1.5 1.5 0 1 0 0 3 1.5 1.5 0 0 0 0-3zM11 2.5a2.5 2.5 0 1 1 .603 1.628l-6.718 3.12a2.499 2.499 0 0 1 0 1.504l6.718 3.12a2.5 2.5 0 1 1-.488.876l-6.718-3.12a2.5 2.5 0 1 1 0-3.256l6.718-3.12A2.5 2.5 0 0 1 11 2.5zm-8.5 4a1.5 1.5 0 1 0 0 3 1.5 1.5 0 0 0 0-3zm11 5.5a1.5 1.5 0 1 0 0 3 1.5 1.5 0 0 0 0-3z" />
                                        </svg> <br>

                                    </p>
                                </div>

                            </div>



                            @if ($GiveComment == true)
                                <div class="row mt-3">
                                    <div class="col-lg-12 col-md-12">
                                        <textarea class="form-control summernote" id="summernote" rows="6" wire:model="comment" required=""></textarea>
                                    </div>
                                    <div class="col-sm-2">
                                        <div
                                            class="d-none d-md-inline-flex symbol symbol-50 symbol-circle  mr-5 align-self-start align-self-xxl-start mt-2 shadow">

                                        </div>
                                    </div>
                                </div>
                            @endif
                            <br>
                            <div class="row">


                            </div>
                            <br>
                            {{-- <div class="row bottom-border">
                                <div class="col-lg-12" style="border-bottom: dashed 2px gray;"><b
                                        style="font-size: 17px; color:black; ">Related Articles</b>
                                </div>
                            </div> --}}
                        </div>

                    </div>
                </div>
            @endif
            <div class="h-2 tw-bg-slate-500"></div>
        </div>

        {{-- @include('partials.includes._pagination',['paginator'=>$clients]) --}}
    </div>

</div>
