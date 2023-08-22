var app = require('express')();
var server = require('http').Server(app);
const WebSocket = require('ws');
var io = require('socket.io')(server, {
    allowEIO3: true,
    cors: {
        origin: "http://127.0.0.1:8000",
        methods: ["GET", "POST", "PUT","PATCH"],
        allowedHeaders: ["my-custom-header"],
        credentials: true
    }
});
var redis = require('redis');

// Add headers
app.use(function (req, res, next) {

    // Website you wish to allow to connect
    res.setHeader('Access-Control-Allow-Origin', 'http://localhost:8888');

    // Request methods you wish to allow
    res.setHeader('Access-Control-Allow-Methods', 'GET, POST, OPTIONS, PUT, PATCH, DELETE');

    // Request headers you wish to allow
    res.setHeader('Access-Control-Allow-Headers', 'X-Requested-With,content-type');

    // Set to true if you need the website to include cookies in the requests sent
    // to the API (e.g. in case you use sessions)
    res.setHeader('Access-Control-Allow-Credentials', true);

    // Pass to next layer of middleware
    next();
});

server.listen(8890);
// io.on('connection', function (socket) {
//
//     var redisClient = redis.createClient();
//     redisClient.subscribe('message');
//     console.log("client connected");
//
//     socket.on('message',function () {
//         console.log("dub message");
//     })
//
//     redisClient.on("message", function(channel, data) {
//         console.log("mew message add in queue "+ data['message'] + " channel");
//         socket.emit(channel, data);
//     });
//
//     socket.on('disconnect', function() {
//         redisClient.quit();
//     });
//
// });

const wss = new WebSocket.Server({
    port: 3002,
    perMessageDeflate: {
        zlibDeflateOptions: {
            // See zlib defaults.
            chunkSize: 1024,
            memLevel: 7,
            level: 3
        },
        zlibInflateOptions: {
            chunkSize: 10 * 1024
        },
        // Other options settable:
        clientNoContextTakeover: true, // Defaults to negotiated value.
        serverNoContextTakeover: true, // Defaults to negotiated value.
        serverMaxWindowBits: 10, // Defaults to negotiated value.
        // Below options specified as default values.
        concurrencyLimit: 10, // Limits zlib concurrency for perf.
        threshold: 1024 // Size (in bytes) below which messages
        // should not be compressed.

    }
});


wss.on('connection', (ws, req) => {
    console.log("connected");
    ws.on('message', wrapper => {
        console.log(wrapper);
    });
});
