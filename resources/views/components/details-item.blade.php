<div class="col-md-6">
    <div class="row">
        <label class="col-5 col-form-label">{{$label}}:</label>
        <div class="col-7">
            <span class="form-control-plaintext font-weight-bolder">
              {{ is_null($value)? $model[$key]??'N/A':$value }}
            </span>
        </div>
    </div>
</div>
