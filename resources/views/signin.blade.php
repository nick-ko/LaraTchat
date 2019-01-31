@extends('layouts.welcome')

@section('title')
    Sign in
@endsection

@section('content')

@include('includes.navbar')

    <div class="container">
        <br>
      @include('includes.validator')

      <form class="form-signin" method="POST" action="{{ route('save.user')}}">
        <h2 class="form-signin-heading">Inscription</h2>
        <br>
        <label for="inputname" class="sr-only">Nom </label>
        <input type="text" name="name" id="inputname" class="form-control" placeholder="Votre Nom" required autofocus><br>
        <label for="inputEmail" class="sr-only">Email </label>
        <input type="email" name="email" id="inputEmail" class="form-control" placeholder="Email address" required><br>
        <label for="inputPassword" class="sr-only">Password</label>
        <input type="password" name="password" id="inputPassword" class="form-control" placeholder="Password" required><br>

        <button class="btn btn-lg btn-primary btn-block" type="submit">Inscription</button>
        <input type="hidden" name="_token" value="{{ Session::token() }}">
      </form>

    </div> <!-- /container -->
@endsection
