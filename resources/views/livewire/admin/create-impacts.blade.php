<div>
    {{-- The best athlete wants his opponent at his best. --}}
    @section('page-header')
    <!--begin::Subheader-->
    <div class="subheader py-2 py-lg-4 subheader-solid" id="kt_subheader">
        <div class="container-fluid d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
            <!--begin::Info-->
            <div class="d-flex align-items-center flex-wrap mr-2">
                <!--begin::Page Title-->
                <h5 class="text-dark font-weight-bold mt-2 mb-2 mr-5">Impacts</h5>
                <!--end::Page Title-->
                <div class="subheader-separator subheader-separator-ver mt-2 mb-2 mr-4 bg-gray-200"></div>
            </div>
            <!--end::Info-->
        </div>
    </div>
    <!--end::Subheader-->
@stop



<div class="card card-custom gutter-b">
    @if (session()->has('message'))
                    <div class="alert alert-success">
                        {{ session('message') }}
                    </div>
                    @endif
    <div class="card-header flex-wrap">

        <div class="card-title" style="display: flex">

            <h3 class="card-label">Create Impact</h3>

        </div>
    </div>
    <form wire:submit.prevent="store"  class="submissionForm p-5" enctype="multipart/form-data">
        @csrf
            <div class="modal-body">

                <div class="row">

                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="name">Impact Title </label>
                                <input type="text" wire:model.defer="impact_title" class="form-control" placeholder=" title"/>
                            </div>
                            @error('impact_title')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="name">Dashboard Link </label>
                                <input type="text" wire:model.defer="impact_link" class="form-control" placeholder=" link"/>
                            </div>
                            @error('impact_link')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                </div>
                <div class="row">

                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="name" >Page Section  </label>
                                <select wire:model.defer="impact_section" id="" class="form-control">
                                 <option value="Teck Business">Teck Business</option>
                                 <option value="Business">Business</option>
                                 <option value="iWorker">iWorker</option>
                                 <option value="Web/Mobile app">Web/Mobile app</option>
                                 <option value="Opportunitie">Opportunitie</option>
                                 <option value="Digital Finance">Digital Finance</option>
                                </select>
                            </div>
                            @error('impact_section')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label for="name">Impact Description </label>
                                 <textarea class="form-control summernote" wire:model.defer="impact_description" id="" cols="10" rows="5"></textarea>
                             </div>
                             @error('impact_description')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                </div>




            </div>
            <div class="modal-footer">
                <div class="btn-group">
                    <button type="button" wire:click.prevent="store" class="btn btn-primary"><i class="la la-check"></i>Confirm </button>
                </div>
            </div>
        </div>
    </form>
</div>


</div>
