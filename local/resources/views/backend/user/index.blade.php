@extends('backend.master.index')
@section('title')
    Danh sách thành viên
@endsection('title')
@section('style')
    <link rel="stylesheet" type="text/css" href="vendors/datatables/css/dataTables.bootstrap.css" />
    <link href="css/pages/tables.css" rel="stylesheet" type="text/css" />
@endsection('style')
@section('content')
    <aside class="right-side strech" id="sideright">
        <!-- Content Header (Page header) -->
        <section class="content-header list_user">
            <div>
                <a href="{{ url('admin/') }}">
                    <i class="livicon" data-name="home" data-size="14" data-color="#000"></i> Trang chủ
                    <i class="fa fa-fw fa-angle-double-right"></i>
                </a>
                <a href="{{ url('admin/users') }}">Users</a>

                <a href="{{ url('admin/users/create') }}">
                    <i class="fa fa-fw fa-angle-double-right"></i> Thêm mới
                </a>
            </div>
        </section>
        <!-- Main content -->
        <section class="content padding left_right15">
            <div class="row">
                <div class="panel panel-primary ">
                    <div class="panel-heading">
                        <h4 class="panel-title">
                            <span>
                                <i class="fa fa-fw fa-angle-double-right"></i> Danh sách thành viên
                            </span>
                            <span>
                               <a style="color: white" href="{{ url('admin/history') }}"> <i class="fa fa-fw fa-angle-double-right"></i> Lịch sử giao dịch</a>
                            </span>
                        </h4>
                    </div>
                    <br />
                    <div class="panel-body">
                        @include('errors.note')
                        <table class="table table-bordered " id="table">
                            <thead>
                                <tr class="filters">
                                    <th style="width:10px">Id</th>
                                    <th>Tên/Giới tính</th>
                                    <th>Email -Điện thoại</th>
                                    <th>Địa chỉ </th>
                                    <th>Điểm thành viên</th>
                                    <th>Ngày đăng ký</th>
                                    {{--                                        <th>Hành động</th> --}}
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $k => $user)
                                    <tr>
                                        <td>{{ $user->id }}</td>
                                        <td>
                                            <p>
                                                {{ $user->name }} - <span>  @if($user->sex ==1) Nam @endif
                                                    @if($user->sex ==2) Nữ @endif</span>
                                            </p>
                                            @if ($user->avata != '')
                                                <p>
                                                    <img src="{{ url('public/backend') }}/{{ $user->avata }}"
                                                        alt="{{ $user->name }}" width="20">
                                                </p>
                                            @endif
                                            <button style="margin: 0px;" type="button" userName="{{ $user->name }}" userId="{{ $user->id }}" class="btn btn-info btn-lg showPopUpSendEmail" userEmail="{{ $user->email }}" data-toggle="modal" data-target="#myModal">Gửi email kêu gọi mua hàng</button>
                                        </td>
                                        <td>
                                            Email: {{ $user->email }}
                                            <br>
                                            Điện thoại:{{ $user->phone }}
                                            <input type="hidden" value="{{ $user->showpassword }}">

                                        </td>
                                        <td>
                                            <p>
                                                {{ $user->adress }}
                                            </p>
                                            <?php
                                            $bank = json_decode($user->bank, true);
                                            ?>
                                            @if ($bank)
                                                <p>Ngân hàng:{{ $bank['bankName'] }}</p>
                                                <p>Số tài khoản:{{ $bank['stk'] }}</p>
                                            @endif
                                        </td>
                                        <td>{{ $user->point }}</td>
                                        <td>
                                            {{ $user->created_at }}
                                        </td>
                                        {{--                                        <td> --}}
                                        {{--                                            <a href="{{url('admin/users/destroy')}}/{{$user->id}}"><button class="btn btn-danger">Delete</button></a> --}}
                                        {{--                                             <a href="{{url('admin/users/edit')}}/{{$user->id}}"><button class="btn btn-primary">Edit</button></a> --}}
                                        {{--                                        </td> --}}
                                    </tr>
                                @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <!-- row-->
        </section>
        <input type="hidden" value="{{ url('') }}" id="url">
        <div id="myModal" class="modal fade" role="dialog">
            <div class="modal-dialog">
          
              <!-- Modal content-->
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                  <h4 class="modal-title">Email kêu gọi mua hàng</h4>
                </div>
                <div class="modal-body">
                  <form action="" method="post" id="sendMailUser">
                      <div class="form-group">
                        <label for="email">Email address:</label>
                        <input type="email" name="email" class="form-control" id="email">
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
    </aside>
@endsection('content')
@section('script')
    <script src="js/app.js" type="text/javascript"></script>
    <!-- end of global js -->
    <!-- begining of page level js -->
    <script type="text/javascript" src="vendors/datatables/js/jquery.dataTables2.js"></script>
    <script type="text/javascript" src="vendors/datatables/js/dataTables.bootstrap.js"></script>
    <script>
        $(document).ready(function() {
            $('#table').dataTable();
        });
        $('.savedata').click(function() {
            $('.ulParent').toggle();
        });
        $('.ulParent>li').click(function() {

            var data = $(this).attr('dataid');

            var name = $(this).text();
            $('.savedata').append('<span>' + name + '<span class="id">' + data + ',' + '<span>' +
                '<a class="delete" href="javascript::voild(0)" ><i class="fa fa-times-circle-o" aria-hidden="true"></i></a>' +
                '</span>');
            $('.ulParent>li').addClass('off');
            $('.ulParent').hide();
        });
        $('body').on('click', '.delete', function() {
            $(this).parent().parent().parent().remove();
        });
        $('.showPopUpSendEmail').click(function(){
            let userEmail = $(this).attr('useremail');
            let nameUser = $(this).attr('username');
            $('#email').val(userEmail);
            $('#userName').val(nameUser);
            $('#dataSendEmail').text('Khuyến mại 20% '+' nhân dịp...' + 'Click vào link bên dưới ngay vì thời gian khuyến mại có hạn, nhanh tay để hưởng ưu đãi');
        })
        $("#sendMailUser").submit(function(e) {
            event.preventDefault();
            let urlData = $('#url').val() + '/admin/history/sendEmailUser';
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
                           alert('Gửi email thành công')
                       }else
                       {
                            alert('lỗi gửi Email Bạn vui lòng thử lại')
                       }
                }
            })
        });
    </script>
@endsection('script')
