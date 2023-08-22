<div>
    @forelse($reviews as $item)
        <div class="d-flex align-items-center my-5">
            <div
                    class="d-none d-md-inline-flex symbol symbol-50 symbol-circle  mr-5 align-self-start align-self-xxl-start mt-2 shadow">
                <div class="symbol-label symbol-circle bg-light-primary text-primary font-weight-boldest"
                     style="background-image: url('{{ $item->doneBy->profile_photo_url }}')">

                </div>
            </div>
            <div class="d-flex flex-column flex-grow-1">
                <div class="d-flex flex-column flex-md-row align-items-md-center mt-0 mb-1 justify-content-between">
                    <span class="font-weight-boldest font-size-h4">
                        {{ $item->doneBy->name }}
                    </span>
                    <span class="text-muted font-size-sm rating-star">
                       @include('partials.includes._rating_starts',['average'=>$item->rating])
                        {{ optional($item->created_at)->locale("en")->diffForHumans() }}
                    </span>
                </div>


                <div
                        class="my-1  border-0 p-4  rounded-lg bg-light-light shadow flex-grow-1">
                    <p class="mb-0">
                        {{ $item->comment??__("app.No comment given") }}.
                    </p>
                </div>
            </div>
        </div>
    @empty
        <div class="alert alert-light-warning alert-custom my-5">
            <div class="font-weight-bolder">
                {{ __("app.No reviews yet") }}.
            </div>
        </div>
    @endforelse
    <div class="row">
        <div class="col-md-12">
            <div class="custom-pagination">
                @include('partials.includes._pagination', ['paginator' => $reviews])
            </div>
        </div>

    </div>
</div>
