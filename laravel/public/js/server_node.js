/*
var http = require('http').Server(app);
var express = require('express');
var app = express();
var server = require('http').createServer();
var io = require('socket.io')(http);

users = [];
connections = [];

app.get('/', function (req, res) {
  res.sendFile(__dirname + '/index.html');
})

app.listen(3000, '127.0.0.1', function () {
  console.log('Example app listening on port 3000!')
});

//connection
io.sockets.on('connection',function(socket){
  connections.push(socket);
  console.log('connected: %s sockets connected',connections.length);

  //disconnection
  sockets.on('connection', function(data){
    if(!socket.username) return;
    users.splice(users.indexOf(socket.username), 1);
    updateUsernames();

    connections.splice(connections.indexOf(socket), 1);
    console.log('disconnected: %s sockets connected',connections.length);

  });

  //send messages
  //messages are receive
  socket.on('send message', function(data){
    console.log(data);
    io.sockets.emit('new message', {msg: data,user: socket.username});
  });

  //new User
  socket.on('new user', function(data, callback){
    callback(true);
    socket,username = data;
    users.push(socket.username);
    updateUsernames();

  });

  function updateUsernames(){
    io.sockets.emit('get users',users);

  }
});



*/
/*function onRequest(request, response) {
  console.log('Server is Running');
  response.writeHead(200, {'Content-Type': 'text/plain'});
  response.write('index.html');
  response.end();

}
console.log('Server is Running');
http.createServer(onRequest).listen(8000);
*/


var express = require('express');
var app = express();
var server = require('http').createServer(app);
var io = require('socket.io').listen(server);
users = [];
connections = [];

server.listen(process.env.PORT || 3000, '127.0.0.1');

app.get('/',function(req, res){
  res.sendFile(__dirname + '/index.html');
});
//connection
io.sockets.on('connection',function(socket){
  connections.push(socket);
  console.log('connected: %s sockets connected',connections.length);

  //disconnection
  socket.on('connection', function(data){
    if(!socket.username) return;
    users.splice(users.indexOf(socket.username), 1);
    updateUsernames();

    connections.splice(connections.indexOf(socket), 1);
    console.log('disconnected: %s sockets connected',connections.length);

  });

  //send messages
  //messages are receive
  socket.on('send message', function(data){
    console.log(data);
    io.sockets.emit('new message', {msg: data, user:socket.username});
  });

  //new User
  socket.on('new user', function(data, callback){
    callback(true);
    socket.username = data;
    users.push(socket.username);
    updateUsernames();

  });

  function updateUsernames(){
    io.sockets.emit('get users', users);

  }
});
