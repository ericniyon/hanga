
@extends("layouts.master")
@section("title",'Audits Trails')
@section("css")

@stop

@section('page-header')
    <div class="subheader py-2 py-lg-4 subheader-solid" id="kt_subheader">
        <div class="container-fluid d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
            <!--begin::Info-->
            <div class="d-flex align-items-center flex-wrap mr-1">
                <!--begin::Page Heading-->
                <div class="d-flex align-items-baseline mr-5">
                    <!--begin::Page Title-->
                    <h5 class="text-dark font-weight-bold my-2 mr-5">System Audits</h5>
                    <!--end::Page Title-->
                    <!--begin::Breadcrumb-->
                    <ul class="breadcrumb breadcrumb-transparent breadcrumb-dot font-weight-bold p-0 my-2 font-size-sm">
                        <li class="breadcrumb-item">
                            <a href="{{ route('admin.dashboard') }}" class="text-muted">Home</a>
                        </li>
                        <li class="breadcrumb-item">
                            <a href="javascript:void(0);" class="text-muted">Audits</a>
                        </li>
                    </ul>
                    <!--end::Breadcrumb-->
                </div>
                <!--end::Page Heading-->
            </div>
            <!--end::Info-->
            <!--end::Toolbar-->
        </div>
    </div>
@stop

@section("content")

    <!--end::Notice-->
    @include('partials._alerts')
    <!--begin::Card-->
    <div class="card card-custom gutter-b">
        <div class="card-header flex-wrap">
            <div class="card-title">
                <h3 class="card-label">System Audits</h3>
            </div>
        </div>
        <div class="card-body">
                    <div class="row mb-5">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="start_date" class="control-label">start date</label>
                                <input id="start_date" readonly type="text" value="{{$start_date}}" name="start" class="form-control start end-today-datepicker" placeholder="{{Carbon\Carbon::now()->toDateString()}}" required>
                            </div>
                        </div>
                        <!--/span-->
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="end_date" class="control-label">End Date</label>
                                <input id="end_date" readonly type="text" class="form-control end end-today-datepicker" value="{{$end_date}}" name="end" placeholder="{{Carbon\Carbon::now()->toDateString()}}" required>
                            </div>
                        </div>
                        <div>
                            <a href=""  class="btn btn-primary search" style="color: white;margin-top: 25px"> view Audits</a>
                        </div>
                    </div>

            <div class="table-responsive">
                <table class="table table-separate table-head-custom table-checkable" id="kt_datatable1">
                    <thead>
                    <tr>
                        <th >#</th>
                        <th >Action</th>
                        <th >Done By</th>
                        <th>Ip Address</th>
                        <th>Model Accessed</th>
                        <th>Old_values</th>
                        <th>New_values</th>
                        <th>Done_At</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php $i = 1;?>

                    @foreach($audits as $key=>$audit)

                        <tr>
                            <td>{{++$key}}</td>
                            <td>{{$audit->event}}</td>
                            <td> @if($audit->user_id==null) _ @else{{$audit->user->name}} @endif</td>
                            <td>{{$audit->ip_address}}</td>
                            <td>{{$audit->auditable_type}}</td>
                            <td>
                                <ul style="padding-left: 0 !important;margin-left: 5px !important;">
                                    @foreach($keys=array_keys(json_decode($audit->old_values,true)) as $value)
                                        <li>
                                            @if(is_array($value))
                                            @else
                                                {{$value}}
                                            @endif
                                            :
                                            @if(is_array(json_decode($audit->old_values,true)[$value]))
                                                {{json_decode($audit->old_values,true)[$value]["date"]}}
                                            @else
                                                {{json_decode($audit->old_values,true)[$value]}}
                                            @endif</li>

                                    @endforeach
                                </ul>
                            </td>
                            <td>
                                <ul style="padding-left: 0 !important;margin-left: 5px !important;">
                                    @foreach($keys=array_keys(json_decode($audit->new_values,true)) as $value)

                                        <li>
                                            @if(is_array($value))
                                            @else
                                                {{$value}}
                                            @endif
                                            :
                                            @if(is_array(json_decode($audit->new_values,true)[$value]))
                                                {{json_decode($audit->new_values,true)[$value]["date"]}}
                                            @else
                                                {{json_decode($audit->new_values,true)[$value]}}
                                            @endif</li>
                                    @endforeach
                                </ul>
                            </td>
                            <td>{{$audit->created_at}}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

@stop

@section('scripts')
    <script src="{{asset("assets/plugins/custom/datatables/datatables.bundle.js?v=7.0.3")}}"></script>
    <script>
        $(function () {
            $('#kt_datatable1').DataTable({
                'paging'      : true,
                'lengthChange': true,
                'searching'   : true,
                'ordering'    : true,
                'info'        : true,
                'autoWidth'   : true,
                "order": [],
                "columnDefs": [ {
                    "targets"  : 'no-sort',
                    "orderable": false
                }]
            });
        });
        $(document).ready(function () {
            $('.search').click(function () {
                var $start=$('.start').val();
                var $end=$('.end').val();
                var $link='/admin/system-history/audits-from/'+$start+'/to/'+$end;
                $('.search').attr('href',$link);


            });
        });
    </script>
@endsection

