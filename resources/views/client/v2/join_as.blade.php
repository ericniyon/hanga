@extends('client.v2.layout.app')

@section('title', 'Join as')

@section('content')
    <div class="container">
        <div class="h-75px bg-light-light w-100 rounded-lg mb-3">

        </div>
        <div class="row justify-content-center  mb-10 mt-n10">
            <div class="col-md-6 col-xl-5">
                <div class="card shadow border-0 rounded-lg">
                    <div class="card-body">
                        <h1 class="display-3 text-center mb-4">
                            {{ __('app.Join As') }}
                        </h1>
                        <form action="">
                            <div class="d-flex flex-column">
                                @foreach (\App\Models\RegistrationType::query()->orderBy('id')->get() as $item)
                                    <div class="d-flex flex-column my-5">
                                        <a href="{{ route('client.apply.now', ['type' => $item->name]) }}"
                                            class="btn btn-outline-primary border-2 text-hover-white rounded-lg">
                                            @if ($item->name == 'DSP')
                                                Tech Business
                                            @elseif ($item->name == 'MSME')
                                                Busines Directory
                                            @elseif ($item->name == 'STARTUP')
                                                Startup
                                            @else
                                                {{ __('app.' . $item->name) }}
                                            @endif
                                        </a>
                                        <p class="text-center text-dark-75 mt-3">
                                            {{ $item->description }}
                                        </p>
                                    </div>
                                @endforeach


                                <div class="d-flex  my-5 justify-content-center">
                                    <span class="mr-3">
                                        {{ __('app.Want to complete later') }}?
                                    </span>
                                    <a href="{{ route('v2.home') }}" class="font-weight-bolder text-info">
                                        {{ __('app.Skip to homepage') }}
                                        <sapn class="svg-icon">
                                            <svg width="20" height="20" viewBox="0 0 20 20" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M10 0C4.47715 0 0 4.47715 0 10C0 15.5229 4.47715 20 10 20C15.5229 20 20 15.5229 20 10C20 4.47715 15.5229 0 10 0ZM10 4.60815L14.8828 8.40332V15.3919H11.5234V11.1731H8.47657V15.3919H5.11718V8.40332L10 4.60815Z"
                                                    fill="#2A337E" />
                                            </svg>

                                        </sapn>
                                    </a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop


@section('scripts')
    <script>
        // without  using jQuery js find the sibling input and set it to checked


        $('.js-registration-type').on('click', function() {

            $(this).siblings('input[type="radio"]').prop('checked', true);

            $('.js-registration-type').removeClass('btn-primary').addClass('btn-outline-primary');

            $(this).removeClass('btn-outline-primary').addClass('btn-primary');

        });
    </script>
@stop
