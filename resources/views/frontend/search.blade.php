@extends('layouts.app')

@section('title',"Search a member")
@section('styles')
    @livewireStyles
@stop

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-4">
               <div class="mb-3">
                   <livewire:search-dropdown/>
               </div>
                <div class="card card-custom gutter-b">
                    <!--begin::Header-->
                    <div class="card-header border-0">
                        <div class="card-title font-weight-bolder">
                            <div class="card-label">
                            <span class="svg-icon">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20"
                                     fill="currentColor">
  <path
      d="M5 4a1 1 0 00-2 0v7.268a2 2 0 000 3.464V16a1 1 0 102 0v-1.268a2 2 0 000-3.464V4zM11 4a1 1 0 10-2 0v1.268a2 2 0 000 3.464V16a1 1 0 102 0V8.732a2 2 0 000-3.464V4zM16 3a1 1 0 011 1v7.268a2 2 0 010 3.464V16a1 1 0 11-2 0v-1.268a2 2 0 010-3.464V4a1 1 0 011-1z"/>
</svg>
                            </span>
                                Filters
                            </div>
                        </div>
                    </div>
                    <!--end::Header-->
                    <!--begin::Body-->
                    <div class="card-body" style="position: relative;">
                        <!--begin::Items-->
                        <div class="mt-n12 position-relative zindex-0">
                            <label class="d-flex align-items-center mb-8" for="dsp-check-id" style="cursor: pointer">
                                <div class="symbol symbol-circle symbol-40 symbol-light mr-3 flex-shrink-0">
                                    <div class="symbol-label">
                                        <span class="svg-icon svg-icon-lg svg-icon-gray-500">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20"
                                                 fill="currentColor">
                                              <path fill-rule="evenodd"
                                                    d="M10 2a1 1 0 00-1 1v1a1 1 0 002 0V3a1 1 0 00-1-1zM4 4h3a3 3 0 006 0h3a2 2 0 012 2v9a2 2 0 01-2 2H4a2 2 0 01-2-2V6a2 2 0 012-2zm2.5 7a1.5 1.5 0 100-3 1.5 1.5 0 000 3zm2.45 4a2.5 2.5 0 10-4.9 0h4.9zM12 9a1 1 0 100 2h3a1 1 0 100-2h-3zm-1 4a1 1 0 011-1h2a1 1 0 110 2h-2a1 1 0 01-1-1z"
                                                    clip-rule="evenodd"/>
                                            </svg>
                                        </span>
                                    </div>
                                </div>
                                <div class="flex-grow-1">
                                    <span class="font-size-h6 text-dark-75 font-weight-bolder">DSP</span>
                                    <div class="font-size-sm text-muted font-weight-bold mt-1">Digital Service
                                        Provider
                                    </div>
                                </div>
                                <div style="position: relative">
                                    <label class="checkbox" style="position: static">
                                        <input type="checkbox" id="dsp-check-id" value="{{\App\Models\RegistrationType::DSP}}" class="reg-type" name="sectors[]"/>
                                        <span class="rounded-sm"></span>
                                    </label>
                                </div>
                            </label>
                            <label class="d-flex align-items-center mb-8" style="cursor: pointer" for="i-worker-check-id">
                                <!--begin::Symbol-->
                                <div class="symbol symbol-circle symbol-40 symbol-light mr-3 flex-shrink-0">
                                    <div class="symbol-label">
																<span class="svg-icon svg-icon-lg svg-icon-gray-500">
																	<svg xmlns="http://www.w3.org/2000/svg"
                                                                         class="h-5 w-5" viewBox="0 0 20 20"
                                                                         fill="currentColor">
  <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM7 9H5v2h2V9zm8 0h-2v2h2V9zM9 9h2v2H9V9z"
        clip-rule="evenodd"/>
</svg>
																</span>
                                    </div>
                                </div>
                                <!--end::Symbol-->
                                <!--begin::Title-->
                                <div class="flex-grow-1">
                                    <span class="font-size-h6 text-dark-75 text-hover-primary font-weight-bolder">iWorker</span>
                                    <div class="font-size-sm text-muted font-weight-bold mt-1">iWorker</div>
                                </div>

                                <div style="position: relative">
                                    <label class="checkbox" style="position: static">
                                        <input type="checkbox" id="i-worker-check-id" value="{{\App\Models\RegistrationType::iWorker}}" class="reg-type" name="sectors[]"/>
                                        <span class="rounded-sm"></span>
                                    </label>
                                </div>
                                <!--end::Title-->
                            </label>
                            <label class="d-flex align-items-center mb-8  text-hover-primary " for="msme-check-id" style="cursor: pointer">
                                <!--begin::Symbol-->
                                <div class="symbol symbol-circle symbol-40 symbol-light mr-3 flex-shrink-0">
                                    <div class="symbol-label">
																<span class="svg-icon svg-icon-lg svg-icon-gray-500">
																	<svg xmlns="http://www.w3.org/2000/svg"
                                                                         class="h-5 w-5" viewBox="0 0 20 20"
                                                                         fill="currentColor">
  <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM7 9H5v2h2V9zm8 0h-2v2h2V9zM9 9h2v2H9V9z"
        clip-rule="evenodd"/>
</svg>
																</span>
                                    </div>
                                </div>
                                <!--end::Symbol-->
                                <!--begin::Title-->
                                <div class="flex-grow-1">
                                    <span class="font-size-h6 text-dark-75 font-weight-bolder">MSMEs</span>
                                    <div class="font-size-sm text-muted font-weight-bold mt-1">Micro , Small & Medium Enterprises</div>
                                </div>
                                <div style="position: relative">
                                    <label class="checkbox" style="position: static">
                                        <input type="checkbox" id="msme-check-id" value="{{\App\Models\RegistrationType::MSME}}" class="reg-type" name="sectors[]"/>
                                        <span class="rounded-sm"></span>
                                    </label>
                                </div>
                                <!--end::Title-->
                            </label>
                            <div class="accordion mb-8" id="services">
                                <div class="card border-light rounded-sm">
                                    <div class="card-header" id="headingThree">
                                        <h2 class="mb-0">
                                            <button class="btn  btn-block text-left collapsed font-weight-bolder"
                                                    type="button"
                                                    data-toggle="collapse" data-target="#collapseThree"
                                                    aria-expanded="false" aria-controls="collapseThree">
                                                <span class="svg-icon">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5"
                                                         viewBox="0 0 20 20" fill="currentColor">
                                                      <path
                                                          d="M7 3a1 1 0 000 2h6a1 1 0 100-2H7zM4 7a1 1 0 011-1h10a1 1 0 110 2H5a1 1 0 01-1-1zM2 11a2 2 0 012-2h12a2 2 0 012 2v4a2 2 0 01-2 2H4a2 2 0 01-2-2v-4z"/>
                                                    </svg>
                                                </span>
                                                Services
                                            </button>
                                        </h2>
                                    </div>
                                    <div id="collapseThree" class="collapse" aria-labelledby="headingThree"
                                         data-parent="#services">
                                        <div class="card-body">
                                            <div class="form-group">
                                                <div class="checkbox-list">
                                                    @foreach($services as $item)
                                                        <label class="checkbox">
                                                            <input type="checkbox" value="{{$item->id}}" class="check-services"/> {{ $item->name }}
                                                            <span class="rounded-sm"></span>
                                                        </label>
                                                    @endforeach
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="accordion mb-8" id="sectors">
                                <div class="card border-light rounded-sm">
                                    <div class="card-header" id="headingThree">
                                        <h2 class="mb-0">
                                            <button class="btn  btn-block text-left collapsed font-weight-bolder"
                                                    type="button"
                                                    data-toggle="collapse" data-target="#collapseSectors"
                                                    aria-expanded="false" aria-controls="collapseSectors">
                                                <span class="svg-icon">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5"
                                                         viewBox="0 0 20 20" fill="currentColor">
  <path fill-rule="evenodd"
        d="M6 6V5a3 3 0 013-3h2a3 3 0 013 3v1h2a2 2 0 012 2v3.57A22.952 22.952 0 0110 13a22.95 22.95 0 01-8-1.43V8a2 2 0 012-2h2zm2-1a1 1 0 011-1h2a1 1 0 011 1v1H8V5zm1 5a1 1 0 011-1h.01a1 1 0 110 2H10a1 1 0 01-1-1z"
        clip-rule="evenodd"/>
  <path d="M2 13.692V16a2 2 0 002 2h12a2 2 0 002-2v-2.308A24.974 24.974 0 0110 15c-2.796 0-5.487-.46-8-1.308z"/>
</svg>
                                                </span>
                                                Business sectors
                                            </button>
                                        </h2>
                                    </div>
                                    <div id="collapseSectors" class="collapse" aria-labelledby="headingThree"
                                         data-parent="#sectors">
                                        <div class="p-2">
                                            <input type="text" onkeyup="search(this)" class="form-control form-control-sm" placeholder="Filter business sector" title="Filter business sector">
                                        </div>
                                        <div class="card-body" style="max-height: 300px;overflow-y: auto">
                                            <div class="form-group">
                                                <div class="checkbox-list" id="sector-list">

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="accordion mb-8" id="locations">
                                <div class="card border-light rounded-sm">
                                    <div class="card-header" id="headingThree">
                                        <h2 class="mb-0">
                                            <button class="btn  btn-block text-left collapsed font-weight-bolder"
                                                    type="button"
                                                    data-toggle="collapse" data-target="#collapseLocation"
                                                    aria-expanded="false" aria-controls="collapseLocation">
                                           <span class="svg-icon svg-icon-dark"><!--begin::Svg Icon | path:C:\wamp64\www\keenthemes\themes\metronic\theme\html\demo9\dist/../src/media/svg/icons\Map\Marker1.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
        <rect x="0" y="0" width="24" height="24"/>
        <path d="M5,10.5 C5,6 8,3 12.5,3 C17,3 20,6.75 20,10.5 C20,12.8325623 17.8236613,16.03566 13.470984,20.1092932 C12.9154018,20.6292577 12.0585054,20.6508331 11.4774555,20.1594925 C7.15915182,16.5078313 5,13.2880005 5,10.5 Z M12.5,12 C13.8807119,12 15,10.8807119 15,9.5 C15,8.11928813 13.8807119,7 12.5,7 C11.1192881,7 10,8.11928813 10,9.5 C10,10.8807119 11.1192881,12 12.5,12 Z" fill="#000000" fill-rule="nonzero"/>
    </g>
</svg><!--end::Svg Icon--></span>
                                                Location
                                            </button>
                                        </h2>
                                    </div>
                                    <div id="collapseLocation" class="collapse" aria-labelledby="headingThree"
                                         data-parent="#locations">
                                        <div class="card-body" style="max-height: 300px;overflow-y: auto">
                                            <div class="form-group form-group-sm">
                                                <label for="province_id">Province</label>
                                                <select name="province_id" onchange="changeProvince(this);" id="province_id" class="form-control">
                                                    <option value="">-- Select province --</option>
                                                    @foreach($provinces as $pro)
                                                        <option value="{{$pro->id}}">{{$pro->name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="form-group form-group-sm">
                                                <label for="district_id">District</label>
                                                <select name="district_id" id="district_id" onchange="changeDistrict(this);" class="form-control">
                                                    <option value="">-- All districts --</option>
                                                </select>
                                            </div>
                                            <div class="form-group form-group-sm">
                                                <label for="sector_id">Sector</label>
                                                <select name="sector_id" id="sector_id" onchange="changeSector(this);" class="form-control">
                                                    <option value="">-- All sectors --</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--end::Items-->

                    </div>
                    <!--end::Body-->
                </div>
            </div>
            <div class="col-md-8">

                @if(auth()->guard('client')->check())
                    <div class="card card-body card-custom py-0 mb-3">
                        @include('partials._menu_bar')
                    </div>
                    @endif


                <div class="card card-custom gutter-b card-stretch top-card">
                    <!--begin::Header-->
                    <div class="card-header border-0">
                        <div class="card-title font-weight-bolder">
                            <div class="card-label">
                            <span class="svg-icon">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20"
                                     fill="currentColor">
  <path fill-rule="evenodd"
        d="M12 7a1 1 0 110-2h5a1 1 0 011 1v5a1 1 0 11-2 0V8.414l-4.293 4.293a1 1 0 01-1.414 0L8 10.414l-4.293 4.293a1 1 0 01-1.414-1.414l5-5a1 1 0 011.414 0L11 10.586 14.586 7H12z"
        clip-rule="evenodd"/>
</svg>
                            </span>
                                Most searched members
                            </div>
                        </div>
                    </div>
                    <!--end::Header-->
                    <!--begin::Body-->
                    <div class="card-body">
                        @foreach($searchedMembers as $item)
                            <div class=" @if(!$loop->last) border-bottom border-bottom-light @endif py-2 my-3 mx-4">
                                <x-client-item :item="$item"/>
                            </div>
                        @endforeach

                    </div>
                    <!--end::Body-->
                </div>

                <div class="card card-custom gutter-b card-stretch search-card hide">
                    <!--begin::Header-->
                    <div class="card-header border-0">
                        <div class="card-title font-weight-bolder">
                            <div class="card-label">
                            <span class="svg-icon">
                           <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20"
                                fill="currentColor">
  <path fill-rule="evenodd"
        d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"
        clip-rule="evenodd"/>
</svg>
                       </span>
                                Search results
                            </div>
                        </div>
                    </div>
                    <!--end::Header-->
                    <!--begin::Body-->
                    <div class="card-body position-relative">

                        <div class="search-data">

                        </div>

                        <div class="loader-container">
                            <div class="position-absolute d-flex align-items-center justify-content-center top-0 left-0" style="height: 100%;width: 100%;background-color: rgba(239,175,152,.3)">
                                <img src="{{asset('frontend/assets/loader2.svg')}}" alt="">
                            </div>
                        </div>
                    </div>
                    <!--end::Body-->
                </div>
            </div>
        </div>
    </div>
@stop

@section('scripts')
    @livewireScripts

    <style>
        .checkbox > span {
            background-color: #e0e3e4;
            border: 1px solid transparent;
        }
        .form-group {
            margin-bottom: 0.70rem;
        }
    </style>
    <script>

        let sectors = [
            @foreach($sectors as $item)
            {
              value:{{$item->id}},
              label:"{{$item->name}}",
              checked:false,
            },
            @endforeach
        ];

        let districts = [];


        function changeProvince(elem){
            $("#sector_id").val("");
            $.ajax({
               url:"/districts/"+elem.value,
               success:function (res) {
                  let dis = $("#district_id");
                  dis.empty();


                   let def = document.createElement("option");
                   def.value = "";
                   def.innerText = "-- All districts --";

                   dis.append(def);

                   res.forEach(function (res) {
                       let elem = document.createElement("option");
                       elem.value = res.id;
                       elem.innerText = res.name;

                       dis.append(elem);
                   })
               }
            });


            loadItems();
        }


        function changeDistrict(elem){
            $.ajax({
               url:"/sectors/"+elem.value,
               success:function (res) {
                  let dis = $("#sector_id");
                  dis.empty();


                   let def = document.createElement("option");
                   def.value = "";
                   def.innerText = "-- All sectors --";

                   dis.append(def);

                   res.forEach(function (res) {
                       let elem = document.createElement("option");
                       elem.value = res.id;
                       elem.innerText = res.name;

                       dis.append(elem);
                   })
               }
            });


            loadItems();
        }


        function changeSector(elem){

            loadItems();
        }

        function buildSectors(sectors) {
            let parent = $("#sector-list");
            parent.empty();
            sectors.forEach(function (e) {
                let label = document.createElement("label");
                label.className = "checkbox";
                let input = document.createElement("input");
                input.type = "checkbox";
                input.className = "check-sector";
                input.name = "sectors[]";
                let span = document.createElement("span");
                span.className = "rounded-sm";
                input.value = e.value;
                input.onchange = function () {
                    e.checked = this.checked;
                }
                input.checked = e.checked;
                label.textContent = e.label;


                label.appendChild(input);
                label.appendChild(span);

                parent.append(label);
            })
        }

        function buildDistricts(districts) {
            let parent = $("#location-list");
            parent.empty();
            districts.forEach(function (e) {
                let label = document.createElement("label");
                label.className = "checkbox";
                let input = document.createElement("input");
                input.type = "checkbox";
                input.className = "check-location";
                input.name = "districts[]";
                let span = document.createElement("span");
                span.className = "rounded-sm";
                input.value = e.value;
                input.onchange = function () {
                    e.checked = this.checked;
                }
                input.checked = e.checked;
                label.textContent = e.label;


                label.appendChild(input);
                label.appendChild(span);

                parent.append(label);
            })

        }


        function search(elem) {
            buildSectors(sectors.filter(e=>e.label.toLowerCase().indexOf(elem.value.trim().toLowerCase()) > -1));
        }


        function searchLocation(elem) {
            buildDistricts(districts.filter(e=>e.label.toLowerCase().indexOf(elem.value.trim().toLowerCase()) > -1));
        }


        $(function () {

            buildSectors(sectors);
            //buildDistricts(districts);


            $(document).on('click','.handle-click-search-event',function (e) {
               //e.preventDefault();loadItems();
            });
            $(document).on('change','.check-sector,.check-services,.reg-type',function () {
               //e.preventDefault();
                loadItems();
            });
        })

        function loadItems(){
            let sector = sectors.filter(e=>e.checked);
            let services = document.querySelectorAll(".check-services:checked");
            let types = document.querySelectorAll(".reg-type:checked");
            if(sectors.length>0 || services.length > 0 || types.length > 0){
                $(".top-card").addClass('hide');
                $(".search-card").removeClass('hide');
                let arr = [];
                let ser = [];
                let ty = [];
                sector.forEach(e=>arr.push(e.value));
                services.forEach(e=>ser.push(e.value));
                types.forEach(e=>ty.push(e.value));
                $(".loader-container").fadeIn();
                $.ajax({
                    url:"{{route('view.search.get.result')}}?sectors="+encodeURIComponent(arr.join(","))
                        +"&service="+encodeURIComponent(ser.join(","))
                        +"&province="+$("#province_id").val()
                        +"&district="+$("#district_id").val()
                        +"&sector="+$("#sector_id").val()
                        +"&types="+encodeURIComponent(ty.join(",")),
                    success:function (res) {
                        $(".search-data").html(res);
                    },
                    complete:function () {
                        $(".loader-container").fadeOut();
                    }
                })
            }else{

                $(".top-card").removeClass('hide');
                $(".search-card").addClass('hide');
            }
        }
    </script>
@stop
