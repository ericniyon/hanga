<h6>{{__('app.area_of_interest')}}</h6>
<div class="row">
    @foreach($registrationTypes as $type)
        <div class="col-md-4 my-1">
            <span class="d-block">{{ $type->name }}</span>
            @php
                $noData=true;
            @endphp
            @foreach($type->categories as $category)
                <div class="my-1">
                    @if(!is_null(selectedFor($selected_interests,$type->id,$category->id)))
                        <span
                            class="badge badge-secondary rounded-pill my-1">{{ $category->name }}</span>
                        @php
                            $noData=false;
                        @endphp
                    @endif
                </div>
            @endforeach
            @if($noData)
                <div class="my-">
                    <span class="label label-inline label-light-danger rounded-pill">None</span>
                </div>
            @endif
        </div>
    @endforeach
</div>
