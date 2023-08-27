@extends('backend.master.index')
@section('title')
    Lịch sử đổi điểm
@endsection('title')
@section('style')
    <link href="css/app.css" rel="stylesheet" type="text/css"/>
    <link rel="stylesheet" type="text/css" href="vendors/datatables/css/dataTables.bootstrap.css"/>
    <link href="css/pages/tables.css" rel="stylesheet" type="text/css"/>
@endsection('style')
@section('content')
    <aside class="right-side strech" id="sideright">
        <section class="content-header list_user">
            <div>
                <a href="{{url('admin/')}}">
                    <i class="livicon" data-name="home" data-size="14" data-color="#000"></i> Trang chủ
                    <i class="fa fa-fw fa-angle-double-right"></i>
                </a>
                <a href="{{url('admin/users')}}">Users</a>
                <a href="{{url('admin/users/listDoitien')}}">
                    <i class="fa fa-fw fa-angle-double-right"></i> Lịch sử đổi điểm
                </a>
            </div>
        </section>
        <!-- Main content -->
        <section class="content padding left_right15">
            <div class="row">
                <div class="panel panel-primary ">
                    <div class="panel-heading">
                        <h4 class="panel-title">
                            <a href="{{url('admin/users/listDoitien')}}">
                                <i class="fa fa-fw fa-angle-double-right"></i> Sang trang cập nhật điểm
                            </a>
                        </h4>
                    </div>
                    <br/>
                    <div class="panel-body">
                        @include('errors.note')
                        <table class="table table-bordered " id="table">
                            <thead>
                            <tr class="filters">
                                <th>#</th>
                                <th>Tên đối tác</th>
                                <th>Điểm cũ</th>
                                <th>Điểm còn lại</th>
                                <th>Doanh thu</th>
                                <th>Ngày đổi điểm</th>
                            </tr>
                            </thead>
                            <tbody>
                            @if($data !='')
                            @foreach($data as $k=>$v)
                                <tr>
                                    <td style="width:5px">{{$v->id}}</td>
                                    <td>
                                        @if($v->users)
                                        {{$v->users->name}}
                                        <br>
                                        {{$v->users->code}}
                                            @endif
                                    </td>
                                    <td>
                                            <?php
                                            $diemcu = json_decode($v->diemcu, true);
                                            ?>
                                        @if($diemcu)
                                            <p>Điểm cá nhân:@if($diemcu['point'])  {{number_format($diemcu['point'])}} @endif</p>
                                            <p>Điểm nhánh trái:@if($diemcu['diem_nhanhtrai']) {{number_format($diemcu['diem_nhanhtrai'])}}  @endif</p>
                                            <p>Điểm nhánh phải:@if($diemcu['diem_nhanhphai']) {{number_format($diemcu['diem_nhanhphai'])}}  @endif</p>

                                        @endif
                                    </td>

                                    <td>
                                            <?php
                                            $diemconlai = json_decode($v->diemconlai, true);
                                            ?>
                                        @if($diemconlai)
                                            <p>Điểm cá nhân:@if($diemconlai['point']) {{number_format($diemconlai['point'])}}  @endif</p>
                                            <p>Điểm nhánh trái:@if($diemconlai['diem_nhanhtrai'] !=0) {{number_format($diemconlai['diem_nhanhtrai'])}} @else 0  @endif</p>
                                            <p>Điểm nhánh phải:@if($diemconlai['diem_nhanhphai'] !=0 )  {{number_format($diemconlai['diem_nhanhphai'])}} @else  0 @endif</p>
                                        @endif
                                    </td>
                                    <td>
                                        <p>Doanh thu:@if($diemcu['doanhthu'])  {{$diemcu['doanhthu']}} @endif triệu VNĐ</p>
                                    </td>
                                    <td>
                                        {{$v->created_at->format('h:m d/m/Y')}}
                                        <br>
{{--                                        <button class="btn btn-success">Đã thanh toán</button>--}}
{{--                                        <br>--}}
                                        @if($v->status ==0)
                                            <a href="{{url('admin/users/history')}}/{{$v->id}}">
                                                <button class="btn btn-danger">Chưa thanh toán</button>
                                            </a>
                                            @else
                                            <button class="btn btn-success">Đã thanh toán</button>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                                @endif
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

        });
        $('.savedata').click(function () {
            $('.ulParent').toggle();
        });
        $('.ulParent>li').click(function () {

            var data = $(this).attr('dataid');

            var name = $(this).text();
            $('.savedata').append('<span>' + name + '<span class="id">' + data + ',' + '<span>' + '<a class="delete" href="javascript::voild(0)" ><i class="fa fa-times-circle-o" aria-hidden="true"></i></a>' + '</span>');
            $('.ulParent>li').addClass('off');
            $('.ulParent').hide();
        });
        $('body').on('click', '.delete', function () {
            $(this).parent().parent().parent().remove();
        });
        $('#formaddmember').on('submit', function (event) {
            event.preventDefault();
            $.ajax({
                url: "",
                method: "POST",
                data: new FormData(this),
                //dataType:'JSON',
                contentType: false,
                cache: false,
                processData: false,
                success: function (data) {
                    console.log(data);
                    /* if(data=='0')
                       {
                           alert('Error_code và Process_code bị trùng Bạn vui lòng sửa lại')
                       }else
                       {
                           //console.log(data);
                            $('#listdatatable').html(data);
                            $('.error_code_e').html('');
                            $('.process_code').val('');
                            $(".error_name").val('');
                            $(".solve").val('');
                             $('#editerror .statusmess').prop('checked', false);
                            //$(".statusmess").val('');

                            $(".status").val('');
                            $('.stretchLeft').hide();
                            $('.modal-backdrop').hide();
                           $('.alertNotification').show(3000);
                           $('.alertNotification').text('Sửa thành công');
                           $('.alertNotification').css({'background':'#F89A14'});
                             setTimeout(function(){ $('.alertNotification').hide(5000);}, 5000);
                       }*/
                }
            })
        });


    </script>

@endsection('script')

