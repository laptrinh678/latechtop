@extends('backend.master.index')
@section('title')
    Danh sách sản phẩm
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
                                <th style="width:20px;">Id</th>
                                <th>Tên sản phẩm</th>
                                <th style="width: 5px !important;">Đơn vị</th>
                                <th style="width: 10px;">Tồn kỳ trước</th>
                                <th style="width: 10px;">Nhập trong tháng</th>
                                <th style="width: 10px;">Đã bán</th>
                                <th>Giá</th>
                                <th>Thành tiền</th>
                                <th>Chuyển về nhà máy</th>
                                <th>Còn lại</th>
{{--                                <th>Hành động</th>--}}
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($data as $k=>$v)
                                <tr>
                                    <td>{{$v->id}}</td>
                                    <td>
                                        {{$v->name}}
                                    </td>
                                    <td style="width: 5px !important;">
                                        @if($v->unit==1)
                                            Ống
                                        @elseif($v->unit==2)
                                            Bộ
                                        @elseif($v->unit==3)
                                            Cây
                                        @elseif($v->unit==4)
                                            Dây
                                        @elseif($v->unit==5)
                                            Giàn
                                        @endif
                                    </td>
                                    <td style="width: 10px;">
                                        {{$v->product_old}}
                                    </td>
                                    <td style="width: 10px;">
                                        {{$v->product_new}}
                                    </td>
                                    <td style="width: 10px;">
                                        {{$v->sold}}
                                    </td>
                                    <td>
                                        <p>{{ number_format($v->price)}}</p>
                                    </td>
                                    <td>
                                        <p>{{ number_format($v->price*$v->sold)}}</p>
                                    </td>
                                    <td>
                                        <!-- chuyen ve nha may-->
                                        {{$v->number}}
                                    </td>
                                    <td>
                                        {{($v->product_old+$v->product_new)-$v->sold}}
                                    </td>
{{--                                    <td>--}}
{{--                                        <a href="{{url('admin/products/edit')}}/{{$v->id}}">--}}
{{--                                            <button class="btn btn-primary">Edit</button>--}}
{{--                                        </a>--}}
{{--                                    </td>--}}
                                </tr>
                            @endforeach

                            </tbody>
                        </table>
                        <!-- Modal for showing delete confirmation -->
                        <div class="modal fade" id="delete_confirm" tabindex="-1" role="dialog"
                             aria-labelledby="user_delete_confirm_title" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×
                                        </button>
                                        <h4 class="modal-title" id="user_delete_confirm_title">
                                            Delete User
                                        </h4>
                                    </div>
                                    <div class="modal-body">
                                        Bạn có chắc chắn muốn xóa thành viên này không
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel
                                        </button>
                                        <a href="deleted_products.html" class="btn btn-danger">Delete
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- row-->
        </section>
        <input type="hidden" value="{{url('')}}" id="url">
    </aside>
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
        });
    </script>
@endsection('script')

