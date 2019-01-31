<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>@yield('title')</title>

    <!-- Bootstrap core CSS -->

    <!-- Custom styles for this template -->
    <link type="text/css" rel="stylesheet" href="{{ URL::asset('css/bootstrap.css') }}">
    <link type="text/css" rel="stylesheet" href="{{ URL::asset('css/signin.css') }}">
  </head>

  <body>
  @yield('content')


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="{{ mix('js/app.js') }}"></script>
  </body>
</html>
