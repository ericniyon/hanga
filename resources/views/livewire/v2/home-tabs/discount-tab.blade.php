<div wire:id="" class="row">
    <div class="col-12 h-20px">
        <div wire:loading class="w-100 h-100">
            <div class="h-100 w-100 d-flex  align-items-center justify-content-center">
                <div>Please wait ... &nbsp;</div>
                <img src="http://app.ihuzo.rw/assets/loader.svg" alt="" class="h-30px">
            </div>
        </div>
    </div>



    <div class="col-lg-3" x-data="{ open: true }">
        <h4 class="mb-3 d-lg-none d-flex justify-content-between align-items-center">
            <span>
                <span class="svg-icon"> <svg width="19" height="22" viewBox="0 0 19 22" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M5.414 0.414062L4 1.82806L5.172 3.00006H1C0.734784 3.00006 0.48043 3.10542 0.292893 3.29296C0.105357 3.48049 0 3.73485 0 4.00006V6.59006C0 7.11306 0.213 7.62706 0.583 7.99706L6 13.4141V21.0001C6.0002 21.1704 6.04387 21.3379 6.1269 21.4867C6.20992 21.6355 6.32955 21.7606 6.47444 21.8502C6.61934 21.9399 6.78471 21.991 6.9549 21.9989C7.1251 22.0067 7.29447 21.971 7.447 21.8951L11.447 19.8951C11.786 19.7251 12 19.3791 12 19.0001V13.4141L13.793 11.6211L16.728 14.5561L18.142 13.1421L5.414 0.414062ZM12.379 10.2071L10.293 12.2931C10.2 12.3858 10.1262 12.496 10.0759 12.6173C10.0256 12.7386 9.99981 12.8687 10 13.0001V18.3821L8 19.3821V13.0001C8.00019 12.8687 7.9744 12.7386 7.92412 12.6173C7.87383 12.496 7.80004 12.3858 7.707 12.2931L2 6.59006V5.00006H7.172L12.379 10.2071V10.2071Z"
                            fill="#2A337E" />
                        <path
                            d="M17.0001 3H10.8281L12.8281 5H16.0011L16.0031 6.583L15.2071 7.379L16.6211 8.793L17.4171 7.997C17.7871 7.627 18.0001 7.113 18.0001 6.59V4C18.0001 3.73478 17.8948 3.48043 17.7072 3.29289C17.5197 3.10536 17.2653 3 17.0001 3Z"
                            fill="#2A337E" />
                    </svg>
                </span>
                Filter By
            </span>
        </h4>

        <div class="row my-4 justify-content-center">
            <div class="col-12">
                <div class="input-group input-group-lg">

                    <input type="search" class="form-control font-weight-bolder tw-rounded-lg-r"
                        wire:model.debounce.500ms="search" placeholder="Search Owner Or Discount Title ">

                </div>
            </div>
        </div>
        <!-- Start Left Menu-->
        <div class="accordion accordion-light accordion-light-borderless accordion-svg-toggle" id="accordion1">
            <div class="card bg-white-light shadow-none rounded-0 my-2 border overflow-hidden">

                @foreach ($discountCategories as $item)
                    <div
                        class="bg-light-light shadow-none rounded-0 my-2 p-3 d-flex justify-content-between align-items-start">
                        <h5 class="mb-0">
                            <span class="svg-icon">
                                <svg width="15" height="15" viewBox="0 0 15 15" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path d="M8.75 1.25H13.75V2.5H8.75V1.25Z" fill="#2A337E" />
                                    <path d="M6.25 1.25H7.5V2.5H6.25V1.25Z" fill="#2A337E" />
                                    <path d="M8.75 3.75H13.75V5H8.75V3.75Z" fill="#2A337E" />
                                    <path d="M6.25 3.75H7.5V5H6.25V3.75Z" fill="#2A337E" />
                                    <path d="M8.75 6.25H13.75V7.5H8.75V6.25Z" fill="#2A337E" />
                                    <path d="M6.25 6.25H7.5V7.5H6.25V6.25Z" fill="#2A337E" />
                                    <path
                                        d="M3.125 12.5C3.47018 12.5 3.75 12.2202 3.75 11.875C3.75 11.5298 3.47018 11.25 3.125 11.25C2.77982 11.25 2.5 11.5298 2.5 11.875C2.5 12.2202 2.77982 12.5 3.125 12.5Z"
                                        fill="#2A337E" />
                                    <path d="M2.5 2.5H3.75V8.125H2.5V2.5Z" fill="#2A337E" />
                                    <path
                                        d="M4.375 1.25H1.875C1.70924 1.25 1.55027 1.31585 1.43306 1.43306C1.31585 1.55027 1.25 1.70924 1.25 1.875V13.125C1.25 13.2908 1.31585 13.4497 1.43306 13.5669C1.55027 13.6842 1.70924 13.75 1.875 13.75H4.375C4.54076 13.75 4.69973 13.6842 4.81694 13.5669C4.93415 13.4497 5 13.2908 5 13.125V1.875C5 1.70924 4.93415 1.55027 4.81694 1.43306C4.69973 1.31585 4.54076 1.25 4.375 1.25ZM4.375 13.125H1.875V1.875H4.375V13.125Z"
                                        fill="#2A337E" />
                                </svg>
                            </span>
                            {{ $item->category_name }}
                        </h5>
                        <label class="checkbox checkbox-info" wire:key="discount_{{ $item->id }}">
                            <input type="checkbox" value="{{ $item->id }}" id="{{ $item->id }}"
                                wire:model="category_name" name="category_name[]" />

                            <span class="border-info border-2 rounded-sm"></span>
                        </label>

                    </div>
                @endforeach

            </div>

        </div>

        <!-- End Left Menu-->
    </div>

    <div class="col-lg-9">

        <div class="tab">


            <div class="tabcontent" style="{{ $showAllCoupons == 1 ? 'display: block;' : 'display: none' }}">
                <!--- view my discount --->
                {{-- <h1>iHuzo Promo Codes, Coupons & Discount Codes | May 2022</h1> --}}

                @if (auth('client')->check())
                    <div class="row">
                        <div class="co-md-6 col-lg-6 col-sm-6">

                            <button class="tablinks  active" wire:click="showTab('tab1')"
                                style="
    background: transparent;
    border: none;
    left: 35px;
    top: 7px;

    font-family: 'Roboto';
    font-style: normal;
    font-weight: 700;
    font-size: 16px;
    line-height: 19px;
    /* identical to box height */

    align-items: center;
    text-align: center;

    color: #2A337E;

    ">Coupons
                                And Discount</button>


                        </div>
                        <div class="co-md-6 col-lg-6 col-sm-6">

                            <button class="tablinks {{ $MyCoupons == 1 ? 'active' : '' }}"
                                style="float:right;
    background: transparent;
    border: none;
left: 35px;
top: 7px;

font-family: 'Roboto';
font-style: normal;
font-weight: 700;
font-size: 16px;
line-height: 19px;
/* identical to box height */


align-items: center;
text-align: center;

color: #2A337E;
    "
                                wire:click="showTab('tab2')">
                                <i></i>
                                My Coupons And Discount</button>

                        </div>
                    </div>
                @endif
                <div class="row  justify-content-center mb-5">

                    <div class="col-md-12 " style="justify-content: center">
                        @foreach (\App\Models\FeatureContent::where('tab', 'Discounts')->get() as $key => $content)
                            {!! $content->content !!}
                        @endforeach
                    </div>
                </div>
                @foreach ($discounts as $discount)
                    @php
                        $fdate = $discount->from;
                        $tdate = $discount->to;

                        $datetime1 = new DateTime($fdate);
                        $datetime2 = new DateTime($tdate);
                        $interval = $datetime1->diff($datetime2);
                        $days = $interval->format('%a');
                    @endphp

                    <div class="d-flex mt-5 flex-column flex-md-row align-items-center mb-9 card card-body border-light overflow-hidden  dp-card"
                        style="padding: 1em">
                        <div class=""
                            style="border-radius: 11.05px; border:2px solid #2A337E; font-size: 1.4em; padding:1em 1.7em">
                            <b style="font-size: 1.5em">{{ $discount->discount }}%</b> <br> <b>OFF</b>
                            <br>
                            <span style="font-size: 10px" class="badge badge-info">Coupons</span>
                        </div>
                        <p>
                            {{ $discount->description }}
                        </p>
                        <br>
                        <span class="svg-icon ml-2 te">

                            <svg viewBox="0 0 20 25" class="h-6 w-6" fill="none" stroke="currentColor"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M19.5971 3.18922L10.4109 0.0568054C10.3 0.0189351 10.1513 0 10.0026 0C9.85396 0 9.70527 0.0189351 9.59443 0.0568054L0.408216 3.18922C0.183833 3.26496 0 3.52464 0 3.76268V16.8117C0 17.0497 0.154095 17.3635 0.340631 17.5123L9.65931 24.778C9.75393 24.851 9.87559 24.8889 9.99994 24.8889C10.1243 24.8889 10.2487 24.851 10.3406 24.778L19.6593 17.5123C19.8458 17.3662 19.9999 17.0524 19.9999 16.8117V3.76268C20.0053 3.52464 19.8215 3.26766 19.5971 3.18922V3.18922ZM18.0588 16.2923L10.0026 22.5734L1.94646 16.2923V4.72567L10.0026 1.97737L18.0588 4.72567V16.2923ZM7.08836 10.8552C7.00726 10.7443 6.8775 10.6767 6.73692 10.6767H5.24463C5.06891 10.6767 4.96618 10.8769 5.06891 11.0203L8.48603 15.727C8.52643 15.7823 8.57932 15.8273 8.64039 15.8584C8.70146 15.8894 8.76898 15.9056 8.83747 15.9056C8.90596 15.9056 8.97349 15.8894 9.03456 15.8584C9.09562 15.8273 9.14851 15.7823 9.18892 15.727L14.9364 7.80939C15.0391 7.66603 14.9364 7.46586 14.7607 7.46586H13.2684C13.1305 7.46586 12.998 7.53348 12.9169 7.64439L8.83747 13.2654L7.08836 10.8552Z"
                                    fill="currentColor"></path>

                            </svg>
                            Used: 0 <span class="text-info ml-5"> {{ $days }} days remaining</span>
                        </span>
                        <div class="d-flex align-items-center mt-3">
                            <div class="mr-2">
                                <span class="font-weight-bolder">
                                    Share on
                                </span>
                            </div>
                            <p>
                                {{ $discount->description }}
                            </p>
                            <br>
                            <span class="svg-icon ml-2 te">

                                <svg viewBox="0 0 20 25" class="h-6 w-6" fill="none" stroke="currentColor"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M19.5971 3.18922L10.4109 0.0568054C10.3 0.0189351 10.1513 0 10.0026 0C9.85396 0 9.70527 0.0189351 9.59443 0.0568054L0.408216 3.18922C0.183833 3.26496 0 3.52464 0 3.76268V16.8117C0 17.0497 0.154095 17.3635 0.340631 17.5123L9.65931 24.778C9.75393 24.851 9.87559 24.8889 9.99994 24.8889C10.1243 24.8889 10.2487 24.851 10.3406 24.778L19.6593 17.5123C19.8458 17.3662 19.9999 17.0524 19.9999 16.8117V3.76268C20.0053 3.52464 19.8215 3.26766 19.5971 3.18922V3.18922ZM18.0588 16.2923L10.0026 22.5734L1.94646 16.2923V4.72567L10.0026 1.97737L18.0588 4.72567V16.2923ZM7.08836 10.8552C7.00726 10.7443 6.8775 10.6767 6.73692 10.6767H5.24463C5.06891 10.6767 4.96618 10.8769 5.06891 11.0203L8.48603 15.727C8.52643 15.7823 8.57932 15.8273 8.64039 15.8584C8.70146 15.8894 8.76898 15.9056 8.83747 15.9056C8.90596 15.9056 8.97349 15.8894 9.03456 15.8584C9.09562 15.8273 9.14851 15.7823 9.18892 15.727L14.9364 7.80939C15.0391 7.66603 14.9364 7.46586 14.7607 7.46586H13.2684C13.1305 7.46586 12.998 7.53348 12.9169 7.64439L8.83747 13.2654L7.08836 10.8552Z"
                                        fill="currentColor"></path>

                                </svg>
                                Used: 12 <span class="text-info ml-5"> {{ $days }} days remaining</span>
                            </span>
                            <div class="d-flex align-items-center mt-3">
                                <div class="mr-2">
                                    <span class="font-weight-bolder">
                                        Share on
                                    </span>
                                </div>

                                <div class=" ">
                                    <link rel="stylesheet"
                                        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"
                                        integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w=="
                                        crossorigin="anonymous" referrerpolicy="no-referrer" />

                                    <style>
                                        ul li {
                                            display: inline-block;
                                            padding: 5px 5px 5px;
                                        }

                                        .fab {

                                            color: #121B65
                                        }

                                        #social-links {
                                            float: left;
                                        }
                                    </style>

                                    {!! $socialShareLink !!}

                                    {{-- {!! Share::page(url('/discount/details/'.
                                $discount->id))->facebook()->twitter()->whatsapp()->telegram() !!} --}}

                                    {{--
                                <x-social-media
                                    :url="route('discount.details', ['discount_id'=>encryptId($discount->id)])"
                                    :title="$discount->title" /> --}}


                                </div>

                            </div>

                            <div class="">
                                <div class="mr-2">
                                    <i class="bi bi-star"></i>
                                    <i class="bi bi-star"></i>
                                    <i class="bi bi-star"></i>
                                    <i class="bi bi-star"></i>
                                    <i class="bi bi-star"></i>
                                </div>
                            </div>

                        </div>
                        <!--end::Title-->
                        <div class="w-md-200px w-100">
                            <a href="#" wire:click="showDiscountDetail({{ $discount->id }})"
                                class="btn btn-info rounded border-2 my-2 w-md-180px w-100">
                                Get coupon code
                            </a>
                            @if (auth()->guard('client')->user())
                                <a href="#" wire:click="editDiscount({{ $discount->id }})"
                                    class="btn btn-warning rounded border-2 my-2 w-md-150px w-100">
                                    Edit
                                </a>
                            @endif
                            {{-- <a href="" class="btn btn-warning rounded border-2 my-2 w-md-150px w-100">
                            Get Code
                        </a> --}}
                        </div>

                    </div>
                @endforeach
                <!---end of my discount -->
                {{-- {{ $discounts->links() }} --}}
            </div>

            <div class="tabcontent " style="{{ $showMyCoupons == 1 ? 'display: block;' : 'display: none' }}">
                <!--- create my discount tab--->
                {{-- @if (session()->has('message'))
                <div class="alert-success">
                    {{ $message }}
                </div>
                @endif --}}
                <!--Start Create Discount Form-->
                @if (auth('client')->check())
                    <div class="container" style="margin: 5em">
                        <div class="row">
                            <div class="col-md-6">
                                <h4><b style="color:#121B65;">DISCOUNT DETAILS</b></h4>
                                <br>
                                <form>
                                    <div class="form-group">
                                        <label>Title</label> <small style="float:right;"
                                            class="form-text">Require.</small>
                                        <input type="text" wire:model="title" class="form-control"
                                            style="border:solid 1px #121B65;" required>
                                        @error('title')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label>Description</label> <small style="float:right;"
                                            class="form-text">Min.200
                                            Characters.</small>
                                        <textarea type="text" wire:model="description" rows="5" class="form-control"
                                            style="border:solid 1px #121B65;" required>
                    </textarea>
                                        @error('description')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror

                                    </div>
                                    <div class="form-group">
                                        <label>Cover Picture</label> <small style="float:right;"
                                            class="form-text">Require.</small>
                                        <div class="custom-file">
                                            <input type="file" wire:model.defer="cover_photo" name="cover_photo"
                                                class="custom-file-input">
                                            <label class="custom-file-label" for="customFile"
                                                style="border:solid 1px #121B65;" required> </label>

                                            @error('cover_photo')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <h4><b style="color:#121B65;">Discount Category</b></h4>
                                        <div class="row">
                                            @foreach ($discountCategories as $discountCategory)
                                                <div class="col-md-6">
                                                    <label class="checkbox checkbox-info">
                                                        <input type="checkbox" wire:model="category"
                                                            value="{{ $discountCategory->id }}"
                                                            name="category[]">{{ $discountCategory->category_name }}
                                                        <span class="rounded-sm"></span></label>
                                                </div>
                                                @error('category')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            @endforeach
                                        </div>

                                    </div>

                                    <div class="form-group">

                                    </div>
                                    <br>
                                    <button class="btn btn-info tw-rounded-l-lg" wire:click="saveAsDraft"
                                        type="button">Save
                                        As Draft</button>
                                    <button class="btn btn-primary m-5" wire:click="publishDiscount"
                                        type="button">Publish
                                        Discount</button>
                                </form>

                            </div>
                            <div class="col-md-6">

                                <h4><b style="color:#121B65;">TEAMS & CONDITION</b></h4>
                                <br>
                                <form>
                                    <!--Start Of Discount And Coupons-->
                                    <div class="container">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label>Discount(*)</label>
                                                    <input type="number" wire:model="discount" class="form-control"
                                                        style="border:solid 1px #121B65;" required>

                                                    @error('discount')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label>Coupons</label>
                                                    <input type="text" wire:model.lazy="coupon"
                                                        class="form-control" style="border:solid 1px #121B65;"
                                                        required>

                                                    @error('coupon')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>

                                            {{-- <div class="col-md-6">
                                            <p>Promo Code Will Be Automatically Generated</p>
                                        </div> --}}
                                        </div>
                                    </div>
                                    <!--End Of Discount And Coupons-->
                                    <!--Start Of Discount Period-->
                                    <div class="container" style="margin-top: 2em">
                                        <h6>Discount Period</h6>
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label>From</label>
                                                    <input type="date" wire:model="from" class="form-control"
                                                        style="border:solid 1px #121B65;" required>

                                                    @error('from')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label>To</label>
                                                    <input type="date" wire:model="to" class="form-control"
                                                        style="border:solid 1px #121B65;" required>

                                                    @error('to')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!--End Of Discount Period-->

                                    <br>
                                    <div class="container" style="margin-top: 3em">
                                        <h4><b style="color:#121B65;">SERVICES</b></h4>
                                        <!--Start Of Services-->
                                        <div class="row">
                                            <div class="form-group">
                                                @foreach ($services_lists as $service)
                                                    &nbsp;
                                                    <label class="checkbox checkbox-info">
                                                        <input type="checkbox" wire:model="services"
                                                            name="services[]"
                                                            value="{{ $service->id }}">{{ $service->name }}
                                                        <span class="rounded-sm"></span></label>
                                                @endforeach

                                                @error('service')
                                                    <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <!--End Of Services-->
                                    <br>

                                </form>
                            </div>
                            <!--End Create Discount Form-->
                            <!---end of create discount tab-->
                        </div>
                    </div>
                @endif

            </div>

            <!--- View Discount -------------------------------->
            <div class="tabcontent" style="{{ $showDiscountDetail == 1 ? 'display: block;' : 'display: none' }}; ">
                @if ($showDiscountDetail == 1)
                    <div class="mb-5">
                        {{ $discountDetail->description }}
                    </div>
                    <div class="">
                        @if (\Session::has('qrImage'))
                            <div class="mb-3">
                                {{ session()->get('qrImage') }}
                            </div>
                            <a wire:click.prevent='DownloadQrCode' class="btn bg-info text-white font-weight-500">
                                <svg class="text-white font-weight-500" xmlns="http://www.w3.org/2000/svg"
                                    width="16" height="16" fill="currentColor"
                                    class="bi bi-cloud-arrow-down-fill" viewBox="0 0 16 16">
                                    <path
                                        d="M8 2a5.53 5.53 0 0 0-3.594 1.342c-.766.66-1.321 1.52-1.464 2.383C1.266 6.095 0 7.555 0 9.318 0 11.366 1.708 13 3.781 13h8.906C14.502 13 16 11.57 16 9.773c0-1.636-1.242-2.969-2.834-3.194C12.923 3.999 10.69 2 8 2zm2.354 6.854-2 2a.5.5 0 0 1-.708 0l-2-2a.5.5 0 1 1 .708-.708L7.5 9.293V5.5a.5.5 0 0 1 1 0v3.793l1.146-1.147a.5.5 0 0 1 .708.708z" />
                                </svg> Get Code</a>
                        @endif
                    </div>
                @endif
            </div>



            <!--- View Discount -------------------------------->
            <div class="tabcontent" style="{{ $editDiscount == 1 ? 'display: block;' : 'display: none' }}; ">
                @if ($editDiscount == 1)

                    <div class="card">
                        <h1 class="p-5"
                            style="font-family: 'Quicksand';
                                font-style: normal;
                                font-weight: 700;
                                font-size: 16px;
                                line-height: 20px;">
                            <b>BUY ONE GET ANATHER</b>
                        </h1>
                        <div class="card-body">
                            <div class="row p-3"
                                style="border-top: 1px dashed #2A337E;border-bottom: 1px dashed #2A337E">
                                <div class="col-md-3">
                                    <div class="row" style="border-right: 1px dashed #2A337E;">
                                        <div class="col-md-12">
                                            <img src="{{ asset('frontend/assets/Group 275 (1).png') }}"
                                                alt="">
                                            <span>VIEWS</span>
                                        </div>
                                        <span class="p-5">1200</span>
                                        {{-- <span class="badge badge-info"
                                        style="padding-buttom: 0px;margin-buttom: 0px; border-radius: 50px; text-align: center">1200</span>
                                    --}}
                                    </div>
                                </div>


                                <div class="col-md-3">
                                    <div class="row" style="border-right: 1px dashed #2A337E;">
                                        <div class="col-md-12">
                                            <img src="{{ asset('frontend/assets/Group 275 (2).png') }}"
                                                alt="">
                                            <span>SHARED</span>
                                        </div>
                                        <span class="p-5">1200</span>

                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="row" style="border-right: 1px dashed #2A337E;">
                                        <div class="col-md-12">
                                            <img src="{{ asset('frontend/assets/Group 275 (3).png') }}"
                                                alt="">
                                            <span>USED COUPONS</span>
                                        </div>
                                        <span class="p-5">1200</span>

                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <img src="{{ asset('frontend/assets/Group 275 (1).png') }}"
                                                alt="">
                                            <span>TIME LINE</span>
                                        </div>
                                        <span class="p-5">1200</span>

                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>


                    <div class="card mt-5">
                        <div class="card-body">
                            <form>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Title</label> <small style="float:right;"
                                                class="form-text">Require.</small>
                                            <input type="text" wire:model="title" class="form-control"
                                                style="border:solid 1px #121B65;" required>
                                            @error('title')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>


                                    </div>
                                    <div class="col-md-6">

                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label>Discounts </label>
                                                    <input type="date" wire:model="from" class="form-control"
                                                        style="border:solid 1px #121B65;" required>

                                                    @error('from')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label>Coupons</label>
                                                    <input type="date" wire:model="to" class="form-control"
                                                        style="border:solid 1px #121B65;" required>

                                                    @error('to')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>

                                    </div>

                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Description</label> <small style="float:right;"
                                                class="form-text">Min.200
                                                Characters.</small>
                                            <textarea type="text" wire:model="description" rows="5" class="form-control"
                                                style="border:solid 1px #121B65;" required>
                    </textarea>
                                            @error('description')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror

                                        </div>
                                    </div>
                                    <div class="col-md-6">

                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label>From </label>
                                                    <input type="date" wire:model="from" class="form-control"
                                                        style="border:solid 1px #121B65;" required>

                                                    @error('from')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label>To</label>
                                                    <input type="date" wire:model="to" class="form-control"
                                                        style="border:solid 1px #121B65;" required>

                                                    @error('to')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>

                                    </div>




                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Cover Picture</label> <small style="float:right;"
                                                class="form-text">Require.</small>
                                            <div class="custom-file">
                                                <input type="file" wire:model.defer="cover_photo"
                                                    name="cover_photo" class="custom-file-input">
                                                <label class="custom-file-label" for="customFile"
                                                    style="border:solid 1px #121B65;" required> </label>

                                                @error('cover_photo')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <h4><b style="color:#121B65;">SERVICES</b></h4>
                                            <div class="row">
                                                @foreach ($discountCategories as $discountCategory)
                                                    <div class="col-md-6">
                                                        <label class="checkbox checkbox-info">
                                                            <input type="checkbox" wire:model="category"
                                                                value="{{ $discountCategory->id }}"
                                                                name="category[]">{{ $discountCategory->category_name }}
                                                            <span class="rounded-sm"></span></label>
                                                    </div>
                                                    @error('category')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                @endforeach
                                            </div>

                                        </div>
                                    </div>
                                </div>

                                <div class="row">

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <h4><b style="color:#121B65;">DISCOUNT CATEGORIES</b></h4>
                                            <div class="row">
                                                @foreach ($discountCategories as $discountCategory)
                                                    <div class="col-md-6">
                                                        <label class="checkbox checkbox-info">
                                                            <input type="checkbox" wire:model="category"
                                                                value="{{ $discountCategory->id }}"
                                                                name="category[]">{{ $discountCategory->category_name }}
                                                            <span class="rounded-sm"></span></label>
                                                    </div>
                                                    @error('category')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                @endforeach
                                            </div>

                                        </div>
                                    </div>
                                </div>



                                <div class="form-group">

                                </div>
                                <br>
                                <button class="btn btn-primary m-5" wire:click="publishDiscount"
                                    type="button">Publish
                                    Changes</button>
                            </form>
                        </div>
                    </div>




                @endif
            </div>
        </div>
    </div>
    <script>
        function copyCode(id) {
            var str = document.getElementById(id);
            window.getSelection().selectAllChildren(str);
            document.execCommand("Copy")
        }
    </script>

</div>
