@extends('frontend.index')
@section('title')
    @if (isset($post))
        {{ $post->name }}
    @else
        {{ $cateData->name }}
    @endif
@endsection
@section('meta')
    @if (isset($post))
        <meta name="keywords" itemprop="keywords" content="{{ $post->name }}">
        <meta name="description" content="{{ $post->name }}">
        <meta property="og:title" content="{{ $post->name }}">
    @else
        @if (isset($cateData))
            <meta name="keywords" itemprop="keywords" content="{{ $cateData->name }}">
            <meta name="description" content="{{ $cateData->name }}">
            <meta property="og:title" content="{{ $cateData->name }}">
        @endif
    @endif

    <base href="{{ url('/') }}:443" target="_self">
    <link rel="icon" href="{{ url('public/backend') }}/{{ $imfomation->logo }}">

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
            <a href="#">
                @if (isset($cateData))
                    {{ $cateData->name }}
                @endif
            </a>
        </div>
    </div>
    <div class="subpage">
        <div class="container">
            <div class="row">
                <div class="col-md-2 col-sm-12">
                    <div class="_box filter_cat">
                        @include('frontend.catesList')
                    </div>
                    <div class="_box left_product">
                        @include('frontend.sanphamnoibat')
                    </div>
                </div>
                @if (isset($post))
                    <div class="col-md-8 col-sm-12">
                        <div class="box_subpage">
                            <h1 style="border-bottom: 1px solid #ddd; margin-bottom: 20px;">{{ $post->name }}</h1>
                            <div class="news_page">
                                {!! $post->des2 !!}
                            </div>
                        </div>
                    </div>
                @endif
             
                    <div class="col-md-8 col-sm-12">
                       
                        <div class="box_subpage">
                            @if (isset($postList))
                            <p style="border-bottom: 1px solid #ddd; margin-bottom: 20px;">{{ getCateName($cate_id) }}</p>
                            <div class="list_news">
                                @foreach ($postList as $v)
                                    <div class="row no-gutters item">
                                        <div class="col-4 item_img d-none d-sm-block">
                                            <a href="{{ url("bai-viet/$v->id/$v->slug.html") }}"><img
                                                    src="{{ url('public/backend') }}/@if($v->cate->img_default == 1){{ $v->cate->icon }}@else{{$v->icon}} @endif"
                                                    class="heightImg"
                                                    alt="{{ $v->name }}"></a>
                                        </div>
                                        <div class="col-12 col-md-8 item_brief">
                                            <div class="row">
                                                {{-- <div class="col-4 d-sm-none" style="padding-right: 0; padding-top: 4px;"><a
                                                        href="{{ url("bai-viet/$v->id/$v->slug.html") }}">
                                                            <img src="{{ url('public/backend') }}/{{ $v->icon }}" alt="{{ $v->name }}"></a>
                                                </div> --}}
                                                <div class="col-8 col-sm-12">
                                                    <h3><a
                                                            href="{{ url("bai-viet/$v->id/$v->slug.html") }}">{{ $v->name }}</a>
                                                    </h3>
                                                </div>
                                            </div>
                                            <span>Cập nhật: {{ $v->created_at }} | <a href="#">
                                                    @if (isset($cateData))
                                                        {{ $cateData->name }}
                                                    @endif
                                                </a></span>
                                            <p>
                                                <a href="{{ url("bai-viet/$v->id/$v->slug.html") }}">Xem thêm</a>
                                            </p>
                                        </div>
                                    </div>
                                @endforeach
                                {{ $postList->links('paginate') }}
                                <div class="clearfix"></div>
                            </div>
                            @else
                            <p>Không có dữ liệu vui lòng quay lại </p>
                            @endif

                        </div>
                       
                    </div>
              
                <div class="col-md-2 col-sm-12">
                        @include('frontend.blog.blogFullPage')
                </div>
            </div>
        </div>
    </div>
    <!-- end detail product -->
@endsection('content')
