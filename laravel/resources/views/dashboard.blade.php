@extends('layout.master')

@section('content')
@include('includes.message-block')
  <section class="col-sm-4">

  </section>
  <section class="row new-post">

    <div class="col-md-4 col-md-offset-1">
      <header>
        <h3>What do you have to say!</h3>
      </header>
      <form action="{{route('post.create')}}" method="post">
        <div class="form-group">
          <textarea class="form-control" name="body" id="new-post" rows="5" placeholder="Your Post"></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Create Post</button>
        <input type="hidden" value="{{Session::token()}}" name="_token" />
      </form>
    </div>

    <div id = "messageArea" class="col-sm-6 col-sm-offset-1">
      <h1></h1>
      <div class = "col-md-8">
        <div class = "well">
          <button  class = "btn btn-primary" id="dnperm"
           >Permission</button>
           <button  class = "btn btn-primary" id="dntrigger"
            >Trigger</button>
          <h3>Online User</h3>
          <ul class="list-group" id="users"></ul>

        </div>
      </div>

  </section>

  <section class="row posts">
    <div class="col-md-3 col-md-offset-1">
      <header>
        <h3>What Other People Say!</h3>

      </header>
      @foreach($posts as $post)
      <article class="post" data-postid="{{$post->id}}">
        <p>{{ $post->body }}</p>
        <div class="info">
          posted by {{ $post->user->username }} on {{$post->created_at}}
        </div>
        <div class="interaction">
          <a href="#">Like</a> |
          <a href="#">Comment</a>
          @if (Auth::user() == $post->user)
            |
            <a href="#" class="edit">Edit</a> |
            <a href="{{ route('post.delete',['post_id' => $post->id]) }}">Delete</a>
          @endif
        </div>
      </article>
      @endforeach


    </div>
  </section>

  <div class="modal fade" tabindex="-1" role="dialog" id="edit-modal">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Edit Post</h4>
      </div>
      <div class="modal-body">
        <form>
          <div class="form-group">
            <label for="post-body">Edit the post</label>
            <textarea class="form-control" name="post-body" id="post-body"></textarea>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" id = "modal-save" name = "modal-save">Save changes</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

  <script>
    var token = '{{Session::token()}}';
    var url = '{{route('edit')}}';
  </script>
@endsection()
