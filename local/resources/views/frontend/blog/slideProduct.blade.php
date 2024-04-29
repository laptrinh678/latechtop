<div class="row product_page">
    <div class="col-12 col-sm-5 left_p">
        <div class="w-100">
            <a class="detail_image_data"
               data-toggle="modal"
               data-target=".bd-example-modal-lg"
               href="javascript:void(0)"
            >
            <img class="imgData" width="100%" src="{{url('public/backend/')}}/{{$sp->icon}}" alt="">
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
            @if($value>0)
                @foreach($imgdetail_decode as $v)
            <li>
                <a class="detail_image_data"
                   data-toggle="modal"
                   data-target=".bd-example-modal-lg"
                   href="javascript:void(0)"
                   >
                    <img class="imgData" src="{{url('public/backend/')}}/{{$v}}" alt="{{$v}}"
                         title="{{$v}}">
                </a>

            </li>
                @endforeach
            @endif
        </ul>
    </div>
    <div class="col-12 col-sm-7">

        <!--begin brief_product-->
        <div class="brief_ppage">
            <h1><span>Tên sản phẩm</span><i>:</i>{{$sp->name}}</h1>
            <div class="price_pp">
                <strong>Liên hệ</strong>
                <span>Xem: 195</span>
                <span><strong style="color: #d72b77; font-weight: 600;">Còn hàng</strong></span>
                <div class="clearfix"></div>
            </div>
            <p><span>Giá sản phẩm</span><i>:</i><strong>{{number_format($sp->price)}}</strong>
            <p><span>Số điểm tích luỹ </span><i>:</i> <span class="text-red">@if($sp->point)
                        {{$sp->point}}
                    @endif</span></p>
            </p>
            <p><span>Mô tả</span></p>
            <div class="desc_ppage">
                {!! $sp->des!!}
            </div>

            @if(Auth::user())
                <form class="row no-gutters" action="{{url("cart/add/$sp->id")}}" method="GET">
                    <input type="hidden" value="876" name="product_cart">
                    <div class="col-3 input_cart">
                        <input type="number" name="quantity_cart" value="1" min="1" max="10">
                    </div>
                    <div class="col-4 button_cart">
                        <button type="submit" name="btn_order"><strong>MUA NGAY</strong>
                            <p>Giao hàng tận nơi</p>
                        </button>
                    </div>
                    <div class="col-5">
                        <button type="submit" name="btn_order" class="hotline_cart">
                            <span>THÊM VÀO GIỎ HÀNG</span>
                            <p>Giao hàng tận nơi</p>

                        </button>

                    </div>
                </form>
            @endif
        </div>
        <!--end brief_product-->

    </div>

</div>