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
            @include('dienminhquang.blog.titlePage')
            <a href="#">{{ $postDetail->name }}</a>
        </div>
    </div>
    <div class="subpage">
        <div class="container">
            <div class="row">

                <div class="col-md-2 col-sm-12">
                    <div class="_box filter_cat">
                        @include('dienminhquang.catesList')
                    </div>
                    <div class="_box left_product">
                        @include('dienminhquang.sanphamnoibat')
                    </div>
                </div>
                <div class="col-md-8 col-sm-12">
                    <div class="box_subpage">

                            <h4 style="border-bottom: 1px solid #ddd; margin-bottom: 20px; padding-bottom: 5px;">
                                {{ $postDetail->name }}
                                @if (isset(Auth::user()->name))
                                <button class="btn btn-success">
                                   ứng tuyển</button></a>
                              @else
                                <button type="button" class="btn btn-primary" data-toggle="modal"
                                    data-target=".bd-example-modal-lg"> <i class="bi bi-send"></i> ứng tuyển</button>
                            @endif
                            <br>
                            </h4>
                           

                        <div class="news_page">
                            {!! $postDetail->des2 !!}
                        </div>
                        <hr>
                        <br>
                        @if (isset(Auth::user()->name))
                            <p class="text-center"> <a href="{{ $sp->link }}" target="_blank"><button
                                        class="btn btn-success"> Gửi
                                        thông tin cho nhà tuyển dụng</button></a></p>
                        @else
                            <p class="text-center">
                                <button type="button" class="btn btn-primary" data-toggle="modal"
                                    data-target=".bd-example-modal-lg"> <i class="bi bi-send"></i> Gửi thông tin cho nhà tuyển dụng</button>
                            </p>
                        @endif
                        <br>
                        <div>
                            {!! $imfomation->des2 !!}
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
                                        @foreach ($postDetail->cate->posts as $key => $postItem)
                                            @if ($key <= 12)
                                                <div class="col-6 col-sm-3">
                                                    <div class="item">
                                                        <a href="{{ url("bai-viet/$postItem->id/$postItem->slug.html") }}"
                                                            title="{{ $postItem->name }}">
                                                            <img src="{{ url('public/backend') }}/@if($postItem->cate->img_default == 1){{ $postItem->cate->icon }}@else{{ $postItem->icon }}@endif"
                                                                original="{{ url('public/backend') }}/@if($postItem->cate->img_default == 1){{ $postItem->cate->icon }}@else{{ $postItem->icon }}@endif"
                                                                alt="{{ $postItem->name }}">
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
                <div class="col-md-2 col-sm-12"> @include('dienminhquang.blog.blogFullPage')</div>

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
    @include('dienminhquang.blog.modal-registry')

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
