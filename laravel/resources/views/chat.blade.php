<html>
  <head>

  <title>IO chat</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <script src = "http://code.jquery.com/jquery-latest.min.js"></script>
  <script src = "https://cdn.socket.io/socket.io-1.2.0.js"></script>

  <style>
    body{
      margin-top: 30px;
    }

    #messageArea{
      display: none;
    }
    #userFormArea{

    }
  </style>

  </head>

  <body>
    <div class = "container">
      <div id = "userFormArea" class = "row">
        <div class = "col-md-12">
          <!--UserLogin Form -->
          <form id = "userForm">
            <div class = "form-group">

              <label> Enter Username</label>
              <input type = "text" class = "form-control" id = "username" >
              <br />
              <input type = "submit" class = "btn btn-primary"
               value = "Login"/>

          </div>
          </form>
        </div>
      </div>
      <div id = "messageArea" class = "row">
        <div class = "col-md-4">
          <div class = "well">
            <button  class = "btn btn-primary" id="dnperm"
             >Permission</button>
             <button  class = "btn btn-primary" id="dntrigger"
              >Trigger</button>
            <h3>Online User</h3>
            <ul class="list-group" id="users"></ul>

          </div>

        </div>
        <div class="col-md-8">
          <!-- SendMessages Form -->
          <div class="chat" id="chat">
            <div class = "well"><strong>Raza</strong>:HI!</div>
          </div>
          <form id = "messageForm">
            <div class = "form-group">
              <label> Enter Message</label>
              <textarea class = "form-control" id = "message"></textarea>
              <br />
              <input type = "submit" class = "btn btn-primary" value = "send Msessage"/>
            </div>

        </div>
      </div>
    </div>
    <!-- SendingElements to the IoSockets -->
    <script>


        var socket = io.connect();
        var $messageForm = $('#messageForm');
        var $message = $('#message');
        var $chat = $('#chat');
        var $messageArea = $('#messageArea');
        var $userForm = $('#userForm');
        var $userFormArea = $('#userFormArea');
        var $users = $('#users');
        var $username = $('#username');


        $messageForm.submit(function(e){

          e.preventDefault();
          console.log('SUbmitted');
          socket.emit('send message', $message.val());
          $message.val('');
        });

        socket.on('new message',function(data){
          $chat.append('<div class = "well"><strong>'+data.user+'</strong>:'+data.msg+'</div>');

          ctrigger(data);
        });
        $userForm.submit(function(e){
          e.preventDefault();
          console.log('SUbmitted');
          socket.emit('new user', $username.val(), function(data){

            if(data){
              $userFormArea.hide();
              $messageArea.show();
            }

          });
          $username.val('');
        });

        socket.on('get users',function(data){
          var html = '';
          for(i = 0;i < data.length; i++){
            html += '<li class="list-group-item">'+data[i]+'</li>';
          }
          $users.html(html);
        });

         function ctrigger(data){
           var notify;



           if (Notification.permission == 'default'){
             alert('Please allow notifcation before doing this');
           }else{
             notify = new Notification(data.user, {
               body: data.msg,
               icon: 'https://www.w3schools.com/w3css/img_avatar3.png',
               tag: '1234'

             });
             notify.onlick = function(){
               console.log(this);
             }
           }
        }
    </script>
    <!-- Chrome Notification -->
    <script>
    var dnperm = document.getElementById('dnperm');
    var dntrigger = document.getElementById('dntrigger');

    dnperm.addEventListener('click',function(e){
      e.preventDefault();

      if(!window.Notification){
          alert('Sorry , notification are not supported');

      }else{
        Notification.requestPermission(function(p){
          if(p==='denied'){
            alert('you have denied notification.');

          }else if(p==='granted'){
            alert('you have granted notifications');
          }
        });
      }

    });

    //stimulate an eventdn
      dntrigger.addEventListener('click', function(){
        var notify;



        if (Notification.permission == 'default'){
          alert('Please allow notifcation before doing this');
        }else{
          notify = new Notification("Raza", {
            body: "Hi There HOW ARE YOU",
            icon: 'https://www.w3schools.com/w3css/img_avatar3.png',
            tag: '1234'

          });
          notify.onlick = function(){
            console.log(this);
          }
        }
      });

    </script>

  </body>
</html>
