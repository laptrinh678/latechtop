<!-- Begin footer -->
<footer>
    <!-- Begin container-vina -->
    <div class="container">
        <div class="row no-gutters contact_footer">
            <div class="col-12 col-md-4">
                <p class="address">{{$imfomation->adress}}</p>
            </div>
            <div class="col-12 col-md-4">
                <p class="phone">{{$imfomation->hotline}}</p>
            </div>
            <div class="col-12 col-md-4">
                <p class="email">{{$imfomation->mail}}</p>
            </div>
        </div>

        <div class="row">
            <div class="col-12 col-md-6 menu_footer footer_i">
                <p class="title">Danh mục sản phẩm</p>
                <ul>
                    @if($menu_sp_footer)
                    @foreach($menu_sp_footer as $vdm)
                    <li>
                        <a href="{{url("danh-muc/$vdm->id/$vdm->type_menu/$vdm->slug.html")}}">{{$vdm->name}}</a>
                    </li>
                    @endforeach
                   @endif
                </ul>
            </div>
            <div class="col-12 col-md-6 menu_footer footer_i">
                <p class="title">Danh mục tin tức</p>
                <ul>
                    @if($menu_new)
                        @foreach($menu_new as $vdm)
                            <li>
                                <a href="{{url("danh-muc/$vdm->id/$vdm->type_menu/$vdm->slug.html")}}">{{$vdm->name}}</a>
                            </li>
                        @endforeach
                    @endif
                </ul>
            </div>

        </div>

        <div class="row bottom_page">
            <div class="left col-10 col-md-6">
                <p>Bản quyền thuộc về {{$imfomation->name}}
                </p>
            </div>

            <div class="right col-2 col-md-6 go-top">
                <a href="#">
                    <svg class="svg-inline--fa fa-arrow-up fa-w-14" aria-hidden="true" data-prefix="fa"
                         data-icon="arrow-up" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"
                         data-fa-i2svg="">
                        <path fill="currentColor"
                              d="M34.9 289.5l-22.2-22.2c-9.4-9.4-9.4-24.6 0-33.9L207 39c9.4-9.4 24.6-9.4 33.9 0l194.3 194.3c9.4 9.4 9.4 24.6 0 33.9L413 289.4c-9.5 9.5-25 9.3-34.3-.4L264 168.6V456c0 13.3-10.7 24-24 24h-32c-13.3 0-24-10.7-24-24V168.6L69.2 289.1c-9.3 9.8-24.8 10-34.3.4z"></path>
                    </svg><!-- <i class="fa fa-arrow-up"></i> --></a>
            </div>

        </div>

        <div class="row zalocall">
            <a href="https://zalo.me/{{$imfomation->hotline}}"></a>
        </div>

    </div>
    <!-- End container-vina -->
</footer>
<!-- end footer -->
