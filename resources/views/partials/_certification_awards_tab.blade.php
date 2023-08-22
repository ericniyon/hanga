<div class="pb-5" data-wizard-type="step-content">
    <div class="d-flex justify-content-between mb-3">
        <h4 class="mb-0 font-weight-bold text-dark">
            Certification standards awards
        </h4>
        <button type="button" id="addCertificateButton"
                class="btn btn-primary btn-sm font-weight-bolder">
            @include('partials._add_svg_icon')
            Add New
        </button>
    </div>
    @php
        $awards=\App\Models\CertificationAward::where('application_id','=',$model->application_id??0 )->latest()->get();
    @endphp

    @if($awards->count()==0)
        <div class="alert alert-custom alert-notice alert-light-warning  rounded-0">
            <div class="alert-icon">
                @include('partials._alert_info_icon')
            </div>
            <div class="alert-text">
                Nothing added yet. click the <strong>Add New</strong>
                to add some.
            </div>
        </div>
    @else
        <div class="card card-body p-0 rounded-sm">
            <div class="table-responsive">
                <table class="table table-head-solid table-head-custom table-hover">
                    <thead>
                    <tr>
                        <th>Name</th>
                        <th>Category</th>
                        <th>Issue Date</th>
                        <th>Expiry Date</th>
                        <th>Options</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($awards as $item)
                        <tr>
                            <td>{{ $item->name }}</td>
                            <td>{{ $item->category }}</td>
                            <td>{{ optional($item->issue_date)->toDateString() }}</td>
                            <td>{{ optional($item->expiry_date)->toDateString() }}</td>
                            <td>
                                <div class="">
                                    <button type="button"
                                            data-id="{{ $item->id }}"
                                            data-name="{{ $item->name }}"
                                            data-description="{{ $item->description }}"
                                            data-category="{{ $item->category }}"
                                            data-issue_date="{{ optional($item->issue_date)->toDateString() }}"
                                            data-expiry_date="{{ optional($item->expiry_date)->toDateString() }}"
                                            class="btn btn-sm btn-light-info js-edit-certification">
                                        Edit
                                    </button>
                                    <a href="{{ route('client.awards.destroy',encryptId($item->id)) }}"
                                       class="btn btn-sm btn-danger js-delete">
                                        Delete
                                    </a>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    @endif

</div>
