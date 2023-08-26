@extends('backend.master.index')
@section('title')
    Thêm danh mục
@endsection('title')
@section('style')
    <link href="vendors/bootstrap-multiselect/css/bootstrap-multiselect.css" rel="stylesheet" type="text/css">
    <link href="vendors/select2/css/select2.min.css" rel="stylesheet" type="text/css">
    <link href="vendors/select2/css/select2-bootstrap.css" rel="stylesheet" type="text/css">
    <script type="text/javascript" src="assets/ckeditor/ckeditor.js"></script>
    <script type="text/javascript" src="assets/ckeditor/ckfinder/ckfinder.js"></script>
@endsection('style')
@section('content')
    @include('errors.functions')
    <aside class="right-side strech" id="sideright">
        <section class="content-header list_user">
            <div>
                <a href="{{url('admin/index')}}">
                    <i class="livicon" data-name="home" data-size="14" data-color="#000"></i> Trang chủ
                    <i class="fa fa-fw fa-angle-double-right"></i>
                </a>
                <a href="{{url('admin/cates')}}">Danh mục</a>
                <a href="{{url('admin/cates/add')}}">
                    <i class="fa fa-fw fa-angle-double-right"></i> Thêm mới danh mục
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
                                <i class="livicon" data-name="user-add" data-size="18" data-c="#fff" data-hc="#fff"
                                   data-loop="true"></i>Thêm mới danh mục
                            </h3>
                            <span class="pull-right clickable">
                                    <i class="glyphicon glyphicon-chevron-up"></i>
                                </span>
                        </div>

                        <div class="panel-body">
                            <form class="form-horizontal" role="form" method="post" action=""
                                  enctype="multipart/form-data">
                                <!--  -->
                                <div class="form-group">
                                    <label for="first_name" class="col-sm-2 control-label">Tên danh mục</label>
                                    <div class="col-sm-6">
                                        <input type="text" id="first_name" name="name" placeholder="Nhập tên danh mục"
                                               class="form-control required"/>
                                        <span style="color: red;">{{$errors->first('name')}}</span>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label no-padding-right" for="form-field-1-1">Danh mục
                                        cha</label>
                                    <div class="col-sm-6">
                                        <select name="parent_id" id="" class="form-control">
                                            <option value="0">Chọn danh mục cha</option>
                                            <?php
                                            function showCategories($categories, $parentId = 0, $char = '')
                                            {
                                                foreach ($categories as $key => $items) {
                                                    if ($items->parent_id == $parentId) {
                                                        echo '<option value="' . $items->id . '">';
                                                        echo $char . $items->name;
                                                        echo '</option>';
                                                        // Xóa chuyên mục đã lặp
                                                        unset($categories[$key]);
                                                        // Tiếp tục đệ quy để tìm chuyên mục con của chuyên mục đang lặp
                                                        showCategories($categories, $items->id, $char . '|---');
                                                    }
                                                }
                                            }
                                            echo showCategories($categories);
                                            ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="first_name" class="col-sm-2 control-label">Loại danh mục</label>
                                    <div class="col-sm-6">
                                        <select name="menu_type" id="" class="form-control" required>
                                            <option value="">Loại danh mục</option>
                                            <option value="1">Ngang trang chủ</option>
                                            <option value="2">Menu chân trang</option>
                                            <option value="3">Menu Trang danh sách</option>
                                            <option value="4">Menu Trang chi tiết</option>
                                            <option value="5">Menu khác</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="first_name" class="col-sm-2 control-label">Trang hiển thị danh mục</label>
                                    <div class="col-sm-6">
                                        <select name="page" id="" class="form-control" required>
                                            <option value="">Loại trang</option>
                                            <option value="1">Trang chủ</option>
                                            <option value="2">Danh sách sản phẩm</option>
                                            <option value="3">Trang khác</option>
                                            <option value="4">Blog trang chủ</option>
                                            <option value="5">Blog list sản phẩm</option>
                                            <option value="6">Blog list bài viết</option>
                                            <option value="7">Blog list quà tặng</option>
                                            <option value="8">Blog miễn phí</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label no-padding-right" for="form-field-1-1">Thể loại
                                        danh mục</label>
                                    <div class="col-sm-2">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" value="0" name="type_menu"/>
                                            <label class="form-check-label" for="flexCheckChecked">Bài viết</label>
                                        </div>
                                    </div>
                                    <div class="col-sm-2">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" value="1" name="type_menu"/>
                                            <label class="form-check-label" for="flexCheckChecked">Sản phẩm</label>
                                        </div>
                                    </div>
                                </div>
                                <!-- <div class="form-group">
                               <label for="first_name" class="col-sm-2 control-label">Vị trí hiển thị bài viết</label>
                                   <div class="col-sm-6">
                                       <select name="menu_detail" id=""class="form-control" required>
                                           <option value="">Vị trí</option>
                                           <option value="1">Thứ nhất</option>
                                           <option value="2">Thứ hai</option>
                                           <option value="3">Thứ ba</option>
                                           <option value="4">Thứ tư</option>
                                           <option value="5">Thứ năm</option>
                                       </select>
                                   </div>
                               </div> -->
                                <div class="form-group">
                                    <label class="col-sm-2 control-label no-padding-right"
                                           for="form-field-1-1">Icon</label>
                                    <div class="col-sm-6">
                                        <div>
                                            <img id="myimage" src="" width="70px">
                                            <span class="btn" onclick="remove(this)">X</span>
                                        </div>
                                        <input type="file" onchange="changeHandler(event)" id="inputupfile" name="icon">

                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label no-padding-right" for="form-field-1-1">Mô tả
                                        ngắn</label>
                                    <div class="col-sm-10">
                                        <textarea class="ckeditor" name="des" id="a" cols="90" rows="10"></textarea>
                                        <script type="text/javascript">
                                            CKEDITOR.replace('des');
                                        </script>
                                        ﻿
                                    </div>
                                </div>
                                <div class="space-4"></div>
                                <div class="clearfix form-actions">
                                    <div class="col-md-offset-3 col-md-9">
                                        <button class="btn btn-primary" type="submit">Thêm danh mục</button>
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
            fileReader.onload = function () {
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

