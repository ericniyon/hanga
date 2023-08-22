<div>
    @php
        $complaint_id ;
    @endphp
    {{-- Success is as dangerous as failure. --}}
    <div class="card card-custom gutter-b">
        <div class="card-header flex-wrap">
            <div class="card-title" style="display: flex">

                <h3 class="card-label">Complaints List</h3>

            </div>


        </div>
        <div class="card-body">
            <!--begin: Datatable-->
            <div class="card-header">
        <div class="row">
            <h5>Filiters</h5>
        </div>
        <div class="row mt-2">
            <div class="col-md-1">
                <select wire:model.lazy="perPage" id="" class="form-control">
                    <option value="10">10</option>
                    <option value="25">25</option>
                    <option value="50">50</option>
                    <option value="100">100</option>
                </select>
            </div>
            <div class="col-md-3">
                <input type="search" wire:model.debounce.500="searchKey" id="" class="form-control"
                placeholder="search order">
            </div>
            <div class="col-md-3 d-flex align-items-center">
                <label for="" class="mt-2 mr-2">From: </label>
                <input type="date" wire:model.lazy="from" id="" class="form-control"
                min='2022-01-01' max="{{date('Y-d-m')}}">
            </div>
            <div class="col-md-3 d-flex align-items-center">
                <label for="" class="mt-2 mr-2">To: </label>
                <input type="date" wire:model.lazy="until" id="" class="form-control"
                min='2022-01-01' max="{{date('Y-d-m')}}">
            </div>
            <div class="col-md-2">
                <select wire:model.lazy="bySkills" id="" class="form-control">
                    <option value="">All</option>
                    <option value="Complants"> Complants</option>
                    <option value="Recommandations">Recommandations</option>
                    <option value="Issues">Issues</option>
                    <option value="Suggestions">Suggestions</option>
                </select>
            </div>
        </div>
    </div>
            <div class="table-responsive">
                <div class="">
                    {{-- filters setions  --}}

                </div>
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Full Name</th>
                            <th>Email</th>
                            <th>Phone Number</th>
                            <th>Addressed To</th>
                            <th>Category</th>
                            <th>Status</th>
                            <th>Document</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse (App\Models\Advocacie::all() as $complaint)
                        <tr>
                            <td>{{ $complaint->name }}</td>
                            <td>{{ $complaint->email }}</td>
                            <td>{{ $complaint->phone }}</td>
                            <td>
                                @foreach ($complaint->client as $item)
                                                {{-- {{ $item }}
                                                {{ App\Models\Application::all() }} --}}
                                                {{-- {{ \App\Models\Application::where('client_id', $item->id)->get() }} --}}
                                                @forelse ($item->application as $item)
                                                <strong>
                                                    #{{ $item->msmeRegistration ? $item->msmeRegistration : $item->dspRegistration->company_name }}
                                                </strong>
                                                @empty
                                                @endforelse
                                                {{-- {{ $item->application }} --}}
                                                @endforeach
                            </td>
                            <td>{{ $complaint->category }}

                            </td>
                            <td>
                                @if ($complaint->status == 'Pending')
                                <span class="text-primary">{{ $complaint->status }}</span>
                                @elseif ($complaint->status == 'ToProducer')
                                <span class="text-info">{{ $complaint->status ? 'To Producer' : '' }}</span>
                                @elseif ($complaint->status == 'PublishedToWeb')
                                <span class="text-success">{{ $complaint->status ? 'To Producer' : '' }}</span>

                                @else

                                @endif
                                {{--  --}}
                            </td>
                            <td>
                                <a href="{{ route('client.complaint.document',$complaint->id) }}" target="_blank">Preview</a>
                            </td>
                            <td>
                                  <a type="button" class="btn btn-primary" data-toggle="modal"
                                    data-target="#exampleModalLong-{{ $complaint->id }}">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eye-fill" viewBox="0 0 16 16">
                                        <path d="M10.5 8a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0z"/>
                                        <path d="M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8zm8 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7z"/>
                                      </svg>
                                {{-- Confirm --}}
                            </a>
                            {{-- </button> --}}

                            </td>
                        </tr>

<!--start::Store Opportunity-->
<div class="modal fade" id="exampleModalLong-{{ $complaint->id }}" data-backdrop="static" tabindex="-1" role="dialog"
aria-labelledby="staticBackdrop" aria-hidden="true">
<div class="modal-dialog modal-lg">
   <form>
       @csrf
       <div class="modal-content">
           <div class="modal-header">
               <h4 class="modal-title">{{ $complaint->category }} Preview</h4>
               <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                   <i aria-hidden="true" class="ki ki-close"></i>
               </button>
           </div>
           <div class="modal-body">

            <input type="hidden" class="complaint_id" value="{{ $complaint->id }}">
               <div class="row">
                   <div class="col-lg-12">
                    {!! html_entity_decode($complaint->complaint) !!}

                   </div>
               </div>
           </div>
           <div class="modal-footer">
               <div class="btn-group">
                   <button type="button" class="btn btn-default" data-dismiss="modal"><i class="la la-close"></i>Close</button>
                   <button type="button" wire:click="byStatus({{ $complaint->id }})" class="btn btn-primary" ><i class="la la-check"></i>Confirm </button>
               </div>
           </div>
       </div>
   </form>
   <!-- /.modal-content -->
</div>
</div>
<!--end::Store Opportunity-->
                        @empty

                        @endforelse
                    </tbody>
                    <tfoot>
                    <tr>
                    <tr>
                        {{-- <td>Showing {{ $complaint->count()  }} of {{ \App\Models\ApplicantInfo::all()->count()  }}</td> --}}
                    </tr>
                    </tr>
                </tfoot>
                </table>

                {{-- {{$dataTable->table()}} --}}
            </div>
            <!--end: Datatable-->
        </div>
    </div>



    <script>
        $(document).ready(function(){
            $('#inputId').on('click',function(e){
                @this.set('complaint_id',$(this).val());
            });


        });
    </script>


</div>
