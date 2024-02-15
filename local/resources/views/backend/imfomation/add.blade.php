@extends('backend.master.index')
@section('title')
Thêm mới thông tin
@endsection('title')
@section('style')
<link href="vendors/bootstrap-multiselect/css/bootstrap-multiselect.css" rel="stylesheet" type="text/css">
<link href="vendors/select2/css/select2.min.css" rel="stylesheet" type="text/css">
<link href="vendors/select2/css/select2-bootstrap.css" rel="stylesheet" type="text/css">
<script type="text/javascript" src="assets/ckeditor/ckeditor.js"></script>
<script type="text/javascript" src="assets/ckeditor/ckfinder/ckfinder.js"></script>
<style>
    .imgdetail{
        border: 1px solid #c0c0c0;
    min-height: 150px;
    margin-left: 14px;
    width: 81%;
    }
    .itemimg{max-width: 150px; float: left; border: 1px solid #d8d4d4;
    /* padding: 2px; */
    margin: 5px;}
    .itemimg>img{width: 100%;}
</style>
@endsection('style')
@section('content')
<aside class="right-side strech" id="sideright">
<section class="content-header list_user">
                 <div >
                     <a href="{{url('admin/index')}}">
                            <i class="livicon" data-name="home" data-size="14" data-color="#000"></i> Trang chủ
                            <i class="fa fa-fw fa-angle-double-right"></i>
                    </a>
                     <a href="{{url('admin/member/list')}}">{{ __('pages.imfomation.name') }}</a>
                     <a href="{{url('admin/member/add')}}">
                           <i class="fa fa-fw fa-angle-double-right"></i> {{__('message.add')}} sản phẩm
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
                                    <i class="livicon" data-name="user-add" data-size="18" data-c="#fff" data-hc="#fff" data-loop="true"></i>{{__('message.product_name')}}
                                </h3>
                                <span class="pull-right clickable">
                                    <i class="glyphicon glyphicon-chevron-up"></i>
                                </span>
                            </div>

                            <div class="panel-body">
                <form class="form-horizontal" role="form" method="post" action="" enctype="multipart/form-data">
                <!--  -->
                <div class="form-group">
                <label for="first_name" class="col-sm-2 control-label">Tên doanh nghiệp</label>
                    <div class="col-sm-6">
                        <input type="text" id="first_name" name="name" placeholder="Nhập tên danh mục" class="form-control required" />
                        <span style="color: red;">{{$errors->first('password')}}</span>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label no-padding-right" for="form-field-1-1">Logo</label>
                    <div class="col-sm-6">
                    <div>
                            <img id="myimage" src="" width="70px">
                            <span class="btn" onclick="remove(this)">X</span>
                        </div>
                    <input type="file" onchange="changeHandler(event)" id="inputupfile" name="icon">

                    </div>
                </div>
                <div class="form-group">
                <label for="first_name" class="col-sm-2 control-label">Slogan</label>
                    <div class="col-sm-6">
                        <input type="text" id="first_name" name="slogan" placeholder="Nhập slogan" class="form-control required" />
                        <span style="color: red;">{{$errors->first('password')}}</span>
                    </div>
                </div>
                <div class="form-group">
                <label for="first_name" class="col-sm-2 control-label">Adress</label>
                    <div class="col-sm-6">
                        <input type="text" id="first_name" name="adress" placeholder="Nhập adress" class="form-control required" />
                        <span style="color: red;">{{$errors->first('password')}}</span>
                    </div>
                </div>
                <div class="form-group">
                <label for="first_name" class="col-sm-2 control-label">Hotline</label>
                    <div class="col-sm-6">
                        <input type="text" id="first_name" name="hotline" placeholder="Nhập hotline" class="form-control required" />
                        <span style="color: red;">{{$errors->first('password')}}</span>
                    </div>
                </div>
                <div class="form-group">
                <label for="first_name" class="col-sm-2 control-label">phone</label>
                    <div class="col-sm-6">
                        <input type="text" id="first_name" name="phone" placeholder="Nhập phone" class="form-control required" />
                        <span style="color: red;">{{$errors->first('password')}}</span>
                    </div>
                </div>
                <div class="form-group">
                <label for="first_name" class="col-sm-2 control-label">Từ khóa Seo</label>
                    <div class="col-sm-6">
                        <input type="text" id="first_name" name="text_seo" placeholder="Từ khóa seo" class="form-control required" />
                        <span style="color: red;">{{$errors->first('text_seo')}}</span>
                    </div>
                </div>
                <div class="form-group">
                    <label for="first_name" class="col-sm-2 control-label">Title trang chủ</label>
                        <div class="col-sm-6">
                            <input type="text" id="first_name" name="title_home" placeholder="title home" class="form-control required" />
                            <span style="color: red;">{{$errors->first('title_home')}}</span>
                        </div>
                    </div>
                

                      <div class="form-group">
                <label for="first_name" class="col-sm-2 control-label">Mail</label>
                    <div class="col-sm-6">
                        <input type="text" id="first_name" name="mail" placeholder="Nhập mail" class="form-control required" />
                        <span style="color: red;">{{$errors->first('mail')}}</span>
                    </div>
                </div>

                 <div class="form-group">
                    <div class="col-sm-2"></div>
                    <div class="col-sm-10">
                          <span class="btn btn-success" id="choosefile"> <i class="fa fa-picture-o" aria-hidden="true"></i> Chọn ảnh</span>
                          <span class="btn btn-danger remove deletefile"> <i class="fa fa-times" aria-hidden="true"></i>Xóa ảnh</span>
                        　<input type="file" class="upfile_multifile hidden" multiple="true" name="images[]" accept="image/*">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label no-padding-right" for="form-field-1-1">Ảnh chi tiết</label>

                    <div class="col-sm-10 imgdetail list_img_and_file">


                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label no-padding-right" for="form-field-1-1">Mô tả ngắn</label>
                    <div class="col-sm-10">
                    <textarea class="ckeditor"  name="des1" id="a" cols="90" rows="10" ></textarea>
						<script type="text/javascript">
				     			CKEDITOR.replace('des1');
				      </script>﻿
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-2 control-label no-padding-right" for="form-field-1-1">Mô tả chi tiết</label>
                    <div class="col-sm-10">
                    <textarea class="ckeditor"  name="des2" id="a2" cols="90" rows="30" ></textarea>
                        <script type="text/javascript">
                                CKEDITOR.replace('des2');
                      </script>﻿
                    </div>
                </div>

                <div class="space-4"></div>
                <div class="clearfix form-actions">
                    <div class="col-md-offset-3 col-md-9">
                        <button class="btn btn-primary" type="submit">Thêm thông tin</button>
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
   function changeHandler(evt) {
        var files = evt.target.files;
        //console.log(files);
        var file = files[0];
        //console.log(file.name);
        var fileReader = new FileReader();
        fileReader.onload = function() {
            var url = fileReader.result;
            var myImg = document.getElementById("myimage");
            myImg.src = url;
        }
        fileReader.readAsDataURL(file); // fileReader.result -> URL.
    }

    function remove(_this) {
        document.getElementById("myimage").setAttribute('src', '');
        // set gia tri the input file ve rong;
        document.getElementById('inputupfile').value = "";
    }
</script>
@endsection('script')

