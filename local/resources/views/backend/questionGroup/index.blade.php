@extends('backend.master.index')
@section('title')
    Danh sách blogs
@endsection('title')
@section('style')
    {{-- <link href="css/app.css" rel="stylesheet" type="text/css" /> --}}
    {{-- <link rel="stylesheet" type="text/css" href="vendors/datatables/css/dataTables.bootstrap.css" /> --}}
    <link href="css/pages/tables.css" rel="stylesheet" type="text/css" />
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
                <a href="{{ url('admin/') }}">
                    <i class="livicon" data-name="home" data-size="14" data-color="#000"></i> Trang chủ
                </a>
                <a href="{{ url('admin/post/create') }}">
                    <i class="fa fa-fw fa-angle-double-right"></i> Danh sách bộ câu hỏi trắc nghiệm
                </a>
            </div>
        </section>
        <!-- Main content -->
        <section class="content padding left_right15">
            <div class="row">
                <div class="panel panel-primary ">
                    <div class="panel-heading">
                        <h4 class="panel-title">
                            <a href="{{ url('admin/cates') }}">Danh sách menu</a>
                            <a href="{{ url('admin/questionGroup/create') }}">
                                <i class="fa fa-fw fa-angle-double-right"></i>
                               Thêm mới bộ câu hỏi
                            </a>
                            <i class="fa fa-fw fa-angle-double-right"></i>
                           
                            <a href="{{ url('admin/question') }}">Danh sách câu hỏi</a>
                        </h4>
                    </div>
                    <br />
                    <div class="panel-body">
                        <table class="table table-bordered " id="table">
                            @include('errors.note')
                            <thead>
                                <tr class="filters">
                                    <th style="width:5px;">Id</th>
                                    <th>Tên bộ câu hỏi</th>
                                    <th>Số lượng câu hỏi</th>
                                    <th>Danh mục</th>
                                    <th>Hành động</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($questionGroups as $k => $v)
                                    <tr>
                                        <td>{{ $v->id }}</td>
                                        <td>{{ $v->name }}</td>
                                        <td>
                                            {{ $v->question->count() }}
                                        </td>
                                        <td>
                                            {{ $v->cate->name }}
                                        </td>
                                        <td>
                                            <a href="{{ url('admin/questionGroup/destroy') }}/{{ $v->id }}"><button
                                                    class="btn btn-danger">Delete</button></a>
                                            <a href="{{ url('admin/questionGroup/edit') }}/{{ $v->id }}"><button
                                                    class="btn btn-primary">Edit</button></a>
                                        </td>
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
                                        <button type="button" class="close" data-dismiss="modal"
                                            aria-hidden="true">×</button>
                                        <h4 class="modal-title" id="user_delete_confirm_title">
                                            Delete User
                                        </h4>
                                    </div>
                                    <div class="modal-body">
                                        Bạn có chắc chắn muốn xóa thành viên này không
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                                        <a href="deleted_post.html" class="btn btn-danger">Delete
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

        <!-- modal add -->
        <div class="modal fade" id="addmember" role="dialog">
            <div class="modal-dialog">

                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Thêm thành viên</h4>
                    </div>
                    <div class="modal-body">
                        <form class="form-horizontal" method="post" id="formaddmember">


                            <!--  -->
                            <div class="form-group">
                                <label for="first_name" class="col-sm-3">Tên thành viên</label>
                                <div class="col-sm-9">
                                    <input type="text" id="id_name" name="name" placeholder="Nhập tên thành viên"
                                        class="form-control" />
                                    <span style="color: red;"></span>
                                </div>
                            </div>


                            <div class="form-group">
                                <label class="col-sm-3" for="form-field-1-1">Email</label>
                                <div class="col-sm-9">
                                    <input type="text" name="email" placeholder="Nhập email thành viên"
                                        class="form-control" id="id_email">

                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3" for="form-field-1-1">Pass word</label>
                                <div class="col-sm-9">
                                    <input type="password" name="password" class="form-control required"
                                        placeholder="Nhập pass thành viên" id="id_pass">

                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3" for="form-field-1-1">Phone number</label>
                                <div class="col-sm-9">
                                    <input type="number" name="phone_number" class="form-control required"
                                        placeholder="Nhập số điện thoại thành viên" id="phone">

                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-3" for="form-field-1-1">Process</label>

                                <div class="col-sm-9 process_user">
                                    <div class="form-control savedata">

                                    </div>


                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3" for="form-field-1-1"> SMS level</label>
                                <div class="col-sm-9">
                                    <select name="sms_level" id="id_sms_level" class="form-control required">
                                        <option value="">Lựa chọn SMS level</option>
                                        <option value="1">Warning</option>
                                        <option value="2">Minor</option>
                                        <option value="3">Crical</option>
                                    </select>
                                    <span style="color: red;">{{ $errors->first('sms_level') }}</span>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3" for="form-field-1-1"> Quyền truy cập</label>
                                <div class="col-sm-9">
                                    <select name="level" id="level_id" class="form-control">
                                        <option value="">Lựa chọn quyền truy cập</option>
                                        <option value="2">Root</option>
                                        <option value="1">Admin</option>
                                        <option value="0">User</option>
                                    </select>
                                    <span style="color: red;">{{ $errors->first('member_level') }}</span>
                                </div>
                            </div>
                            <div class="space-4"></div>
                            <div class="clearfix form-actions">
                                <div class="col-md-offset-3 col-md-9">
                                    <button class="btn btn-primary" type="submit">Thêm thành viên</button>
                                    &nbsp; &nbsp; &nbsp;
                                    <button class="btn btn-danger" type="reset">Reset</button>


                                </div>
                            </div>
                            {{ csrf_field() }}

                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
                </div>

            </div>
        </div>
        <!-- end modal add -->
        <input type="hidden" value="{{ url('') }}" id="url">
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
            $('body').on('click', '.changeStatus', function() {
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
                $.get(url + '/admin/post/changeStatus/' + val + '/' + id, function(data) {
                    thiss.parent().html(data);
                })
            })
        });
    </script>
@endsection('script')
