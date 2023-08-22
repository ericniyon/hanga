<div class="card card-body gutter-b rounded  {{ $cardClasses }}">
    <h4 class="font-weight-bolder">{{__('app.expertise_Interests')}}</h4>
    <div class="separator separator-dashed  mb-3"></div>
    <div>
        @include('partials._area_of_interests')
    </div>

    <div>
        <h5>
            @if($model->application->client->typeName==\App\Models\RegistrationType::MSME)
                {{__('app.category_digital_services_interested_in')}}
            @else
                {{__('app.area_of_expertise')}}
            @endif

        </h5>
        <p>

            @forelse($model->application->services as $item)
                <span class="badge badge-secondary rounded-pill my-1">{{ $item->name }}</span>
            @empty
                <span class="label label-inline label-se">None</span>
            @endforelse
        </p>
    </div>
</div>
