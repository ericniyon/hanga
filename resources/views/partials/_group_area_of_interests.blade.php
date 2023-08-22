<h4>{{ __('app.area_of_interest') }}</h4>
<div class="row">
    @foreach($registrationTypes as $type)
        <div class="col-md-4 my-1">
            <span class="d-block font-weight-bolder">{{ $type->description??$type->name }}</span>
            @foreach($type->categories as $category)
                <div class="my-1">
                    <label class="checkbox checkbox-info">
                        <input type="checkbox"
                               {{ is_null(selectedFor($selected_interests,$type->id,$category->id)) ? '' : 'checked'}} name="interests_id[]"
                               value="{{$type->id}},{{$category->id}}"
                               id="interests_id{{$type->id}}{{$category->id}}">
                        {{$category->name}}
                        <span class="rounded-0"></span>
                    </label>
                </div>
            @endforeach
        </div>
    @endforeach
</div>
