@if(auth()->guard("client")->check())

    @php
        $user = auth()->guard("client")->user();
    @endphp

    <style>

        .notification-panel{
            position: fixed;
            bottom: 10px;
            right: 10px;
            max-width: 400px;
            max-height: 100%;
            overflow-y: auto;
        }

        .notification .close-button{
            background: none;
            position: absolute;
            right: 0;
            top: 0;
            width: 30px;
            height: 30px;
            border: none;
        }

        .notification .close-button:hover{
            background-color: #eeeeee;
        }

        .notification-title{
            font-weight: bolder;
        }

        .notification-body{
            overflow: hidden;text-overflow: ellipsis;display: -webkit-box; -webkit-line-clamp: 3; -webkit-box-orient: vertical;
        }

        .notification {
            position: relative;
            padding: 10px;
            width: 400px;
            background-color: white;
            border-left: 4px solid #f34d11 !important;
            text-align: left;
            display: inline-block;
            font-family: Helvetica, Arial, sans-serif;
            transform: translateX(450px);
            transition: transform .5s;
            margin-bottom: 10px;
        }

        .notification.show {
            transform: translateX(0px);
        }
    </style>


    <script>




        $(function () {

            $('.show-button').on('click', function(){
                createNotification("Simple notification","Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.")
            });

            function createNotification(title,body,fromEnc,from){
                let note = document.createElement("a");
                note.className = "notification shadow-sm";

                let close = document.createElement("button");
                close.className = "close-button d-flex justify-content-center align-items-center";
                close.innerHTML = '<span class="svg-icon svg-icon-primary svg-icon-sm-2x"><!--begin::Svg Icon | path:C:\wamp64\www\keenthemes\themes\metronic\theme\html\demo9\dist/../src/media/svg/icons\Navigation\Close.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1"> <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"> <g transform="translate(12.000000, 12.000000) rotate(-45.000000) translate(-12.000000, -12.000000) translate(4.000000, 4.000000)" fill="#000000"> <rect x="0" y="7" width="16" height="2" rx="1"/> <rect opacity="0.3" transform="translate(8.000000, 8.000000) rotate(-270.000000) translate(-8.000000, -8.000000) " x="0" y="7" width="16" height="2" rx="1"/> </g> </g> </svg><!--end::Svg Icon--></span>';

                note.setAttribute("data-from",from);

                close.onclick = function (e) {
                    e.stopPropagation();
                    e.preventDefault();
                    $(note).toggleClass('show');
                    setTimeout(function () {
                        note.remove();
                    },600);
                }

                note.href = "/client/my/messages?client="+fromEnc;

                let titleElement = document.createElement("dib");
                titleElement.className = "notification-title text-dark-75";

                titleElement.innerText = title;

                let noteBody = document.createElement("div");
                noteBody.className = "notification-body text-dark-75";

                noteBody.innerText = body;



                note.appendChild(close);
                note.appendChild(titleElement);
                note.appendChild(noteBody);


                $(".notifications-data").append(note);


                if(globalMe.allowSound) {

                    let audio = new Audio('{{asset('frontend/assets/notification.mp3')}}');

                    audio.volume = 0.4;
                    audio.play();
                }

                setTimeout(function () {
                    $(note).toggleClass('show');

                    setTimeout(function () {
                        $(note).removeClass('show');
                        setTimeout(function () {
                            note.remove();
                        },600);
                    },10000);

                },700);
            }

             window.globalMe = {
                name: "{{$user->name}}",
                profile: "{{$user->profile_photo_url}}",
                id: {{$user->id}},
                default:"{{$user->defaultPhotoUrl}}",
                type:"{{$user->registrationType->name??''}}",
                allowSound:{{$user->allow_notification_sound ? 'true':'false'}},
            };


            Echo.channel("messages").listen(
                '.Sendmessage',function (data){
                    if(data.to === globalMe.id && data.message){
                        const elem = $(".message-badge");
                        let num = parseInt(elem.text());
                        elem.text(num+1);
                        createNotification(data.user.name,data.message,data.fromEncrypted,data.from);
                    }

                    $(document).trigger('new.message',[data]);
                }
            )

        })


    </script>
@endif
