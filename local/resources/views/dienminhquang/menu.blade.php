<div class="menu d-none d-md-block">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12 main_menu">
                <ul>
                    <li>
                        <a href="{{url('/')}}">
                            <img width="200px" src="{{url('public/backend')}}/{{$imfomation->logo}}"
                                 alt="{{$imfomation->name}}"></a>
                    </li>
                    <li>
                        <a href="{{url('/')}}">Trang chủ</a>
                    </li>
                    @foreach($menu_ngang as $v)
                        <li>
                            <a href="{{url("danh-muc/$v->id/$v->type_menu/$v->slug.html")}}">{{$v->name}}</a>
                                <?php
                                $menucon1 = DB::table('cates')->where('parent_id', $v->id)->get()->toArray();
                                ?>
                            @if(count($menucon1) > 0)
                                <svg class="svg-inline--fa fa-caret-down fa-w-10" aria-hidden="true" data-prefix="fas"
                                     data-icon="caret-down" role="img" xmlns="http://www.w3.org/2000/svg"
                                     viewBox="0 0 320 512"
                                     data-fa-i2svg="">
                                    <path fill="currentColor"
                                          d="M31.3 192h257.3c17.8 0 26.7 21.5 14.1 34.1L174.1 354.8c-7.8 7.8-20.5 7.8-28.3 0L17.2 226.1C4.6 213.5 13.5 192 31.3 192z"></path>
                                </svg>
                            @endif
                            <div style="width: 280px">
                                <ul>
                                    @if(count($menucon1) > 0)
                                        @foreach($menucon1 as $v1)
                                            <li>
                                                <a href="{{url("danh-muc/$v1->id/$v1->type_menu/$v1->slug.html")}}">
                                                    {{$v1->name}}
                                                    <svg class="svg-inline--fa fa-chevron-right fa-w-10"
                                                         aria-hidden="true"
                                                         data-prefix="fas" data-icon="chevron-right" role="img"
                                                         xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512"
                                                         data-fa-i2svg="">
                                                        <path fill="currentColor"
                                                              d="M285.476 272.971L91.132 467.314c-9.373 9.373-24.569 9.373-33.941 0l-22.667-22.667c-9.357-9.357-9.375-24.522-.04-33.901L188.505 256 34.484 101.255c-9.335-9.379-9.317-24.544.04-33.901l22.667-22.667c9.373-9.373 24.569-9.373 33.941 0L285.475 239.03c9.373 9.372 9.373 24.568.001 33.941z"></path>
                                                    </svg>
                                                </a>
                                                    <?php
                                                    $menucon2 = DB::table('cates')->where('parent_id', $v1->id)->get()->toArray();
                                                    ?>
                                                @if(count($menucon2)>0)
                                                    <ul>
                                                        @foreach($menucon2 as $v2)
                                                            <li>
                                                                <a href="{{url("danh-muc/$v2->id/$v2->slug.html")}}">
                                                                    {{$v2->name}} </a>
                                                            </li>
                                                        @endforeach
                                                    </ul>
                                                @endif

                                            </li>

                                        @endforeach
                                    @endif

                                </ul>
                            </div>
                        </li>
                    @endforeach


                    @if(Auth::user())
                        <li>
                            <a href="#" data-toggle="modal" data-target="#exampleModal">Xin
                                chào {{Auth::user()->name}}</a>
                            <div style="width: 280px">
                                <ul>

                                    <li>
                                        <a href="{{url('usermanager')}}">
                                            Vào trang cá nhân
                                            <svg class="svg-inline--fa fa-chevron-right fa-w-10" aria-hidden="true"
                                                 data-prefix="fas" data-icon="chevron-right" role="img"
                                                 xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512"
                                                 data-fa-i2svg="">
                                                <path fill="currentColor"
                                                      d="M285.476 272.971L91.132 467.314c-9.373 9.373-24.569 9.373-33.941 0l-22.667-22.667c-9.357-9.357-9.375-24.522-.04-33.901L188.505 256 34.484 101.255c-9.335-9.379-9.317-24.544.04-33.901l22.667-22.667c9.373-9.373 24.569-9.373 33.941 0L285.475 239.03c9.373 9.372 9.373 24.568.001 33.941z"></path>
                                            </svg>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{url('logoutuser')}}">
                                            Đăng xuất
                                            <svg class="svg-inline--fa fa-chevron-right fa-w-10" aria-hidden="true"
                                                 data-prefix="fas" data-icon="chevron-right" role="img"
                                                 xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512"
                                                 data-fa-i2svg="">
                                                <path fill="currentColor"
                                                      d="M285.476 272.971L91.132 467.314c-9.373 9.373-24.569 9.373-33.941 0l-22.667-22.667c-9.357-9.357-9.375-24.522-.04-33.901L188.505 256 34.484 101.255c-9.335-9.379-9.317-24.544.04-33.901l22.667-22.667c9.373-9.373 24.569-9.373 33.941 0L285.475 239.03c9.373 9.372 9.373 24.568.001 33.941z"></path>
                                            </svg>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                    @else
                        <li>
                            <a href="#" data-toggle="modal" data-target="#exampleModal">Đăng nhập</a>
                        </li>
                    @endif

                    <li>
                        <a href="{{url('dang-ky.html')}}">Đăng ký</a>
                    </li>
                    <li>
                        <form action="{{route('searchProduct')}}" method="get">
                            <input type="text" name="txtkeyword" placeholder="Tìm kiếm sản phẩm..."
                                   style="padding: 8px;border-radius: 4px;border: none;">
                            <button class="btn btn-warning">Tìm kiếm</button>
                        </form>

                    </li>
                </ul>
            </div>

        </div>
    </div>
</div>
