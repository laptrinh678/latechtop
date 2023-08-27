@extends('fontend.master.index')
@section('title')
 fasamy.com
@endsection('title')
@section('meta')
   <meta name="keywords" content="Thi công nội thất, xây dựng nhà ở dân dụng,xây dựng công trình cơ quan, thiết kế nội thất chung cư"/>
   <meta name="description" content="Nhamoipro.com - Thi công nội thất, xây dựng nhà ở dân dụng,xây dựng công trình cơ quan, thiết kế nội thất chung cư"/>
   <meta property="og:title" content="Nhamoipro.com - Thi công nội thất, xây dựng nhà ở dân dụng,xây dựng công trình cơ quan, thiết kế nội thất chung cư"/>
   <meta property="og:description" content="Nhamoipro.com - Thi công nội thất, xây dựng nhà ở dân dụng,xây dựng công trình cơ quan, thiết kế nội thất chung cư"/>
   <meta property="og:url" content="http://nhamoipro.com/"/>
   <meta name="language" content="vietnamese"/>
   <meta name="copyright" content="Copyright © 2018 by nhamoipro.com"/>
   <meta name="abstract" content="Nhamoipro.com - Thi công nội thất, xây dựng nhà ở dân dụng,xây dựng công trình cơ quan, thiết kế nội thất chung cư"/>
   <meta name="author" itemprop="author" content="nhamoipro.com"/>
   <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
   <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
   <meta http-equiv="content-language" itemprop="inLanguage" content="vi"/>
   <meta name="robots" content="index, follow,noodp"/>
   <meta name="viewport" content="initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, width=device-width, user-scalable=no, minimal-ui"/>
   <meta property="og:image:url" content="/"/>
   <meta property="og:image:width" content="476"/>
   <meta property="og:image:height" content="249"/>
   <meta property="og:type" content="website"/>
   <meta property="og:locale" content="vi_VN"/>
   <link href="//fonts.googleapis.com/css?family=Roboto:400,300,300italic,400italic,500,500italic,700,700italic&amp;subset=latin,vietnamese" rel="stylesheet" type="text/css"/>
   <meta name="revisit-after" content="1 days"/>
   <meta name="page-topic" content="xây dựng nhà ở dân dụng"/>
   <meta name="resource-type" content="Document"/>
   <meta name="distribution" content="Global"/>
   <meta name="viewport" content="width=device-width, initial-scale=1"> 
@endsection('meta')
@section('header_style')
<script src="{{url('public/fontend')}}/bootstrap/bootstrap3.4.0.min.js"></script>
@endsection('header_style')

@section('content')
@include('fontend.master.slider')
<!-- CSS ================================================== -->
<div class="container-fluid">
<div class="container nhapho wow animated zoomIn home">
   
    <div class="row doitac2">
          <div class="product_title">
      <h3><span>Sản phẩm nỗi bật</span></h3>
    </div>
        <!--nhapho1 -->
          <div class="owl-carousel owl-theme pro_aothudong">
            @foreach($pro_aothudong as $val)
           <div class="item item_nha">
            <div class="img">
                 <a href="{{url("$aothudong->cat_slug/$val->pro_slug.html")}}"><img class="hvr-bob" src="{{url('public/backend/product')}}/{{$val->pro_img}}" alt=""></a>
            </div>
            <div class="content">
              <h4> <a href="{{url("$aothudong->cat_slug/$val->pro_slug.html")}}"> {{$val->pro_name}}</a> </h4>
            </div>
            <div class="click">
              <span class="start">
                {{number_format($val->pro_price)}} VNĐ
              </span>
              <span class="chitet">
                <a class="text_chitiet" href="{{url("$aothudong->cat_slug/$val->pro_slug.html")}}">Chi tiết</a>
              </span>
            </div>
            <div class="shopingcart">
              <a href="{{url("cart/add/$val->id")}}">Thêm vào giỏ hàng</a>
            </div>
          </div>
          @endforeach

        

          </div>
            <!--nhapho1_carosel -->

              <!--nhapho2_carosel -->
          <div class="owl-carousel owl-theme nhapho2_carosel">

            @foreach($pro_aothudongAsc as $val)
           <div class="item item_nha">
            <div class="img">
                 <a href="{{url("$aothudong->cat_slug/$val->pro_slug.html")}}"><img class="hvr-bob" src="{{url('public/backend/product')}}/{{$val->pro_img}}" alt=""></a>
            </div>
            <div class="content">
              <h4> <a href="{{url("$aothudong->cat_slug/$val->pro_slug.html")}}"> {{$val->pro_name}}</a> </h4>
            </div>
            <div class="click">
              <span class="start">
                {{number_format($val->pro_price)}} VNĐ
              </span>
              <span class="chitet">
                <a class="text_chitiet" href="{{url("$aothudong->cat_slug/$val->pro_slug.html")}}">Chi tiết</a>
              </span>
            </div>
             <div class="shopingcart">
              <a href="{{url("cart/add/$val->id")}}">Thêm vào giỏ hàng</a>
            </div>
          </div>
          @endforeach
          </div>
            <!--nhapho2_carosel -->
    </div>
</div>
<!-- end nha pho-->
<!-- cong trinh dang thuc hien-->
<div class="container congtrinhdangthuchien wow animated zoomIn">
    
    <div class="row doitac2">
       <div class="product_title">
      <h3><span>Sản phẩm mới</span></h3>
    </div>
        <!--congtrinhdangthuchien1_carosel -->
          <div class="owl-carousel owl-theme congtrinhdangthuchien1_carosel">
          @foreach($pro_spmoi as $val)
           <div class="item item_nha">
            <div class="img">
                 <a href="{{url("chi-tiet-san-pham/$val->pro_slug.html")}}"><img class="hvr-bob" src="{{url('public/backend/product')}}/{{$val->pro_img}}" alt=""></a>
            </div>
            <div class="content">
              <h4> <a href="{{url("chi-tiet-san-pham/$val->pro_slug.html")}}"> {{$val->pro_name}}</a> </h4>
            </div>
            <div class="click">
              <span class="start">
                {{number_format($val->pro_price)}} VNĐ
              </span>
              <span class="chitet">
                <a class="text_chitiet" href="{{url("chi-tiet-san-pham/$val->pro_slug.html")}}">Chi tiết</a>
              </span>
            </div>
             <div class="shopingcart">
              <a href="{{url("cart/add/$val->id")}}">Thêm vào giỏ hàng</a>
            </div>
          </div>
          @endforeach
          </div>
            <!--endcongtrinhdangthuchien_carosel -->
    </div>
  </div>
<!-- end cong trinh dang thuc hien-->

<!-- kiem dinh, giam sat, thiet ke-->
<div class="container kiemdinhgiamsat wow animated zoomIn">
    <div class="row doitac2 bannerhome">
        <!--kiemdinhgiamsat_carosel -->
          <div class="owl-carousel owl-theme kiemdinhgiamsat_carosel">
            <div class="item">
              <img class="hvr-wobble-skew banner_khuyenmai" src="{{url('public/backend/block')}}/{{$banner_khuyenmai->img}}" alt="">
            </div>
          </div>
    </div>
    <div class="row">
       <div class="col-md-7 col-xs-12 col-sm-12 bannerhome">
                  <div class="owl-carousel owl-theme kiemdinhgiamsat2_carosel">
                   <img class="hvr-wobble-skew banner_khuyenmai" src="{{url('public/backend/block')}}/{{$banner_khuyenmai2->img}}" alt="">
                  </div>
          </div>
          <div class="col-md-5 col-xs-12 col-sm-12 bannerhome">
                  <div class="owl-carousel owl-theme kiemdinhgiamsat3_carosel">
                   <img class="hvr-wobble-skew banner_khuyenmai" src="{{url('public/backend/block')}}/{{$banner_khuyenmai3->img}}" alt="">
                  </div>
          </div>
    </div>
</div>
<!-- end kiem dinh, giam sat, thiet ke-->
<!--  CÔNG TRÌNH CAO TẦNG, NHÀ MÁY-->
<div class="container nhacaotang wow animated zoomIn">
    <div class="row">
        <div class="category_full">
            <div class="tab">
                <span class="dcm">
                  <a href="{{url("danh-muc/$quan->cat_slug.html")}}">{{$quan->cat_name}}</a>
                   <i class="fa fa-caret-right" aria-hidden="true"></i>
                   </span>
                <p class="arrow_cate"></p> 
            </div>
           <span class="s_right"><a href=""><i class="fa fa-list-alt" aria-hidden="true"></i> Xem tất cả</a></span>
           
        </div>
    </div>
    <div class="row doitac2">
        <!--congtrinhcaotang_carosel -->
          <div class="owl-carousel owl-theme congtrinhcaotang_carosel">
               @foreach($quanpro as $val)
               <div class="item item_nha">
                <div class="img">
                     <a href="{{url("$quan->cat_slug/$val->pro_slug.html")}}"><img class="hvr-bob" src="{{url('public/backend/product')}}/{{$val->pro_img}}" alt=""></a>
                </div>
                <div class="content">
                  <h4> <a href="{{url("$quan->cat_slug/$val->pro_slug.html")}}"> {{$val->pro_name}}</a> </h4>
                </div>
                <div class="click">
                  <span class="start">
                    {{number_format($val->pro_price)}} VNĐ
                  </span>
                  <span class="chitet">
                    <a class="text_chitiet" href="{{url("$quan->cat_slug/$val->pro_slug.html")}}">Chi tiết</a>
                  </span>
                </div>
                 <div class="shopingcart">
              <a href="{{url("cart/add/$val->id")}}">Thêm vào giỏ hàng</a>
            </div>
              </div>
              @endforeach
          </div>
            <!--congtrinhcaotang_carosel -->

              <!--congtrinhcaotang2_carosel -->
          <div class="owl-carousel owl-theme congtrinhcaotang2_carosel">

           @foreach($quanpro2 as $val)
               <div class="item item_nha">
                <div class="img">
                     <a href="{{url("$quan->cat_slug/$val->pro_slug.html")}}"><img class="hvr-bob" src="{{url('public/backend/product')}}/{{$val->pro_img}}" alt=""></a>
                </div>
                <div class="content">
                  <h4> <a href="{{url("$quan->cat_slug/$val->pro_slug.html")}}"> {{$val->pro_name}}</a> </h4>
                </div>
                <div class="click">
                  <span class="start">
                    {{number_format($val->pro_price)}} VNĐ
                  </span>
                  <span class="chitet">
                    <a class="text_chitiet" href="{{url("$quan->cat_slug/$val->pro_slug.html")}}">Chi tiết</a>
                  </span>
                </div>
                 <div class="shopingcart">
              <a href="{{url("cart/add/$val->id")}}">Thêm vào giỏ hàng</a>
            </div>
              </div>
              @endforeach

           

           

          


          </div>
            <!--congtrinhcaotang2_carosel -->
    </div>
</div>
<!-- end CÔNG TRÌNH CAO TẦNG, NHÀ MÁY-->

<!-- DỰ ÁN THIẾT KẾ TIÊU BIỂU-->
<div class="container duantieubieu wow animated zoomIn">
    <div class="row">
       <div class="category_full">
            <div class="tab">
                <span class="dcm">
                  <a href="{{url("danh-muc/$bodonucate->cat_slug.html")}}">{{$bodonucate->cat_name}}</a>
                   <i class="fa fa-caret-right" aria-hidden="true"></i>
                   </span>
                <p class="arrow_cate"></p> 
            </div>
           <span class="s_right"><a href="{{url("danh-muc/$bodonucate->cat_slug.html")}}"><i class="fa fa-list-alt" aria-hidden="true"></i> Xem tất cả</a></span>
           
        </div>
    </div>
    <div class="row doitac2">
        <!--duantieubieu_carosel -->
          <div class="owl-carousel owl-theme duantieubieu_carosel">
               @foreach($bodonu as $val)
               <div class="item item_nha">
                <div class="img">
                     <a href="{{url("$bodonucate->cat_slug/$val->pro_slug.html")}}"><img class="hvr-bob" src="{{url('public/backend/product')}}/{{$val->pro_img}}" alt=""></a>
                </div>
                <div class="content">
                  <h4> <a href="{{url("$bodonucate->cat_slug/$val->pro_slug.html")}}"> {{$val->pro_name}}</a> </h4>
                </div>
                <div class="click">
                  <span class="start">
                    {{number_format($val->pro_price)}} VNĐ
                  </span>
                  <span class="chitet">
                    <a class="text_chitiet" href="{{url("$bodonucate->cat_slug/$val->pro_slug.html")}}">Chi tiết</a>
                  </span>
                </div>
                 <div class="shopingcart">
              <a href="{{url("cart/add/$val->id")}}">Thêm vào giỏ hàng</a>
            </div>
              </div>
              @endforeach
          </div>
            <!--end duantieubieu1_carosel -->

              <!--duantieubieu2_carosel -->
          <div class="owl-carousel owl-theme duantieubieu2_carosel">

           @foreach($bodonu2 as $val)
               <div class="item item_nha">
                <div class="img">
                     <a href="{{url("$bodonucate->cat_slug/$val->pro_slug.html")}}"><img class="hvr-bob" src="{{url('public/backend/product')}}/{{$val->pro_img}}" alt=""></a>
                </div>
                <div class="content">
                  <h4> <a href="{{url("$bodonucate->cat_slug/$val->pro_slug.html")}}"> {{$val->pro_name}}</a> </h4>
                </div>
                <div class="click">
                  <span class="start">
                    {{number_format($val->pro_price)}} VNĐ
                  </span>
                  <span class="chitet">
                    <a class="text_chitiet" href="{{url("$bodonucate->cat_slug/$val->pro_slug.html")}}">Chi tiết</a>
                  </span>
                </div>
                 <div class="shopingcart">
              <a href="{{url("cart/add/$val->id")}}">Thêm vào giỏ hàng</a>
            </div>
              </div>
              @endforeach
          </div>
            <!--duantieubieu2_carosel -->
    </div>
</div>
<!-- end DỰ ÁN THIẾT KẾ TIÊU BIỂU-->

<!-- GIẢI PHÁP XÂY NHÀ-->
<div class="container giaiphapxaynha wow animated zoomIn">
    <div class="row">
      <div class="col-md-6 col-xs-12 col-sm-12">
          <div class="category_full">
            <div class="tab">
                <span class="dcm">
                  TIN TỨC HOT
                   <i class="fa fa-caret-right" aria-hidden="true"></i>
                   </span>
                <p class="arrow_cate"></p> 
            </div>
            
        </div>
      @foreach($post_tintucDesc as $val)
        <div class="mottram">
          <div class="haimoi">
            <a href="{{url("chi-tiet-tin/$val->post_slug.html")}}"><img class="hvr-bob" src="{{url('public/backend/post')}}/{{$val->post_img}}" alt=""></a>
          </div>
          <div class="tammoi">
            <p class="title"><a href="{{url("chi-tiet-tin/$val->post_slug.html")}}">{{$val->post_name}}</a></p>
            <div class="content">{!!str_limit($val->post_gtngan,200)!!}</div>
          </div>
        </div>
      @endforeach


      </div>
       <div class="col-md-6 col-xs-12 col-sm-12">
       <div class="category_full">
            <div class="tab">
                <span class="dcm">
                  KINH  NGHIỆM CHỌN QUẦN ÁO
                   <i class="fa fa-caret-right" aria-hidden="true"></i>
                   </span>
                <p class="arrow_cate"></p> 
            </div>
        </div>
             @foreach($post_tintucAsc as $val)
        <div class="mottram">
          <div class="haimoi">
            <a href="{{url("chi-tiet-tin/$val->post_slug.html")}}"><img class="hvr-bob" src="{{url('public/backend/post')}}/{{$val->post_img}}" alt=""></a>
          </div>
          <div class="tammoi">
            <p class="title"><a href="{{url("chi-tiet-tin/$val->post_slug.html")}}">{{$val->post_name}}</a></p>
            <div class="content">{!!str_limit($val->post_gtngan,200)!!}</div>
          </div>
        </div>
      @endforeach

            
        </div>

      </div>
  </div>
</div>

<script>
            $(document).ready(function() {
              var owl = $('.slider_carosel');
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
                    items: 1
                  },
                  1000: {
                    items: 1
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
              var owl = $('.congtrinhdangthuchien1_carosel');
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
              var owl = $('.nhapho2_carosel');
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
