@extends('dienminhquang.index')
@section('title')
    {{ $postDetail->name }}
@endsection
@section('meta')
    <meta name="keywords" itemprop="keywords" content="{{ $postDetail->name }}">
    <meta property="og:url" content="{{ url()->current() }}" />
    <meta property="og:type" content="article" />
    <meta property="og:title" content="{{ $postDetail->name }}" />
    <meta property="og:description" content="{{ $postDetail->name }}" />
    <meta property="og:image" content="{{ url('public/backend') }}/{{ $postDetail->icon }}" />
    <meta property="og:image:alt" content="{{ $postDetail->name }}" />
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
            <a href="#">{{ $postDetail->name }}</a>
        </div>
    </div>
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
                        <h1 style="border-bottom: 1px solid #ddd; margin-bottom: 20px;">{{ $postDetail->name }}</h1>
                        <div class="news_page">
                            {!! $postDetail->des2 !!}
                        </div>
                        <div>
                            {!! $imfomation->des2 !!}
                        </div>
                        <div>
                            <p class="text-center">
                                @if ($postDetail->link_dowload != null)
                                    <a href="{{ $postDetail->link_dowload }}" target="_blank">
                                        <button class="btn btn-success">Dowload</button>
                                    </a>
                                @endif
                            </p>
                        </div>
                        <div class="fb-share-button" data-href="{{ url()->current() }}" data-layout="button_count"
                            data-size="large"><a target="_blank"
                                href="https://www.facebook.com/sharer/sharer.php?u={{ url()->current() }}"
                                class="fb-xfbml-parse-ignore">Chia sẻ</a></div>
                        <div class="fb-comments" data-href="https://latechtop.com/" data-width="" data-numposts="10"></div>
                        <hr style="border: 0.1px solid #dddcdc">
                        <div style="padding: 50px; background:#e9e9e9;">
                            <h3 class="text-center">Để nhận tài liệu hay trên và các tài liệu khác nữa bạn vui lòng cung
                                cấp email, số điện thoại hệ thống của chúng tôi sẽ gửi tài liệu về email cho bạn</h3>
                            <form method="post" action="{{ route('customer') }}">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Địa chỉ Email </label>
                                    <input type="email" class="form-control" name="email" id="exampleInputEmail1"
                                        value="{{ old('email') }}" aria-describedby="emailHelp"
                                        placeholder="Nhập địa chỉ email">
                                    <small id="emailHelp" class="form-text text-danger"
                                        style="color:red">{{ $errors->first('email') }}</small>
                                    <input type="hidden" name="object_id" value="{{ $postDetail->id }}">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Số điện thoại</label>
                                    <input type="number" class="form-control" name="phone" value="{{ old('phone') }}"
                                        id="exampleInputPassword1" placeholder="Nhập số điện thoại">
                                    <small id="emailHelp" class="form-text text-danger"
                                        style="color:red">{{ $errors->first('phone') }}</small>
                                </div>
                                {{ csrf_field() }}
                                <button type="submit" class="btn btn-success">Gửi</button>
                            </form>
                        </div>
                        <div class="info-author">
                            <div class="row">
                                <div class="col-md-2">
                                    <div class="avatar-author" style="padding:5px;"><a target="_blank" rel="nofollow"
                                            href="{{ url('/') }}">
                                            <img style="border-radius: 184px;
    width: 120px;"
                                                class="img-circle img-thumbnail"
                                                src="{{ url('public/backend') }}/{{ $imfomation->img2 }}"
                                                itemprop="Avatar"> </a></div>
                                </div>
                                <div class="col-md-10">
                                    <div class="intro-author" style="padding:5px; text-align:justify;">
                                        {!! $imfomation->des1 !!}
                                    </div>
                                    <div class="social-author"><b>Follow:&nbsp;</b>
                                        <span>
                                            <a target="_blank" rel="nofollow"
                                                href="https://www.facebook.com/quoclapWebsitePhanmem">Facebook</a>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="related_product_page">
                            <p>Bài viết liên quan</p>
                            <div>
                                <div class="row list_product">
                                    @if ($postDetail->cate->posts)
                                        @foreach ($postDetail->cate->posts as $key=>$postItem)
                                            @if($key <= 12)
                                            <div class="col-6 col-sm-3">
                                                <div class="item">
                                                    <a href="{{ url("bai-viet/$postItem->id/$postItem->slug.html") }}"
                                                        title="{{ $postItem->name }}">
                                                        <img src="{{ url('public/backend') }}/@if($postItem->cate->img_default == 1){{ $postItem->cate->icon }}@else{{$postItem->icon}} @endif"
                                                        original="{{ url('public/backend') }}/@if($postItem->cate->img_default == 1){{ $postItem->cate->icon }}@else{{$postItem->icon}} @endif" alt="{{ $postItem->name }}">
                                                    </a>
                                                    <div>
                                                        <a
                                                            href="{{ url("bai-viet/$postItem->id/$postItem->slug.html") }}">
                                                            {{ $postItem->name }}
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                            @endif
                                        @endforeach
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

            </div>
        </div>
    </div>
    <!-- end detail product -->
    @if (Session::has('add_success'))
        <div class="modal hideItem" tabindex="-1" role="dialog" style="display:block">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-body text-center">
                        <h3 class="modal-title text-center">ĐĂNG KÝ EMAIL THÀNH CÔNG</h3>
                        <p>Chúc mừng bạn đã gửi thông tin thành công</p>
                        <p>Hệ thống sẽ gửi tài liệu về email cho bạn </p>
                        <p>
                            <button type="button" class="btn btn-success clickHide">OK</button>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    @endif

@endsection('content')
@section('script')
    <script>
        $(document).ready(function() {
            $('.clickHide').click(function() {
                $('.hideItem').hide();
            })
        })
    </script>
@endsection
