@extends('layouts.app')
@section('content')
    <script src="//code.jquery.com/jquery-1.11.2.min.js"></script>
    <script src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
    <script src="https://cdn.socket.io/socket.io-1.3.4.js"></script>
    <style type="text/css">
        #messages{
            border: 1px solid black;
            height: 300px;
            margin-bottom: 8px;
            overflow: scroll;
            padding: 5px;
        }
    </style>
    <div class="container spark-screen">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">Chat Message Module</div>
                    <div class="panel-body">

                        <div class="row">
                            <div class="col-lg-8" >
                                <div id="messages" ></div>
                            </div>
                            <div class="col-lg-8" >
                                <form action="sendmessage" method="POST">
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}" >
                                    <input type="hidden" name="user" value="{{ auth('client')->user()->name }}" >
                                    <textarea class="form-control msg"></textarea>
                                    <br/>
                                    <input type="button" value="Send" class="btn btn-success send-msg">
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        var exampleSocket = new WebSocket("ws://localhost:3002", "protocolOne");
        exampleSocket.onopen = function (event) {
            console.log(event);
            exampleSocket.send("Here's some text that the server is urgently awaiting!");
        };
        // const socket = io("ws://localhost:8890");
        //
        // socket.on("connect", () => {
        //     // either with send()
        //     socket.send("Hello!");
        //
        //     // or with emit() and custom event names
        //     socket.emit("salutations", "Hello!", { "mr": "john" }, Uint8Array.from([1, 2, 3, 4]));
        // });
        //
        // // handle the event sent with socket.send()
        // socket.on("message", data => {
        //     console.log(data);
        // });
        //
        // // handle the event sent with socket.emit()
        // socket.on("greetings", (elem1, elem2, elem3) => {
        //     console.log(elem1, elem2, elem3);
        // });
        // var socket = io.connect('http://localhost:8890',
        //     {
        //     withCredentials: true,
        //     extraHeaders: {
        //         "my-custom-header": "abcd"
        //     },
        //     // allowEIO3: true,
        //     // transport:'websocket'
        // }
        // );
        //
        // socket.on('message', function (data) {
        //     data = jQuery.parseJSON(data);
        //     console.log(data);
        //     console.log("received message");
        //     $( "#messages" ).append( "<strong>"+data.user+":</strong><p>"+data.message+"</p>" );
        // });
        $(".send-msg").click(function(e){
            e.preventDefault();
            var token = $("input[name='_token']").val();
            var user = $("input[name='user']").val();
            var msg = $(".msg").val();
            if(msg !== ''){
                //socket.emit("message",{'_token':token,'message':msg,'user':user});
                exampleSocket.send(msg);
                $.ajax({
                    type: "POST",
                    url: '{!! URL::to("sendmessage") !!}',
                    dataType: "json",
                    data: {'_token':token,'message':msg,'user':user},
                    success:function(data){
                        console.log(data);
                        $(".msg").val('');
                    }
                });
            }else{
                alert("Please Add Message.");
            }
        })
    </script>
@endsection
