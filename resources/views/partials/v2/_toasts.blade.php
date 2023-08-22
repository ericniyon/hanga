@php
    $color='';
    $text='';

    if(session()->has('success')){
        $bg='green';
        $color='white';
        $text=session('success');
    }
    elseif (session()->has('error')){
        $bg='red';
        $color='white';
        $text=session('error');
    }
    elseif (session()->has('warning')){
        $bg='yellow';
        $color='gray-800';
        $text=session('warning');
    }
    elseif (session()->has('info')){
        $bg='purple';
         $color='white';
        $text=session('info');
    }


@endphp

<div class="tw-text-gray-500 tw-bg-red-500 tw-bg-green-500 tw-bg-yellow-500 tw-bg-purple-500 tw-text-white"></div>

@if(! empty($color) && ! empty($text))
    <div
            class="tw-mb-6 w-100 w-md-400px tw-bg-{{ $bg }}-500 tw-rounded-lg tw-pointer-events-auto tw-fixed tw-bottom-2  tw-right-2 tw-z-50"
            id="toast-notification">
        <div class="tw-rounded-lg tw-shadow tw-overflow-hidden">
            <div class="tw-p-4">
                <div class="tw-flex tw-items-start">
                    <div class=" tw-flex-shrink-0 tw-text-{{ $color }}">
                        @if(session()->has('success'))
                            <svg class="tw-h-6 tw-w-6" fill="none" viewBox="0 0 24 24"
                                 stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                      d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                        @elseif(session()->has('error'))
                            <svg xmlns="http://www.w3.org/2000/svg" class="tw-h-6 tw-w-6" fill="none"
                                 viewBox="0 0 24 24"
                                 stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                      d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"/>
                            </svg>
                        @else
                            <svg xmlns="http://www.w3.org/2000/svg" class="tw-h-6 tw-w-6" fill="none"
                                 viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                      d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                            </svg>
                        @endif
                    </div>
                    <div class="tw-ml-3 tw-w-0 tw-flex-1 tw-pt-0.5">
                        <p class=" tw-leading-5 tw-font-medium tw-text-{{ $color }} tw-mb-0">
                            {{ $text }}
                        </p>
                    </div>
                    <div class="tw-ml-4 tw-flex-shrink-0 tw-flex">
                        <button wire:click="$set('saved', false)" type="button"
                                class="tw-inline-flex tw-text-{{ $color }} focus:tw-outline-none focus:tw-text-{{$color}} tw-transition tw-ease-in-out tw-duration-150 tw-border-0 tw-bg-transparent"
                                id="close-toast">
                            <svg class="tw-h-5 tw-w-5" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd"
                                      d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                      clip-rule="evenodd"></path>
                            </svg>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endif

