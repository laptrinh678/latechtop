@extends('backend.master.index')
@section('title')
Sửa danh mục
@endsection('title')
@section('style')
<link href="vendors/bootstrap-multiselect/css/bootstrap-multiselect.css" rel="stylesheet" type="text/css">
<link href="vendors/select2/css/select2.min.css" rel="stylesheet" type="text/css">
<link href="vendors/select2/css/select2-bootstrap.css" rel="stylesheet" type="text/css">
<script type="text/javascript" src="assets/ckeditor/ckeditor.js"></script>
<script type="text/javascript" src="assets/ckeditor/ckfinder/ckfinder.js"></script>
@endsection('style')
@section('content')
@include('errors.function_post')
<aside class="right-side strech" id="sideright">
<section class="content-header list_user">
                 <div >
                     <a href="{{url('admin/index')}}">
                            <i class="livicon" data-name="home" data-size="14" data-color="#000"></i> Trang chủ
                            <i class="fa fa-fw fa-angle-double-right"></i>
                    </a>
                     <a href="{{url('admin/member/list')}}">Danh mục</a>
                     <a href="{{url('admin/member/add')}}">
                           <i class="fa fa-fw fa-angle-double-right"></i> Sửa danh mục
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
                                    Sửa danh mục
                                </h3>
                                <span class="pull-right clickable">
                                    <i class="glyphicon glyphicon-chevron-up"></i>
                                </span>
                            </div>

                            <div class="panel-body">
                <form class="form-horizontal" role="form" method="post" action="" enctype="multipart/form-data">
                <!--  -->
                <div class="form-group">
                <label for="first_name" class="col-sm-2 control-label">Tên danh mục</label>
                    <div class="col-sm-6">
                        <input type="text" id="first_name" value="{{$cat->name}}" name="name" placeholder="Nhập tên danh mục" class="form-control required" />
                        <input type="hidden" name="cat_id" value="{{$cat->id}}">
                        <span style="color: red;">{{$errors->first('name')}}</span>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label no-padding-right" for="form-field-1-1">Danh mục cha</label>
                        <div class="col-sm-6">
                            <select name="parent_id" id="" class="form-control">
                           <option value="0">Chọn danh mục</option>
                              	@php
	                       		menuParent_post($parent,0,'',$cat->parent_id);
	                       	    @endphp
                            </select>
                        </div>
                </div>
                <div class="form-group">
                <label for="first_name" class="col-sm-2 control-label">Loại menu</label>
                    <div class="col-sm-6">
                        <select name="menu_type" id=""class="form-control" required>
                            <option value="">Loại menu</option>
                            <option value="1" @if($cat->menu_type==1) selected @endif>Ngang trang chủ</option>
                            <option value="2"  @if($cat->menu_type==2) selected @endif>Menu chân trang</option>
                            <option value="3"  @if($cat->menu_type==3) selected @endif>Menu Trang danh sách</option>
                            <option value="4"  @if($cat->menu_type==4) selected @endif>Menu Trang chi tiết</option>
                            <option value="5" @if($cat->menu_type==5) selected @endif>Menu khác</option>
                        </select>
                    </div>
                </div>
                    <div class="form-group">
                        <label for="first_name" class="col-sm-2 control-label">Trang hiển thị sản
                            phẩm</label>
                        <div class="col-sm-6">
                            <select name="page" id="" class="form-control">
                                <option value="0">Loại trang</option>
                                <option value="1"  @if($cat->page==1) selected @endif>Trang chủ</option>
                                <option value="2"  @if($cat->page==2) selected @endif>Danh sách sản phẩm</option>
                                <option value="3"  @if($cat->page==3) selected @endif>Trang khác</option>
                                <option value="4" @if($cat->page==4) selected @endif>Blog trang chủ</option>
                                <option value="5" @if($cat->page==5) selected @endif>Blog list sản phẩm</option>
                                <option value="6" @if($cat->page==6) selected @endif>Blog list bài viết</option>
                                <option value="7" @if($cat->page==7) selected @endif>Blog list quà tặng</option>
                                <option value="8" @if($cat->page==8) selected @endif>Blog miễn phí</option>
                                <option value="9" @if($cat->page==9) selected @endif>Blog chi tiết sản phẩm</option>
                            </select>
                        </div>
                    </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label no-padding-right" for="form-field-1-1">Thể loại danh mục </label>
                    <div class="col-sm-2">
                         <div class="form-check">
                          <input class="form-check-input" type="radio" value="0" name="type_menu" @if($cat->type_menu==0) checked @endif />
                          <label class="form-check-label" for="flexCheckChecked" >Bài viết</label>
                        </div>
                    </div>
                    <div class="col-sm-2">
                         <div class="form-check">
                          <input class="form-check-input" type="radio" value="1" name="type_menu" @if($cat->type_menu==1) checked @endif />
                          <label class="form-check-label" for="flexCheckChecked" >Sản phẩm</label>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label no-padding-right" for="form-field-1-1">Icon</label>
                    <div class="col-sm-4">
                    <div>
                            <img id="myimage" src="{{ url("public/backend/$cat->icon") }}" width="70px">
                            <span class="btn" onclick="remove(this)">X</span>
                        </div>
                    <input type="file" onchange="changeHandler(event)" id="inputupfile" name="icon" value="{{$cat->icon}}">

                    </div>
                    <label class="col-sm-2 control-label no-padding-right" for="form-field-1-1">Đặt ảnh
                        mặc định <input type="checkbox" @if($cat->img_default==1)checked @endif name="img_default" id=""></label>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label no-padding-right" for="form-field-1-1">Mô tả ngắn</label>
                    <div class="col-sm-10">
                    <textarea class="ckeditor"  name="des" id="a" cols="90" rows="10" >{{$cat->des}}</textarea>
						<script type="text/javascript">
				     			CKEDITOR.replace('des');
				      </script>﻿
                    </div>
                </div>


                <div class="space-4"></div>
                <div class="clearfix form-actions">
                    <div class="col-md-offset-3 col-md-9">
                        <button class="btn btn-primary" type="submit">Sửa</button>
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

