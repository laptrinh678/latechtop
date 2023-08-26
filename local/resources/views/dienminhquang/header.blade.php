<div class="header_m d-md-none">
    <div class="nav_mobile">
        <span></span>
    </div>
    <div class="logo">
        <a href="{{url('/')}}">
            <img src="{{url('public/backend')}}/{{$imfomation->logo}}"
                 alt="{{$imfomation->name}}"></a>
    </div>
    <script type="text/javascript">
        function show_hide(obj) {
            ele_val = $(obj).next().css("display");
            if (ele_val == "none") {
                $(obj).next().fadeIn();
            } else {
                $(obj).next().fadeOut();
            }
        }
    </script>
    <div class="search_btn">
        <a href="#" onclick="show_hide(this);">
            <svg class="svg-inline--fa fa-search fa-w-16" aria-hidden="true" data-prefix="fas" data-icon="search"
                 role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" data-fa-i2svg="">
                <path fill="currentColor"
                      d="M505 442.7L405.3 343c-4.5-4.5-10.6-7-17-7H372c27.6-35.3 44-79.7 44-128C416 93.1 322.9 0 208 0S0 93.1 0 208s93.1 208 208 208c48.3 0 92.7-16.4 128-44v16.3c0 6.4 2.5 12.5 7 17l99.7 99.7c9.4 9.4 24.6 9.4 33.9 0l28.3-28.3c9.4-9.4 9.4-24.6.1-34zM208 336c-70.7 0-128-57.2-128-128 0-70.7 57.2-128 128-128 70.7 0 128 57.2 128 128 0 70.7-57.2 128-128 128z"></path>
            </svg><!-- <i class="fas fa-search"></i> --></a>

        <form action="{{route('searchProduct')}}" method="GET">
            <input type="text" name="txtkeyword" placeholder="Tìm kiếm sản phẩm..." autocomplete="false">
            <button type="submit">
                <svg class="svg-inline--fa fa-search fa-w-16" aria-hidden="true" data-prefix="fas" data-icon="search"
                     role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" data-fa-i2svg="">
                    <path fill="currentColor"
                          d="M505 442.7L405.3 343c-4.5-4.5-10.6-7-17-7H372c27.6-35.3 44-79.7 44-128C416 93.1 322.9 0 208 0S0 93.1 0 208s93.1 208 208 208c48.3 0 92.7-16.4 128-44v16.3c0 6.4 2.5 12.5 7 17l99.7 99.7c9.4 9.4 24.6 9.4 33.9 0l28.3-28.3c9.4-9.4 9.4-24.6.1-34zM208 336c-70.7 0-128-57.2-128-128 0-70.7 57.2-128 128-128 70.7 0 128 57.2 128 128 0 70.7-57.2 128-128 128z"></path>
                </svg><!-- <i class="fas fa-search"></i> --></button>
        </form>
    </div>
</div>
<div class="menu_mobile d-lg-none">
    <ul>
        <li>
            <a href="{{url('/')}}">Trang chủ</a>
        </li>
        @foreach($menu_ngang as $v)
            <li>
                <a href="{{url("danh-muc/$v->id/$v->type_menu/$v->slug.html")}}">{{$v->name}}</a>
                    <?php
                    $menucon1 = DB::table('cates')->where('parent_id', $v->id)->get()->toArray();
                    ?>
                <span></span>
                @if(count($menucon1) > 0)
                    @foreach($menucon1 as $v1)
                        <ul>
                            <li>
                                <a href="{{url("danh-muc/$v1->id/$v1->type_menu/$v1->slug.html")}}">+&nbsp;&nbsp;&nbsp; {{$v1->name}}</a>
                                <span></span>
                                    <?php
                                    $menucon2 = DB::table('cates')->where('parent_id', $v1->id)->get()->toArray();
                                    ?>
                                @if(count($menucon2)>0)
                                    <ul>
                                        @foreach($menucon2 as $v2)
                                            <li>
                                                <a href="{{url('danh-muc/$v2->id/$v2->slug.html')}}">+&nbsp;&nbsp;&nbsp; {{$v2->name}}</a>
                                            </li>
                                        @endforeach
                                    </ul>
                                @endif

                            </li>
                        </ul>
                    @endforeach
                @endif
            </li>
        @endforeach


        @if(Auth::user())
            <li>
                <a href="#" data-toggle="modal" data-target="#exampleModal">Xin chào {{Auth::user()->name}}</a>
            </li>
            <li>
                <a href="{{url('usermanager')}}">
                    Vào trang cá nhân
                </a>
            </li>
            <li>
                <a href="{{url('logoutuser')}}">
                    Đăng xuất
                </a>
            </li>
        @else
            <li>
                <a href="#" data-toggle="modal" data-target="#exampleModal">Đăng nhập</a>
            </li>
            <li>
                <a href="{{url('dang-ky.html')}}">Đăng ký</a>
            </li>
        @endif

        <li><strong
                style="text-transform: uppercase; color: #000; display: block; line-height: 32px; background: #ddd; padding: 0 15px;">Danh
                mục sản phẩm</strong></li>
        @foreach($menu_sp as $vsp_mobile)
            <li>
                <a href="{{url("danh-muc/$vsp_mobile->id/$vsp_mobile->type_menu/$vsp_mobile->slug.html")}}">{{$vsp_mobile->name}}</a>
                <span></span>
                    <?php
                    $menucon3 = DB::table('cates')->where('parent_id', $vsp_mobile->id)->get()->toArray();
                    ?>
                @if(count($menucon3)>0)
                    <ul>
                        @foreach($menucon3 as $v2)
                            <li>
                                <a href="{{url("danh-muc/$v2->id/$v2->slug.html")}}">+&nbsp;&nbsp;&nbsp;
                                    {{$v2->name}} </a>
                            </li>
                        @endforeach
                    </ul>
                @endif

            </li>
        @endforeach
    </ul>
</div>
{{--<div class="header d-none">--}}
{{--    <div class="container">--}}
{{--        <div class="row">--}}
{{--            <div class="col-6">--}}
{{--                <span><svg class="svg-inline--fa fa-phone fa-w-16" aria-hidden="true" data-prefix="fas"--}}
{{--                           data-icon="phone" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"--}}
{{--                           data-fa-i2svg=""><path fill="currentColor"--}}
{{--                                                  d="M493.397 24.615l-104-23.997c-11.314-2.611-22.879 3.252-27.456 13.931l-48 111.997a24 24 0 0 0 6.862 28.029l60.617 49.596c-35.973 76.675-98.938 140.508-177.249 177.248l-49.596-60.616a24 24 0 0 0-28.029-6.862l-111.997 48C3.873 366.516-1.994 378.08.618 389.397l23.997 104C27.109 504.204 36.748 512 48 512c256.087 0 464-207.532 464-464 0-11.176-7.714-20.873-18.603-23.385z"></path></svg>--}}
{{--                    <!-- <i class="fas fa-phone"></i> --> Hotline: <a href="#">{{$imfomation->hotline}}</a></span>--}}
{{--                <span><svg class="svg-inline--fa fa-envelope fa-w-16" aria-hidden="true" data-prefix="fa"--}}
{{--                           data-icon="envelope" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"--}}
{{--                           data-fa-i2svg=""><path fill="currentColor"--}}
{{--                                                  d="M502.3 190.8c3.9-3.1 9.7-.2 9.7 4.7V400c0 26.5-21.5 48-48 48H48c-26.5 0-48-21.5-48-48V195.6c0-5 5.7-7.8 9.7-4.7 22.4 17.4 52.1 39.5 154.1 113.6 21.1 15.4 56.7 47.8 92.2 47.6 35.7.3 72-32.8 92.3-47.6 102-74.1 131.6-96.3 154-113.7zM256 320c23.2.4 56.6-29.2 73.4-41.4 132.7-96.3 142.8-104.7 173.4-128.7 5.8-4.5 9.2-11.5 9.2-18.9v-19c0-26.5-21.5-48-48-48H48C21.5 64 0 85.5 0 112v19c0 7.4 3.4 14.3 9.2 18.9 30.6 23.9 40.7 32.4 173.4 128.7 16.8 12.2 50.2 41.8 73.4 41.4z"></path></svg>--}}
{{--                    <!-- <i class="fa fa-envelope"></i> --> Email: <a href="#">{{$imfomation->mail}}</a></span>--}}
{{--            </div>--}}
{{--            <div class="col-6 text-right">--}}
{{--                <a href="">--}}
{{--                    <svg class="svg-inline--fa fa-truck fa-w-20" aria-hidden="true" data-prefix="fas" data-icon="truck"--}}
{{--                         role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 512" data-fa-i2svg="">--}}
{{--                        <path fill="currentColor"--}}
{{--                              d="M592 0H272c-26.51 0-48 21.49-48 48v48h-44.118a48 48 0 0 0-33.941 14.059l-99.882 99.882A48 48 0 0 0 32 243.882V352h-8c-13.255 0-24 10.745-24 24v16c0 13.255 10.745 24 24 24h40c0 53.019 42.981 96 96 96s96-42.981 96-96h128c0 53.019 42.981 96 96 96s96-42.981 96-96h40c13.255 0 24-10.745 24-24V48c0-26.51-21.49-48-48-48zM160 464c-26.467 0-48-21.533-48-48s21.533-48 48-48 48 21.533 48 48-21.533 48-48 48zm64-208H80v-12.118L179.882 144H224v112zm256 208c-26.467 0-48-21.533-48-48s21.533-48 48-48 48 21.533 48 48-21.533 48-48 48z"></path>--}}
{{--                    </svg><!-- <i class="fas fa-truck"></i> --> Chính sách vận chuyển</a>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--</div>--}}
{{--<header class="d-none d-md-block">--}}
{{--    <div class="container">--}}
{{--        <div class="row">--}}
{{--            <div class="col-12 col-md-3 logo">--}}
{{--                <a href="{{url('/')}}"><img src="{{url('public/backend')}}/{{$imfomation->logo}}"--}}
{{--                                 alt=""></a>--}}
{{--            </div>--}}

{{--            <div class="col-12 col-md-3 info phone">--}}
{{--                <a href="tel:{{$imfomation->hotline}}"><b>Hotline:</b><br>{{$imfomation->hotline}}</a>--}}
{{--            </div>--}}

{{--            <div class="col-12 col-md-3 info email">--}}
{{--                <a href="mailto:{{$imfomation->mail}}"><b>Gmail:</b><br>{{$imfomation->mail}}</a>--}}
{{--            </div>--}}

{{--            <div class="col-12 col-md-3 info hotline">--}}
{{--                <a href="tel:{{$imfomation->hotline}}"><b>Hotline:</b><br>{{$imfomation->hotline}}</a>--}}
{{--            </div>--}}

{{--            <div class="col-12 col-md-5 search_menu d-none">--}}
{{--                <form action="/tim-kiem.html" method="GET">--}}
{{--                    <input type="text" name="txtkeyword"--}}
{{--                        placeholder="Từ khóa tìm kiếm..."--}}
{{--                        autocomplete="false">--}}
{{--                    <button type="submit">--}}
{{--                        <svg class="svg-inline--fa fa-search fa-w-16" aria-hidden="true" data-prefix="fas"--}}
{{--                             data-icon="search" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"--}}
{{--                             data-fa-i2svg="">--}}
{{--                            <path fill="currentColor"--}}
{{--                                  d="M505 442.7L405.3 343c-4.5-4.5-10.6-7-17-7H372c27.6-35.3 44-79.7 44-128C416 93.1 322.9 0 208 0S0 93.1 0 208s93.1 208 208 208c48.3 0 92.7-16.4 128-44v16.3c0 6.4 2.5 12.5 7 17l99.7 99.7c9.4 9.4 24.6 9.4 33.9 0l28.3-28.3c9.4-9.4 9.4-24.6.1-34zM208 336c-70.7 0-128-57.2-128-128 0-70.7 57.2-128 128-128 70.7 0 128 57.2 128 128 0 70.7-57.2 128-128 128z"></path>--}}
{{--                        </svg></button>--}}
{{--                </form>--}}
{{--                <div class="clearfix"></div>--}}
{{--            </div>--}}

{{--            <div class="col-12 col-md-3 offset-1 support_header d-none">--}}
{{--                <a href="">Hướng dẫn mua hàng</a>--}}
{{--                <a href="/gio-hang.html"><span>0</span></a>--}}
{{--            </div>--}}
{{--        </div>--}}

{{--        <div class="clearfix"></div>--}}
{{--    </div>--}}
{{--</header>--}}
