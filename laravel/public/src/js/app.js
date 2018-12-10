var postId = 0;
var postBodyElement = null;
$(document).ready(function(){
  $('.post').find('.interaction').find('.edit').on('click' , function(){
    event.preventDefault();

    postBodyElement = event.target.parentNode.parentNode.childNodes[1];
    var postBody = postBodyElement.textContent;
    postId = event.target.parentNode.parentNode.dataset['postid'];
    $('#post-body').val(postBody);
    $('#edit-modal').modal();

  });
});
$(document).ready(function(){
  $('#modal-save').on('click',function(){

    $.ajax({
      method: 'POST',
      url: url,
      data: {body: $('#post-body').val(), postId: postId, _token: token}
    })
    .done(function (msg) {
      $(postBodyElement).text(msg['new_body']);
      $('#edit-modal').modal('hide');
    });
  });
});
