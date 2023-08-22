@extends('client.v2.layout.app')


@section('title',"Messages")

@section('content')
    @include('partials.includes._home_nav')
    <div class="tw-bg-gray-50">
        <div class="container py-5">

            <div class="row">
                <div class="col-md-4 mb-4 mb-md-0">
                    <div class="card card-custom card-stretch shadow">
                        <!--begin::Header-->
                        <div class="card-header border-bottom p-4 min-h-auto border-0">
                            <h3 class="card-title my-0 font-weight-bolder text-dark">
                                {{ __("app.Messages") }}
                            </h3>
                            <div class="card-toolbar my-0"></div>
                        </div>
                        <!--end::Header-->
                        <!--begin::Body-->
                        <div class="card-body p-0 pb-4">

                            <div class="form-group m-4">
                                <label for="search" class="sr-only">Search</label>
                                <div class="input-icon">
                                    <input type="search" onkeyup="uiBuild();" id="search" name="search"
                                           class="form-control"
                                           placeholder="{{ __("auth.search") }} {{ __("app.Messages") }}">
                                    <span class="svg-icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none"
                                         viewBox="0 0 24 24" stroke="currentColor">
                                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                                    </svg>
                                </span>
                                </div>
                            </div>

                            <div class="list-group rounded-0 list-group-flush client-list">

                            </div>

                            <div class="w-100 d-flex justify-content-center align-items-center mt-4">
                                <img src="{{asset("frontend/assets/loader2.svg")}}"
                                     style="height: 50px;width: 50px;display: none" class="nav-loader" alt="Loader">
                                <a href="#" onclick="loadMoreChats()"
                                   class="btn btn-light-info rounded mx-4 btn-sm font-weight-bolder" id="load-button">
                                    {{ __("app.Load more conversations") }}
                                    <span class="svg-icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20"
                                         fill="currentColor">
                                      <path fill-rule="evenodd"
                                            d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                            clip-rule="evenodd"/>
                                    </svg>
                                </span>
                                </a>
                            </div>


                        </div>
                        <!--end::Body-->
                    </div>
                </div>
                <div class="col-md-8 mb-4 mb-md-0">
                    <div class="card card-custom card-stretch chat-card shadow">

                    </div>

                </div>
            </div>
        </div>
    </div>



@stop


@section("scripts")
    <script src="https://momentjs.com/downloads/moment-with-locales.js"></script>
    <style>
        .symbol.symbol-40 > img {
            min-width: 100%;
            min-height: 100%;
            max-width: 200%;
            height: auto !important;
            width: auto !important;
            border-radius: 0;
        }


    </style>
    <script>

        let me = {
            name: "{{$user->name}}",
            profile: "{{$user->profile_photo_url}}",
            id: {{$user->id}},
            default: "{{$user->defaultPhotoUrl}}",
            token: "{{$token}}",
            updateToken: "{{csrf_token()}}",
            allowSound: {{$user->allow_notification_sound ? 'true':'false'}},
            type: "{{$user->registrationType->name??''}}",
            page: 1,
            loadingMore: false,
            pageChat: 1,
        };

        let clients = [
                @foreach($connections as $key=>$item)
            {
                active: {{$client == $item->id ? 'true':'false'}},
                profileUrl: "{{ route('v2.client.details',encryptId($item->id)) }}",
                name: "{{$item->client_name}}",
                profile: "{{$item->profile_photo_url}}",
                id: {{$item->id}},
                blocked: {{$item->blocked ? 'true':'false'}},
                broken: {{$item->broken ? 'true':'false'}},
                default: "{{$item->defaultPhotoUrl}}",
                type: "{{$item->registrationType->name??''}}",
                page: 1,
                messages: [
                        @foreach($item->messages->reverse() as $item)
                    {
                        id: {{$item->id}},
                        date: "{{$item->created_at}}",
                        message: {!! json_encode($item->message) !!},
                        from: {{$item->from}},
                        unread: {{$item->status == 'Pending' && $item->from != $user->id  ? 'true' : 'false'}},
                        delivered: {{$item->status == 'Read' ? 'true' : 'false'}}
                    },
                    @endforeach
                ]
            },
            @endforeach
        ];


        function loadMoreChats() {
            $(".nav-loader").show();
            $("#load-button").hide();
            $.ajax({
                url: "/client/chat/load/more/" + me.pageChat,
                success: function (res) {
                    res.forEach(function (e) {
                        clients.push({
                            active: false,
                            unread: false,
                            name: e.name,
                            profile: e.profile_photo_url,
                            id: e.id,
                            default: e.defaultPhotoUrl,
                            type: e.typeName,
                            page: 1,
                            messages: e.messages.reverse()
                        });
                    });
                    uiBuild();
                    me.pageChat++;
                },
                complete: function () {

                    $(".nav-loader").hide();
                    $("#load-button").show();
                }
            });

            return false;
        }


        function getSoundHtml() {
            return me.allowSound ? "<span class='bi bi-volume-mute-fill icon-lg mr-1 text-info'></span> {{ __("app.Turn off Sound") }}" : "<span class='bi bi-volume-up-fill icon-lg mr-1 text-info'></span> {{ __("app.Turn on Sound") }}";
        }

        function getBlockHtml(elem) {
            return !elem.blocked ? '<span class="svg-icon svg-icon-info svg-icon-lg mr-1"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1"> <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"> <rect x="0" y="0" width="24" height="24"/> <path d="M12,22 C6.4771525,22 2,17.5228475 2,12 C2,6.4771525 6.4771525,2 12,2 C17.5228475,2 22,6.4771525 22,12 C22,17.5228475 17.5228475,22 12,22 Z M12,20 C16.418278,20 20,16.418278 20,12 C20,7.581722 16.418278,4 12,4 C7.581722,4 4,7.581722 4,12 C4,16.418278 7.581722,20 12,20 Z M19.0710678,4.92893219 L19.0710678,4.92893219 C19.4615921,5.31945648 19.4615921,5.95262146 19.0710678,6.34314575 L6.34314575,19.0710678 C5.95262146,19.4615921 5.31945648,19.4615921 4.92893219,19.0710678 L4.92893219,19.0710678 C4.5384079,18.6805435 4.5384079,18.0473785 4.92893219,17.6568542 L17.6568542,4.92893219 C18.0473785,4.5384079 18.6805435,4.5384079 19.0710678,4.92893219 Z" fill="#000000" fill-rule="nonzero" opacity="0.3"/> </g></svg><!--end::Svg Icon--></span> {{ __("app.Block") }}' : '<span class="svg-icon svg-icon-info svg-icon-lg mr-1"><!--begin::Svg Icon | path:C:\wamp64\www\keenthemes\themes\metronic\theme\html\demo9\dist/../src/media/svg/icons\Communication\Chat-check.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1"> <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"> <rect x="0" y="0" width="24" height="24"/> <path d="M4.875,20.75 C4.63541667,20.75 4.39583333,20.6541667 4.20416667,20.4625 L2.2875,18.5458333 C1.90416667,18.1625 1.90416667,17.5875 2.2875,17.2041667 C2.67083333,16.8208333 3.29375,16.8208333 3.62916667,17.2041667 L4.875,18.45 L8.0375,15.2875 C8.42083333,14.9041667 8.99583333,14.9041667 9.37916667,15.2875 C9.7625,15.6708333 9.7625,16.2458333 9.37916667,16.6291667 L5.54583333,20.4625 C5.35416667,20.6541667 5.11458333,20.75 4.875,20.75 Z" fill="#000000" fill-rule="nonzero" opacity="0.3"/> <path d="M2,11.8650466 L2,6 C2,4.34314575 3.34314575,3 5,3 L19,3 C20.6568542,3 22,4.34314575 22,6 L22,15 C22,15.0032706 21.9999948,15.0065399 21.9999843,15.009808 L22.0249378,15 L22.0249378,19.5857864 C22.0249378,20.1380712 21.5772226,20.5857864 21.0249378,20.5857864 C20.7597213,20.5857864 20.5053674,20.4804296 20.317831,20.2928932 L18.0249378,18 L12.9835977,18 C12.7263047,14.0909841 9.47412135,11 5.5,11 C4.23590829,11 3.04485894,11.3127315 2,11.8650466 Z M6,7 C5.44771525,7 5,7.44771525 5,8 C5,8.55228475 5.44771525,9 6,9 L15,9 C15.5522847,9 16,8.55228475 16,8 C16,7.44771525 15.5522847,7 15,7 L6,7 Z" fill="#000000"/> </g></svg><!--end::Svg Icon--></span> {{ __("app.Unblock") }}';
        }

        function buildToolbar(elem) {
            let div = document.createElement("div");
            let toolbar = document.createElement("div");
            toolbar.className = "card-toolbar my-0";
            let dropdown = document.createElement("div");
            dropdown.className = "dropdown dropdown-inline";
            let clickNav = document.createElement("a");
            clickNav.href = "#";
            clickNav.setAttribute("data-toggle", "dropdown");
            clickNav.className = "btn btn-hover-bg-info btn-hover-text-white h-40px w-40px btn-sm font-weight-bolder dropdown-toggle rounded-circle  d-flex align-items-center justify-content-center";
            clickNav.innerHTML = '<span class="svg-icon mr-0"> <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor"> <path d="M6 10a2 2 0 11-4 0 2 2 0 014 0zM12 10a2 2 0 11-4 0 2 2 0 014 0zM16 12a2 2 0 100-4 2 2 0 000 4z"/> </svg> </span>';
            let dropMenu = document.createElement("div");
            let navUl = document.createElement("ul");
            navUl.className = "navi navi-hover";
            dropMenu.appendChild(navUl);

            let li = document.createElement("li");
            li.className = "navi-item";
            let aLi = document.createElement("a");
            aLi.className = "navi-link";
            aLi.href = "#";
            aLi.onclick = function () {
                blockUser(elem, this);
            }
            aLi.innerHTML = getBlockHtml(elem);
            li.appendChild(aLi);

            navUl.appendChild(li);

            let li1 = document.createElement("li");
            li1.className = "navi-item";
            let aLi1 = document.createElement("a");
            aLi1.className = "navi-link";
            aLi1.href = "#";
            aLi1.onclick = function () {
                toggleSound(this);
            };
            aLi1.innerHTML = getSoundHtml();
            li1.appendChild(aLi1);

            navUl.appendChild(li1);

            dropMenu.className = "dropdown-menu dropdown-menu-sm dropdown-menu-right shadow rounded-left rounded-top-right-0 border-secondary border-0";
            dropdown.appendChild(clickNav);
            dropdown.appendChild(dropMenu);
            toolbar.appendChild(dropdown);
            div.appendChild(toolbar);
            let d = document.createElement("div");
            d.className = "px-4";
            let switchDiv = document.createElement("div");
            switchDiv.className = "custom-control custom-switch";

            let input = document.createElement("input");
            input.type = "checkbox";
            input.className = "custom-control-input";
            input.id = "customSwitch1";

            let label = document.createElement("label");
            label.className = "custom-control-label font-size-lg";
            label.for = "customSwitch1";
            label.innerText = "Sound";

            switchDiv.appendChild(input);
            switchDiv.appendChild(label);

            //d.appendChild(switchDiv);
            //x += '<div class="custom-control custom-switch"><input onchange="blockUser(this);" type="checkbox" '+(elem.blocked?'checked':'')+' class="custom-control-input" id="customSwitch1"> <label class="custom-control-label font-size-lg" for="customSwitch1"> Block  </label> </div>';
            d.innerHTML = '<div class="custom-control custom-switch"><input onchange="toggleSound(this);" type="checkbox" ' + (me.allowSound ? 'checked' : '') + ' class="custom-control-input" id="customSwitch1"> <label class="custom-control-label font-size-lg" for="customSwitch1"> {{ __("app.Sound") }} </label> </div>';

            let parent = document.createElement("div");
            parent.className = "d-flex align-items-center";
            //parent.appendChild(d);
            parent.appendChild(div);

            //$(dropdown).dropdown();
            return parent;
        }


        function toggleSound(elem) {
            me.allowSound = !me.allowSound;
            elem.innerHTML = getSoundHtml();
            globalMe.allowSound = me.allowSound;
            $.ajax({
                url: "/client/toggle/sound/" + (me.allowSound ? 1 : 0),
                success: function () {
                }
            })
        }


        function blockUser(elem, a) {
            elem.blocked = !elem.blocked;
            a.textContent = elem.blocked ? "Unblock" : "Block";
            $.ajax({
                url: "/client/block/user/" + elem.id + "/" + (elem.blocked ? 1 : 0),
                success: function () {
                    mainChatBuild(elem);
                }
            })
        }

        function buildImageSymbol(elem, className) {
            let div = document.createElement('div');
            div.className = "symbol symbol-40 symbol-light-primary symbol-circle " + (className ? className : "mr-5");
            div.setAttribute('style', 'width: 40px;height: 40px;overflow: hidden;');

            let img = document.createElement("div");
            //img.src = elem.profile;
            img.setAttribute("style", "width: 42px;border:none !important;height: 42px;background: url('" + elem.profile + "'), url('" + elem.default + "') no-repeat center;background-size: cover;");
            // img.onerror = function () {
            //     this.src = elem.default;
            // }


            div.appendChild(img);

            return div;
        }

        function buildNameFlex(elem) {
            let div = document.createElement("div");
            div.className = "d-flex flex-column font-weight-bold flex-grow-1";

            let a = document.createElement("a");
            a.className = "text-dark text-hover-primary mb-1 font-size-lg";
            a.textContent = elem.name;
            a.href = elem.profileUrl;

            let span = document.createElement("span");
            span.className = "text-muted small";
            span.textContent = elem.type;

            div.appendChild(a);
            div.appendChild(span);


            return div;
        }

        function buildCardHeader(elem) {
            let div = document.createElement("div");
            div.className = 'card-header border-bottom px-3 pt-3 pb-2 min-h-auto border-light-light';
            let flex = document.createElement("div");
            flex.className = "card-title my-0  flex-column align-items-start";
            flex.style.width = "100%";

            let subFlex = document.createElement("div");
            subFlex.className = "d-flex align-items-center mb-0";
            subFlex.style.width = "100%";

            let image = buildImageSymbol(elem);
            let name = buildNameFlex(elem);

            subFlex.appendChild(image);
            subFlex.appendChild(name);
            subFlex.appendChild(buildToolbar(elem));

            flex.appendChild(subFlex);

            div.appendChild(flex);

            return div;
        }

        function buildMessageIn(message, elem) {
            let div = document.createElement("div");
            div.className = "d-flex flex-column mb-5 align-items-start";

            let flex = document.createElement("div");
            flex.className = "d-flex align-items-center";

            flex.appendChild(buildImageSymbol(elem, "mr-3"));

            let nameDiv = document.createElement("div");

            let name = document.createElement("a");
            name.href = elem.profileUrl;
            name.textContent = elem.name;
            name.className = "text-dark-75 text-hover-primary font-weight-bold font-size-h6";
            nameDiv.appendChild(name);

            let second = document.createElement("span");
            second.className = "text-muted font-size-sm ml-2";
            second.textContent = moment(message.date).fromNow();
            nameDiv.appendChild(second);

            flex.appendChild(nameDiv);

            let content = document.createElement("div");
            content.className = "mt-2 rounded p-5 bg-light-info text-dark-75 font-weight-bold font-size-lg text-left max-w-400px";

            content.innerHTML = urlify(message.message);

            div.appendChild(flex);

            div.appendChild(content);


            return div;
        }

        function buildMessageOut(message, elem) {
            let div = document.createElement("div");
            div.className = "d-flex flex-column mb-5 align-items-end";

            if (message.sending) {
                div.style.opacity = "0.5";
            }

            message.htmlRef = div;

            let flex = document.createElement("div");
            flex.className = "d-flex align-items-center";


            let nameDiv = document.createElement("div");

            let name = document.createElement("a");
            name.href = "#";
            name.textContent = "You";
            name.className = "text-dark-75 text-hover-primary font-weight-bold font-size-h6";

            let second = document.createElement("span");
            second.className = "text-muted font-size-sm mx-2";
            second.textContent = moment(message.date).fromNow();

            let sp2 = document.createElement("span");

            if (message.delivered)
                sp2.innerHTML = '<span class="svg-icon svg-icon-primary svg-icon-sm"><!--begin::Svg Icon | path:C:\wamp64\www\keenthemes\themes\metronic\theme\html\demo9\dist/../src/media/svg/icons\Navigation\Double-check.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1"> <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"> <polygon points="0 0 24 0 24 24 0 24"/> <path d="M9.26193932,16.6476484 C8.90425297,17.0684559 8.27315905,17.1196257 7.85235158,16.7619393 C7.43154411,16.404253 7.38037434,15.773159 7.73806068,15.3523516 L16.2380607,5.35235158 C16.6013618,4.92493855 17.2451015,4.87991302 17.6643638,5.25259068 L22.1643638,9.25259068 C22.5771466,9.6195087 22.6143273,10.2515811 22.2474093,10.6643638 C21.8804913,11.0771466 21.2484189,11.1143273 20.8356362,10.7474093 L17.0997854,7.42665306 L9.26193932,16.6476484 Z" fill="#000000" fill-rule="nonzero" opacity="0.3" transform="translate(14.999995, 11.000002) rotate(-180.000000) translate(-14.999995, -11.000002) "/> <path d="M4.26193932,17.6476484 C3.90425297,18.0684559 3.27315905,18.1196257 2.85235158,17.7619393 C2.43154411,17.404253 2.38037434,16.773159 2.73806068,16.3523516 L11.2380607,6.35235158 C11.6013618,5.92493855 12.2451015,5.87991302 12.6643638,6.25259068 L17.1643638,10.2525907 C17.5771466,10.6195087 17.6143273,11.2515811 17.2474093,11.6643638 C16.8804913,12.0771466 16.2484189,12.1143273 15.8356362,11.7474093 L12.0997854,8.42665306 L4.26193932,17.6476484 Z" fill="#000000" fill-rule="nonzero" transform="translate(9.999995, 12.000002) rotate(-180.000000) translate(-9.999995, -12.000002) "/> </g> </svg><!--end::Svg Icon--></span>';
            else
                sp2.innerHTML = '<span class="svg-icon svg-icon-primary svg-icon-sm"><!--begin::Svg Icon | path:C:\wamp64\www\keenthemes\themes\metronic\theme\html\demo9\dist/../src/media/svg/icons\Navigation\Check.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1"> <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"> <polygon points="0 0 24 0 24 24 0 24"/> <path d="M6.26193932,17.6476484 C5.90425297,18.0684559 5.27315905,18.1196257 4.85235158,17.7619393 C4.43154411,17.404253 4.38037434,16.773159 4.73806068,16.3523516 L13.2380607,6.35235158 C13.6013618,5.92493855 14.2451015,5.87991302 14.6643638,6.25259068 L19.1643638,10.2525907 C19.5771466,10.6195087 19.6143273,11.2515811 19.2474093,11.6643638 C18.8804913,12.0771466 18.2484189,12.1143273 17.8356362,11.7474093 L14.0997854,8.42665306 L6.26193932,17.6476484 Z" fill="#000000" fill-rule="nonzero" transform="translate(11.999995, 12.000002) rotate(-180.000000) translate(-11.999995, -12.000002) "/> </g> </svg><!--end::Svg Icon--></span>';


            nameDiv.appendChild(sp2);
            nameDiv.appendChild(second);
            nameDiv.appendChild(name);

            flex.appendChild(nameDiv);
            flex.appendChild(buildImageSymbol(me, "ml-3"));

            let content = document.createElement("div");
            content.className = "mt-2 rounded p-5 bg-light-success text-dark-75 font-weight-bold font-size-lg max-w-400px";

            content.innerHTML = urlify(message.message);

            div.appendChild(flex);


            div.appendChild(content);


            if (message.failed) {
                div.appendChild(buildResendLink(message, elem));
            }


            return div;
        }

        function buildResendLink(message, elem) {
            let span = document.createElement("a");
            span.className = "text-danger";
            span.href = "#";
            span.style.textDecoration = "underline";
            span.textContent = "Message failed to send, tap to resend";
            span.onclick = function () {
                span.remove();
                reSend(message, elem);
                return false;
            }
            return span;
        }

        function cleanAndAddContent(scroll, elem) {
            $(scroll).empty();
            let messagesDiv = document.createElement("div");
            messagesDiv.className = "messages px-6";


            elem.messages.forEach(function (msg) {
                messagesDiv.appendChild(msg.from === me.id ? buildMessageOut(msg, elem) : buildMessageIn(msg, elem));
            });


            scroll.appendChild(messagesDiv);

            return scroll;
        }

        function buildCardBody(elem) {
            let div = document.createElement("div");
            div.className = "card-body";

            let scroll = document.createElement("div");
            scroll.className = "scroll";
            scroll.setAttribute("style", "height: 350px; overflow-y: auto;overflow-x:hidden,position: relative");

            let loader = document.createElement("img");
            loader.src = "{{asset("frontend/assets/loader2.svg")}}";
            loader.style.height = "40px";
            loader.style.width = "40px";
            loader.style.display = "none";


            let parentLoader = document.createElement("div");
            parentLoader.style.textAlign = "center";

            parentLoader.appendChild(loader);

            scroll.appendChild(parentLoader);

            let dataScroll = document.createElement('div');


            cleanAndAddContent(dataScroll, elem);


            scroll.onscroll = function () {
                let thisElem = this;
                if (thisElem.scrollTop === 0 && !me.loadingMore) {
                    me.loadingMore = true;
                    $(loader).show();
                    $.ajax({
                        url: "/client/load/more/message/" + elem.id + "/" + elem.page,
                        success: function (res) {
                            me.page++;
                            res.forEach(function (el) {
                                elem.messages.unshift(el);
                            })
                            cleanAndAddContent(dataScroll, elem);


                        },
                        complete: function () {
                            $(loader).hide();
                            me.loadingMore = false;
                        }
                    })
                }
            }

            scroll.appendChild(dataScroll);
            div.appendChild(scroll);


            return {
                parent: div,
                scroll: scroll,
                dataScroll: dataScroll
            };

        }


        function reSend(msgElem, elem) {
            if (msgElem.htmlRef) {
                msgElem.htmlRef.style.opacity = "0.5";
            }
            $.ajax({
                url: "{{route('client.send.message')}}",
                method: "POST",
                data: {
                    message: msgElem.message,
                    to: elem.id,
                    _token: me.token,
                    date: msgElem.date,
                },
                success: function (res) {
                    if (msgElem.htmlRef) {
                        msgElem.failed = false;
                        msgElem.sending = false;
                        msgElem.id = res.id;
                        uiBuild();
                        msgElem.htmlRef.style.opacity = "1";
                        me.token = res.token;
                    }
                },
                error: function () {
                    msgElem.sending = false;
                    msgElem.failed = true;

                    if (msgElem.htmlRef) {
                        msgElem.htmlRef.style.opacity = "1";
                        msgElem.htmlRef.appendChild(buildResendLink(msgElem, elem));
                    }
                }
            })
        }

        function getCaret(el) {
            if (el.selectionStart) {
                return el.selectionStart;
            } else if (document.selection) {
                el.focus();
                let r = document.selection.createRange();
                if (r == null) {
                    return 0;
                }
                let re = el.createTextRange(), rc = re.duplicate();
                re.moveToBookmark(r.getBookmark());
                rc.setEndPoint('EndToStart', re);
                return rc.text.length;
            }
            return 0;
        }

        function buildCardFooter(elem, body, dataPage) {
            let div = document.createElement("div");
            div.className = "card-footer align-items-center p-5";

            let textarea = document.createElement("textarea");
            textarea.className = "form-control p-1";
            textarea.rows = 3;
            textarea.placeholder = '{{ __("app.Type a message") }}';


            let flex = document.createElement("div");
            flex.className = "d-flex align-items-center justify-content-between mt-5";

            let dataDiv = document.createElement("div");
            dataDiv.className = "mr3 flex-grow-1";


            let button1 = document.createElement("a");
            button1.href = "#";
            button1.className = "btn btn-clean btn-icon btn-md mr-1 rounded-circle";
            button1.setAttribute("data-toggle", "tooltip");
            button1.setAttribute("data-placement", "top");
            button1.setAttribute("data-theme", "dark");
            button1.title = "Attach an image to your conversation";

            let button2 = document.createElement("a");
            button2.href = "#";
            button2.className = "btn btn-clean btn-icon btn-md mr-1 rounded-circle";
            button2.setAttribute("data-toggle", "tooltip");
            button2.setAttribute("data-placement", "top");
            button2.setAttribute("data-theme", "dark");
            button2.title = "Attach an image to your conversation";

            button1.innerHTML = ' <span class="svg-icon"> <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M4 3a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V5a2 2 0 00-2-2H4zm12 12H4l4-8 3 6 2-4 3 6z" clip-rule="evenodd"/></svg></span>';

            button2.innerHTML = '<span class="svg-icon"> <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor"> <path fill-rule="evenodd" d="M8 4a3 3 0 00-3 3v4a5 5 0 0010 0V7a1 1 0 112 0v4a7 7 0 11-14 0V7a5 5 0 0110 0v4a3 3 0 11-6 0V7a1 1 0 012 0v4a1 1 0 102 0V7a3 3 0 00-3-3z" clip-rule="evenodd"/> </svg> </span>';

            // dataDiv.appendChild(button1);
            // dataDiv.appendChild(button2);

            let button = document.createElement("button");
            button.type = "button";

            function sendMsg() {

                if (!textarea.value.trim() || elem.blocked || elem.broken) {
                    textarea.focus();
                    return;
                }


                let msgElem = {
                    date: new Date(),
                    message: textarea.value.trim(),
                    from: me.id,
                    sending: true,
                };


                elem.messages.forEach(v => v.unread = false);


                elem.messages.push(msgElem);

                textarea.value = "";

                removeParam("client");

                cleanAndAddContent(dataPage, elem);

                uiBuild();

                $(body).animate({
                    scrollTop: body.scrollHeight
                }, function () {
                    reSend(msgElem, elem);
                });
            }


            textarea.onkeyup = function (event) {
                if (event.keyCode === 13) {
                    let content = this.value;
                    let caret = getCaret(this);
                    if (event.shiftKey) {
                        this.value = content.substring(0, caret - 1) + "\n" + content.substring(caret, content.length);
                        event.stopPropagation();
                    } else {
                        this.value = content.substring(0, caret - 1) + content.substring(caret, content.length);
                        sendMsg();
                    }
                }
            }

            button.onclick = sendMsg;

            button.className = "btn btn-info btn-md font-weight-bolder text-white chat-send py-2 px-6 rounded";
            button.disabled = elem.blocked || elem.broken;

            button.innerHTML = ' {{ __("app.send") }} <span class="svg-icon"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1"> <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"> <rect x="0" y="0" width="24" height="24"/> <path d="M3,13.5 L19,12 L3,10.5 L3,3.7732928 C3,3.70255344 3.01501031,3.63261921 3.04403925,3.56811047 C3.15735832,3.3162903 3.45336217,3.20401298 3.70518234,3.31733205 L21.9867539,11.5440392 C22.098181,11.5941815 22.1873901,11.6833905 22.2375323,11.7948177 C22.3508514,12.0466378 22.2385741,12.3426417 21.9867539,12.4559608 L3.70518234,20.6826679 C3.64067359,20.7116969 3.57073936,20.7267072 3.5,20.7267072 C3.22385763,20.7267072 3,20.5028496 3,20.2267072 L3,13.5 Z" fill="#000000"/> </g></svg></span>';
            flex.appendChild(dataDiv);


            if (elem.blocked || elem.broken) {
                let span = document.createElement("a");
                span.textContent = elem.broken ? "You have been blocked" : "Unblock , to send message";
                span.className = "text-danger px-2";
                span.href = "#";
                if (elem.blocked) {
                    span.style.textDecoration = "underline";
                    span.onclick = function () {
                        blockUser(elem, this);
                    }
                }
                flex.appendChild(span);
            }

            flex.appendChild(button);

            div.appendChild(textarea);
            div.appendChild(flex);


            return div;
        }

        let body;

        function mainChatBuild(elem) {
            let card = $(".chat-card");
            card.empty();
            let header = buildCardHeader(elem);

            body = buildCardBody(elem);

            let footer = buildCardFooter(elem, body.scroll, body.dataScroll);

            card.append(header);
            card.append(body.parent);
            card.append(footer);

            $(body.scroll).animate({
                scrollTop: body.scroll.scrollHeight
            })

        }

        function removeParam(parameter) {
            let url = document.location.href;
            let urlparts = url.split('?');

            if (urlparts.length >= 2) {
                let urlBase = urlparts.shift();
                let queryString = urlparts.join("?");

                let prefix = encodeURIComponent(parameter) + '=';
                let pars = queryString.split(/[&;]/g);
                for (let i = pars.length; i-- > 0;)
                    if (pars[i].lastIndexOf(prefix, 0) !== -1)
                        pars.splice(i, 1);
                url = urlBase + '?' + pars.join('&');
                window.history.replaceState('', document.title, url); // added this line to push the new url directly to url bar .

            }
            return url;
        }

        function urlify(text) {
            let urlRegex = /(https?:\/\/[^\s]+)/g;
            return text.replace(/[\u00A0-\u9999<>\&]/g, function (i) {
                return '&#' + i.charCodeAt(0) + ';';
            }).replace(urlRegex, function (url) {
                return '<a href="' + url + '" target="_blank">' + url + '</a>';
            }).replace(/\n/g, "<br>")
            // or alternatively
            // return text.replace(urlRegex, '<a href="$1">$1</a>')
        }

        function uiBuild() {
            let list = $(".client-list");
            list.empty();
            clients.sort((a, b) => {

                if (a.messages.length && b.messages.length) {
                    return moment(b.messages[b.messages.length - 1].date).diff(a.messages[a.messages.length - 1].date, 'seconds');
                }

                if (a.messages.length) {
                    return 1;
                }

                return 0;

            });

            if (clients.length) {
                let check = clients.filter(v => v.active);
                if (!check.length) {
                    clients[0].active = true;
                }
            }

            let newList = clients;
            let query = $("#search").val().trim();

            if (query) {
                query = query.toLowerCase();
                newList = clients.filter(v => v.name.toLowerCase().indexOf(query) > -1);
            }

            newList.forEach(function (elem) {
                let a = document.createElement("a");
                let ct = elem.messages.filter(e => e.unread).length;
                let bold = ct > 0 ? ' font-weight-bolder' : '';
                a.className = "list-group-item list-group-item-action messages " + (elem.active ? 'active' : '');
                a.href = "#";
                let flexDiv = document.createElement("div");
                flexDiv.className = 'd-flex w-100 justify-content-between';
                let h5 = document.createElement("h5");
                h5.className = "mb-1" + bold;
                h5.textContent = elem.name;


                let msg = elem.messages.length ? elem.messages[elem.messages.length - 1] : null;

                let small = document.createElement("small");
                small.className = bold;
                small.innerText = msg ? moment(msg.date).fromNow() : "";

                let small2 = document.createElement("small");
                small2.className = "d-flex " + bold;

                let textSpan = document.createElement("span")
                textSpan.className = "flex-grow-1";
                textSpan.innerText = msg ? msg.message : elem.type;
                textSpan.setAttribute("style", "overflow-wrap: break-word;word-break: break-word;overflow: hidden;text-overflow: ellipsis;display: -webkit-box; -webkit-line-clamp: 1; -webkit-box-orient: vertical;");

                let countSpan = document.createElement("span");

                countSpan.className = "badge badge-primary d-flex justify-content-center align-items-center ml-1 rounded";
                countSpan.setAttribute("style", "height:20px;width:20px");


                countSpan.innerText = ct.toString();


                let sp2;

                if (msg && msg.from === me.id) {
                    sp2 = document.createElement("span");
                    if (msg.sending || msg.failed)
                        sp2.innerHTML = '<span class="svg-icon svg-icon-primary svg-icon-sm"><!--begin::Svg Icon | path:C:\wamp64\www\keenthemes\themes\metronic\theme\html\demo9\dist/../src/media/svg/icons\Home\Clock.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1"> <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"> <rect x="0" y="0" width="24" height="24"/> <path d="M12,22 C7.02943725,22 3,17.9705627 3,13 C3,8.02943725 7.02943725,4 12,4 C16.9705627,4 21,8.02943725 21,13 C21,17.9705627 16.9705627,22 12,22 Z" fill="#000000" opacity="0.3"/> <path d="M11.9630156,7.5 L12.0475062,7.5 C12.3043819,7.5 12.5194647,7.69464724 12.5450248,7.95024814 L13,12.5 L16.2480695,14.3560397 C16.403857,14.4450611 16.5,14.6107328 16.5,14.7901613 L16.5,15 C16.5,15.2109164 16.3290185,15.3818979 16.1181021,15.3818979 C16.0841582,15.3818979 16.0503659,15.3773725 16.0176181,15.3684413 L11.3986612,14.1087258 C11.1672824,14.0456225 11.0132986,13.8271186 11.0316926,13.5879956 L11.4644883,7.96165175 C11.4845267,7.70115317 11.7017474,7.5 11.9630156,7.5 Z" fill="#000000"/> </g> </svg><!--end::Svg Icon--></span>';
                    else if (msg.delivered)
                        sp2.innerHTML = '<span class="svg-icon svg-icon-primary svg-icon-sm"><!--begin::Svg Icon | path:C:\wamp64\www\keenthemes\themes\metronic\theme\html\demo9\dist/../src/media/svg/icons\Navigation\Double-check.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1"> <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"> <polygon points="0 0 24 0 24 24 0 24"/> <path d="M9.26193932,16.6476484 C8.90425297,17.0684559 8.27315905,17.1196257 7.85235158,16.7619393 C7.43154411,16.404253 7.38037434,15.773159 7.73806068,15.3523516 L16.2380607,5.35235158 C16.6013618,4.92493855 17.2451015,4.87991302 17.6643638,5.25259068 L22.1643638,9.25259068 C22.5771466,9.6195087 22.6143273,10.2515811 22.2474093,10.6643638 C21.8804913,11.0771466 21.2484189,11.1143273 20.8356362,10.7474093 L17.0997854,7.42665306 L9.26193932,16.6476484 Z" fill="#000000" fill-rule="nonzero" opacity="0.3" transform="translate(14.999995, 11.000002) rotate(-180.000000) translate(-14.999995, -11.000002) "/> <path d="M4.26193932,17.6476484 C3.90425297,18.0684559 3.27315905,18.1196257 2.85235158,17.7619393 C2.43154411,17.404253 2.38037434,16.773159 2.73806068,16.3523516 L11.2380607,6.35235158 C11.6013618,5.92493855 12.2451015,5.87991302 12.6643638,6.25259068 L17.1643638,10.2525907 C17.5771466,10.6195087 17.6143273,11.2515811 17.2474093,11.6643638 C16.8804913,12.0771466 16.2484189,12.1143273 15.8356362,11.7474093 L12.0997854,8.42665306 L4.26193932,17.6476484 Z" fill="#000000" fill-rule="nonzero" transform="translate(9.999995, 12.000002) rotate(-180.000000) translate(-9.999995, -12.000002) "/> </g> </svg><!--end::Svg Icon--></span>';
                    else
                        sp2.innerHTML = '<span class="svg-icon svg-icon-primary svg-icon-sm"><!--begin::Svg Icon | path:C:\wamp64\www\keenthemes\themes\metronic\theme\html\demo9\dist/../src/media/svg/icons\Navigation\Check.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1"> <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"> <polygon points="0 0 24 0 24 24 0 24"/> <path d="M6.26193932,17.6476484 C5.90425297,18.0684559 5.27315905,18.1196257 4.85235158,17.7619393 C4.43154411,17.404253 4.38037434,16.773159 4.73806068,16.3523516 L13.2380607,6.35235158 C13.6013618,5.92493855 14.2451015,5.87991302 14.6643638,6.25259068 L19.1643638,10.2525907 C19.5771466,10.6195087 19.6143273,11.2515811 19.2474093,11.6643638 C18.8804913,12.0771466 18.2484189,12.1143273 17.8356362,11.7474093 L14.0997854,8.42665306 L6.26193932,17.6476484 Z" fill="#000000" fill-rule="nonzero" transform="translate(11.999995, 12.000002) rotate(-180.000000) translate(-11.999995, -12.000002) "/> </g> </svg><!--end::Svg Icon--></span>';
                    small2.appendChild(sp2);
                    textSpan.style.marginLeft = "3px";
                }

                small2.appendChild(textSpan);
                a.onclick = function () {

                    if ($(this).hasClass("active")) return;

                    clients.forEach(function (el) {
                        el.active = false;
                        $(el.htmlRef).removeClass("active");
                    })

                    removeParam("client");
                    elem.active = true;

                    $(this).addClass("active");

                    updateMessages(elem, elem.messages.filter(s => s.unread));

                    if (countSpan) {
                        elem.messages.forEach(v => v.unread = false);
                        countSpan.remove();
                    }


                    mainChatBuild(elem);
                }

                flexDiv.appendChild(h5);
                flexDiv.appendChild(small);

                let flex = document.createElement("div");
                flex.className = "d-flex w-100";

                let subFlex = document.createElement("div");
                subFlex.className = "flex-grow-1";
                subFlex.style.flex = "1";


                subFlex.appendChild(flexDiv);
                subFlex.appendChild(small2);
                flex.appendChild(subFlex);

                if (ct) {
                    flex.appendChild(countSpan);
                }

                a.appendChild(flex);

                elem.htmlRef = a;
                list.append(a);

                if (elem.active && !body) {
                    mainChatBuild(elem);
                    if (ct > 0) {
                        updateMessages(elem, elem.messages.filter(s => s.unread));
                    }
                }
            })
        }


        function updateMessage(elem, message) {
            $.ajax({
                url: "/client/mark/received/" + message.id,
                success: function () {
                    message.unread = false;

                    const elem = $(".message-badge");
                    let num = parseInt(elem.text());
                    elem.text(num - 1);
                    uiBuild();
                }
            })
        }

        function updateMessages(elem, messages) {
            $.ajax({
                url: "/client/mark/multiple/received",
                method: "POST",
                data: {
                    "_token": me.updateToken,
                    "messages": messages.map(v => v.id)
                },
                success: function (res) {

                    const elem = $(".message-badge");
                    let num = parseInt(elem.text());
                    elem.text(num - messages.length);
                    me.updateToken = res.token;
                    messages.forEach(v => v.unread = false);
                    uiBuild();
                }
            })

        }

        $(function () {
            uiBuild();
            $(document).bind("new.message", function (e, status) {
                // subscribers can be namespaced with multiple classes
                if (status.to === me.id) {

                    if (status.message) {
                        let elem = clients.filter(v => v.id === status.from);
                        if (elem.length) {
                            let el = elem[0];

                            status.unread = true;
                            if (el.active) {
                                updateMessage(el, status);
                            }

                            el.messages.push(status);

                            if (el.active && body && body.scroll) {
                                cleanAndAddContent(body.dataScroll, el);
                                $(body.scroll).animate({
                                    scrollTop: body.scroll.scrollHeight
                                })
                            }

                        } else {
                            let user = status.user;
                            status.unread = true;
                            user.messages = [status];
                            clients.push(user);
                        }
                    } else if (status.delivered) {
                        let elem = clients.filter(v => v.id === status.from);

                        if (elem.length) {
                            let el = elem[0];
                            let msg = el.messages.filter(v => v.id === status.id);
                            if (msg.length) {
                                msg[0].delivered = true;
                                if (el.active && body && body.scroll) {
                                    cleanAndAddContent(body.dataScroll, el);
                                }
                            }
                        }

                    } else if (status.hasOwnProperty("block_status")) {
                        let elem = clients.filter(v => v.id === status.from);
                        if (elem.length) {
                            let el = elem[0];
                            el.broken = status.block_status;
                            mainChatBuild(el);
                        }
                    }


                    uiBuild();


                }

                // subscribers = $('.subscriber.networkDetection');
                // // publish notify.networkDetection even to subscribers
                // subscribers.trigger("notify.networkDetection", [status])
                /*
                other logic based on network connectivity could go here
                use google gears offline storage etc
                maybe trigger some other events
                */
            });


            $(document).on('click', '.notification', function (e) {
                e.preventDefault();
                let el = this;
                $(el).removeClass('show');
                setTimeout(function () {
                    el.remove();
                }, 300);

                let elem = clients.filter(v => v.id === $(el).data('from'));

                if (elem.length) {
                    elem[0].htmlRef.onclick();
                }
            })
        })
    </script>
@endsection
