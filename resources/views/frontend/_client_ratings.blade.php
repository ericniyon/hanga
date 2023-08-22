@foreach($ratings as $item)
    <div class="mt-3">
        <div>
            <div class="d-flex align-items-center">
                <div class="symbol symbol-40 symbol-circle symbol-40">
                    <div class="symbol-label border-light border border-2" style="background-image:url({{$item->doneBy->profilePhotoUrl??''}}),url({{$item->doneBy->defaultPhotoUrl??''}})"></div>
                </div>
                <div class="flex-grow-1 ml-2">
                    <a href="{{route('client.details',$item->doneBy->name_slug??'')}}" class="font-weight-bolder text-dark-75 text-hover-primary font-size-lg mb-1">{{$item->doneBy->name??''}}</a>
                </div>
            </div>
        </div>

        <div style="margin-top: 0;">
            @for($i=1;$i<=5;$i++)
                <span class="{{$item->rating >=$i?'bi bi-star-fill text-primary':'bi bi-star'}}"></span>
            @endfor
            <span class="font-weight-bolder ml-2">{{optional($item->created_at)->format("Y/m/d")}}</span>
        </div>
        <div>{{$item->comment}}</div>
    </div>
@endforeach
