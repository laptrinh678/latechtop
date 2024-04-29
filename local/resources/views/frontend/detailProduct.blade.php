@extends('frontend.index')
@section('title')
    {{ $sp->name }}
@endsection
@section('meta')
    <meta property="og:url" content="{{ url('/') }}{{ $sp->name }}" />
    <meta property="og:type" content="website" />
    <meta property="og:title" content="{{ $sp->name }}" />
    <meta property="og:description" content="" />
    <meta property="og:image" content="{{ url('public/backend/') }}/{{ $sp->icon }}" />
@endsection('meta')
@section('style')
@endsection('style')
@section('content')
    <!-- detail product -->
    <div class="navbar-vina">
        <div class="container">
            <a href="{{ url('/') }}">
                <svg class="svg-inline--fa fa-home fa-w-18" aria-hidden="true" data-prefix="fa" data-icon="home"
                    role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512" data-fa-i2svg="">
                    <path fill="currentColor"
                        d="M488 312.7V456c0 13.3-10.7 24-24 24H348c-6.6 0-12-5.4-12-12V356c0-6.6-5.4-12-12-12h-72c-6.6 0-12 5.4-12 12v112c0 6.6-5.4 12-12 12H112c-13.3 0-24-10.7-24-24V312.7c0-3.6 1.6-7 4.4-9.3l188-154.8c4.4-3.6 10.8-3.6 15.3 0l188 154.8c2.7 2.3 4.3 5.7 4.3 9.3zm83.6-60.9L488 182.9V44.4c0-6.6-5.4-12-12-12h-56c-6.6 0-12 5.4-12 12V117l-89.5-73.7c-17.7-14.6-43.3-14.6-61 0L4.4 251.8c-5.1 4.2-5.8 11.8-1.6 16.9l25.5 31c4.2 5.1 11.8 5.8 16.9 1.6l235.2-193.7c4.4-3.6 10.8-3.6 15.3 0l235.2 193.7c5.1 4.2 12.7 3.5 16.9-1.6l25.5-31c4.2-5.2 3.4-12.7-1.7-16.9z">
                    </path>
                </svg>
                Trang chủ
            </a>
            <a href="{{ url()->current() }}">{{ $sp->name }}</a>
        </div>
    </div>
    <div class="subpage">
        <div class="container-fluid">
            <div class="row">

                <div class="col-md-2 col-sm-12">
                    <div class="filter_cat">
                        @include('frontend.blog.detailProductBlogLeft')
                    </div>
                    <div class="left_product">
                        @include('frontend.sanphamnoibat')
                    </div>
                </div>

                <div class="col-md-8 col-sm-12">
                    <div class="box_subpage">
                        <p style="border-bottom: 1px solid #ddd; margin-bottom: 20px;">{{ $sp->name }}</p>
                        <div class="row product_page">
                            <div class="col-12 col-sm-5 left_p">
                                <div class="w-100">
                                    <a class="detail_image_data" data-toggle="modal" data-target=".bd-showImg-modal-lg"
                                        href="javascript:void(0)">
                                        <img class="imgData" width="100%"
                                            src="{{ url('public/backend/') }}/@if($sp->cate->img_default == 1){{ $sp->cate->icon }}@else{{ $sp->icon }}@endif"
                                            alt="">
                                    </a>
                                </div>
                                <ul class="w-100">
                                    <?php
                                    $imgdetail_decode = json_decode($sp->img);
                                    if ($imgdetail_decode) {
                                        $value = count($imgdetail_decode);
                                    } else {
                                        $value = 0;
                                    }
                                    ?>
                                    @if ($value > 0)
                                        @foreach ($imgdetail_decode as $v)
                                            <li>
                                                <a class="detail_image_data" data-toggle="modal"
                                                    data-target=".bd-showImg-modal-lg" href="javascript:void(0)">
                                                    <img class="imgData"
                                                        src="{{ url('public/backend/') }}/{{ $v }}"
                                                        alt="{{ $v }}" title="{{ $v }}">
                                                </a>

                                            </li>
                                        @endforeach
                                    @endif
                                </ul>
                            </div>
                            <div class="col-12 col-sm-7">
                                <!--begin brief_product-->
                                <div class="brief_ppage">
                                    <h1>{{ $sp->name }}</h1>
                                    <div class="price_pp">
                                        <strong>Giá:</strong>
                                        <span><strong style="color: #d72b77; font-weight: 600;">Còn hàng</strong></span>
                                        <div class="clearfix"></div>
                                        
                                    </div>
                                    <p>
                                        <p>
                                                @if ($sp->status_price == 1)
                                                <strong> Giá:</strong> {{ number_format($sp->price) }}
                                                @else
                                                <strong> Giá:</strong> Miễn phí
                                                @endif
                                        </p>
                                       
                                        <p>
                                            <strong>Mã sản phẩm :</strong>  <span> {{ $sp->product_code }}</span>
                                        </p>
                                        <p>
                                            <strong>Điểm sản phẩm :</strong>  <span> {{ $sp->point }}</span>
                                        </p>
                                    <div class="desc_ppage">
                                        {!! $sp->des !!}
                                    </div>
                                    @if ($sp->price != 0)
                                        <form class="row no-gutters" action="{{ url("cart/add/$sp->id") }}" method="GET">
                                            <input type="hidden" value="876" name="product_cart">
                                            <div class="col-3 input_cart">
                                                <input style="height: 34px;" type="number" name="quantity_cart" value="1" min="1"
                                                    max="10">
                                            </div>
                                            <div class="col-4 button_cart">
                                                <button type="submit" name="btn_order"><strong>MUA NGAY</strong>

                                                </button>
                                            </div>
                                            <div class="col-5">
                                                <button type="submit" name="btn_order" class="hotline_cart" style="padding-top: 7px; padding-bottom:8px;">
                                                    <span>THÊM VÀO GIỎ HÀNG</span>
                                                </button>
                                            </div>
                                        </form>
                                    @endif
                                </div>
                                <!--end brief_product-->

                            </div>
                        </div>

                        <!--begin detail_product-->
                        <div class="detail_product">
                            <ul class="nav_ppage">
                                <li><a class="active" href=".desc_product">Thông tin chi tiết</a></li>
                            </ul>
                            <div class="clearfix"></div>
                            <div class="desc_product cbox_ppage content_style">
                                {!! $sp->des2 !!}
                            </div>
                            @if ($sp->price != 0)
                                <p class="text-center">
                                    <a href="{{ url("cart/add/$sp->id") }}"><button class="btn"
                                            style="background: linear-gradient(#ff2a4a,#dc0021);">
                                            <strong class="text-white">MUA NGAY KẺO HẾT</strong>
                                        </button>
                                    </a>
                                </p>
                            @endif
                            @if (isset(Auth::user()->name))
                                @if ($sp->link != null && $sp->price == 0)
                                    <p class="text-center"> <a href="{{ $sp->link }}" target="_blank"><button
                                                class="btn btn-success">Dowload</button></a></p>
                                @endif
                            @else
                                <p class="text-center">
                                    <button type="button" class="btn btn-primary" data-toggle="modal"
                                        data-target=".bd-example-modal-lg">Dowload tài liệu</button>
                                </p>
                            @endif
                        </div>
                        <!--end detail_product-->
                        <div class="related_product_page">
                            <p>Có thể bạn quan tâm</p>
                            <div>
                                <div class="row list_product">
                                    @foreach ($sp_lienquan as $vlienquan)
                                        <div class="col-6 col-sm-2">
                                            <div class="item">
                                                <a href="{{ url("san-pham/$vlienquan->cate_id/$vlienquan->slug.html") }}"
                                                    title="{{ $vlienquan->name }}">
                                                    <img class="imgheight" src="{{ url('public/backend') }}/@if($vlienquan->cate->img_default == 1){{ $vlienquan->cate->icon }}@else{{ $vlienquan->icon }} @endif"
                                                        alt="{{ $vlienquan->name }}" title="{{ $vlienquan->name }}">
                                                    </a>
                                                <div>
                                                    <a
                                                        href="{{ url("san-pham/$vlienquan->cate_id/$vlienquan->slug.html") }}">
                                                        {{ $vlienquan->name }}
                                                    </a>
                                                    <p>
                                                        <span>
                                                            Giá:
                                                            @if ($vlienquan->status_price == 1)
                                                                {{ number_format($vlienquan->price) }}
                                                            @else
                                                                Miễn phí
                                                            @endif
                                                        </span>
                                                    </p>
                                                </div>
                                                <a href="{{ url("san-pham/$vlienquan->cate_id/$vlienquan->slug.html") }}"
                                                    class="icon search_icon">
                                                    <svg class="svg-inline--fa fa-search-plus fa-w-16" aria-hidden="true"
                                                        data-prefix="fas" data-icon="search-plus" role="img"
                                                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"
                                                        data-fa-i2svg="">
                                                        <path fill="currentColor"
                                                            d="M304 192v32c0 6.6-5.4 12-12 12h-56v56c0 6.6-5.4 12-12 12h-32c-6.6 0-12-5.4-12-12v-56h-56c-6.6 0-12-5.4-12-12v-32c0-6.6 5.4-12 12-12h56v-56c0-6.6 5.4-12 12-12h32c6.6 0 12 5.4 12 12v56h56c6.6 0 12 5.4 12 12zm201 284.7L476.7 505c-9.4 9.4-24.6 9.4-33.9 0L343 405.3c-4.5-4.5-7-10.6-7-17V372c-35.3 27.6-79.7 44-128 44C93.1 416 0 322.9 0 208S93.1 0 208 0s208 93.1 208 208c0 48.3-16.4 92.7-44 128h16.3c6.4 0 12.5 2.5 17 7l99.7 99.7c9.3 9.4 9.3 24.6 0 34zM344 208c0-75.2-60.8-136-136-136S72 132.8 72 208s60.8 136 136 136 136-60.8 136-136z">
                                                        </path>
                                                    </svg><!-- <i class="fas fa-search-plus"></i> --></a>
                                                <a href="{{ url("cart/add/$vlienquan->id") }}" class="icon add_icon">
                                                    <svg class="svg-inline--fa fa-cart-plus fa-w-18" aria-hidden="true"
                                                        data-prefix="fas" data-icon="cart-plus" role="img"
                                                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512"
                                                        data-fa-i2svg="">
                                                        <path fill="currentColor"
                                                            d="M504.717 320H211.572l6.545 32h268.418c15.401 0 26.816 14.301 23.403 29.319l-5.517 24.276C523.112 414.668 536 433.828 536 456c0 31.202-25.519 56.444-56.824 55.994-29.823-.429-54.35-24.631-55.155-54.447-.44-16.287 6.085-31.049 16.803-41.548H231.176C241.553 426.165 248 440.326 248 456c0 31.813-26.528 57.431-58.67 55.938-28.54-1.325-51.751-24.385-53.251-52.917-1.158-22.034 10.436-41.455 28.051-51.586L93.883 64H24C10.745 64 0 53.255 0 40V24C0 10.745 10.745 0 24 0h102.529c11.401 0 21.228 8.021 23.513 19.19L159.208 64H551.99c15.401 0 26.816 14.301 23.403 29.319l-47.273 208C525.637 312.246 515.923 320 504.717 320zM408 168h-48v-40c0-8.837-7.163-16-16-16h-16c-8.837 0-16 7.163-16 16v40h-48c-8.837 0-16 7.163-16 16v16c0 8.837 7.163 16 16 16h48v40c0 8.837 7.163 16 16 16h16c8.837 0 16-7.163 16-16v-40h48c8.837 0 16-7.163 16-16v-16c0-8.837-7.163-16-16-16z">
                                                        </path>
                                                    </svg><!-- <i class="fas fa-cart-plus"></i> --></a>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-2 col-sm-12">
                    @include('frontend.blog.blogFullPage')
                </div>

            </div>
        </div>
    </div>
    <div class="modal fade bd-showImg-modal-lg" tabindex="-1" role="dialog" aria-labelledby="showImg"
        aria-hidden="true">
        <div class="modal-dialog modal-lg">

            <div class="modal-content">
                <div class="modal-header">
                    <a class="close" data-dismiss="modal"><i class="fa fa-times" aria-hidden="true"></i></a>
                </div>
                <img id="imgItem" src="" alt="">

            </div>
        </div>
    </div>
    @include('frontend.blog.modal-registry')
    </div>
    <!-- end detail product -->
@endsection('content')
@section('script')
    <script>
        $(document).ready(function() {
            $('.imgData').click(function() {
                let src = $(this).attr('src');
                $('#imgItem').attr('src', src);
            });
        })
    </script>
@endsection
