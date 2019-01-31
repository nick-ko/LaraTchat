@extends('layouts.welcome')

@section('title')
    login
@endsection

@section('content')

@include('includes.navbar')

    <div class="container">
        <br>
      @include('includes.validator')
       <br>
      <form class="form-signin" method="POST" action="{{ route('connect') }}">
        <h2 class="form-signin-heading">Connexion</h2>
        <br>
        <label for="inputEmail" class="sr-only">Email address</label>
        <input type="email" id="inputEmail" class="form-control" placeholder="Email address" required autofocus><br>
        <label for="inputPassword" class="sr-only">Password</label>
        <input type="password" id="inputPassword" class="form-control" placeholder="Password" required>
        <div class="checkbox">
          <label>
            <input type="checkbox" value="remember-me"> Remember me
          </label>
        </div>
        <button class="btn btn-lg btn-primary btn-block" type="submit">Connexion</button>
        <input type="hidden" name="_token" value="{{ Session::token() }}">
      </form>

    </div> <!-- /container -->
@endsection
