@extends('backend.master.index')
@section('title')
    Đủ điều kiện đổi tiền
@endsection('title')
@section('style')
    <link href="css/app.css" rel="stylesheet" type="text/css"/>
    <link rel="stylesheet" type="text/css" href="vendors/datatables/css/dataTables.bootstrap.css"/>
    <link href="css/pages/tables.css" rel="stylesheet" type="text/css"/>
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
                <a href="{{url('admin/users')}}">Users</a>

                <a href="{{url('admin/users/listDoitien')}}">
                    <i class="fa fa-fw fa-angle-double-right"></i> Đổi tiền
                </a>
            </div>
        </section>
        <!-- Main content -->
        <section class="content padding left_right15">
            <div class="row">
                <div class="panel panel-primary ">
                    <div class="panel-heading">
                        <h4 class="panel-title">
                            <span >
                                <i class="fa fa-fw fa-angle-double-right"></i> Danh sách user đủ điều kiện đổi điểm sang
                                tiền tháng   <?php
                                             $thang = date('m');
                                             $nam = date('Y');
                                             echo $thang-1 .'-'.$nam;
                                             ?>
                            </span>
                        </h4>
                    </div>

                    <br/>
                    <div class="panel-body">
                        <a href="{{url('admin/users/capNhatToanBoDiem')}}">
                            <button class="btn btn-success" style="margin-left:20px" >Cập nhật điểm tháng <?php   echo $thang-1 .'-'.$nam;?></button>
                        </a>
                        @include('errors.note')
                        <table class="table table-bordered " id="table">

                            <thead>
                            <tr class="filters">
                                <th>#</th>
                                <th>Tên</th>
                                <th>Tài khoản</th>
                                <th>Điểm tháng</th>
                                <th>Doanh thu</th>
                                <th>Điểm còn lại sau khi nhận tiền</th>
                                <th>Hành động</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($users as $k=>$ls_user)
                                <tr>
                                    <td>{{$ls_user->id}}</td>
                                    <td>
                                        {{$ls_user->name}}
                                        <p>{{$ls_user->code}}</p>
                                        <p>{{$ls_user->email}}</p>
                                        <p>{{$ls_user->phone}}</p>
                                    </td>
                                    <td>
                                            <?php
                                            $bank = json_decode($ls_user->bank, true);
                                            ?>
                                        @if($bank)
                                            <p>Ngân hàng:{{$bank['bankName']}}</p>
                                            <p>Số tài khoản:{{$bank['stk']}}</p>
                                        @endif
                                    </td>
                                    <td>
                                        <p>Điểm cá nhân:

                                            {{  number_format($ls_user->point)}}
                                        </p>
                                        <p>Điểm nhánh trái:

                                            {{  number_format($ls_user->diem_nhanhtrai)}}
                                        </p>
                                        <p>Điểm nhánh phải:

                                            {{  number_format($ls_user->diem_nhanhphai)}}
                                        </p>
                                    </td>
                                    <td>
                                            <?php
                                            $data_heso = [];
                                            $data_heso['nhanhphai'] = floor($ls_user->diem_nhanhphai / 3000);
                                            $data_heso['nhanhtrai'] = floor($ls_user->diem_nhanhtrai / 3000);
                                            $giatri_nhonhat = min($data_heso);
                                            $data['point'] = $ls_user->point;
                                            $data['diem_nhanhtrai'] = $ls_user->diem_nhanhtrai - $giatri_nhonhat * 3000;
                                            $data['diem_nhanhphai'] = $ls_user->diem_nhanhphai - $giatri_nhonhat * 3000;
                                            if ($giatri_nhonhat >= 100) {
                                                $data['point'] = $ls_user->point;
                                                $data['diem_nhanhtrai'] = 0;
                                                $data['diem_nhanhphai'] = 0;
                                                $giatri_nhonhat=100;
                                            }
                                            $diembandau = [];
                                            $diembandau['point'] = $ls_user->point;
                                            $diembandau['diem_nhanhphai'] = $ls_user->diem_nhanhphai;
                                            $diembandau['diem_nhanhtrai'] = $ls_user->diem_nhanhtrai;
                                            $diembandau['doanhthu'] = $giatri_nhonhat;

                                            $diemConlai = json_encode($data);
                                            $diembandau_doanhthu = json_encode($diembandau);
                                            ?>
                                        Doanh thu:{{$giatri_nhonhat}} triệu VND
                                    </td>
                                    <td>
                                        <p>Điểm cá nhân:

                                            {{  number_format($data['point'])}}
                                        </p>
                                        <p>Điểm nhánh trái:

                                            {{  number_format($data['diem_nhanhtrai'])}}
                                        </p>
                                        <p>Điểm nhánh phải:

                                            {{  number_format($data['diem_nhanhphai'])}}
                                        </p>

                                    </td>
                                    <td>

                                            <a href="{{url('admin/users/capnhatdiem')}}/{{$ls_user->id}}/{{$diemConlai}}/{{$diembandau_doanhthu}}">
                                                <button class="btn btn-warning"
                                                        diemupdate="<?php echo json_encode($data); ?>">
                                                    Cập nhật điểm
                                                </button>
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

