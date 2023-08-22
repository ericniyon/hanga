<div class="">
    <div class="card mb-3 rounded">
        <div class="card-body">
            <div class="single-sidebar-widget search-widget">
                <form>
                    <div class="d-flex">
                        <div class="mr-auto flex-grow-1 ">
                            <div class="input-icon">
                                <input type="search" class="form-control form-control-solid" name="search" id="search"
                                       autocomplete="off"
                                       placeholder="{{__('auth.search')}}..." wire:model="query" wire:model.debounce="query">
                                <span class="svg-icon  text-muted">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20"
                                 fill="currentColor">
                                <path fill-rule="evenodd"
                                      d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"
                                      clip-rule="evenodd"/>
                            </svg>
                        </span>
                            </div>
                        </div>
                        <div class="flex-grow-2 mx-4">
                            <select name="type" id="type" class="form-control" id="type" wire:model="type"
                                    wire:model.debounce="type">
                                <option value="">@lang('app.all_types')</option>
                                @foreach (App\Models\OpportunityType::all() as $type)
                                    <option value="{{$type->id}}">{{$type->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <button type="submit"
                                class="btn btn-light-primary text-hover-white font-weight-bolder text-uppercase flex-grow-3">
                        <span class="svg-icon">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20"
                                     fill="currentColor">
                                    <path fill-rule="evenodd"
                                          d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"
                                          clip-rule="evenodd"/>
                                </svg>
                            </span>
                        </button>

                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="text-center w-100">
        <div class="spinner spinner-track spinner-primary spinner-right " wire:loading></div>
    </div>
    <div class="mb-5"></div>
    @forelse ($jobs as $job)
        <x-opportunity-item :job="$job"/>
    @empty
        <x-alert-message :title="__('No Opportunity Found!')"/>
    @endforelse

    <div>
        {{$jobs->links()}}
    </div>
</div>
