@extends('dienminhquang.index')
@section('title')
    Thiết kế website-phần mềm-máy tính-trà đạo-sách
@endsection('title')
@section('meta')
    <meta name="keywords" itemprop="keywords" content="Công ty TNHH LATECH">
    <meta name="description" content="Thiết kế website-phần mềm-máy tính-trà đạo-sách">
    <base href="{{ url('/') }}:443" target="_self">
    <link rel="icon" href="{{ url('public/backend') }}/{{ $imfomation->logo }}">
    <meta property="og:title" content="Thiết kế website-phần mềm-máy tính-trà đạo-sách toàn quốc">
    <meta property="og:type" content="website">
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
                @if ($newpostFirst)
                    @foreach ($newpostFirst as $v3)
                        <div class="item">
                            <div class="latest_item">
                                <a href="{{ url("bai-viet/$v3->id/$v3->slug.html") }}">
                                    <img class="img-thumbnail" height="200px"
                                        src="{{ url('public/backend') }}/@if($v3->cate->img_default==1){{ $v3->cate->icon }} @else {{ $v3->icon }} @endif" alt="{{ $v3->name }}">
                                </a>
                                <div>
                                    <br>
                                    <div style="height: 50px;">
                                        <h3><a href="{{ url("bai-viet/$v3->id/$v3->slug.html") }}">
                                                {{ Str::limit($v3->name, 75) }}
                                            </a></h3>
                                    </div>

                                    <div class="brief" style="height:100px;">
                                        {!! Str::limit($v3->des, 240) !!}
                                    </div>
                                    <a class="more" href="{{ url("bai-viet/$v3->id/$v3->slug.html") }}">Chi
                                        tiết
                                        <svg class="svg-inline--fa fa-chevron-right fa-w-10" aria-hidden="true"
                                            data-prefix="fas" data-icon="chevron-right" role="img"
                                            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512" data-fa-i2svg="">
                                            <path fill="currentColor"
                                                d="M285.476 272.971L91.132 467.314c-9.373 9.373-24.569 9.373-33.941 0l-22.667-22.667c-9.357-9.357-9.375-24.522-.04-33.901L188.505 256 34.484 101.255c-9.335-9.379-9.317-24.544.04-33.901l22.667-22.667c9.373-9.373 24.569-9.373 33.941 0L285.475 239.03c9.373 9.372 9.373 24.568.001 33.941z">
                                            </path>
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
            <div class="row">
                <div class="col-md-8 col-sm-12">
                    <label class="cat-title titlenew w-100" for="">
                        <h3>
                            <a class="text-white" href="#">TIN NỔI BẬT</a>
                        </h3>
                    </label>
                    @if ($newOutstanding)
                        @foreach ($newOutstanding as $postItem)
                            <div class="d-flex flex-row bd-highlight mb-3 bg-white">
                                <div class="p-2 bd-highlight w-25"><a
                                        href="{{ url("bai-viet/$postItem->id/$postItem->slug.html") }}"><img class="w-100"
                                            height="100px" src="{{ url('public/backend') }}/@if($postItem->cate->img_default==1){{ $postItem->cate->icon }} @else {{ $postItem->icon }} @endif"
                                            alt="{{ $postItem->name }}"></a></div>
                                <div class="p-2 bd-highlight w-75">
                                    <h3><a class="text-body" style="color:black !important;"
                                            href="{{ url("bai-viet/$postItem->id/$postItem->slug.html") }}">{{ $postItem->name }}</a>
                                    </h3>
                                    <p class="text-body"> {!! Str::limit($postItem->des, 240) !!}</p>
                                </div>
                            </div>
                        @endforeach
                    @endif
                    <label class="w-100 cat-title titlenew" for="">
                        <h3>
                            <span class="text-white provinceButton" style="cursor: pointer;">HIỂN THỊ THÔNG BÁO THEO
                                TỈNH/THÀNH <i class="fa fa-angle-double-down" aria-hidden="true"></i></span>
                        </h3>
                    </label>
                    <div class="w-100 province p-2" style="display: none;">
                        @if ($province)
                            @foreach ($province as $province)
                                <button class="btn btn-info mb-2 ajaxgetPostProvince" c-data="{{ $province->province_id }}"
                                    style="font-size: 13px;">{{ $province->name }}</button>
                            @endforeach
                        @endif
                    </div>
                    <div class="w-100" id="listpostWhereProvince">
                        @if ($provincePost)
                            @foreach ($provincePost as $postItem)
                                <div class="d-flex flex-row bd-highlight mb-3 bg-white">
                                    <div class="p-2 bd-highlight w-25"><a
                                            href="{{ url("bai-viet/$postItem->id/$postItem->slug.html") }}"><img
                                                class="w-100" height="100px"
                                                src="{{ url('public/backend') }}/@if($postItem->cate->img_default==1){{ $postItem->cate->icon }} @else {{ $postItem->icon }} @endif"
                                                alt=""></a></div>
                                    <div class="p-2 bd-highlight w-75">
                                        <h3><a class="text-body" style="color:black !important;"
                                                href="{{ url("bai-viet/$postItem->id/$postItem->slug.html") }}">{{ $postItem->name }}</a>
                                        </h3>
                                        <p class="text-body"> {!! Str::limit($postItem->des, 240) !!}</p>
                                    </div>
                                </div>
                            @endforeach
                        @endif
                    </div>
                </div>

                <div class="col-md-4 col-sm-12">
                    @if ($blogHomePage)
                        @foreach ($blogHomePage as $itemblog)
                            <label class="w-100 cat-title titlenew" for="">
                                <h3>
                                    <a class="text-white" href="#">{{ $itemblog->name }}</a>
                                </h3>
                            </label>
                            @if ($itemblog->product)
                                @foreach ($itemblog->product as $product)
                                    <div class="d-flex flex-row bd-highlight mb-3 bg-white">
                                        <div class="p-2 bd-highlight w-25"><a
                                                href="{{ url("san-pham/$product->cate_id/$product->slug.html") }}"><img
                                                    class="w-100" src="{{ url('public/backend') }}/{{ $product->icon }}"
                                                    alt="{{ $product->name }}"></a></div>
                                        <div class="p-2 bd-highlight w-75">
                                            <h5><a class="more" style="color:black;" href="{{ url("san-pham/$product->cate_id/$product->slug.html") }}">{{ $product->name }}</a></h5>
                                        </div>
                                    </div>
                                @endforeach
                            @endif
                        @endforeach
                    @endif
                </div>
            </div>

            <br>
        </div>
    </section>
    <!-- news_home -->
    <div class="news_home">
        <div class="container">
            <div class="title">
                <p>{{ $newpost->name }}</p>
            </div>
            <div class="owl-carousel owl-theme new-carousel owl-loaded owl-drag">
                @if ($newpost->posts)
                    @foreach ($newpost->posts as $v3)
                        <div class="item">
                            <div class="latest_item">

                                <a href="{{ url("bai-viet/$v3->id/$v3->slug.html") }}">
                                    <img height="200px" src="{{ url('public/backend') }}/{{ $v3->icon }}"
                                        alt="{{ $v3->name }}">
                                </a>
                                <div>
                                    <br>
                                    <h3><a href="{{ url("bai-viet/$v3->id/$v3->slug.html") }}">
                                            {{ Str::limit($v3->name, 75) }}</a>
                                    </h3>
                                    <div class="brief">
                                        {!! Str::limit($v3->des, 140) !!}
                                    </div>
                                    <a class="more" href="{{ url("bai-viet/$v3->id/$v3->slug.html") }}">Chi
                                        tiết
                                        <svg class="svg-inline--fa fa-chevron-right fa-w-10" aria-hidden="true"
                                            data-prefix="fas" data-icon="chevron-right" role="img"
                                            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512" data-fa-i2svg="">
                                            <path fill="currentColor"
                                                d="M285.476 272.971L91.132 467.314c-9.373 9.373-24.569 9.373-33.941 0l-22.667-22.667c-9.357-9.357-9.375-24.522-.04-33.901L188.505 256 34.484 101.255c-9.335-9.379-9.317-24.544.04-33.901l22.667-22.667c9.373-9.373 24.569-9.373 33.941 0L285.475 239.03c9.373 9.372 9.373 24.568.001 33.941z">
                                            </path>
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
    <input type="hidden" value="{{ url('') }}" id="url">
    <style>
        .lenovoCarosel .owl-nav {
            display: none !important;
        }
    </style>
@endsection('content')
@section('script')
    <script>
        $(document).ready(function() {
            $('.provinceButton').click(function() {
                $('.province').toggle();
            });
            $('.ajaxgetPostProvince').click(function() {
                let idProvince = $(this).attr('c-data');
                let url = $('#url').val();
                $.get(url + '/getPostWhereProvince/' + idProvince, function(data) {
                    console.log(data);
                    $('#listpostWhereProvince').html(data);
                })
            });

            $('.slider-carousel').owlCarousel({
                loop: true,
                autoplay: false,
                margin: 0,
                responsiveClass: true,
                responsive: {
                    0: {
                        items: 1,
                        nav: false,
                        dots: true
                    },
                    600: {
                        items: 1,
                        nav: false,
                        dots: true
                    },
                    1000: {
                        items: 1,
                        nav: false,
                        dots: true
                    }
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
                    0: {
                        items: 2,
                        nav: false,
                        dots: true
                    },
                    600: {
                        items: 3,
                        nav: false,
                        dots: true
                    },
                    1000: {
                        items: 6,
                        nav: true,
                        dots: true
                    }
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
                    0: {
                        items: 2,
                        nav: true,
                        dots: false
                    },
                    600: {
                        items: 2,
                        nav: true,
                        dots: false
                    },
                    1000: {
                        items: 5,
                        nav: true,
                        dots: false
                    }
                }
            });

            $('.product_d-carousel').owlCarousel({
                loop: true,
                autoplay: false,
                margin: 20,
                responsiveClass: true,
                responsive: {
                    0: {
                        items: 1,
                        nav: false,
                        dots: false
                    },
                    600: {
                        items: 1,
                        nav: false,
                        dots: false
                    },
                    1000: {
                        items: 1,
                        nav: false,
                        dots: false
                    }
                }
            });

            $('.new-carousel').owlCarousel({
                loop: true,
                autoplay: false,
                margin: 10,
                responsiveClass: true,
                responsive: {
                    0: {
                        items: 1,
                        nav: true,
                        dots: true
                    },
                    600: {
                        items: 4,
                        nav: true,
                        dots: true
                    },
                    1000: {
                        items: 6,
                        nav: true,
                        dots: true
                    }
                }
            });

            $('.project-carousel').owlCarousel({
                loop: true,
                autoplay: false,
                margin: 15,
                responsiveClass: true,
                responsive: {
                    0: {
                        items: 1,
                        nav: true,
                        dots: true
                    },
                    600: {
                        items: 2,
                        nav: true,
                        dots: true
                    },
                    1000: {
                        items: 3,
                        nav: true,
                        dots: true
                    }
                }
            });

        })
    </script>
@endsection
