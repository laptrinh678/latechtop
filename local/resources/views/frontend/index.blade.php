<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width; initial-scale=1.0; maximum-scale=1.0; user-scalable=0;">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>@yield('title')</title>
    @yield('meta')
    <meta name="google-site-verification" content="IE7SiyUIVuQbH_379UkXTiynra3rVHjTZ4TFPCqe09g" />
    <link rel="stylesheet" href="{{url('public/frontend')}}/css/top.css">
    <link href="https://fonts.googleapis.com/css?family=Nunito+Sans:300,300i,400,400i,600,600i,700,700i,800,800i" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Oswald:400,500,600,700|Roboto+Condensed:400,400i,700&amp;subset=vietnamese" rel="stylesheet">
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="{{url('public/frontend')}}/css/style.min.css">
    <link rel="stylesheet" href="{{url('public/frontend')}}/css/style.css">
    <link rel="stylesheet" href="{{url('public/frontend')}}/css/ext/owlcarousel/assets/owl.carousel.min.css">
    <link rel="stylesheet" href="{{url('public/frontend')}}/css/ext/owlcarousel/assets/owl.theme.default.min.css">
    <script src="{{url('public/frontend')}}/css/ext/owlcarousel/owl.carousel.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/lodash@4.17.11/lodash.min.js"></script>
    <script src="https://hammerjs.github.io/dist/hammer.min.js"></script>
    <script src="{{url('public/frontend')}}/css/js/jquery.hammer.js"></script>
    <script type="text/javascript" src="{{url('public/frontend')}}/css/fancybox/jquery.fancybox-1.3.1.js"></script>
{{--    <link rel="stylesheet" type="text/css" href="{{url('public/frontend')}}/css/fancybox/jquery.fancybox-1.3.1.css" media="screen">--}}
    <script src="{{url('public/frontend')}}/css/js/app.js"></script>
    <link rel="stylesheet" href="{{url('public/frontend')}}/css/cssFull.css">
    <link rel="stylesheet" href="{{url('public/frontend')}}/css/pager.css">
    <link rel="stylesheet" href="{{url('public/frontend')}}/css/reposive.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    @yield('style')
</head>
<body>
<div id="fb-root"></div>
<script async defer crossorigin="anonymous" src="https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v12.0&appId=1231752717281827&autoLogAppEvents=1" nonce="10ov3Ebe"></script>
@include('frontend.header')
@include('frontend.menu')
<div class="container">
@yield('content')
</div>
@include('frontend.footer')
@include('frontend.item.login')
<p class="mobile_support hidden-md hidden-lg">
    <svg class="svg-inline--fa fa-phone fa-w-16" aria-hidden="true" data-prefix="fa" data-icon="phone" role="img"
         xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" data-fa-i2svg="">
        <path fill="currentColor"
              d="M493.397 24.615l-104-23.997c-11.314-2.611-22.879 3.252-27.456 13.931l-48 111.997a24 24 0 0 0 6.862 28.029l60.617 49.596c-35.973 76.675-98.938 140.508-177.249 177.248l-49.596-60.616a24 24 0 0 0-28.029-6.862l-111.997 48C3.873 366.516-1.994 378.08.618 389.397l23.997 104C27.109 504.204 36.748 512 48 512c256.087 0 464-207.532 464-464 0-11.176-7.714-20.873-18.603-23.385z"></path>
    </svg><!-- <i class="fa fa-phone"></i> --> <a href="tel:{{$imfomation->hotline}}">{{$imfomation->hotline}}</a></p>
<script>
    FontAwesomeConfig = {searchPseudoElements: true};
</script>
<script src="{{url('public/frontend')}}/css/js/fontawesome-all.js"></script>
<script type="text/javascript">
    $(document).ready(function () {
        $('.go-top').click(function (event) {
            event.preventDefault();
            $('html, body').animate({scrollTop: 0}, 500);
        })

        $('.checklogin').click(function () {
            let checkLogin = $(this).val();
            if (checkLogin == 0) {
                $('.codeLogin').show();
                $('.phonelogin').hide();
            }
            if (checkLogin == 1) {
                $('.codeLogin').hide();
                $('.phonelogin').show();
            }
        });
        $('#loginsystem').on('submit', function (event) {
            event.preventDefault();
            let url = $('#url-login').val();
            console.log(url);
            $.ajax({
                url: url,
                method: "POST",
                data: new FormData(this),
                contentType: false,
                cache: false,
                processData: false,
                success: function (data) {
                    if (data.status == true) {
                        location.reload();
                    } else {
                        $('.error3').text(data.message);
                    }
                },
                error: function (response) {
                    var dataErr = JSON.parse(response.responseText);
                    var dataErr_arr = dataErr.errors
                    $.each(dataErr_arr, function (ind, val) {
                        if (ind == 'phone') {
                            $('.error1').text(val);
                        }
                        if (ind == 'password') {
                            $('.error2').text(val);
                        }
                        if (ind == 'code') {
                            $('.error4').text(val);
                        }
                    })
                }
            })
        });
    });
</script>
@yield('script')
</body>
</html>
