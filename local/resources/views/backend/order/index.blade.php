@extends('backend.master.index')
@section('title')
    Danh sách đơn hàng
@endsection('title')
@section('style')
    <link href="css/app.css" rel="stylesheet" type="text/css"/>
    <link rel="stylesheet" type="text/css" href="vendors/datatables/css/dataTables.bootstrap.css"/>
    <link href="css/pages/tables.css" rel="stylesheet" type="text/css"/>
    <style>
        .alertNotification2 {
            background: #4ebf4e;
            color: white;
            margin-top: 50px;
            border-radius: 4px;
            width: 20%;
            padding-top: 10px;
            float: right;
            margin-bottom: 20px;
            position: absolute;
            right: 0px;
            top: 3px;
            text-align: center;
        }
    </style>
@endsection('style')
@section('content')
    <aside class="right-side strech" id="sideright">

        <!-- Content Header (Page header) -->
        <section class="content-header list_user">
            <div>
                <a href="{{url('admin/')}}">
                    <i class="livicon" data-name="home" data-size="14" data-color="#000"></i> Trang chủ
                    <i class="fa fa-fw fa-angle-double-right"></i>
                </a>
                <a href="{{url('admin/products/index')}}">Order</a>

                <a href="{{url('admin/products/create')}}">
                    <i class="fa fa-fw fa-angle-double-right"></i> Danh sách đơn hàng
                </a>
            </div>
        </section>
        <!-- Main content -->
        <section class="content padding left_right15">
            <div class="row">

                <div class="panel panel-primary ">

                    <div class="panel-body">
                        <ul class="nav nav-tabs">
                            <li class="active"><a data-toggle="tab" href="#day">Đơn hàng trong ngày</a></li>
                            <li><a data-toggle="tab" href="#mouth">Đơn hàng trong tháng</a></li>
                            <li><a data-toggle="tab" href="#all">Tất cả đơn hàng </a></li>
                        </ul>
                        <br>
                        <div class="tab-content">
                            <div id="day" class="tab-pane fade in active">
                                <table class="table table-bordered " id="table">
                                    @include('errors.note')
                                    <thead>
                                    <tr class="filters">
                                        <th style="width:20px;">id</th>
                                        <th>Người mua</th>
                                        <th style="width:700px">Thông tin đơn hàng</th>
                                        <th>Ngày đặt hàng</th>
                                        <th>Trạng thái đơn hàng</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($data as $k=>$v)
                                        @if($v->created_at>=$currentTime)
                                        <tr>
                                            <td>{{$v->id}}</td>
                                            <td>
                                                    <?php
                                                    $customerImfo = json_decode($v->infor, true);
                                                    ?>
                                                @if( $customerImfo)
                                                    <p>Tên người mua:  {{$customerImfo['customer']}}</p>
                                                    <p>Số điện thoại:  {{$customerImfo['mobile']}}</p>
                                                    <p>Email:  {{$customerImfo['email']}}</p>
                                                    <p>Địa chỉ:  {{$customerImfo['adress']}}</p>
                                                @endif
                                                <p><button class="btn btn-success">Gửi email tài liệu</button></p>
                                            </td>
                                            <td style="width:700px">
                                                    <?php
                                                    $dataDonhang = json_decode($v->data, true);
                                                    ?>
                                                @if( $dataDonhang)
                                                    @foreach($dataDonhang as $v1)
                                                        <p>
                                                            - {{$v1['name']}} - Giá :{{number_format($v1['price'])}}  - Số lượng
                                                            : {{$v1['qty']}}
                                                        </p>
                                                    @endforeach
                                                    <p>Tổng tiền: {{$v->total}}</p>
                                                @endif
                                              
                                            </td>
                                            <td>
                                                {{ $v->created_at->format('d-m-Y h:m')}}
                                            </td>
                                            <td>
                                                @if($v->pay==1)
                                                    <button class="btn btn-success changeStatus" status="{{$v->pay}}"
                                                            id="{{$v->id}}">Đã giao hàng và thanh toán
                                                    </button>
                                                @else
                                                    <button class="btn btn-danger changeStatus" status="{{$v->pay}}"
                                                            id="{{$v->id}}"
                                                    >Chưa giao hàng và thanh toán
                                                    </button>
                                                @endif
                                            </td>
                                        </tr>
                                        @endif
                                    @endforeach
                                    </tbody>
                                </table>
                                <div class="text-center">{{ $data->links() }} </div>
                            </div>
                            <div id="mouth" class="tab-pane fade">
                                <table class="table table-bordered " id="table2">
                                    @include('errors.note')
                                    <thead>
                                    <tr class="filters">
                                        <th style="width:20px;">id</th>
                                        <th>Người mua</th>
                                        <th style="width:700px">Thông tin đơn hàng</th>
                                        <th>Ngày đặt hàng</th>
                                        <th>Trạng thái đơn hàng</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($data as $k=>$v)
                                        @if($v->created_at>=$currentMonth)
                                        <tr>
                                            <td>{{$v->id}}</td>
                                            <td>
                                                    <?php
                                                    $customerImfo = json_decode($v->infor, true);
                                                    ?>
                                                @if( $customerImfo)
                                                    <p>Tên người mua:  {{$customerImfo['customer']}}</p>
                                                    <p>Số điện thoại:  {{$customerImfo['mobile']}}</p>
                                                    <p>Email:  {{$customerImfo['email']}}</p>
                                                    <p>Địa chỉ:  {{$customerImfo['adress']}}</p>
                                                @endif
                                            </td>
                                            <td style="width:700px">
                                                    <?php
                                                    $dataDonhang = json_decode($v->data, true);
                                                    ?>
                                                @if( $dataDonhang)
                                                    @foreach($dataDonhang as $v1)
                                                        <p>
                                                            - {{$v1['name']}} - Giá :{{number_format($v1['price'])}}  - Số lượng
                                                            : {{$v1['qty']}}
                                                        </p>
                                                    @endforeach
                                                    <p>Tổng tiền: {{$v->total}}</p>
                                                @endif
                                            </td>
                                            <td>
                                                {{ $v->created_at->format('d-m-Y h:m')}}
                                            </td>
                                            <td>
                                                @if($v->pay==1)
                                                    <button class="btn btn-success changeStatus" status="{{$v->pay}}"
                                                            id="{{$v->id}}">Đã giao hàng và thanh toán
                                                    </button>
                                                @else
                                                    <button class="btn btn-danger changeStatus" status="{{$v->pay}}"
                                                            id="{{$v->id}}"
                                                    >Chưa giao hàng và thanh toán
                                                    </button>
                                                @endif
                                            </td>
                                        </tr>
                                        @endif
                                    @endforeach

                                    </tbody>
                                </table>
                                <div class="text-center">{{ $data->links() }} </div>
                            </div>
                            <div id="all" class="tab-pane fade">
                                <table class="table table-bordered " id="table2">
                                    @include('errors.note')
                                    <thead>
                                    <tr class="filters">
                                        <th style="width:20px;">id</th>
                                        <th>Người mua</th>
                                        <th style="width:700px">Thông tin đơn hàng</th>
                                        <th>Ngày đặt hàng</th>
                                        <th>Trạng thái đơn hàng</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($data as $k=>$v)
                                            <tr>
                                                <td>{{$v->id}}</td>
                                                <td>
                                                        <?php
                                                        $customerImfo = json_decode($v->infor, true);
                                                        ?>
                                                    @if( $customerImfo)
                                                        <p>Tên người mua:  {{$customerImfo['customer']}}</p>
                                                        <p>Số điện thoại:  {{$customerImfo['mobile']}}</p>
                                                        <p>Email:  {{$customerImfo['email']}}</p>
                                                        <p>Địa chỉ:  {{$customerImfo['adress']}}</p>
                                                    @endif
                                                   
                                                </td>
                                                <td style="width:700px">
                                                        <?php
                                                        $dataDonhang = json_decode($v->data, true);
                                                        $dataSendMail = null;
                                                        ?>
                                                    @if( $dataDonhang)
                                                        @foreach($dataDonhang as $v1)
                                                            <p>
                                                                - {{$v1['name']}} - Giá :{{number_format($v1['price'])}}  - Số lượng
                                                                : {{$v1['qty']}}
                                                                <?php 
                                                                $dataSendMail['product_id'] = $v1['id']; 
                                                                $dataSendMail['name'] = $v1['name']; 
                                                                ?>
                                                            </p>
                                                        @endforeach
                                                        <p>Tổng tiền: {{$v->total}}</p>
                                                    @endif
                                                    <?php $dataItem = json_encode($dataSendMail); ?>
                                                    <p><button class="btn btn-success showPopUpSendEmail" dataCustomer="{{$v->infor}}" productData="@if($dataItem) {{ $dataItem }}@endif" data-toggle="modal" data-target="#myModal">Gửi email tài liệu</button></p>
                                                </td>
                                                <td>
                                                    {{ $v->created_at->format('d-m-Y h:m')}}
                                                </td>
                                                <td>
                                                    @if($v->pay==1)
                                                        <button class="btn btn-success changeStatus" status="{{$v->pay}}"
                                                                id="{{$v->id}}">Đã giao hàng và thanh toán
                                                        </button>
                                                    @else
                                                        <button class="btn btn-danger changeStatus" status="{{$v->pay}}"
                                                                id="{{$v->id}}"
                                                        >Chưa giao hàng và thanh toán
                                                        </button>
                                                    @endif
                                                </td>
                                            </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                                <div class="text-center">{{ $data->links() }} </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- row-->
        </section>
        <input type="hidden" value="{{url('')}}" id="url">
    </aside>
    <!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
    <div class="modal-dialog">
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Email gửi hàng</h4>
        </div>
        <div class="modal-body">
          <form action="" method="post" id="sendMailHistoryShop">
              <div class="form-group">
                  <label for="email">Tên sản phẩm</label>
                  <input type="text" name="name" class="form-control" id="productName">
                </div>
              <div class="form-group">
                <label for="email">Email address:</label>
                <input type="email" name="email" class="form-control" id="email">
                <input type="hidden" class="form-control" name="product_id" id="productId">
                <input type="hidden" class="form-control" name="pro_slug" id="slugProduct">
              </div>
              <div class="form-group">
                  <label for="email">Tên khách hàng</label>
                  <input type="text" name="userName" class="form-control" id="userName">
                </div>
              <div class="form-group">
                <label for="pwd">Nội dung bài viết:</label>
                <textarea class="form-control" name="text" cols="30" rows="5" id="dataSendEmail"></textarea>
              </div>
              {{ csrf_field() }}
              <button type="submit" class="btn btn-success">Gửi Email</button>
            </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
  
    </div>
  </div>
@endsection('content')
@section('script')
    <script src="js/app.js" type="text/javascript"></script>
    <!-- end of global js -->
    <!-- begining of page level js -->
    <script>
        $(document).ready(function () {
            $('body').on('click', '.changeStatus', function () {
                let status = $(this).attr('status');
                let url = $('#url').val();
                let id = $(this).attr('id');
                var thiss = $(this);
                $.get(url + '/admin/order/changeStatus/' + status + '/' + id, function (data) {
                    thiss.parent().html(data);
                })
            })
            $('body').on('click','.showPopUpSendEmail', function(){
                let productData = JSON.parse($(this).attr('productdata'));
                let userData = JSON.parse($(this).attr('datacustomer'));
                let idproduct = productData.product_id
                let userEmail = userData.email
                let nameProduct = productData.name
                let nameUser = userData.customer
                $('#productId').val(idproduct);
                $('#email').val(userEmail);
                $('#productName').val(nameProduct);
                $('#userName').val(nameUser);
                $('#slugProduct').val(slugProduct);
                $('#dataSendEmail').text('Tuyendungcongchuc247.com gửi ' + nameUser + ' tài liệu ' + nameProduct + ' bạn click vào link dowload bên dưới để tải tài liệu về nhé');
            })
            $("#sendMailHistoryShop").submit(function(e) {
            event.preventDefault();
            let urlData = $('#url').val() + '/admin/history/sendEmailDowload';
            $.ajax({
                url: urlData,
                method: "POST",
                data: new FormData(this),
                contentType: false,
                cache: false,
                processData: false,
                success: function (data) {
                    if(data==true)
                       {
                            $('#myModal').hide();
                            $('.modal-backdrop').hide();
                           alert('Gửi email thành công')
                       }else
                       {
                            alert('lỗi gửi Email Bạn vui lòng thử lại')
                       }
                }
            })
        });
          
        });
    </script>
@endsection('script')

