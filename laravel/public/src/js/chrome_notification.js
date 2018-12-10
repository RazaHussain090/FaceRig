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
