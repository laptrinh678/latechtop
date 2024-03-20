@extends('dienminhquang.index')
@section('title')
    Danh sách sản phẩm
@endsection
@section('style')
@endsection('style')
@section('content')
    <div class="navbar-vina">
        <div class="container">
            <a href="{{url('/')}}">
                <svg class="svg-inline--fa fa-home fa-w-18" aria-hidden="true" data-prefix="fa" data-icon="home"
                     role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512" data-fa-i2svg="">
                    <path fill="currentColor"
                          d="M488 312.7V456c0 13.3-10.7 24-24 24H348c-6.6 0-12-5.4-12-12V356c0-6.6-5.4-12-12-12h-72c-6.6 0-12 5.4-12 12v112c0 6.6-5.4 12-12 12H112c-13.3 0-24-10.7-24-24V312.7c0-3.6 1.6-7 4.4-9.3l188-154.8c4.4-3.6 10.8-3.6 15.3 0l188 154.8c2.7 2.3 4.3 5.7 4.3 9.3zm83.6-60.9L488 182.9V44.4c0-6.6-5.4-12-12-12h-56c-6.6 0-12 5.4-12 12V117l-89.5-73.7c-17.7-14.6-43.3-14.6-61 0L4.4 251.8c-5.1 4.2-5.8 11.8-1.6 16.9l25.5 31c4.2 5.1 11.8 5.8 16.9 1.6l235.2-193.7c4.4-3.6 10.8-3.6 15.3 0l235.2 193.7c5.1 4.2 12.7 3.5 16.9-1.6l25.5-31c4.2-5.2 3.4-12.7-1.7-16.9z"></path>
                </svg><!-- <i class="fa fa-home"></i> -->Trang chủ</a>
            <a href="#">Kết quả tìm kiếm</a>
        </div>
    </div>
    <!-- content catepro -->
    <div class="subpage">
        <div class="container">
            <div class="row">
                <div class="col-12 col-md-3 left d-none d-md-block">

                    <div class="_box filter_cat">
                        @include('dienminhquang.catesList')
                    </div>
                    <div class="_box left_product">
                        @include('dienminhquang.sanphamnoibat')
                    </div>
                </div>
                <div class="col-12 col-md-9 right">
                    <div class="box_subpage">
                        <div class="cat_page">
                            <div class="row list_product gird_active">
                                @if(isset($productList))
                                    @foreach($productList as $v2)
                                        <div class="col-6 col-sm-3 gird_format">
                                            <div class="item">
                                                <a href="{{url("san-pham/$v2->cate_id/$v2->slug.html")}}"
                                                   title="{{$v2->name}}"><img
                                                        src="{{url('public/backend')}}/{{$v2->icon}}"
                                                        alt="{{$v2->name}}" title="{{$v2->name}}"></a>
                                                <div>
                                                    <a href="{{url("san-pham/$v2->cate_id/$v2->slug.html")}}"
                                                       title="{{$v2->name}}">{{$v2->name}}</a>
                                                    <div class="d-none">
                                                        <svg class="svg-inline--fa fa-star fa-w-18" aria-hidden="true"
                                                             data-prefix="fas" data-icon="star" role="img"
                                                             xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512"
                                                             data-fa-i2svg="">
                                                            <path fill="currentColor"
                                                                  d="M259.3 17.8L194 150.2 47.9 171.5c-26.2 3.8-36.7 36.1-17.7 54.6l105.7 103-25 145.5c-4.5 26.3 23.2 46 46.4 33.7L288 439.6l130.7 68.7c23.2 12.2 50.9-7.4 46.4-33.7l-25-145.5 105.7-103c19-18.5 8.5-50.8-17.7-54.6L382 150.2 316.7 17.8c-11.7-23.6-45.6-23.9-57.4 0z"></path>
                                                        </svg><!-- <i class="fas fa-star"></i> -->
                                                        <svg class="svg-inline--fa fa-star fa-w-18" aria-hidden="true"
                                                             data-prefix="fas" data-icon="star" role="img"
                                                             xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512"
                                                             data-fa-i2svg="">
                                                            <path fill="currentColor"
                                                                  d="M259.3 17.8L194 150.2 47.9 171.5c-26.2 3.8-36.7 36.1-17.7 54.6l105.7 103-25 145.5c-4.5 26.3 23.2 46 46.4 33.7L288 439.6l130.7 68.7c23.2 12.2 50.9-7.4 46.4-33.7l-25-145.5 105.7-103c19-18.5 8.5-50.8-17.7-54.6L382 150.2 316.7 17.8c-11.7-23.6-45.6-23.9-57.4 0z"></path>
                                                        </svg><!-- <i class="fas fa-star"></i> -->
                                                        <svg class="svg-inline--fa fa-star fa-w-18" aria-hidden="true"
                                                             data-prefix="fas" data-icon="star" role="img"
                                                             xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512"
                                                             data-fa-i2svg="">
                                                            <path fill="currentColor"
                                                                  d="M259.3 17.8L194 150.2 47.9 171.5c-26.2 3.8-36.7 36.1-17.7 54.6l105.7 103-25 145.5c-4.5 26.3 23.2 46 46.4 33.7L288 439.6l130.7 68.7c23.2 12.2 50.9-7.4 46.4-33.7l-25-145.5 105.7-103c19-18.5 8.5-50.8-17.7-54.6L382 150.2 316.7 17.8c-11.7-23.6-45.6-23.9-57.4 0z"></path>
                                                        </svg><!-- <i class="fas fa-star"></i> -->
                                                        <svg class="svg-inline--fa fa-star fa-w-18" aria-hidden="true"
                                                             data-prefix="fas" data-icon="star" role="img"
                                                             xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512"
                                                             data-fa-i2svg="">
                                                            <path fill="currentColor"
                                                                  d="M259.3 17.8L194 150.2 47.9 171.5c-26.2 3.8-36.7 36.1-17.7 54.6l105.7 103-25 145.5c-4.5 26.3 23.2 46 46.4 33.7L288 439.6l130.7 68.7c23.2 12.2 50.9-7.4 46.4-33.7l-25-145.5 105.7-103c19-18.5 8.5-50.8-17.7-54.6L382 150.2 316.7 17.8c-11.7-23.6-45.6-23.9-57.4 0z"></path>
                                                        </svg><!-- <i class="fas fa-star"></i> -->
                                                        <svg class="svg-inline--fa fa-star fa-w-18" aria-hidden="true"
                                                             data-prefix="fas" data-icon="star" role="img"
                                                             xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512"
                                                             data-fa-i2svg="">
                                                            <path fill="currentColor"
                                                                  d="M259.3 17.8L194 150.2 47.9 171.5c-26.2 3.8-36.7 36.1-17.7 54.6l105.7 103-25 145.5c-4.5 26.3 23.2 46 46.4 33.7L288 439.6l130.7 68.7c23.2 12.2 50.9-7.4 46.4-33.7l-25-145.5 105.7-103c19-18.5 8.5-50.8-17.7-54.6L382 150.2 316.7 17.8c-11.7-23.6-45.6-23.9-57.4 0z"></path>
                                                        </svg><!-- <i class="fas fa-star"></i> -->
                                                    </div>
                                                    <p>
                                                        <span> @if($v2->price != 0){{ number_format($v2->price) }} @else Miễn phí @endif</span>
                                                    </p>
                                                </div>
                                                <a href="{{url("san-pham/$v2->cate_id/$v2->slug.html")}}"
                                                   class="icon search_icon">
                                                    <svg class="svg-inline--fa fa-search-plus fa-w-16"
                                                         aria-hidden="true" data-prefix="fas" data-icon="search-plus"
                                                         role="img" xmlns="http://www.w3.org/2000/svg"
                                                         viewBox="0 0 512 512" data-fa-i2svg="">
                                                        <path fill="currentColor"
                                                              d="M304 192v32c0 6.6-5.4 12-12 12h-56v56c0 6.6-5.4 12-12 12h-32c-6.6 0-12-5.4-12-12v-56h-56c-6.6 0-12-5.4-12-12v-32c0-6.6 5.4-12 12-12h56v-56c0-6.6 5.4-12 12-12h32c6.6 0 12 5.4 12 12v56h56c6.6 0 12 5.4 12 12zm201 284.7L476.7 505c-9.4 9.4-24.6 9.4-33.9 0L343 405.3c-4.5-4.5-7-10.6-7-17V372c-35.3 27.6-79.7 44-128 44C93.1 416 0 322.9 0 208S93.1 0 208 0s208 93.1 208 208c0 48.3-16.4 92.7-44 128h16.3c6.4 0 12.5 2.5 17 7l99.7 99.7c9.3 9.4 9.3 24.6 0 34zM344 208c0-75.2-60.8-136-136-136S72 132.8 72 208s60.8 136 136 136 136-60.8 136-136z"></path>
                                                    </svg><!-- <i class="fas fa-search-plus"></i> --></a>
                                                <a href="{{url("cart/add/$v2->id")}}" class="icon add_icon">
                                                    <svg class="svg-inline--fa fa-cart-plus fa-w-18" aria-hidden="true"
                                                         data-prefix="fas" data-icon="cart-plus" role="img"
                                                         xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512"
                                                         data-fa-i2svg="">
                                                        <path fill="currentColor"
                                                              d="M504.717 320H211.572l6.545 32h268.418c15.401 0 26.816 14.301 23.403 29.319l-5.517 24.276C523.112 414.668 536 433.828 536 456c0 31.202-25.519 56.444-56.824 55.994-29.823-.429-54.35-24.631-55.155-54.447-.44-16.287 6.085-31.049 16.803-41.548H231.176C241.553 426.165 248 440.326 248 456c0 31.813-26.528 57.431-58.67 55.938-28.54-1.325-51.751-24.385-53.251-52.917-1.158-22.034 10.436-41.455 28.051-51.586L93.883 64H24C10.745 64 0 53.255 0 40V24C0 10.745 10.745 0 24 0h102.529c11.401 0 21.228 8.021 23.513 19.19L159.208 64H551.99c15.401 0 26.816 14.301 23.403 29.319l-47.273 208C525.637 312.246 515.923 320 504.717 320zM408 168h-48v-40c0-8.837-7.163-16-16-16h-16c-8.837 0-16 7.163-16 16v40h-48c-8.837 0-16 7.163-16 16v16c0 8.837 7.163 16 16 16h48v40c0 8.837 7.163 16 16 16h16c8.837 0 16-7.163 16-16v-40h48c8.837 0 16-7.163 16-16v-16c0-8.837-7.163-16-16-16z"></path>
                                                    </svg><!-- <i class="fas fa-cart-plus"></i> --></a>
                                            </div>
                                        </div>
                                    @endforeach
                                        {{ $productList->links('paginate') }}
                                @endif
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <!-- end -->
@endsection('content')
