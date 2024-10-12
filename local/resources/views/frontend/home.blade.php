@extends('frontend.index')
@section('title')
   {{$imfomation->title_home}}
@endsection('title')
@section('meta')
    <meta name="keywords" itemprop="keywords" content="Công ty TNHH LATECH">
    <meta name="description" content="{{ $imfomation->text_seo }}">
    <base href="{{ url('/') }}:443" target="_self">
    <link rel="icon" href="{{ url('public/backend') }}/{{ $imfomation->logo }}">
    <meta property="og:title" content="{{ $imfomation->text_seo }}">
    <meta property="og:type" content="website">
@endsection('meta')
@section('content')
    @include('frontend.slider_box')
    @include('frontend.search.formSearchPost')
    @include('frontend.blogHome.newsHome')
    @include('frontend.blogHome.questionGroup')
    <section id="productshop">
        <div class="container">
            <div class="row">
                @include('frontend.blogHome.newOutstanding')
                <div class="col-md-4 col-sm-12">
                   @include('frontend.blogHome.blogHomePage')
                </div>
            </div>

            <br>
        </div>
    </section>
   @include('frontend.blogHome.listDocumentCate')
   @include('frontend.blogHome.new-post')
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
