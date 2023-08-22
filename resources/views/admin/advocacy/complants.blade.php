@extends('layouts.master')

@section('content')
<div class="subheader py-2 py-lg-4 subheader-solid" id="kt_subheader">
    <div class="container-fluid d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
        <!--begin::Info-->
        <div class="d-flex align-items-center flex-wrap mr-1">
            <!--begin::Page Heading-->
            <div class="d-flex align-items-baseline mr-5">
                <!--begin::Page Title-->
                <h5 class="text-dark font-weight-bold my-2 mr-5">Advocacy</h5>
                <!--end::Page Title-->
                <!--begin::Breadcrumb-->
                <ul class="breadcrumb breadcrumb-transparent breadcrumb-dot font-weight-bold p-0 my-2 font-size-sm">
                    <li class="breadcrumb-item">
                        <a href="http://127.0.0.1:8000/admin/dashboard" class="text-muted">Home</a>
                    </li>
                    <li class="breadcrumb-item">
                        <a class="text-active">Advocacy</a>
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
    <!-- Row -->
    <div class="row">
      <!-- Datatables -->
      <div class="col-lg-12">
        <div class="card mb-4">
          <div class="table-responsive p-3">

            <ul class="nav nav-tabs" id="myTab" role="tablist">
  <li class="nav-item" role="presentation">
    <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home-tab-pane" type="button" role="tab" aria-controls="home-tab-pane" aria-selected="true">Access to Finance</button>
  </li>
  <li class="nav-item" role="presentation">
    <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile-tab-pane" type="button" role="tab" aria-controls="profile-tab-pane" aria-selected="false">Access to Market</button>
  </li>
  <li class="nav-item" role="presentation">
    <button class="nav-link" id="contact-tab" data-bs-toggle="tab" data-bs-target="#contact-tab-pane" type="button" role="tab" aria-controls="contact-tab-pane" aria-selected="false">Capacity Building</button>
  </li>

</ul>


<div class="tab-content" id="myTabContent">
  <div class="tab-pane fade show active" id="home-tab-pane" role="tabpanel" aria-labelledby="home-tab" tabindex="0">

    <div class="card">
        <div class="card-body">

            <div class="row">
                <div class="col-md-6">
                    <form action="{{ route('admin.saving_access') }}" method="POST">
                        @csrf
            <label for="inputPassword5" class="form-label">Service Name</label>
            <input type="text" id="inputPassword5" name="name" class="form-control" aria-labelledby="passwordHelpBlock" required autocomplete="off">

            <button class="btn btn-primary btn-md my-5 " type="submit">Submit</button>
            </form>
                </div>
                <div class="col-md-6">
                    <ul>

                        @forelse (App\Models\AccessToFinanceInterest::all() as $item)
                        <li>{{ $item->name }}</li>
                        @empty

                        @endforelse
                    </ul>
                </div>
            </div>

        </div>
    </div>
  </div>
  <div class="tab-pane fade" id="profile-tab-pane" role="tabpanel" aria-labelledby="profile-tab" tabindex="0">

  <div class="card">
        <div class="card-body">

            <div class="row">
                <div class="col-md-6">
                    <form action="{{ route('admin.saving_accessmarket') }}" method="POST">
                        @csrf
            <label for="inputPassword5" class="form-label">Service Name</label>
            <input type="text" id="inputPassword5" name="name" class="form-control" aria-labelledby="passwordHelpBlock" required autocomplete="off">

            <button class="btn btn-primary btn-md my-5 " type="submit">Submit</button>
            </form>
                </div>
                <div class="col-md-6">
                    <ul>

                        @forelse (App\Models\AccessToMarketInterest::all() as $item)
                        <li>{{ $item->name }}</li>
                        @empty

                        @endforelse
                    </ul>
                </div>
            </div>

        </div>
    </div>

  </div>
  <div class="tab-pane fade" id="contact-tab-pane" role="tabpanel" aria-labelledby="contact-tab" tabindex="0">

    <div class="card">
        <div class="card-body">

            <div class="row">
                <div class="col-md-6">
                    <form action="{{ route('admin.capacity_builiding') }}" method="POST">
                        @csrf
            <label for="inputPassword5" class="form-label">Service Name</label>
            <input type="text" id="inputPassword5" name="name" class="form-control" aria-labelledby="passwordHelpBlock" required autocomplete="off">

            <button class="btn btn-primary btn-md my-5 " type="submit">Submit</button>
            </form>
                </div>
                <div class="col-md-6">
                    <ul>

                        @forelse (App\Models\CapacityBuilidingItems::all() as $item)
                        <li>{{ $item->name }}</li>
                        @empty

                        @endforelse
                    </ul>
                </div>
            </div>

        </div>
    </div>

  </div>
</div>
          </div>
        </div>
      </div>
    </div>
    <!--Row-->


@endsection
