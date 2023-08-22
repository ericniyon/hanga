<div>
    <div class="card-body">
        <form enctype="multipart/form-data" method="POST">@csrf
        <div class="row">
            <div class="col-md-7 border-right">
                <div class="row">
                    <div class="form-group col-md-12">
                        <label for="validationCustom01" class="col-form-label pt-0"><span>*</span> Title</label>
                        <input class="form-control  @error('title') is-invalid @enderror" wire:model="title" id="validationCustom01" type="text" required>
                        @error('title')
                        <span class="invalid-feedback" role="alert">{{$message}}</span>
                    @enderror
                    </div>
                    <div class="form-group col-md-6">
                        <label for="validationCustom01" class="col-form-label pt-0"><span>*</span> Select Packeg</label>
                        <select name="" wire:model='membership_packeges_id' id="" class="form-control">
                             <option value="">--- Select Packege ---</option>
                            @forelse (App\Models\MembershipPackege::all() as $item)

                            <option value="{{ $item->id }}">{{ $item->packege_name }}</option>
                            @empty

                            @endforelse
                        </select>
                        @error('membership_packeges_id')
                        <span class="invalid-feedback" role="alert">{{$message}}</span>
                    @enderror
                    </div>
                    <div class="form-group col-md-6">
                        <label for="validationCustom01" class="col-form-label pt-0"><span>*</span> Select Category</label>
                        <select name="" wire:model='category' id="" class="form-control">
                             <option value="">--- Select Category ---</option>
                            <option value="Stundent">Stundent</option>
                            <option value="Innovators">Innovators</option>
                            <option value="Startups">Startups</option>
                            <option value="ICT SME">ICT SME</option>
                            <option value="Corporate">Corporate</option>
                            <option value="ICT Consultant">ICT Consultant</option>
                            <option value="iWorkers">iWorkers</option>
                            <option value="ICT Community & Partners">ICT Community & Partners</option>

                        </select>
                        @error('category')
                        <span class="invalid-feedback" role="alert">{{$message}}</span>
                    @enderror
                    </div>



                </div>
            </div>
            <div class="col-md-5 border-left">
                <div class="form-group">
                    <label class="col-form-label"><span>*</span> Short Description</label> <br>
                    <textarea wire:model="description" class="form-control" cols="3" rows="6" class=" @error('description') is-invalid @enderror"></textarea>
                </div>
            </div>
        </div>
       <hr>
       <h4>Service Benefits Items</h4>

              @foreach($currentItems as $index=>$__item)
        {{-- @dump($__item->name) --}}
           <ul>
        <li>{{ $__item->name }}
            <span class="" wire:click='removeItem({{ $__item->id }})' data-bs-toggle="tooltip" data-bs-placement="top" title="You are going to delete item">
                <i class="fa fa-times-circle text-danger"></i></span>

        </li>
       </ul>
       @endforeach
        <div class=" add-input">
            @foreach($itemsLoop as $index=>$item)
            <div class="row">
                 <div class="form-group col-md-3">
                    <label >Name</label>
                    <input type="text"  value="itemsLoop[{{$index}}][name]"
                    name="itemsLoop[{{$index}}][name]"
                    wire:model.lazy="itemsLoop.{{$index}}.name"
                    class="form-control @error('itemsLoop.'.$index.'name') is-invalid @enderror" required>
                    @error('itemsLoop.'.$index.'name')
                        <span class="invalid-feedback" role="alert">{{$message}}</span>
                    @enderror
                </div>

                <div class="form-group col-md-1 pt-3 d-flex justify-content-end align-items-center">
                    <button class="btn btn-outline-none text-success p-2 mr-2" wire:click.prevent="addNewRow">
                        <i class="fa fa-plus"></i>
                    </button>
                    <button class="btn btn-outline-none p-2 text-danger"
                    wire:click.prevent="removeRow({{$index}})"
                    {{$index==0?'disabled':''}}>
                        <i class="fa fa-minus"></i>
                    </button>
                </div>
            </div>
            @endforeach
        </div>


        <div class="row">
            <div class="col-md-12">
                <button type="button" wire:click.prevent="update" class="btn btn-primary  btn-md">Submit</button>
            </div>
        </div>

    </form>
        <!--end: form-->
    </div>
</div>
