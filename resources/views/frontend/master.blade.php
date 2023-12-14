

<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <title>@yield('title')</title>

 @include('frontend.includes.style')
</head>

<body>
<!--header-->
@include('frontend.includes.header')
<!--/header-->
@yield('content')
<!-- //home page section -->
  <!-- footer -->
  @include('frontend.includes.footer')
  <!-- footer -->
  <button onclick="topFunction()" id="movetop" title="Go to top">
    &#10548;
  </button>
  <!-- move top -->
 @include('frontend.includes.script')

  </body>

  </html>