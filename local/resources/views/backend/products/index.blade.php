@extends('backend.master.index')
@section('title')
    Danh sách sản phẩm
@endsection('title')
@section('style')
{{--    <link href="css/app.css" rel="stylesheet" type="text/css"/>--}}
{{--    <link rel="stylesheet" type="text/css" href="vendors/datatables/css/dataTables.bootstrap.css"/>--}}
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
                <a href="{{url('admin/products/index')}}">{{ __('pages.product.name') }}</a>

                <a href="{{url('admin/products/create')}}">
                    <i class="fa fa-fw fa-angle-double-right"></i> Danh sách
                </a>
            </div>
        </section>
        <!-- Main content -->
        <section class="content padding left_right15">
            <div class="row">
                <div class="panel panel-primary">
                <div class="panel-heading">
                    <h4 class="panel-title">

                        <a href="{{url('admin/products/create')}}">
                            <i class="fa fa-fw fa-angle-double-right"></i> {{ __('message.add') }} sản phẩm
                        </a>
                        <a href="{{url('admin/cates/')}}">
                            <i class="fa fa-fw fa-angle-double-right"></i>Danh mục
                        </a>
                    </h4>
                </div>
                <br/>
                <div class="panel-body">
                    <table class="table table-bordered " id="table">
                        @include('errors.note')
                        <thead>
                        <tr class="filters">
                            <th style="width:5px;">Id</th>
                            <th style="width: 30%">Tên sản phẩm</th>
                            <th>Link Dowload/Lượt xem</th>
                            <th>Ảnh</th>
                            <th>Danh mục cha</th>
                            <th>Trạng thái</th>
                            <th>Hành động</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($data as $k=>$v)
                            <tr>
                                <td>{{$v->id}}</td>
                                <td style="width: 30%">
                                    <a href="{{url("chi-tiet-san-pham/$v->id/$v->slug.html")}}" target="_blank" rel="noopener noreferrer">{{$v->name}}</a>
                                    <p>
                                        Giá: {{number_format($v->price )}} Mã : {{$v->product_code}}
                                    </p>
                                    <p><button idproduct="{{ $v->id }}" nameProduct="{{ $v->name }}" class="btn btn-success showPopUpSendEmail" data-toggle="modal" data-target="#sendEmailCustomer">Gửi email</button></p>
                                </td>
                                <td>
                                    @if($v->link != null)
                                    <a href="{{ $v->link }}" target="_blank" rel="noopener noreferrer">Link</a>
                                    @endif
                                    <br>
                                    Lượt xem: {{ $v->view }}
                                    <p>Điểm: {{ $v->point }}</p>
                                </td>
                                <td>
                                    <p>Ảnh sản phẩm:
                                        @if($v->icon)
                                            <img src="{{url('public/backend/')}}/{{$v->icon}}" width='30px' height='40'
                                                 alt="">
                                        @endif
                                    </p>
                                        <?php
                                        $img = $v->img;
                                        $img_decode = json_decode($img, true);
                                        ?>
                                    @if($img_decode)

                                        @foreach($img_decode as $val)
                                            <img src="{{url('public/backend/')}}/{{$val}}" width='30px' height='40'
                                                 alt="">
                                        @endforeach
                                    @endif
                                </td>
                                
                                <td>
                                    @if($v->cate_id != '')
                                            <?php
                                            $data = getCateName($v->cate_id, 1);
                                            if ($data) {
                                                echo $data['name'];
                                                echo '-';
                                                echo $data['id'];
                                            }
                                            ?>
                                    @endif
                                </td>

                                <td>
                                    @if($v->deleted_at =='')
                                        <button class="btn btn-success changeStatus" data="1" id="{{$v->id}}">ON
                                        </button>
                                    @else
                                        <button class="btn btn-danger changeStatus" data="" id="{{$v->id}}">OFF</button>
                                    @endif
                                </td>

                                <td>
                                    <a href="{{url('admin/products/destroy')}}/{{$v->id}}">
                                        <button class="btn btn-danger">Delete</button>
                                    </a>
                                    <a href="{{url('admin/products/edit')}}/{{$v->id}}">
                                        <button class="btn btn-primary">Edit</button>
                                    </a>
                                </td>
                            </tr>
                        @endforeach

                        </tbody>
                    </table>
                    <!-- Modal for showing delete confirmation -->
                </div>
            </div>
            </div>
            <!-- row-->
        </section>
        <input type="hidden" value="{{url('')}}" id="url">
    </aside>
    <div id="sendEmailCustomer" class="modal fade" role="dialog">
        <div class="modal-dialog">
      
          <!-- Modal content-->
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <h4 class="modal-title">Gửi link dowload tài liệu</h4>
            </div>
            <div class="modal-body">
              <form action="" method="post" id="sendMailProduct">
                  <div class="form-group">
                      <label for="email">Tên sản phẩm</label>
                      <input type="text" name="name" class="form-control" id="productName" readonly>
                    </div>
                  <div class="form-group">
                    <label for="email">Email address:</label>
                    <input type="email" name="email" class="form-control" id="email" required>
                    <input type="hidden" class="form-control" name="product_id" id="productId">
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
    <script type="text/javascript" src="vendors/datatables/js/jquery.dataTables2.js"></script>
    <script type="text/javascript" src="vendors/datatables/js/dataTables.bootstrap.js"></script>
    <script>
        $(document).ready(function () {
            $('#table').dataTable();
            $('body').on('click', '.changeStatus', function () {
                let data = $(this).attr('data');
                let url = $('#url').val();
                let id = $(this).attr('id');
                let val = '';
                if (data != '') {
                    val = 1;
                } else {
                    val = 0;
                }
                var thiss = $(this);
                $.get(url + '/admin/products/changeStatus/' + val + '/' + id, function (data) {
                    thiss.parent().html(data);
                })
            })
            $('.showPopUpSendEmail').click(function(){
            let idproduct = $(this).attr('idproduct');
            let nameProduct = $(this).attr('nameProduct');
            $('#productName').val(nameProduct);
            $('#productId').val(idproduct);
            $('#dataSendEmail').text('gửi bạn link dowload tài liệu: ' + nameProduct + ' .Bạn Click vào link bên dưới để dowload nhé');
        })
        $("#sendMailProduct").submit(function(e) {
            event.preventDefault();
            let urlData = $('#url').val() + '/admin/sendEmailProduct';
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

