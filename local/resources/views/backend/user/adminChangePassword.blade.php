@extends('backend.master.index')
@section('title')
Thêm thành viên
@endsection('title')
@section('style')
<link href="vendors/bootstrap-multiselect/css/bootstrap-multiselect.css" rel="stylesheet" type="text/css">
<link href="vendors/select2/css/select2.min.css" rel="stylesheet" type="text/css">
<link href="vendors/select2/css/select2-bootstrap.css" rel="stylesheet" type="text/css">
@endsection('style')
@section('content')
<aside class="right-side strech" id="sideright">
<section class="content-header list_user">
                 <div >
                     <a href="{{url('admin/index')}}">
                            <i class="livicon" data-name="home" data-size="14" data-color="#000"></i> Trang chủ
                            <i class="fa fa-fw fa-angle-double-right"></i>
                    </a>
                     <a href="{{url('admin/member/list')}}">Users</a>
                     <a href="{{url('admin/member/add')}}">
                           <i class="fa fa-fw fa-angle-double-right"></i> Add New User
                    </a>
                </div>
            </section>
            <br>
            <section class="content">
                <div class="row">
                    <div class="col-md-12">
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                <h3 class="panel-title">
                                    <i class="livicon" data-name="user-add" data-size="18" data-c="#fff" data-hc="#fff" data-loop="true"></i>Thêm mới thành viên
                                </h3>
                                <span class="pull-right clickable">
                                    <i class="glyphicon glyphicon-chevron-up"></i>
                                </span>
                            </div>

                            <div class="panel-body">
                <form class="form-horizontal" role="form" method="post" action="">
                <!--  -->
                <div class="form-group">
                    <label class="col-sm-2 control-label no-padding-right" for="form-field-1-1">Email</label>
                        <div class="col-sm-6">
                            <input type="text" name="email" value="{{$admin->email}}" class="form-control" disabled>
                        </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label no-padding-right" for="form-field-1-1">Password mới</label>
                    <div class="col-sm-6">
                        <input type="password" name="password" class="form-control required" placeholder="Nhập pass admin">
                        <span style="color: red;">{{$errors->first('password')}}</span>
                    </div>
                </div>

                <div class="space-4"></div>
                <div class="clearfix form-actions">
                    <div class="col-md-offset-3 col-md-9">
                        <button class="btn btn-primary" type="submit">Thêm admin</button>
                         &nbsp; &nbsp; &nbsp;
                            <button class="btn btn-danger" type="reset">Reset</button>

                    </div>
                </div>
                {{csrf_field()}}
            </form>
                            </div>
                        </div>
                    </div>
                </div>
                <!--row end-->
            </section>
</aside>
@endsection('content')
@section('script')
 <script src="js/app.js" type="text/javascript"></script>
    <!-- end of global js -->
    <!-- begining of page level js -->
    <!--color picker-->
    <script src="vendors/bootstrap-multiselect/js/bootstrap-multiselect.js" type="text/javascript"></script>
    <script src="vendors/select2/js/select2.js" type="text/javascript"></script>
    <script src="vendors/selectize/js/standalone/selectize.min.js" type="text/javascript"></script>
    <script src="vendors/iCheck/js/icheck.js" type="text/javascript"></script>
    <script src="vendors/bootstrap-switch/js/bootstrap-switch.js" type="text/javascript"></script>
    <script src="vendors/switchery/js/switchery.js" type="text/javascript"></script>
    <script src="js/pages/custom_elements.js" type="text/javascript"></script>
<script>
    $(document).ready(function()
    {
        $('.savedata').click( function()
            {
                $('.ulParent').toggle();
            });
        $('.ulParent>li').click(function()
                {
                    var data = $(this).attr('dataid');

                    var name = $(this).text();
                    $('.savedata').append(
                        "<input type ='text'/>");
                    $('.ulParent>li').addClass('off');
                    $('.ulParent').hide();
                });
    })
</script>
@endsection('script')

