<div class="modal fade drawer right-align" id="payModalRight" tabindex="-1" role="dialog"
    aria-labelledby="exampleModalLabel" aria-hidden="true" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header" style="background: #FFEDED; display: block; justify-content: center">
                <img src="http://ihuzo.rw:8080/frontend/assets/logo.png" alt="ihuzo" style="width: 5rem; ">
                <br>

                <p class="" id="exampleModalLabel">+250 781 499 535 / enquiries@ihuzo.com</p>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row align-center px-5 mt-5">
                    <div class="text-right">
                    </div>
                    <div class="tabs mt-3">
                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                            <li class="nav-item" role="presentation">
                                <a class="nav-link active" id="visa-tab" data-toggle="tab" href="#visa"
                                    role="tab" aria-controls="visa" aria-selected="true">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                        fill="currentColor" class="bi bi-receipt" viewBox="0 0 16 16">
                                        <path
                                            d="M1.92.506a.5.5 0 0 1 .434.14L3 1.293l.646-.647a.5.5 0 0 1 .708 0L5 1.293l.646-.647a.5.5 0 0 1 .708 0L7 1.293l.646-.647a.5.5 0 0 1 .708 0L9 1.293l.646-.647a.5.5 0 0 1 .708 0l.646.647.646-.647a.5.5 0 0 1 .708 0l.646.647.646-.647a.5.5 0 0 1 .801.13l.5 1A.5.5 0 0 1 15 2v12a.5.5 0 0 1-.053.224l-.5 1a.5.5 0 0 1-.8.13L13 14.707l-.646.647a.5.5 0 0 1-.708 0L11 14.707l-.646.647a.5.5 0 0 1-.708 0L9 14.707l-.646.647a.5.5 0 0 1-.708 0L7 14.707l-.646.647a.5.5 0 0 1-.708 0L5 14.707l-.646.647a.5.5 0 0 1-.708 0L3 14.707l-.646.647a.5.5 0 0 1-.801-.13l-.5-1A.5.5 0 0 1 1 14V2a.5.5 0 0 1 .053-.224l.5-1a.5.5 0 0 1 .367-.27zm.217 1.338L2 2.118v11.764l.137.274.51-.51a.5.5 0 0 1 .707 0l.646.647.646-.646a.5.5 0 0 1 .708 0l.646.646.646-.646a.5.5 0 0 1 .708 0l.646.646.646-.646a.5.5 0 0 1 .708 0l.646.646.646-.646a.5.5 0 0 1 .708 0l.646.646.646-.646a.5.5 0 0 1 .708 0l.509.509.137-.274V2.118l-.137-.274-.51.51a.5.5 0 0 1-.707 0L12 1.707l-.646.647a.5.5 0 0 1-.708 0L10 1.707l-.646.647a.5.5 0 0 1-.708 0L8 1.707l-.646.647a.5.5 0 0 1-.708 0L6 1.707l-.646.647a.5.5 0 0 1-.708 0L4 1.707l-.646.647a.5.5 0 0 1-.708 0l-.509-.51z" />
                                        <path
                                            d="M3 4.5a.5.5 0 0 1 .5-.5h6a.5.5 0 1 1 0 1h-6a.5.5 0 0 1-.5-.5zm0 2a.5.5 0 0 1 .5-.5h6a.5.5 0 1 1 0 1h-6a.5.5 0 0 1-.5-.5zm0 2a.5.5 0 0 1 .5-.5h6a.5.5 0 1 1 0 1h-6a.5.5 0 0 1-.5-.5zm0 2a.5.5 0 0 1 .5-.5h6a.5.5 0 0 1 0 1h-6a.5.5 0 0 1-.5-.5zm8-6a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 0 1h-1a.5.5 0 0 1-.5-.5zm0 2a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 0 1h-1a.5.5 0 0 1-.5-.5zm0 2a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 0 1h-1a.5.5 0 0 1-.5-.5zm0 2a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 0 1h-1a.5.5 0 0 1-.5-.5z" />
                                    </svg>
                                    MTN Mobile Money
                                </a>
                            </li>
                            
                        </ul>
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active" id="visa" role="tabpanel"
                                aria-labelledby="visa-tab">
                                <div class="">
                                    <div class="card-body">
                                    <h1 class="text-bold" style="font-weight: 800; font-size:1.5rem">We appreciate your order</h1>
                                    <p>Membership package</p>
                                    <small>{{ $packege->packege_name }}</small>
                                    <hr>
                                    <strong>
                                        <span>Total : {{ $plan_price  }}</span>
                                    </strong>


                                    <hr>

                                </div>
                                    <div class="form">
                                        
                                        
                                                        <form >
                                                        <input type="number" wire:model.defer="phoneNumnmber" class="form-control " 
                                                            required="required">
                                                            @error('phoneNumnmber') <span class="error">{{ $message }}</span> @enderror

                                                        <button type="button" wire:click.prevent='doPayment' class="btn btn-primary btn-block mt-12" style="margin-top: 2rem !important">Done</button>
                                                        </form>

                                        
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="paypal" role="tabpanel" aria-labelledby="paypal-tab">
                                <div class="card-body">
                                    <h1 class="text-bold" style="font-weight: 800; font-size:1.5rem">We appreciate your order</h1>
                                    <p>Membership package</p>
                                    <small>{{ $packege->packege_name }}</small>
                                    <hr>
                                    <strong>
                                        <span>Total : {{ $plan_price  }}</span>
                                    </strong>


                                    <hr>

                                </div>



                                <!-- Modal -->
                                <div class="tabs mt-3">
                                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                                        <li class="nav-item" role="presentation"> <a class="nav-link active"
                                                id="paypal-tab" data-toggle="tab" href="#mtn_momo" role="tab"
                                                aria-controls="mtn_momo" aria-selected="false"> MTN MOMO</a> </li>

                                        <li class="nav-item" role="presentation"> <a class="nav-link " disabled
                                                id="visa-tab" data-toggle="tab" href="#bank_card" role="tab"
                                                aria-controls="bank_card" aria-selected="true" > Visa/Master Card </a> </li>

                                    </ul>
                                    <div class="tab-content" id="myTabContent">
                                        {{-- <div class="tab-pane fade " id="bank_card" role="tabpanel"
                                            aria-labelledby="bank_card-tab">
                                            <div class="mt-4 mx-4">
                                                <div class="text-center">
                                                    <h5>Credit card</h5>
                                                </div>
                                                <div class="form mt-3">
                                                    <div class="inputbox"> <input type="text" name="name"
                                                            class="form-control" required="required"> <span>Cardholder
                                                            Name</span> </div>
                                                    <div class="inputbox"> <input type="text" name="name"
                                                            min="1" max="999" class="form-control"
                                                            required="required"> <span>Card
                                                            Number</span> <i class="fa fa-eye"></i>
                                                    </div>
                                                    <div class="d-flex flex-row">
                                                        <div class="inputbox"> <input type="text" name="name"
                                                                min="1" max="999" class="form-control"
                                                                required="required"> <span>Expiration
                                                                Date</span> </div>
                                                        <div class="inputbox"> <input type="text" name="name"
                                                                min="1" max="999" class="form-control"
                                                                required="required"> <span>CVV</span>
                                                        </div>
                                                    </div>
                                                    <div class="px-5 pay"> <button
                                                            class="btn btn-primary mt-12 btn-block" style="margin-top: 2rem !important">Add
                                                            card</button> </div>
                                                </div>
                                            </div>
                                        </div> --}}
                                        <div class="tab-pane fade show active" id="mtn_momo" role="tabpanel"
                                            aria-labelledby="mtn_momo-tab">
                                            <div class="px-5 mt-5">
                                                <div class="inputbox">
                                                        
                                                        


                                                    {{-- <span>MTN contact</span> --}}
                                                </div>
                                                <div class="pay px-5">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>



                                {{-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <a type="button" id="paypal-tab" data-toggle="tab" class="rounded-full py-3 px-10"
                                    href="#paypal" style="background: #F5841F;color:#fff;border-radius: 50px">
                                    Subscribe
                                </a> --}}
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            {{-- <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <a type="button" id="paypal-tab" data-toggle="tab" class="rounded-full py-3 px-10"  href="#paypal"
                    style="background: #F5841F;color:#fff;border-radius: 50px">
                    Subscribe
                </a>
            </div> --}}
        </div>
    </div>


</div>
