@extends('backend.master.index')
@section('title')
    Danh sách menu
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
                    <i class="fa fa-fw fa-angle-double-right"></i> Danh sách yêu cầu đổi điểm
                </a>
            </div>
        </section>
        <!-- Main content -->
        <section class="content padding left_right15">
            <div class="row">
                <div class="panel panel-primary ">
                    <div class="panel-body">
                        <table class="table table-bordered " id="table">
                            @include('errors.note')
                            <thead>
                            <tr class="filters">
                                <th style="width:20px;">#</th>
                                <th>Người đổi</th>
                                <th style="width:700px">Comment</th>
                                <th>Tổng điểm hiện tại</th>
                                <th>Hành động</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($data as $k=>$v)
                                <tr>
                                    <td>{{$v->id}}</td>
                                    <td>
                                        {{$v->users->name}}

                                    </td>
                                    <td style="width:300px">
                                        {{$v->comment}}
                                    </td>
                                    <td>
                                        Điểm cá nhân: {{$v->users->point}}
                                        <br>
                                        Điểm nhánh trái: {{$v->users->diem_nhanhtrai}}
                                        <br>
                                        Điểm nhánh phải: {{$v->users->diem_nhanhphai}}
                                    </td>
                                    <td>
                                        @if($v->status==1)
                                            <button class="btn btn-success changeStatus" data="{{$v->status}}"
                                                    id="{{$v->status}}">Đã thanh toán
                                            </button>
                                        @else
                                            {{--<a href="{{url('admin/order/changeStatus')}}/{{$v->pay}}/{{$v->id}}/{{$v->total_point}}/{{$v->user_id}}">--}}
                                            {{--<button class="btn btn-danger">Chưa thanh toán</button></a>--}}
                                            <button class="btn btn-danger changeStatus" data="{{$v->status}}"
                                                    id="{{$v->status}}"
                                                    userId="{{$v->users->id}}">Chưa thanh toán
                                            </button>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach

                            </tbody>
                        </table>
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
                let status = $(this).attr('data');
                let url = $('#url').val();
                let id = $(this).attr('id');
                let totalPoint = $(this).attr('totalPoint');
                let userIdBuy = $(this).attr('userId');
                var thiss = $(this);
                $.get(url + '/admin/order/changeStatus/' + status + '/' + id + '/' + totalPoint + '/' + userIdBuy, function (data) {
                    thiss.parent().html(data);
                })
            })
        });
    </script>

@endsection('script')

