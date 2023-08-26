@extends('noithat.master.index')
@section('title')
{{$header_footer->text_seo}}
@endsection('title')
@section('meta')
<meta name="description" content="">
<meta name="robots" content="{{$header_footer->text_seo}}">
<meta name="keywords" content="{{$header_footer->text_seo}}">
<link rel="canonical" href="{{url('/')}}">
<link rel="next" href="{{url('/')}}">
<meta property="og:locale" content="vi_VN">
<meta property="og:type" content="website">
<meta property="og:title" content="{{$header_footer->text_seo}}">
<meta property="og:description" content="{{$header_footer->text_seo}}">
<meta property="og:url" content="{{url('/')}}">
<meta name="twitter:card" content="summary">
<meta name="twitter:title" content="{{$header_footer->text_seo}} 00,700italic&amp;subset=latin,vietnamese" rel="stylesheet" type="text/css"/>
@endsection('meta')
@section('style')
<script src="{{url('public/fontend')}}/bootstrap/bootstrap3.4.0.min.js"></script>
@endsection('style')
@section('content')
@include('noithat.master.slider')
<!-- CSS ================================================== -->
<div class="container-fluid home">
<div class="container">
  <div class="row">
    <div class="col-md-3"><img src="{{url('public/backend')}}/1-tu-van.png" alt=""></div>
     <div class="col-md-3"><img src="{{url('public/backend')}}/2-tu-van.png" alt=""></div>
      <div class="col-md-3"><img src="{{url('public/backend')}}/3-tv.png" alt=""></div>
       <div class="col-md-3"><img src="{{url('public/backend')}}/4-tuv.png" alt=""></div>
  </div>
   <div class="row doitac2">
          <div class="owl-carousel owl-theme owl1">
            @foreach($datanoithat as $v)
           <div class="item item_nha">
            <div class="img">
            <a href="{{url("$v->slug")}}.html">
              <img class="hvr-bob" src="{{url('public/backend')}}/{{$v->icon}}" alt="">
            </a>
            </div>
            <div class="content">
              <h4> <a href="{{url("$v->slug")}}.html"> {{$v->name}}</a> </h4>
              <div class="text-justify itemtextdes">
                     {!! Str::words($v->des, 10, ' ...') !!}
                 </div>
              <div>
                <a href="{{url("$v->slug")}}.html"><button class="btn btn-default bgFull colorWhite btnclick">{{__('frontend.detail')}}</button></a>
              </div>
            </div>
           
          </div>
          @endforeach
     
          </div>
    </div>

    <div class="row itemrow row-so-1 mgTopBo30">
      <div class="col-md-8">
        <h3>Số 1 về thiết kế nội thất nhà ở, văn phòng, khách sạn</h3>
        <br>
        <div class="text-justify">
          <p>Nội Thất Trẻ là công ty thiết kế & thi công nội thất uy tín hàng đầu Việt Nam, với trên 15 năm thiết kế nội thất: Nhà ở, Văn phòng, Khách sạn.</p>
          <br>
          <p>
            Dù căn hộ của bạn có ở nơi đâu, chúng tôi cũng cử kiến trúc sư tới tư vấn, đo đạc, thiết kế căn hộ đẹp nhất cho bạn…
          </p>
</div>
 <p><a href="">Xem chi tiết </a></p>
      </div>
      <div class="col-md-4">
        <img src="{{url('public/backend')}}/wc.png" alt="" class="with_100">
      </div>

    </div>
    <!-- Công trình tiêu biểu-->
    <div class="row">
      <div class="relative itemheader"><img src="{{url('public/backend')}}/{{$header_footer->img2}}" alt=""> <span class="">Công trình tiêu biểu</span></div>
      <br>
      <div class="btn-group tabbed-content">
  <button type="button" class="btn btn-primary">Chung cư</button>
  <button type="button" class="btn btn-primary">Biệt thự</button>
  <button type="button" class="btn btn-primary">Khách sạn</button>
   <button type="button" class="btn btn-primary">Nhà liền kề</button>
  <button type="button" class="btn btn-primary">Nhà phố</button>
  <button type="button" class="btn btn-primary">Văn phòng</button>

   </div>
 </div>
 <!-- end-->
 <div class="row">
          <div class="owl-carousel owl-theme pro_aothudong">
            @foreach($congtrinh_tieubieu as $v)
           <div class="item item_nha itemNoBoder">
            <div class="img">
            <a href="{{url("$v->slug")}}.html">
              <img class="hvr-bob" src="{{url('public/backend')}}/{{$v->icon}}" alt="">
            </a>
            </div>
             <div class="content">
              <h4> <a href="{{url("$v->slug")}}.html"> {{$v->name}}</a> </h4>
              @if($v->des !='')
              <div class="text-justify itemtextdes">
                     {!! Str::words($v->des, 10, ' ...') !!}
                 </div>
              @endif
              <div>
                <a href="{{url("$v->slug")}}.html"><button class="btn btn-default bgFull colorWhite btnclick">{{__('frontend.detail')}}</button></a>
              </div>
            </div>
          </div>
          @endforeach
     
          </div>
    </div>
    <!-- end Công trình tiêu biểu-->
    <!-- start Thiết kế nội thất phòng-->
     <div class="row">
      <div class="relative itemheader"><img src="{{url('public/backend')}}/{{$header_footer->img2}}" alt=""> <span class="">Thiết kế nội thất phòng</span></div>
      <br>
          <div class="owl-carousel owl-theme pro_aothudong">
            @foreach($noithatphong as $v)
           <div class="item item_nha itemNoBoder">
            <div class="img">
            <a href="{{url("$v->slug")}}.html">
              <img class="hvr-bob" src="{{url('public/backend')}}/{{$v->icon}}" alt="">
            </a>
            </div>
             <div class="content">
              <h4> <a href="{{url("$v->slug")}}.html"> {{$v->name}}</a> </h4>
              @if($v->des !='')
              <div class="text-justify itemtextdes">
                     {!! Str::words($v->des, 10, ' ...') !!}
                 </div>
              @endif
              <div>
                <a href="{{url("$v->slug")}}.html"><button class="btn btn-default bgFull colorWhite btnclick">{{__('frontend.detail')}}</button></a>
              </div>
            </div>
           
          </div>
          @endforeach
     
          </div>
    </div>
    <!-- end Thiết kế nội thất phòng-->
    <!-- start Thi công nội thất-->
     <div class="row">
      <div class="relative itemheader"><img src="{{url('public/backend')}}/{{$header_footer->img2}}" alt=""> <span class="">Thi công nội thất</span></div>
      <br>
          <div class="owl-carousel owl-theme thicongnoithat">
            @foreach($thicongnoithat as $v)
           <div class="item item_nha itemNoBoder">
            <div class="img">
            <a href="{{url("$v->slug")}}.html">
              <img class="hvr-bob" src="{{url('public/backend')}}/{{$v->icon}}" alt="">
            </a>
            </div>
             <div class="content">
              <h4> <a href="{{url("$v->slug")}}.html"> {{$v->name}}</a> </h4>
              @if($v->des !='')
              <div class="text-justify itemtextdes">
                     {!! Str::words($v->des, 10, ' ...') !!}
                 </div>
              @endif
              <div>
                <a href="{{url("$v->slug")}}.html"><button class="btn btn-default bgFull colorWhite btnclick">{{__('frontend.detail')}}</button></a>
              </div>
            </div>
           
          </div>
          @endforeach
     
          </div>
    </div>
     <!-- end Thi công nội thất-->

      <!-- start Thi công nội thất-->
     <div class="row">
      <div class="relative itemheader"><img src="{{url('public/backend')}}/{{$header_footer->img2}}" alt=""> <span class="">Kiến thức nhà đẹp</span></div>
      <br>
          <div class="owl-carousel owl-theme kienthucnhadep">
            @foreach($kienthucnhadep as $v)
           <div class="item item_nha itemNoBoder">
            <div class="img">
            <a href="{{url("$v->slug")}}.html">
              <img class="hvr-bob" src="{{url('public/backend')}}/{{$v->icon}}" alt="">
            </a>
            </div>
             <div class="content">
              <h4> <a href="{{url("$v->slug")}}.html"> {{$v->name}}</a> </h4>
              @if($v->des !='')
              <div class="text-justify itemtextdes">
                     {!! Str::words($v->des, 10, ' ...') !!}
                 </div>
              @endif
              <div>
                <a href="{{url("$v->slug")}}.html"><button class="btn btn-default bgFull colorWhite btnclick">{{__('frontend.detail')}}</button></a>
              </div>
            </div>
           
          </div>
          @endforeach
     
          </div>
    </div>
     <!-- end Thi công nội thất-->

       <!-- start Thi công nội thất-->
     <div class="row bgFull2 padding20">
      
          <div class="owl-carousel owl-theme doitac1_carosel">
            @foreach($slider_doitac as $v)
           <div class="item itemNoBoder">
            <div class="img">
            <a href="">
              <img class="hvr-bob" src="{{url('public/backend')}}/{{$v->img}}" alt="">
            </a>
            </div>
          </div>
          @endforeach
     
          </div>
    </div>
     <!-- end Thi công nội thất-->

   
    

</div>


</div>

<script>
            $(document).ready(function() {
              var owl = $('.owl1');
              owl.owlCarousel({
                margin: 10,
                nav: true,
                loop: true,
                autoplay: true,
                autoplayTimeout: 5000,
                responsive: {
                  0: {
                    items: 1
                  },
                  600: {
                    items: 3
                  },
                  1000: {
                    items: 4
                  }
                }
              })
            });
           
            

             $(document).ready(function() {
              var owl = $('.doitac1_carosel');
              owl.owlCarousel({
                margin: 30,
                nav: true,
                loop: true,
                autoplay: true,
                autoplayTimeout: 5000,
                responsive: {
                  0: {
                    items: 3
                  },
                  600: {
                    items: 3
                  },
                  1000: {
                    items: 6
                  }
                }
              })
            });

              $(document).ready(function() {
              var owl = $('.thicongnoithat');
              owl.owlCarousel({
                margin: 30,
                nav: true,
                loop: true,
                autoplay: true,
                autoplayTimeout: 5000,
                responsive: {
                  0: {
                    items: 1
                  },
                  600: {
                    items: 3
                  },
                  1000: {
                    items: 4
                  }
                }
              })
            });

              $(document).ready(function() {
              var owl = $('.congtrinhdangthuchien2_carosel');
              owl.owlCarousel({
                margin: 30,
                nav: true,
                loop: true,
                autoplay: true,
                autoplayTimeout: 5000,
                responsive: {
                  0: {
                    items: 1
                  },
                  600: {
                    items: 4
                  },
                  1000: {
                    items: 4
                  }
                }
              })
            });


              $(document).ready(function() {
              var owl = $('.pro_aothudong');
              owl.owlCarousel({
                margin: 30,
                nav: true,
                loop: true,
                autoplay: false,
                autoplayTimeout: 5000,
                responsive: {
                  0: {
                    items: 1
                  },
                  600: {
                    items: 3
                  },
                  1000: {
                    items: 4
                  }
                }
              })
            });
             $(document).ready(function() {
              var owl = $('.kienthucnhadep');
              owl.owlCarousel({
                margin: 30,
                nav: true,
                loop: true,
                autoplay: true,
                autoplayTimeout: 5000,
                responsive: {
                  0: {
                    items: 1
                  },
                  600: {
                    items: 3
                  },
                  1000: {
                    items: 4
                  }
                }
              })
            });
              $(document).ready(function() {
              var owl = $('.kiemdinhgiamsat_carosel');
              owl.owlCarousel({
                margin: 30,
                nav: true,
                loop: true,
                autoplay: true,
                autoplayTimeout: 5000,
                responsive: {
                  0: {
                    items: 1
                  },
                  600: {
                    items: 1
                  },
                  1000: {
                    items: 1
                  }
                }
              })
            });

              $(document).ready(function() {
              var owl = $('.kiemdinhgiamsat2_carosel');
              owl.owlCarousel({
                margin: 30,
                nav: true,
                loop: true,
                autoplay: true,
                autoplayTimeout: 5000,
                responsive: {
                  0: {
                    items: 1
                  },
                  600: {
                    items: 1
                  },
                  1000: {
                    items: 1
                  }
                }
              })
            });

               $(document).ready(function() {
              var owl = $('.kiemdinhgiamsat3_carosel');
              owl.owlCarousel({
                margin: 30,
                nav: true,
                loop: true,
                autoplay: true,
                autoplayTimeout: 5000,
                responsive: {
                  0: {
                    items: 1
                  },
                  600: {
                    items: 1
                  },
                  1000: {
                    items: 1
                  }
                }
              })
            });


             $(document).ready(function() {
              var owl = $('.congtrinhcaotang_carosel');
              owl.owlCarousel({
                margin: 30,
                nav: true,
                loop: true,
                autoplay: true,
                autoplayTimeout: 5000,
                responsive: {
                  0: {
                    items: 1
                  },
                  600: {
                    items: 3
                  },
                  1000: {
                    items: 4
                  }
                }
              })
            });
             $(document).ready(function() {
              var owl = $('.congtrinhcaotang2_carosel');
              owl.owlCarousel({
                margin: 30,
                nav: true,
                loop: true,
                autoplay: true,
                autoplayTimeout: 5000,
                responsive: {
                  0: {
                    items: 1
                  },
                  600: {
                    items: 3
                  },
                  1000: {
                    items: 4
                  }
                }
              })
            });
              $(document).ready(function() {
              var owl = $('.duantieubieu_carosel');
              owl.owlCarousel({
                margin: 30,
                nav: true,
                loop: true,
                autoplay: true,
                autoplayTimeout: 4000,
                responsive: {
                  0: {
                    items: 1
                  },
                  600: {
                    items: 3
                  },
                  1000: {
                    items: 4
                  }
                }
              })
            });
              $(document).ready(function() {
              var owl = $('.duantieubieu2_carosel');
              owl.owlCarousel({
                margin: 30,
                nav: true,
                loop: true,
                autoplay: true,
                autoplayTimeout: 4000,
                responsive: {
                  0: {
                    items: 1
                  },
                  600: {
                    items: 3
                  },
                  1000: {
                    items: 4
                  }
                }
              })
            });
           
 </script>
@endsection
