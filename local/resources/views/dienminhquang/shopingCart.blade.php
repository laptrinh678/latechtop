@extends('dienminhquang.index')
@section('title')
    cart
@endsection
@section('style')
@endsection('style')
@section('content')
    <div class="navbar-vina">
        <div class="container">
            <a href="/">
                <svg class="svg-inline--fa fa-home fa-w-18" aria-hidden="true" data-prefix="fa" data-icon="home"
                     role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512" data-fa-i2svg="">
                    <path fill="currentColor"
                          d="M488 312.7V456c0 13.3-10.7 24-24 24H348c-6.6 0-12-5.4-12-12V356c0-6.6-5.4-12-12-12h-72c-6.6 0-12 5.4-12 12v112c0 6.6-5.4 12-12 12H112c-13.3 0-24-10.7-24-24V312.7c0-3.6 1.6-7 4.4-9.3l188-154.8c4.4-3.6 10.8-3.6 15.3 0l188 154.8c2.7 2.3 4.3 5.7 4.3 9.3zm83.6-60.9L488 182.9V44.4c0-6.6-5.4-12-12-12h-56c-6.6 0-12 5.4-12 12V117l-89.5-73.7c-17.7-14.6-43.3-14.6-61 0L4.4 251.8c-5.1 4.2-5.8 11.8-1.6 16.9l25.5 31c4.2 5.1 11.8 5.8 16.9 1.6l235.2-193.7c4.4-3.6 10.8-3.6 15.3 0l235.2 193.7c5.1 4.2 12.7 3.5 16.9-1.6l25.5-31c4.2-5.2 3.4-12.7-1.7-16.9z"></path>
                </svg><!-- <i class="fa fa-home"></i> -->Trang chủ</a><a href="/gio-hang.html">Đơn hàng của bạn</a>
        </div>
    </div>
    <div class="subpage">
        <div class="container">

            <!--begin shop_page-->
            <div class="shop_page">
                <form id="order-form" action="" method="post">
                <div class="row no-gutters">
                    <div class="col-12 col-md-8 item info-cart">
                        <p><strong>1.</strong> Thông tin đơn hàng</p>
                        <div>
                            <div class="table-cart">
                                <table>
                                    <tbody>
                                    <tr>
                                        <th>Ảnh</th>
                                        <th>Tên sản phẩm</th>
                                        <th>Đơn giá</th>
                                        <th>S.Lượng</th>
                                        <th>Xóa</th>
                                    </tr>
                                    @foreach($data as $v)
                                        <tr class="_record">
                                            <td class="img-cart">
                                                <a href="">
                                                    <img src="{{url('public/backend')}}/{{$v->options->img}}"
                                                         alt="{{$v->name}}">
                                                </a>
                                            </td>
                                                <?php
                                                $cate_id = $v->options->cate_id;
                                                $slug = $v->options->slug;
                                                ?>
                                            <td class="name-cart">
                                                @if($cate_id =='' || $slug =='')
                                                    <a href="{{url("san-pham/1/1.html")}}">
                                                        {{$v->name}}
                                                    </a>
                                                @else
                                                    <a href="{{url("san-pham/$cate_id/$slug.html")}}">
                                                        {{$v->name}}
                                                    </a>
                                                @endif
                                            </td>
                                            <td class="price-cart">
                                                {{number_format($v->price * $v->qty)}}
                                            </td>
                                            <td class="text-center">
                                                {{$v->qty  }}
                                            </td>
                                            <td class="rm-cart text-center">
                                                <a href="{{url('cart/delete')}}/{{$v->rowId}}">x</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>

                            <div class="nav-cart">
                                <a class="delete-vinacart" href="{{url('cart/delete/all')}}">
                                    <svg class="svg-inline--fa fa-trash-alt fa-w-14" aria-hidden="true"
                                         data-prefix="far" data-icon="trash-alt" role="img"
                                         xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" data-fa-i2svg="">
                                        <path fill="currentColor"
                                              d="M192 188v216c0 6.627-5.373 12-12 12h-24c-6.627 0-12-5.373-12-12V188c0-6.627 5.373-12 12-12h24c6.627 0 12 5.373 12 12zm100-12h-24c-6.627 0-12 5.373-12 12v216c0 6.627 5.373 12 12 12h24c6.627 0 12-5.373 12-12V188c0-6.627-5.373-12-12-12zm132-96c13.255 0 24 10.745 24 24v12c0 6.627-5.373 12-12 12h-20v336c0 26.51-21.49 48-48 48H80c-26.51 0-48-21.49-48-48V128H12c-6.627 0-12-5.373-12-12v-12c0-13.255 10.745-24 24-24h74.411l34.018-56.696A48 48 0 0 1 173.589 0h100.823a48 48 0 0 1 41.16 23.304L349.589 80H424zm-269.611 0h139.223L276.16 50.913A6 6 0 0 0 271.015 48h-94.028a6 6 0 0 0-5.145 2.913L154.389 80zM368 128H80v330a6 6 0 0 0 6 6h276a6 6 0 0 0 6-6V128z"></path>
                                    </svg><!-- <i class="far fa-trash-alt"></i> --> Xóa đơn hàng
                                </a>
                                <p>Tổng tiền đơn hàng:{{$total}} <span style="color: #f00;">(cộng 10% VAT)</span></p>
                            </div>
                        </div>
                    </div>

                    <div class="col-12 col-md-4 item contact-cart">
                        <p><strong>2.</strong> Địa chỉ giao hàng</p>
                        <div>

                                <dl>
                                    <dt>Tên khách hàng/công ty <span>*</span></dt>
                                    <dd>
                                        <input name="customer" required id="OrderForm_name" type="text">
                                    </dd>
                                </dl>
                                <dl>
                                    <dt>Số điện thoại <span>*</span></dt>
                                    <dd>
                                        <input name="mobile" required id="OrderForm_mobile" type="text"></dd>
                                </dl>

                                <dl>
                                    <dt>Email <span>*</span></dt>
                                    <dd>
                                        <input name="email" required id="OrderForm_email" type="email"></dd>
                                </dl>

                                <dl>
                                    <dt>Địa chỉ nhận hàng <span>*</span></dt>
                                    <dd>
                                        <input name="adress" required id="OrderForm_address" type="text"></dd>
                                </dl>

                                <dl>
                                    <dt>Yêu cầu thêm</dt>
                                    <dd>
                                        <textarea name="note" id="OrderForm_body"></textarea>
                                    </dd>
                                </dl>

                                <dl>
                                    <dt></dt>
                                    <dd>
                                        <button type="submit">
                                            <svg class="svg-inline--fa fa-shopping-basket fa-w-18" aria-hidden="true"
                                                 data-prefix="fa" data-icon="shopping-basket" role="img"
                                                 xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512"
                                                 data-fa-i2svg="">
                                                <path fill="currentColor"
                                                      d="M576 216v16c0 13.255-10.745 24-24 24h-8l-26.113 182.788C514.509 462.435 494.257 480 470.37 480H105.63c-23.887 0-44.139-17.565-47.518-41.212L32 256h-8c-13.255 0-24-10.745-24-24v-16c0-13.255 10.745-24 24-24h67.341l106.78-146.821c10.395-14.292 30.407-17.453 44.701-7.058 14.293 10.395 17.453 30.408 7.058 44.701L170.477 192h235.046L326.12 82.821c-10.395-14.292-7.234-34.306 7.059-44.701 14.291-10.395 34.306-7.235 44.701 7.058L484.659 192H552c13.255 0 24 10.745 24 24zM312 392V280c0-13.255-10.745-24-24-24s-24 10.745-24 24v112c0 13.255 10.745 24 24 24s24-10.745 24-24zm112 0V280c0-13.255-10.745-24-24-24s-24 10.745-24 24v112c0 13.255 10.745 24 24 24s24-10.745 24-24zm-224 0V280c0-13.255-10.745-24-24-24s-24 10.745-24 24v112c0 13.255 10.745 24 24 24s24-10.745 24-24z"></path>
                                            </svg><!-- <i class="fa fa-shopping-basket"></i> --> GỬI ĐƠN HÀNG
                                        </button>
                                    </dd>
                                </dl>


                        </div>
                    </div>
                </div>
                {{csrf_field()}}
                </form>
            </div>
            <!--end shop_page-->

        </div>
    </div>
    @if (Session::has('add_success'))
        <div class="modal" tabindex="-1" role="dialog" style="display:block">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h3 class="modal-title">Đặt hàng thành công</h3>

                    </div>
                    <div class="modal-body">
                        <p>Chúc mừng bạn đã đặt hàng thành công bạn hãy nhấn ok để quay lại trang chủ</p>
                    </div>
                    <div class="modal-footer">
                        <a href="{{url('')}}">
                            <button type="button" class="btn btn-success">OK</button>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    @endif
@endsection('content')
