@extends('dienminhquang.index')
@section('title')
    Thiết kế website-phần mềm-máy tính-trà đạo-sách
@endsection('title')
@section('meta')
    <meta name="keywords" itemprop="keywords" content="Công ty TNHH LATECH">
    <meta name="description" content="Thiết kế website-phần mềm-máy tính-trà đạo-sách">
    <base href="{{url('/')}}:443" target="_self">
    <link rel="icon" href="{{url('public/backend')}}/{{$imfomation->logo}}">
    <meta property="og:title" content="Thiết kế website-phần mềm-máy tính-trà đạo-sách toàn quốc">
    <meta property="og:type" content="website">
    {{--    <link rel="canonical" href="{{url('/')}}">--}}
    {{--    <meta name="robots" content="index,follow,noodp">--}}
    {{--    <meta name="robots" content="noarchive">--}}
    {{--    <meta property="og:site_name" content="Thiết kế website-phần mềm-máy tính-trà đạo-sách">--}}
    {{--    <meta property="og:type" content="Website">--}}
    {{--    <meta property="og:locale" content="vi_VN">--}}
    {{--    <meta property="fb:app_id" content="232505114857147">--}}
    {{--    <meta property="fb:pages" content="1128104117285467">--}}
    {{--    <meta property="og:title" itemprop="name" content="Thiết kế website-phần mềm-máy tính-trà đạo-sách">--}}
    {{--    <meta property="og:url" itemprop="url" content="{{url('/')}}">--}}
    {{--    <meta property="og:description" content="Thiết kế website-phần mềm-máy tính-trà đạo-sách">--}}
    {{--    <meta content="{{url('public/backend')}}/{{$imfomation->logo}}" property="og:image" itemprop="thumbnailUrl">--}}
    {{--    <meta http-equiv="Content-Language" content="vi">--}}
    {{--    <meta name="Language" content="vi">--}}
    {{--    <meta name="copyright" content="Copyright © 2013 by latech">--}}
    {{--    <meta name="abstract" content="latech.com Thiết kế website-phần mềm-máy tính-trà đạo-sách số 1 Việt Nam">--}}
    {{--    <meta name="distribution" content="Global">--}}
    {{--    <meta name="author" content="Latech">--}}
    {{--    <meta name="REVISIT-AFTER" content="1 DAYS">--}}
    {{--    <meta name="RATING" content="GENERAL">--}}
    {{--    <meta http-equiv="x-dns-prefetch-control" content="on">--}}
    {{--    <meta property="og:image" content="{{url('public/backend')}}/{{$imfomation->logo}}" />--}}
    {{--    <meta property="og:image:secure_url" content="{{url('public/backend')}}/{{$imfomation->logo}}" />--}}
    {{--    <meta property="og:site_name" content="{!! $imfomation->des1 !!}">--}}
    {{--    <meta name="google-site-verification" content="geoCp8xENUQxCfVRhVJAY0qOfGjoiCMBM-9iLSCW_hs">--}}
    {{--    <link rel="icon" href="{{url('public/backend')}}/{{$imfomation->img1}}">--}}
@endsection('meta')
@section('content')
    @include('dienminhquang.slider_box')

    <!-- End partner_home -->
    <div class="news_home">
        <div class="container">
            <div class="title">
                <p>TIN MỚI NHẤT</p>
            </div>
            <div class="owl-carousel owl-theme new-carousel owl-loaded owl-drag">
                @if($newpostFirst)
                    @foreach($newpostFirst as $v3)
                        <div class="item">
                            <div class="latest_item">
                                <a href="{{url("bai-viet/$v3->id/$v3->slug.html")}}">
                                    <img class="img-thumbnail" height="250px" src="{{url('public/backend')}}/{{$v3->icon}}"
                                         alt="{{$v3->name}}">
                                </a>
                                <div>
                                    <br>
                                    <div style="height: 50px;">
                                        <h3><a href="{{url("bai-viet/$v3->id/$v3->slug.html")}}">
                                            {{ Str::limit($v3->name, 75) }}
                                        </a></h3>
                                    </div>

                                    <div class="brief" style="height:100px;">
                                        {!! Str::limit($v3->des, 240) !!}
                                    </div>
                                    <a class="more"
                                       href="{{url("bai-viet/$v3->id/$v3->slug.html")}}">Chi
                                        tiết
                                        <svg class="svg-inline--fa fa-chevron-right fa-w-10" aria-hidden="true"
                                             data-prefix="fas" data-icon="chevron-right" role="img"
                                             xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512" data-fa-i2svg="">
                                            <path fill="currentColor"
                                                  d="M285.476 272.971L91.132 467.314c-9.373 9.373-24.569 9.373-33.941 0l-22.667-22.667c-9.357-9.357-9.375-24.522-.04-33.901L188.505 256 34.484 101.255c-9.335-9.379-9.317-24.544.04-33.901l22.667-22.667c9.373-9.373 24.569-9.373 33.941 0L285.475 239.03c9.373 9.372 9.373 24.568.001 33.941z"></path>
                                        </svg>
                                    </a>
                                    <div class="clearfix"></div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @endif
            </div>
        </div>
    </div>
    <!-- product shop -->
    <section id="productshop">
        <div class="container">
            @if($danhmuchienthiTaiHome)
                @foreach($danhmuchienthiTaiHome as $v)
                    <div class="row" style="padding-left:15px;">
                        <div class="cat-title titlenew">
                            <h3>
                                <a class="text-white" href="#">{{$v->name}}</a>
                            </h3>
                        </div>
                    </div>
                    <div class="row">
                            <?php
                            $listData = DB::table('products')->where('cate_id', $v->id)->orderBy('id', 'desc')->get()->toArray();
                            $data_chunk = array_chunk($listData, 2);
                            ?>
                        @if(isset($data_chunk))
                            <div class="col-12 col-md-12 col-products">
                                <div class="clearfix"></div>
                                <div class="tab-content">
                                    <div id="pronew1" class="tab-pane fade in active">
                                        <div class="producthome">
                                            <div class="owl-carousel owl-theme product-carousel owl-loaded owl-drag">
                                                @foreach($data_chunk as $v2)
                                                    <div class="item">
                                                        @if(isset($v2[0]))
                                                            <div class="col-product infobox">
                                                                <div class="img-box">
                                                                        <?php
                                                                        $cateId = $v2[0]->cate_id;
                                                                        $slug = $v2[0]->slug;
                                                                        $v2Id = $v2[0]->id;
                                                                        ?>
                                                                    <a href="{{url("san-pham/$cateId/$slug.html")}}">
                                                                        <img
                                                                            src="{{url('public/backend')}}/{{$v2[0]->icon}}"
                                                                            alt="{{$v2[0]->name}}">
                                                                    </a>
                                                                </div>
                                                                <div class="title-content">
                                                                    <a href="{{url("san-pham/$cateId/$slug.html")}}"
                                                                       class="title-box">{{$v2[0]->name}}</a>

                                                                    <div class="price-box">
                                                            <span>
                                                         Giá:@if($v2[0]->status_price==1) {{ number_format($v2[0]->price)}}@else liên hệ @endif
                                                           </span>
                                                                    </div>
                                                                </div>
                                                                <a href="{{url("san-pham/$cateId/$slug.html")}}"
                                                                   class="icon search_icon">
                                                                    <svg class="svg-inline--fa fa-search-plus fa-w-16"
                                                                         aria-hidden="true" data-prefix="fas"
                                                                         data-icon="search-plus" role="img"
                                                                         xmlns="http://www.w3.org/2000/svg"
                                                                         viewBox="0 0 512 512"
                                                                         data-fa-i2svg="">
                                                                        <path fill="currentColor"
                                                                              d="M304 192v32c0 6.6-5.4 12-12 12h-56v56c0 6.6-5.4 12-12 12h-32c-6.6 0-12-5.4-12-12v-56h-56c-6.6 0-12-5.4-12-12v-32c0-6.6 5.4-12 12-12h56v-56c0-6.6 5.4-12 12-12h32c6.6 0 12 5.4 12 12v56h56c6.6 0 12 5.4 12 12zm201 284.7L476.7 505c-9.4 9.4-24.6 9.4-33.9 0L343 405.3c-4.5-4.5-7-10.6-7-17V372c-35.3 27.6-79.7 44-128 44C93.1 416 0 322.9 0 208S93.1 0 208 0s208 93.1 208 208c0 48.3-16.4 92.7-44 128h16.3c6.4 0 12.5 2.5 17 7l99.7 99.7c9.3 9.4 9.3 24.6 0 34zM344 208c0-75.2-60.8-136-136-136S72 132.8 72 208s60.8 136 136 136 136-60.8 136-136z"></path>
                                                                    </svg>
                                                                </a>
                                                                <a href="{{url("cart/add/$v2Id")}}"
                                                                   class="icon add_icon">
                                                                    <svg class="svg-inline--fa fa-cart-plus fa-w-18"
                                                                         aria-hidden="true" data-prefix="fas"
                                                                         data-icon="cart-plus"
                                                                         role="img" xmlns="http://www.w3.org/2000/svg"
                                                                         viewBox="0 0 576 512" data-fa-i2svg="">
                                                                        <path fill="currentColor"
                                                                              d="M504.717 320H211.572l6.545 32h268.418c15.401 0 26.816 14.301 23.403 29.319l-5.517 24.276C523.112 414.668 536 433.828 536 456c0 31.202-25.519 56.444-56.824 55.994-29.823-.429-54.35-24.631-55.155-54.447-.44-16.287 6.085-31.049 16.803-41.548H231.176C241.553 426.165 248 440.326 248 456c0 31.813-26.528 57.431-58.67 55.938-28.54-1.325-51.751-24.385-53.251-52.917-1.158-22.034 10.436-41.455 28.051-51.586L93.883 64H24C10.745 64 0 53.255 0 40V24C0 10.745 10.745 0 24 0h102.529c11.401 0 21.228 8.021 23.513 19.19L159.208 64H551.99c15.401 0 26.816 14.301 23.403 29.319l-47.273 208C525.637 312.246 515.923 320 504.717 320zM408 168h-48v-40c0-8.837-7.163-16-16-16h-16c-8.837 0-16 7.163-16 16v40h-48c-8.837 0-16 7.163-16 16v16c0 8.837 7.163 16 16 16h48v40c0 8.837 7.163 16 16 16h16c8.837 0 16-7.163 16-16v-40h48c8.837 0 16-7.163 16-16v-16c0-8.837-7.163-16-16-16z"></path>
                                                                    </svg>
                                                                </a>
                                                            </div>
                                                        @endif
                                                        @if(isset($v2[1]))
                                                            <div class="col-product infobox">
                                                                <div class="img-box">
                                                                        <?php
                                                                        $cateId1 = $v2[1]->cate_id;
                                                                        $slug1 = $v2[1]->slug;
                                                                        $v1Id = $v2[1]->id;
                                                                        ?>
                                                                    <a href="{{url("san-pham/$cateId1/$slug1.html")}}">
                                                                        <img
                                                                            src="{{url('public/backend')}}/{{$v2[1]->icon}}"
                                                                            alt="{{$v2[1]->name}}">
                                                                    </a>
                                                                </div>
                                                                <div class="title-content">
                                                                    <a href="{{url("san-pham/$cateId1/$slug1.html")}}"
                                                                       class="title-box">{{$v2[1]->name}}</a>

                                                                    <div class="price-box">
                                                            <span>
                                                       Giá:@if($v2[1]->status_price==1) {{ number_format($v2[1]->price)}}@else liên hệ @endif
                                                           </span>
                                                                    </div>
                                                                </div>
                                                                <a href="{{url("san-pham/$cateId1/$slug1.html")}}"
                                                                   class="icon search_icon">
                                                                    <svg class="svg-inline--fa fa-search-plus fa-w-16"
                                                                         aria-hidden="true" data-prefix="fas"
                                                                         data-icon="search-plus" role="img"
                                                                         xmlns="http://www.w3.org/2000/svg"
                                                                         viewBox="0 0 512 512"
                                                                         data-fa-i2svg="">
                                                                        <path fill="currentColor"
                                                                              d="M304 192v32c0 6.6-5.4 12-12 12h-56v56c0 6.6-5.4 12-12 12h-32c-6.6 0-12-5.4-12-12v-56h-56c-6.6 0-12-5.4-12-12v-32c0-6.6 5.4-12 12-12h56v-56c0-6.6 5.4-12 12-12h32c6.6 0 12 5.4 12 12v56h56c6.6 0 12 5.4 12 12zm201 284.7L476.7 505c-9.4 9.4-24.6 9.4-33.9 0L343 405.3c-4.5-4.5-7-10.6-7-17V372c-35.3 27.6-79.7 44-128 44C93.1 416 0 322.9 0 208S93.1 0 208 0s208 93.1 208 208c0 48.3-16.4 92.7-44 128h16.3c6.4 0 12.5 2.5 17 7l99.7 99.7c9.3 9.4 9.3 24.6 0 34zM344 208c0-75.2-60.8-136-136-136S72 132.8 72 208s60.8 136 136 136 136-60.8 136-136z"></path>
                                                                    </svg>
                                                                </a>
                                                                <a href="{{url("cart/add/$v1Id")}}"
                                                                   class="icon add_icon">
                                                                    <svg class="svg-inline--fa fa-cart-plus fa-w-18"
                                                                         aria-hidden="true" data-prefix="fas"
                                                                         data-icon="cart-plus"
                                                                         role="img" xmlns="http://www.w3.org/2000/svg"
                                                                         viewBox="0 0 576 512" data-fa-i2svg="">
                                                                        <path fill="currentColor"
                                                                              d="M504.717 320H211.572l6.545 32h268.418c15.401 0 26.816 14.301 23.403 29.319l-5.517 24.276C523.112 414.668 536 433.828 536 456c0 31.202-25.519 56.444-56.824 55.994-29.823-.429-54.35-24.631-55.155-54.447-.44-16.287 6.085-31.049 16.803-41.548H231.176C241.553 426.165 248 440.326 248 456c0 31.813-26.528 57.431-58.67 55.938-28.54-1.325-51.751-24.385-53.251-52.917-1.158-22.034 10.436-41.455 28.051-51.586L93.883 64H24C10.745 64 0 53.255 0 40V24C0 10.745 10.745 0 24 0h102.529c11.401 0 21.228 8.021 23.513 19.19L159.208 64H551.99c15.401 0 26.816 14.301 23.403 29.319l-47.273 208C525.637 312.246 515.923 320 504.717 320zM408 168h-48v-40c0-8.837-7.163-16-16-16h-16c-8.837 0-16 7.163-16 16v40h-48c-8.837 0-16 7.163-16 16v16c0 8.837 7.163 16 16 16h48v40c0 8.837 7.163 16 16 16h16c8.837 0 16-7.163 16-16v-40h48c8.837 0 16-7.163 16-16v-16c0-8.837-7.163-16-16-16z"></path>
                                                                    </svg>
                                                                </a>
                                                            </div>
                                                        @endif
                                                    </div>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif
                    </div>
                @endforeach
            @endif
            <br>
        </div>
    </section>
    <!-- news_home -->
    <div class="news_home">
        <div class="container">
            <div class="title">
                <p>{{$newpost->name}}</p>
            </div>
            <div class="owl-carousel owl-theme new-carousel owl-loaded owl-drag">
                @if($newpost->posts)
                    @foreach($newpost->posts as $v3)
                        <div class="item">
                            <div class="latest_item">

                                <a href="{{url("bai-viet/$v3->id/$v3->slug.html")}}">
                                    <img height="250px" src="{{url('public/backend')}}/{{$v3->icon}}"
                                         alt="{{$v3->name}}">
                                </a>
                                <div>
                                    <br>
                                    <h3><a href="{{url("bai-viet/$v3->id/$v3->slug.html")}}">{{$v3->name}}</a></h3>
                                    <div class="brief">
                                        {!! $v3->des !!}
                                    </div>
                                    <a class="more"
                                       href="{{url("bai-viet/$v3->id/$v3->slug.html")}}">Chi
                                        tiết
                                        <svg class="svg-inline--fa fa-chevron-right fa-w-10" aria-hidden="true"
                                             data-prefix="fas" data-icon="chevron-right" role="img"
                                             xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512" data-fa-i2svg="">
                                            <path fill="currentColor"
                                                  d="M285.476 272.971L91.132 467.314c-9.373 9.373-24.569 9.373-33.941 0l-22.667-22.667c-9.357-9.357-9.375-24.522-.04-33.901L188.505 256 34.484 101.255c-9.335-9.379-9.317-24.544.04-33.901l22.667-22.667c9.373-9.373 24.569-9.373 33.941 0L285.475 239.03c9.373 9.372 9.373 24.568.001 33.941z"></path>
                                        </svg>
                                    </a>
                                    <div class="clearfix"></div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @endif
            </div>
        </div>
    </div>
    <style>
        .lenovoCarosel .owl-nav {
            display: none !important;
        }
    </style>
@endsection('content')
@section('script')
    <script>
        $(document).ready(function () {
            $('.slider-carousel').owlCarousel({
                loop: true,
                autoplay: false,
                margin: 0,
                responsiveClass: true,
                responsive: {
                    0: {items: 1, nav: false, dots: true},
                    600: {items: 1, nav: false, dots: true},
                    1000: {items: 1, nav: false, dots: true}
                }
            });
            $('.partner-carousel').owlCarousel({
                loop: true,
                autoplay: true,
                margin: 0,
                nav: true,
                navText: [
                    "<i class='fa fa-chevron-left'></i>",
                    "<i class='fa fa-chevron-right'></i>"
                ],
                responsiveClass: true,
                responsive: {
                    0: {items: 2, nav: false, dots: true},
                    600: {items: 3, nav: false, dots: true},
                    1000: {items: 6, nav: true, dots: true}
                }
            });

            $('.product-carousel').owlCarousel({
                loop: true,
                autoplay: false,
                margin: 0,
                navText: [
                    "<i class='fa fa-chevron-left'></i>",
                    "<i class='fa fa-chevron-right'></i>"
                ],
                responsiveClass: true,
                responsive: {
                    0: {items: 2, nav: true, dots: false},
                    600: {items: 2, nav: true, dots: false},
                    1000: {items: 5, nav: true, dots: false}
                }
            });

            $('.product_d-carousel').owlCarousel({
                loop: true,
                autoplay: false,
                margin: 20,
                responsiveClass: true,
                responsive: {
                    0: {items: 1, nav: false, dots: false},
                    600: {items: 1, nav: false, dots: false},
                    1000: {items: 1, nav: false, dots: false}
                }
            });

            $('.new-carousel').owlCarousel({
                loop: true,
                autoplay: false,
                margin: 10,
                responsiveClass: true,
                responsive: {
                    0: {items: 1, nav: true, dots: true},
                    600: {items: 4, nav: true, dots: true},
                    1000: {items: 4, nav: true, dots: true}
                }
            });

            $('.project-carousel').owlCarousel({
                loop: true,
                autoplay: false,
                margin: 15,
                responsiveClass: true,
                responsive: {
                    0: {items: 1, nav: true, dots: true},
                    600: {items: 2, nav: true, dots: true},
                    1000: {items: 3, nav: true, dots: true}
                }
            });

        })
    </script>
@endsection
