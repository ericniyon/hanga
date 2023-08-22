@extends('layouts.app')
@section('title',$application->client->registrationType->name.' application details')
@section('content')
    <div class="container my-5">
        @include('partials._return_back_message')

        <div class="card gutter-b rounded border-0 shadow-none">
            <div class="card-body p-2">
                @include('partials._menu_bar')
            </div>
        </div>
        <div class="card border-0 shadow-sm">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <div>
                            <!--begin::User-->
                            <div class="d-flex align-items-center">
                                <div
                                    class="symbol symbol-60 symbol-xxl-100 mr-5 align-self-start align-self-xxl-start mt-2">
                                    <div class="symbol-label"
                                         style="background-image:url('{{ $application->client->profile_photo_url }}')"></div>
                                </div>
                                <div class="d-flex flex-column">
                                    <div class="d-flex align-items-center mt-0 mb-1 ">
                                    <span
                                        class="font-weight-boldest font-size-h3 text-info text-uppercase">FABLAB RWANDA</span>
                                        <div>
                                        <span class="svg-icon text-primary svg-icon-2x">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20"
                                                 fill="currentColor">
                                                  <path fill-rule="evenodd"
                                                        d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                                        clip-rule="evenodd"/>
                                                </svg>
                                        </span>
                                        </div>
                                    </div>
                                    <div class="badge badge-info rounded align-self-start">Main Business Category</div>
                                    <p class="my-1">
                                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Delectus doloremque
                                        ducimus exercitationem explicabo impedit in ipsum iste labore, libero maiores
                                        nisi
                                        non porro quae quidem saepe temporibus unde vero voluptates.
                                    </p>
                                    <div
                                        class="align-self-start rounded-pill border pl-0 pr-3 border-primary text-primary mb-3">
                                    <span class="rounded-pill svg-icon svg-icon-2x">
                                     <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20"
                                          fill="currentColor">
                                          <path fill-rule="evenodd"
                                                d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                                clip-rule="evenodd"/>
                                        </svg>
                                    </span>
                                        Verified Company
                                    </div>
                                    <p class="mb-0">
                                        Rate <strong class="font-weight-boldest">200 reviews</strong>
                                    </p>
                                    <h4 class="font-weight-boldest">4.5</h4>
                                    <div class="d-flex mb-3">
                                    <span class="svg-icon text-primary">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20"
                                             fill="currentColor">
  <path
      d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
</svg>
                                    </span>
                                        <span class="svg-icon text-primary">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20"
                                             fill="currentColor">
  <path
      d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
</svg>
                                    </span>
                                        <span class="svg-icon text-primary">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20"
                                             fill="currentColor">
  <path
      d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
</svg>
                                    </span>
                                        <span class="svg-icon text-primary">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20"
                                             fill="currentColor">
  <path
      d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
</svg>
                                    </span>
                                        <span class="svg-icon svg-icon-1x text-primary">
                                       <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none"
                                            viewBox="0 0 24 24" stroke="currentColor">
  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
        d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z"/>
</svg>
                                    </span>
                                    </div>
                                    <div>
                                        <button class="btn btn-sm btn-primary py-1 rounded-pill text-white px-4">Write a
                                            Review
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <!--end::User-->

                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="d-flex align-items-md-end align-items-center flex-md-column justify-content-center">
                            <a href="" class="btn btn-primary text-white my-2 min-w-md-150px border-2 rounded-0">
                                Visit Website
                            </a>
                            <a href="" class="btn btn-outline-primary my-2 min-w-md-150px border-2 rounded-0">
                                Connect
                            </a>
                        </div>
                    </div>
                </div>

                <div class="row my-4">
                    <div class="col-md-3 text-center">
                        <strong>Address</strong>
                    </div>
                    <div class="col-md-3">
                        <span class="svg-icon text-info">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                                 stroke="currentColor">
                              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                            </svg>
                        </span>
                        48 KG588 ST, KACYIRU GASABO, KIGALI
                    </div>
                    <div class="col-md-3">
                        <span class="svg-icon text-info">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                                 stroke="currentColor">
                              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M16 3h5m0 0v5m0-5l-6 6M5 3a2 2 0 00-2 2v1c0 8.284 6.716 15 15 15h1a2 2 0 002-2v-3.28a1 1 0 00-.684-.948l-4.493-1.498a1 1 0 00-1.21.502l-1.13 2.257a11.042 11.042 0 01-5.516-5.517l2.257-1.128a1 1 0 00.502-1.21L9.228 3.683A1 1 0 008.279 3H5z"/>
                            </svg>
                        </span>
                        Tel:
                        <a href="tel:+250-780-000-000" class="text-dark">+250-780-000-000</a>
                    </div>
                    <div class="col-md-3">
                        <span class="svg-icon text-info">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                                 stroke="currentColor">
  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
        d="M16 12a4 4 0 10-8 0 4 4 0 008 0zm0 0v1.5a2.5 2.5 0 005 0V12a9 9 0 10-9 9m4.5-1.206a8.959 8.959 0 01-4.5 1.207"/>
</svg>
                        </span>
                        Email:
                        <a href="mailto:info@fablab.rw" class="text-dark">info@fablab.rw</a>
                    </div>
                </div>
                <div class="row my-3">
                    <div class="col">
                        <!-- Nav tabs -->
                        <ul class="nav nav-pills custom-navs justify-content-between" id="myTab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link rounded-0 " id="home-tab" data-toggle="tab" href="#home"
                                   role="tab" aria-controls="home" aria-selected="true">Company Details</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link rounded-0" id="profile-tab" data-toggle="tab" href="#profile"
                                   role="tab" aria-controls="profile" aria-selected="false">Products & Services</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link rounded-0" id="messages-tab" data-toggle="tab" href="#messages"
                                   role="tab" aria-controls="messages" aria-selected="false">Interests</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link rounded-0" id="settings-tab" data-toggle="tab" href="#settings"
                                   role="tab" aria-controls="settings" aria-selected="false">Certifications / Awards
                                    (0)</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link rounded-0" id="services-tab" data-toggle="tab" href="#services"
                                   role="tab" aria-controls="settings" aria-selected="false">Products/Services</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link rounded-0 active" id="reviews-tab" data-toggle="tab" href="#reviews"
                                   role="tab" aria-controls="settings" aria-selected="false">
                                    Reviews & Ratings
                                    <span
                                        class="p-2 font-weight-boldest ml-2 badge badge-primary rounded-circle">18</span>
                                </a>
                            </li>
                        </ul>

                        <!-- Tab panes -->
                        <div class="tab-content container-fluid">
                            <div class="tab-pane " id="home" role="tabpanel" aria-labelledby="home-tab">
                                Company details
                            </div>
                            <div class="tab-pane" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                                Products & services
                            </div>
                            <div class="tab-pane" id="messages" role="tabpanel" aria-labelledby="messages-tab">
                                Interests
                            </div>
                            <div class="tab-pane" id="settings" role="tabpanel" aria-labelledby="settings-tab">
                                Awards
                            </div>
                            <div class="tab-pane" id="services" role="tabpanel" aria-labelledby="services-tab">
                                Products & services
                            </div>
                            <div class="tab-pane active" id="reviews" role="tabpanel" aria-labelledby="reviews-tab">
                                <div class="d-flex align-items-center my-5">
                                    <div class="d-none d-md-inline-flex symbol symbol-50 symbol-circle  mr-5 align-self-start align-self-xxl-start mt-2">
                                        <div class="symbol-label symbol-circle bg-light-primary text-primary font-weight-boldest">
                                            MN
                                        </div>
                                    </div>
                                    <div class="d-flex flex-column">
                                        <div class="d-flex align-items-center mt-0 mb-1 ">
                                            <span class="font-weight-boldest font-size-h4">
                                                MAHORO Nicole
                                            </span>
                                        </div>

                                        <div class="my-1 border border-2 p-4 border-primary rounded-0 custom-shadow-primary">
                                            <p>
                                                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Delectus
                                                doloremque
                                                ducimus exercitationem explicabo impedit in ipsum iste labore, libero
                                                maiores
                                                nisi
                                                non porro quae quidem saepe temporibus unde vero voluptates.
                                            </p>
                                            <p>
                                                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Delectus
                                                doloremque
                                                ducimus exercitationem explicabo impedit in ipsum iste labore, libero
                                                maiores
                                                nisi
                                                non porro quae quidem saepe temporibus unde vero voluptates.
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="d-flex align-items-center my-5">
                                    <div
                                        class="d-none d-md-inline-flex symbol symbol-50 symbol-circle  mr-5 align-self-start align-self-xxl-start mt-2">
                                        <div class="symbol-label symbol-circle bg-light-primary text-primary font-weight-boldest">
                                            MN
                                        </div>
                                    </div>
                                    <div class="d-flex flex-column">
                                        <div class="d-flex align-items-center mt-0 mb-1 ">
                                            <span class="font-weight-boldest font-size-h4">
                                                MAHORO Nicole
                                            </span>
                                        </div>

                                        <div class="my-1 border border-2 p-4 border-primary rounded-0 custom-shadow-primary">
                                            <p>
                                                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Delectus
                                                doloremque
                                                ducimus exercitationem explicabo impedit in ipsum iste labore, libero
                                                maiores
                                                nisi
                                                non porro quae quidem saepe temporibus unde vero voluptates.
                                            </p>
                                            <p>
                                                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Delectus
                                                doloremque
                                                ducimus exercitationem explicabo impedit in ipsum iste labore, libero
                                                maiores
                                                nisi
                                                non porro quae quidem saepe temporibus unde vero voluptates.
                                            </p>
                                        </div>
                                    </div>
                                </div>

                               <div class="row">
                                   <div class="col-md-10">
                                       <div class="form-group">
                                           <label for="write_review">Write your Review</label>
                                           <textarea name="" id="write_review" rows="5" class="form-control border-2 border-info custom-shadow-info rounded-0"></textarea>
                                       </div>
                                   </div>
                                   <div class="col-md-2">
                                       <label for="write_review" style="visibility: hidden;">Write your Review</label>
                                     <button class="btn btn-info rounded-pill">
                                         Submit
                                     </button>
                                   </div>
                               </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


    </div>
@stop
