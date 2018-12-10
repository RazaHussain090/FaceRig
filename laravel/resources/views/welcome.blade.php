@extends('layout.master')

@section('title')
  Welcome:
@endsection


@section('content')

  <!--
@ìnclude('includes.message-block')
  @if(count($errors) > 0)
    <div class='row'>
      <div class='col-md-4 col-md-offset-4'>
        <ul>
          @foreach($errors->all() as $error)
            <li>
              {{$error}}
            </li>
          @endforeach
        </ul>
      </div>
    </div>
  @endif
-->
  <div class = 'row'>
    <div class = 'col-md-6'>
      <h3>Sign Up</h3>
      <form method='post' action='{{ route("signup") }}'>
        <div class='form-group' {{ $errors->has("email") ? 'has-error' : ''}}>
          <label for='email'>Your E-Mail</label>
          <input class='form-control' type='text' name='email' id='email' value='{{Request::old("email")}}' />

          <label for='name'>Your Name</label>
          <input class='form-control' type='text' name='username' id='username' value='{{Request::old("username")}}' />

          <label for='password'>Your Password</label>
          <input class='form-control' type='password' name='password' id='password' value='{{Request::old("password")}}'/>

        </div>
        <button class='btn btn-primary' type='submit'>Submit</button>
        <input type="hidden" name="_token" value="{{Session::token()}}"/>
      </form>
    </div>


      <div class = 'col-md-6'>
      <h3>Sign In</h3>
      <form method='post' action='{{route("signin")}}'>
        <div class='form-group'>
          <label for='email'>Your E-Mail</label>
          <input class='form-control' type='text' name='email' id='email'  value='{{Request::old("email")}}'/>

          <label for='password'>Your Password</label>
          <input class='form-control' type='password' name='password' id='password' value='{{Request::old("password")}}'/>

        </div>
        <button class='btn btn-primary' type='submit'>Submit</button>
        <input type="hidden" name="_token" value="{{Session::token()}}"/>
      </form>

    </div>
  </div>
@endsection
