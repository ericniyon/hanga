<div class="row">
    <div class="col-12 h-20px mb-2">
        <div wire:loading class="w-100 h-100">
            <div class="h-100 w-100 d-flex  align-items-center justify-content-center">
                <div>{{ __('app.Please wait') }}... &nbsp;</div>
                <img src="{{ asset('assets/loader.svg') }}" alt="" class="h-30px">
            </div>
        </div>
    </div>



    <div class="col-lg-3">
        @include('partials.v2._filter_by_title')
        @foreach ($opportunityTypes as $opportunityType)
            <div
                class="bg-light-light shadow-none rounded mb-2 p-3 bg-hover-light-secondary d-flex justify-content-between align-items-start">
                <label for="job_{{ $opportunityType->id }}" class="mb-0 h5">
                    <span class="svg-icon">
                        <svg width="21" height="21" viewBox="0 0 21 21" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M16.625 3.0625H4.375C3.89375 3.0625 3.5 3.45625 3.5 3.9375V6.5625C3.5 7.04375 3.89375 7.4375 4.375 7.4375H16.625C17.1063 7.4375 17.5 7.04375 17.5 6.5625V3.9375C17.5 3.45625 17.1063 3.0625 16.625 3.0625Z"
                                fill="#2A337E" />
                            <path
                                d="M16.625 8.3125H4.375C3.89375 8.3125 3.5 8.70625 3.5 9.1875V11.8125C3.5 12.2938 3.89375 12.6875 4.375 12.6875H16.625C17.1063 12.6875 17.5 12.2938 17.5 11.8125V9.1875C17.5 8.70625 17.1063 8.3125 16.625 8.3125Z"
                                fill="#2A337E" />
                            <path
                                d="M16.625 13.5625H4.375C3.89375 13.5625 3.5 13.9562 3.5 14.4375V17.0625C3.5 17.5438 3.89375 17.9375 4.375 17.9375H16.625C17.1063 17.9375 17.5 17.5438 17.5 17.0625V14.4375C17.5 13.9562 17.1063 13.5625 16.625 13.5625Z"
                                fill="#2A337E" />
                            <path
                                d="M19.7751 16.6687C19.8188 16.4937 19.8188 16.3187 19.8188 16.1875C19.8188 16.0563 19.8188 15.8375 19.7751 15.7063L20.7813 14.9625C20.8688 14.875 20.9126 14.7438 20.8688 14.6562L19.8626 12.95C19.8188 12.8625 19.6876 12.8187 19.5563 12.8625L18.4188 13.3875C18.1563 13.1688 17.8501 12.9937 17.5438 12.8625L17.4126 11.5938C17.4126 11.4625 17.2813 11.375 17.1938 11.375H15.2251C15.0938 11.375 15.0063 11.4625 15.0063 11.5938L14.8751 12.8625C14.5688 12.9937 14.2626 13.1688 14.0001 13.3875L12.8626 12.8625C12.7313 12.8187 12.6001 12.8625 12.5563 12.95L11.5501 14.6562C11.5063 14.7438 11.5063 14.9188 11.6376 14.9625L12.6438 15.7063C12.6001 15.8813 12.6001 16.0563 12.6001 16.1875C12.6001 16.3187 12.6001 16.5375 12.6438 16.6687L11.6376 17.4125C11.5501 17.5 11.5063 17.6312 11.5501 17.7188L12.5563 19.425C12.6001 19.5125 12.7313 19.5562 12.8626 19.5125L14.0001 18.9875C14.2626 19.2063 14.5688 19.3812 14.8751 19.5125L15.0063 20.7812C15.0063 20.9125 15.1376 21 15.2251 21H17.1938C17.3251 21 17.4126 20.9125 17.4126 20.7812L17.5438 19.5125C17.8501 19.3812 18.1563 19.2063 18.4188 18.9875L19.5563 19.5125C19.6876 19.5562 19.8188 19.5125 19.8626 19.425L20.8688 17.7188C20.9126 17.6312 20.9126 17.4562 20.7813 17.4125L19.7751 16.6687ZM16.1876 18.4625C14.9188 18.4625 13.9126 17.4563 13.9126 16.1875C13.9126 14.9188 14.9188 13.9125 16.1876 13.9125C17.4563 13.9125 18.4626 14.9188 18.4626 16.1875C18.4626 17.4563 17.4563 18.4625 16.1876 18.4625Z"
                                fill="#F34D10" />
                            <path
                                d="M16.1875 13.5625C14.7437 13.5625 13.5625 14.7437 13.5625 16.1875C13.5625 17.6312 14.7437 18.8125 16.1875 18.8125C17.6312 18.8125 18.8125 17.6312 18.8125 16.1875C18.8125 14.7437 17.6312 13.5625 16.1875 13.5625ZM16.1875 17.5C15.4438 17.5 14.875 16.9313 14.875 16.1875C14.875 15.4438 15.4438 14.875 16.1875 14.875C16.9313 14.875 17.5 15.4438 17.5 16.1875C17.5 16.9313 16.9313 17.5 16.1875 17.5Z"
                                fill="#EA8124" />
                        </svg>


                    </span>
                    {{ $opportunityType->name }}</label>
                <label class="checkbox checkbox-info">
                    <input type="checkbox" value="{{ $opportunityType->id }}" wire:model="selectedOpportunityTypes"
                        id="job_{{ $opportunityType->id }}" />
                    <span class="border-info rounded-sm border-2"></span>
                </label>
            </div>
        @endforeach
    </div>
    <div class="col-lg-9">
        <div class="row  justify-content-center mb-5">

            <div class="col-md-12 " style="justify-content: center">
                @foreach(\App\Models\FeatureContent::where('tab','Opportunities')->get() as $key=>$content)
                {!! $content->content !!}
                @endforeach
            </div>
        </div>
        <div class="row mb-4 justify-content-center">
            <div class="col-12">
                <x-search-input wire:model.debounce.500ms="search" />
            </div>
        </div>
        @foreach ($opportunities as $item)
            @include('partials.v2._opportunity_item')
        @endforeach
        @include('partials.includes._pagination', ['paginator' => $opportunities])



    </div>
</div>
