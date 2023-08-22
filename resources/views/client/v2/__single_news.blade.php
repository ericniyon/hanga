@extends('client.v2.layout.app')

@section('title', 'News')
@section('styles')
    @livewireStyles
@endsection
@section('content')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"
        integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
        h3 {

            padding: 0px !important;
            line-height: 30px !important;
            text-align: justify !important;
            font-size: 14px !important;
            color: #464e5f !important
        }

        ul li {
            display: inline-block;
            padding: 5px 5px 5px;
        }

        .fab {

            color: #121B65
        }

        #social-links {
            float: left;
        }
    </style>


    @if (Auth::guard('client')->check())
        @include('partials.includes._home_nav')
    @endif


    <div class="container my-5" style="padding-top: 5em">

        <div class="row ">

            <div class="col-md-9">
                <h1 class="" style="font-size: 3rem; font-weight: bold">
                    {{ $article->title }}
                </h1>

                <div class="">
                    <img src="{{ asset('/storage/articles/' . $article->coverPicture) }}" alt="" srcset="">
                </div>

                <p>{!! $article->content !!}</p>

                <div style="display: inline-flex; justify-content: start; margin-bottom: 1.5rem; margin-top: 1rem">
                    <div class="" style="justify-content: start; margin-top: .3rem">Share:</div>
                    <div class="" style="justify-content: start">
                        {!! $socialShareLink !!}
                    </div>
                </div>



                {{-- <div class=" h-20px mb-2">
                    <div wire:loading class="w-100 h-100">
                        <div class="h-100 w-100 d-flex  align-items-center ">
                            <div> {{ __('app.Please wait') }}... &nbsp;</div>
                            <img src="{{ asset('assets/loader.svg') }}" alt="" class="h-50px">
                        </div>
                    </div>
                </div> --}}


            </div>

        </div>

        <div class="row">

            <h1 style="font-weight: bold; font-size: 2rem; border-bottom: .2rem solid #F55C0C">MORE STORIES</h1>
        </div>
        <div class="row">

            @forelse (\App\Models\Article::where('id','!=',$article->id)->get() as $__article)
                <div class="col-md-3">
                    <div class="card" style="border: 0px ">
                        <img src="{{ asset('/storage/articles/' . $__article->coverPicture) }}" alt="Article Image"
                            srcset="">


                        <a href="{{ route('v2.single_news', encryptId($__article->id)) }}">
                            <h1 style="font-size: 1.5rem; font-weight: 700">{{ Str::limit($__article->title, 50, '...') }}
                            </h1>

                        </a>
                    </div>
                </div>
            @empty
            @endforelse


        </div>


    @stop

    @push('scripts')
        @livewireScripts
    @endpush
