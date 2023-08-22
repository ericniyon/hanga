@extends('layouts.master')
@section('title', 'Homepage')
@section('page-header')
    <!--begin::Subheader-->

    <!--end::Subheader-->
@stop
@section('content')
    <!--begin::Entry-->
    <div class="d-flex flex-column-fluid">
        <!--begin::Container-->
        <div class="container">
            <!--begin::Dashboard-->
            <!--begin::Row-->
            <div class="row">

                <div class="col-md-7">
                    <div class="row" style="background: #F9F9F9; padding:2rem ">
                        <div class="col-md-4">
                            <div class="card card-custom gutter-b" style="height: 130px">
                                <!--begin::Body-->
                                <div class="card-body d-flex flex-column bg-[#FFF0E2]"
                                    style="background: #FFF0E2; color:#F5841F">
                                    <!--begin::Stats-->
                                    <div class="flex-grow-1">
                                        <div class=" text-[#F5841F] font-weight-bold">Total iWorkers</div>
                                        <div class="font-weight-bolder font-size-h3 py-2 ">
                                            {{ approvedRegistrationType(\App\Models\RegistrationType::iWorker) }}</div>
                                    </div>
                                    <!--end::Stats-->
                                    <!--begin::Progress-->
                                    <span class="my-4 items-center flex"> <i class="fa fa-check-circle fa-1x bg-[#4FB95A]"
                                            style="color: #4FB95A"></i> Verified </span>

                                    <!--end::Progress-->
                                </div>
                                <!--end::Body-->
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card card-custom gutter-b" style="height: 130px">
                                <!--begin::Body-->
                                <div class="card-body d-flex flex-column bg-[#FFF0E2]"
                                    style="background: #FFF0E2; color:#F5841F">
                                    <!--begin::Stats-->
                                    <div class="flex-grow-1">
                                        <div class=" font-weight-bold">Total Busness Directory</div>
                                        <div class="font-weight-bolder font-size-h3">
                                            {{ approvedRegistrationType(\App\Models\RegistrationType::MSME) }}</div>
                                    </div>
                                    <!--end::Stats-->
                                    <!--begin::Progress-->
                                    <span class="my-4 items-center flex"> <i class="fa fa-check-circle fa-1x bg-[#4FB95A]"
                                            style="color: #4FB95A"></i> Verified </span>
                                    <!--end::Progress-->
                                </div>
                                <!--end::Body-->
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card card-custom gutter-b" style="height: 130px">
                                <!--begin::Body-->
                                <div class="card-body d-flex flex-column bg-[#FFF0E2]"
                                    style="background: #FFF0E2; color:#F5841F">
                                    <!--begin::Stats-->
                                    <div class="flex-grow-1">
                                        <div class=" font-weight-bold">Digital Service Providers</div>
                                        <div class="font-weight-bolder font-size-h3">
                                            {{ approvedRegistrationType(\App\Models\RegistrationType::DSP) }}</div>
                                    </div>
                                    <!--end::Stats-->
                                    <!--begin::Progress-->
                                    <span class="my-4 items-center flex"> <i class="fa fa-check-circle fa-1x bg-[#4FB95A]"
                                            style="color: #4FB95A"></i> Verified </span>
                                    <!--end::Progress-->
                                </div>
                                <!--end::Body-->
                            </div>
                        </div>
                    </div>


                    <div class="row mt-12" style="background: #FBFBFB">
                        <div class="col-12">
                            <!--begin::Advance Table Widget 2-->
                            <div class="card card-custom card-stretch gutter-b">
                                <!--begin::Header-->
                                <div class="card-header border-0 pt-5">
                                    <h3 class="card-title align-items-start flex-column">
                                        <span class="card-label font-weight-bolder text-dark">Registered Members in
                                            {{ now()->year }}</span>
                                    </h3>
                                </div>
                                <!--end::Header-->
                                <!--begin::Body-->
                                <div class="card-body pt-3 pb-0">
                                    <!--begin::Table-->
                                    <canvas id="chart_12" class="d-flex justify-content-center" style="min-height: 400px;">

                                    </canvas>
                                    <!--end::Table-->
                                </div>
                                <!--end::Body-->
                            </div>
                            <!--end::Advance Table Widget 2-->
                        </div>
                    </div>


                </div>


                <div class="col-md-4 offset-1 bg-[] p-12 " style="background: #FBFBFB">
                    <span class="py-12"> Up coming Opportunities & Events</span>
                    <!--begin::Tiles Widget 4-->
                    @foreach ($upcomingEvents as $event)
                        <div class="card card-custom gutter-b mt-12">
                            <!--begin::Body-->
                            <div class="card-body d-flex flex-column">
                                <!--begin::Stats-->
                                <div class="flex-grow-1">
                                    <div class="text-dark-50 font-weight-bold mb-2" style="text-transform: uppercase">
                                        {{ $event->company }}
                                    </div>
                                    <span class="text-muted" style="font-size: .9rem">
                                        {{ $event->title }}
                                    </span>

                                </div>
                                <div class="row justify-center my-2">
                                    <div class="col-md-{{ $event->is_free ? '6' : '3' }}"><span>40 Slots</span></div>
                                    {{-- <div class="col-md-4"><span>9 Remain</span></div> --}}
                                    @if (!$event->is_free)
                                        <div class="col-md-4"><span>{{ format_money($event->price) }}</span></div>
                                    @endif
                                    <div class="col-md-5">

                                        @php
                                            $progress = (strtotime($event->created_at) * 100) / strtotime($event->start_date);
                                            // echo $progress;
                                        @endphp

                                        <span>{{ \Carbon\Carbon::parse($event->start_date)->longAbsoluteDiffForHumans() }}
                                            Remain</span>
                                        <div class="progress progress-xs my-.5">
                                            <div class="progress-bar bg-[#FF8C8C]" role="progressbar"
                                                style="width: {{ $progress }}%;" aria-valuenow="{{ $progress }}"
                                                aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                    </div>
                                </div>
                                <!--end::Stats-->
                                <!--begin::Progress-->

                                <!--end::Progress-->
                            </div>
                            <!--end::Body-->
                        </div>
                    @endforeach
                    {{--
                    <div class="card card-custom gutter-b mt-12" style="height: 130px">
                        <!--begin::Body-->
                        <div class="card-body d-flex flex-column">
                            <!--begin::Stats-->
                            <div class="flex-grow-1">
                                <div class="text-dark-50 font-weight-bold">FABLAB</div>
                                <p>3D Printing/ Additive Manufacturing</p>

                            </div>
                            <div class="row justify-center my-2">
                                <div class="col-md-3"><span>40 Slots</span></div>
                                <div class="col-md-4"><span>9 Remain</span></div>
                                <div class="col-md-5">
                                    <span>2weeks Remain</span>
                                    <div class="progress progress-xs my-.5">
                                <div class="progress-bar bg-[#FF8C8C]" role="progressbar" style="width: 75%;" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                                </div>
                            </div>
                            <!--end::Stats-->
                            <!--begin::Progress-->

                            <!--end::Progress-->
                        </div>
                        <!--end::Body-->
                    </div>

                    <div class="card card-custom gutter-b mt-12" style="height: 130px">
                        <!--begin::Body-->
                        <div class="card-body d-flex flex-column">
                            <!--begin::Stats-->
                            <div class="flex-grow-1">
                                <div class="text-dark-50 font-weight-bold">FABLAB</div>
                                <p>3D Printing/ Additive Manufacturing</p>

                            </div>
                            <div class="row justify-center my-2">
                                <div class="col-md-3"><span>40 Slots</span></div>
                                <div class="col-md-4"><span>9 Remain</span></div>
                                <div class="col-md-5">
                                    <span>2weeks Remain</span>
                                    <div class="progress progress-xs my-.5">
                                <div class="progress-bar bg-[#FF8C8C]" role="progressbar" style="width: 75%;" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                                </div>
                            </div>
                            <!--end::Stats-->
                            <!--begin::Progress-->

                            <!--end::Progress-->
                        </div>
                        <!--end::Body-->
                    </div> --}}

                    <!--end::Tiles Widget 4-->

                    {{-- <div class="row mt-4">
                        <div class="col-md-6">
                            <a class="bg-[#FEC491] py-4 px-4" style="background: #FEC491; border-radius: 50px">Create Opportunity</a>
                        </div>
                        <div class="col-md-6">
                            <a class="bg-[#FEC491] py-4 px-8" style="background: #FEC491; border-radius: 50px">Create Event</a>

                        </div>
                    </div> --}}
                </div>


            </div>
            <!--end::Row-->


            <div class="row p-12 bg-[#] mt-24" style="background: #FBFBFB">

                <div class="col-md-9">
                    <div class="card">
                        <div class="=">
                            <!--begin::Table-->
                            <div class="card-header">Membership Subscriptions</div>
                            <div class="table-responsive">
                                <!--begin: Datatable-->
                                {{--            {{ $dataTable->table() }}--}}
                                <table class="table " id="kt_datatable1">
                                    <thead>
                                    <tr>
                                        <th>Subscriber</th>
                                        <th>Memberships Owner</th>
                                        <th>Membership  Plan</th>

                                        <th>Organisation Type</th>
                                        <th>Date</th>
                                        <th>Status</th>

                                    </tr>
                                    </thead>
                                    <tbody>

                                        @forelse ($packeges as $packege)
                                        <tr>
                                            <td>James KARANGWA <p>+250 786 444 444</p></td>
                                            <td>ICT CHAMBER</td>
                                            <td>Ignition</td>
                                            <td>e-commerce</td>
                                            <td>09/02/2023</td>
                                            <td>Pending</td>

                                        </tr>
                                        <tr>
                                            <td>James KARANGWA <p>+250 786 444 444</p></td>
                                            <td>ICT CHAMBER</td>
                                            <td>Ignition</td>
                                            <td>e-commerce</td>
                                            <td>09/02/2023</td>
                                            <td>Pending</td>

                                        </tr>
                                            <tr>
                                                <td>James KARANGWA <p>+250 786 444 444</p></td>
                                                <td>ICT CHAMBER</td>
                                                <td>Ignition</td>
                                                <td>e-commerce</td>
                                                <td>09/02/2023</td>
                                                <td>Pending</td>

                                            </tr>



                        <div class="modal fade" id="modalUpdatePackege" data-backdrop="static" tabindex="-1" role="dialog"
                         aria-labelledby="staticBackdrop" aria-hidden="true">
                        <div class="modal-dialog">
                            <form action="{{route('admin.membership.packeges.edit', $packege->id)}}" method="post" id="submissionFormEdit" class="submissionForm"
                                  enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" value="0" id="PackegeId" name="PackegeId">

                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h4 class="modal-title">Edit Package</h4>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <i aria-hidden="true" class="ki ki-close"></i>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="form-group">
                                            <label for="packege_name">Package Name</label>
                                            <input type="text" id="edit-packege_name" name="packege_name" class="form-control"
                                                   required/>
                                        </div>
                                        <div class="form-group">
                                            <x-image-file-label label="Logo"/>
                                            <div></div>
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input" id="edit-cover_picture" name="cover_picture"/>
                                                <label class="custom-file-label" for="edit-logo">Choose file</label>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="packege_description">Description</label>
                                            <textarea type="text" class="form-control" id="edit-packege_description"
                                                      name="packege_description"></textarea>
                                        </div>

                                    </div>
                                    <div class="modal-footer">
                                        <button type="submit" class="btn btn-primary">Update</button>
                                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                    </div>
                                </div>
                            </form>
                            <!-- /.modal-content -->
                        </div>
                    </div>
                </div>

                <div class="col-md-3 bg-white py-12 px-4 rounded-xl">
                    <h3>ICT CHAMBER MEMBERSHIP</h3>
                    <span>TOTAL Membership {{\App\Models\MembershipApplication::all()->count()}}</span>

                    @foreach ($plans as $item)
                        <div class="row py-12 ">
                            <div class="col-md-4">
                                <i class="fa fa-desktop fa-3x text-[#7CA0FD] p-4"
                                    style="color:#7CA0FD; background: #F2F6FE"></i>
                            </div>
                            <div class="col-md-8">
                                <h5>{{$item->name}}</h5>
                                <small>{{\App\Models\MembershipApplication::where('packege_id',$item->id)->count()}} Subscriptions</small>
                            </div>
                        </div>
                    @endforeach
                    {{-- <div class="row py-4 ">
                        <div class="col-md-4">
                            <i class="fa fa-desktop fa-3x text-[#7CA0FD] p-4"
                                style="color:#FEC491; background: #FFF1E2"></i>
                        </div>
                        <div class="col-md-8">
                            <h5>ACCELERATOR</h5>
                            <small>75 Subscriptions</small>
                        </div>
                    </div>
                    <div class="row py-4 ">
                        <div class="col-md-4">
                            <i class="fa fa-desktop fa-3x text-[#7CA0FD] p-4"
                                style="color:#33519F; background: #E0E4FD"></i>
                        </div>
                        <div class="col-md-8">
                            <h5>TAKEOFF</h5>
                            <small>75 Subscriptions</small>
                        </div>
                    </div>
                    <div class="row py-4 ">
                        <div class="col-md-4">
                            <i class="fa fa-desktop fa-3x text-[#7CA0FD] p-4"
                                style="color:#62FFAA; background: #F2FFF8"></i>
                        </div>
                        <div class="col-md-8">
                            <h5>CRUISE</h5>
                            <small>75 Subscriptions</small>
                        </div>
                    </div> --}}

                </div>
            </div>

            <!--end::Row-->
            <!--end::Dashboard-->
        </div>
        <!--end::Container-->
    </div>
    <!--end::Entry-->
@endsection
@section('scripts')
    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script> --}}
    {{-- <script src="https://fastly.jsdelivr.net/npm/echarts@5/dist/echarts.min.js"></script>x --}}
    <script src="{{ asset('js/amcharts/core.js') }}"></script>
    {{-- <script src="{{asset('js/amcharts/charts.js')}}"></script> --}}
    <script src="{{ asset('js/amcharts/animated.js') }}"></script>
    {{--    <script src="https://cdn.amcharts.com/lib/4/core.js"></script> --}}
    {{-- <script>
        $('.nav-dashboard').addClass('menu-item-active');

        am4core.ready(function () {
            am4core.useTheme(am4themes_animated);
            var chart = am4core.create("chart_12", am4charts.XYChart3D);
            chart.data = {!! registeredClient() !!};
            let categoryAxis = chart.xAxes.push(new am4charts.CategoryAxis());
            categoryAxis.dataFields.category = "month";
            categoryAxis.renderer.labels.template.rotation = 270;
            categoryAxis.renderer.labels.template.hideOversized = false;
            categoryAxis.renderer.minGridDistance = 20;
            categoryAxis.renderer.labels.template.horizontalCenter = "right";
            categoryAxis.renderer.labels.template.verticalCenter = "middle";
            categoryAxis.tooltip.label.rotation = 270;
            categoryAxis.tooltip.label.horizontalCenter = "right";
            categoryAxis.tooltip.label.verticalCenter = "middle";
            let valueAxis = chart.yAxes.push(new am4charts.ValueAxis());
            valueAxis.title.text = "Applications";
            valueAxis.title.fontWeight = "bold";
            var series = chart.series.push(new am4charts.ColumnSeries3D());
            series.dataFields.valueY = "applications";
            series.dataFields.categoryX = "month";
            series.name = "Months";
            series.tooltipText = "{categoryX}: [bold]{valueY} Members registered [/]";
            series.columns.template.fillOpacity = .8;
            var columnTemplate = series.columns.template;
            columnTemplate.strokeWidth = 2;
            columnTemplate.strokeOpacity = 1;
            columnTemplate.stroke = am4core.color("#FFFFFF");
            columnTemplate.adapter.add("fill", function (fill, target) {
                return chart.colors.getIndex(target.dataItem.index);
            });
            columnTemplate.adapter.add("stroke", function (stroke, target) {
                return chart.colors.getIndex(target.dataItem.index);
            });
            chart.cursor = new am4charts.XYCursor();
            chart.cursor.lineX.strokeOpacity = 0;
            chart.cursor.lineY.strokeOpacity = 0;
            $('[aria-labelledby="id-82-title"]').hide();

        });

        am4core.ready(function () {
            am4core.useTheme(am4themes_animated);
            var chart = am4core.create("chartdiv", am4charts.PieChart3D);
            chart.hiddenState.properties.opacity = 0; // this creates initial fade-in
            chart.legend = new am4charts.Legend();
            chart.legend.position = "bottom"
            chart.innerRadius = am4core.percent(30);
            chart.depth = 20;
            chart.legend.valueLabels.template.text = "{value.value}";
            chart.data = {!! registeredClientByType() !!};
            chart.numberFormatter.numberFormat = "#,###";
            var series = chart.series.push(new am4charts.PieSeries3D());
            series.dataFields.value = "applicationcount";
            series.dataFields.category = "name";
            $('[aria-labelledby="id-206-title"]').hide();

        });
    </script> --}}

    {{-- charts scripts --}}
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <script>
        $.ajax({
            url: "{{ route('admin.dashboard.chartData') }}",
            method: 'GET',
            dataType: 'json',
            success: function(data) {
                console.log(data);
                chartInfo(data);
            },
            error: function(e) {
                console.log(e);
            }
        });

        function chartInfo(data) {
            const ctx = document.getElementById('chart_12');

            new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: data.months,
                    datasets: [{
                        label: 'iWorkers',
                        data: data.iworker,
                        borderWidth: 1,
                        backgroundColor: '#FFC998',
                        borderColor: '#FFC998',
                        borderRadius: '4'
                    }, {
                        label: 'MSMEs',
                        data: data.msme,
                        borderWidth: 1,
                        backgroundColor: '#8F9CFF',
                        borderColor: '#8F9CFF',
                        borderRadius: '4'
                    }, {
                        label: 'DSPs',
                        data: data.dsp,
                        borderWidth: 1,
                        backgroundColor: '#BEFEBC',
                        borderColor: '#BEFEBC',
                        borderRadius: '4'
                    }, ]
                },
                options: {
                    scales: {
                        x: {
                            grid: {
                                display: false
                            }
                        },
                        y: {
                            beginAtZero: true,
                            grid: {
                                display: false
                            }
                        }
                    }
                }
            });
        }
    </script>
@stop
