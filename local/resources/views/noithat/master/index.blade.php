<!DOCTYPE html>
<html lang="en">
<head>
 <meta charset="UTF-8">
 <title>@yield('title')</title> 
 @yield('meta')
<link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
<link rel="stylesheet" href="{{url('public/noithat')}}/font-awesome-4.7.0/css/font-awesome.min.css">

<!-- css owlcarosel-->

<link rel="stylesheet" href="{{url('public/noithat')}}/owl/owl.carousel.min.css">
<link rel="stylesheet" href="{{url('public/noithat')}}/owl/owl.theme.default.min.css">
<link rel="stylesheet" href="{{url('public/noithat')}}/bootstrap/bootstrap.min.css">
<!-- <link rel="stylesheet" href="{{url('public/noithat')}}/css/stylesfasamy.css"> -->

<!-- <link rel="stylesheet" href="{{url('public/noithat')}}/css/flatsome.css"> -->
<link rel="stylesheet" href="{{url('public/noithat')}}/css/toantrang.css">
<link rel="stylesheet" href="{{url('public/noithat')}}/css/home.css">

<link rel="stylesheet" href="{{url('public/noithat')}}/css/hover-min.css">
<link rel="stylesheet" href="{{url('public/noithat')}}/css/animate.css">
<link rel="stylesheet" href="{{url('public/noithat')}}/css/reponsive.css">

<script src="{{url('public/noithat')}}/bootstrap/bootstrap3.4.0.min.js"></script>
<script src="{{url('public/noithat')}}/js/jquery3.3.1.min.js"></script>
<script src="{{url('public/noithat')}}/owl/jquery.min.js"></script>
<script src="{{url('public/noithat')}}/owl/owl.carousel.js"></script>

    @yield('style')
</head>
<body>
  <script>
  (function(s, u, b, i, z){
    u[i]=u[i]||function(){
      u[i].t=+new Date();
      (u[i].q=u[i].q||[]).push(arguments);
    };
    z=s.createElement('script');
    var zz=s.getElementsByTagName('script')[0];
    z.async=1; z.src=b; z.id='subiz-script';
    zz.parentNode.insertBefore(z,zz);
  })(document, window, 'https://widgetv4.subiz.com/static/js/app.js', 'subiz');
  subiz('setAccount', 'acpxfeuzgqcanpg0c897');
</script>

<!-- slider -->

<!-- end sldier -->
<!-- header -->
@include('noithat.master.header')
@include('noithat.master.menu')
<!-- end header -->
<div style="clear: both;"></div>
<!-- content -->

 @yield('content')
<!-- end logo -->
<!-- footer -->
 @include('noithat.master.footer')
<!-- end footer -->
</div>

<div id="fb-root"></div>
<script async defer crossorigin="anonymous" src="https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v12.0&appId=1231752717281827&autoLogAppEvents=1" nonce="10ov3Ebe"></script>

</body>
@yield('script')
</html>