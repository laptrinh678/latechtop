@extends('backend.master.index')
@section('title')
    {{ __('message.add') }} sản phẩm
@endsection('title')
@section('style')
    <link href="vendors/bootstrap-multiselect/css/bootstrap-multiselect.css" rel="stylesheet" type="text/css">
    <link href="vendors/select2/css/select2.min.css" rel="stylesheet" type="text/css">
    <link href="vendors/select2/css/select2-bootstrap.css" rel="stylesheet" type="text/css">
    <script type="text/javascript" src="assets/ckeditor/ckeditor.js"></script>
    <script type="text/javascript" src="assets/ckeditor/ckfinder/ckfinder.js"></script>
    <style>
        .imgdetail {
            border: 1px solid #c0c0c0;
            min-height: 150px;
            margin-left: 14px;
            width: 81%;
        }

        .itemimg {
            max-width: 150px;
            float: left;
            border: 1px solid #d8d4d4;
            /* padding: 2px; */
            margin: 5px;
        }

        .itemimg>img {
            width: 100%;
        }
    </style>
@endsection('style')
@section('content')
    @include('errors.functions')
    <aside class="right-side strech" id="sideright">
        <section class="content-header list_user">
            <div>
                <a href="{{ url('admin/index') }}">
                    <i class="livicon" data-name="home" data-size="14" data-color="#000"></i> Trang chủ
                    <i class="fa fa-fw fa-angle-double-right"></i>
                </a>
                <a href="{{ url('admin/member/list') }}">{{ __('pages.product.name') }}</a>
                <a href="{{ url('admin/member/add') }}">
                    <i class="fa fa-fw fa-angle-double-right"></i> {{ __('message.add') }} sản phẩm
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
                                {{ __('message.product_name') }}
                                <a href="{{ url('admin/cates/') }}">
                                    <i class="fa fa-fw fa-angle-double-right"></i>Danh mục
                                </a>
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
                                    <label for="first_name" class="col-sm-2 control-label">{{ __('message.name') }}
                                        {{ __('message.product_name') }}</label>
                                    <div class="col-sm-6">
                                        <input type="text" id="first_name" name="name" placeholder="Nhập tên sản phẩm"
                                            value="{{ old('name') }}" class="form-control" />
                                        <span style="color: red;">{{ $errors->first('name') }}</span>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label no-padding-right" for="form-field-1-1">Danh mục
                                    </label>
                                    <div class="col-sm-6">
                                        <select name="cate_id" id="" class="form-control">
                                            <option value="{{ old('cate_id') }}">Chọn danh mục</option>
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
                                        <span style="color: red;">{{ $errors->first('cate_id') }}</span>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-sm-2 control-label no-padding-right" for="form-field-1-1">Ảnh
                                        Top</label>
                                    <div class="col-sm-6">
                                        <div>
                                            <img id="myimage" src="" width="70px">
                                            <span class="btn" onclick="remove(this)">X</span>
                                        </div>
                                        <input type="file" onchange="changeHandler(event)" id="inputupfile"
                                            name="icon">

                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label no-padding-right" for="form-field-1-1">Thông
                                        tin</label>
                                    {{--                    <div class="col-sm-2"> --}}
                                    {{--                        <label for="">Đơn vị</label> --}}
                                    {{--                        <select name="unit" id="" class="form-control" required> --}}
                                    {{--                            <option value="">Chọn đơn vị sản phẩm</option> --}}
                                    {{--                            <option value="1" >Ống</option> --}}
                                    {{--                            <option value="2" >Bộ</option> --}}
                                    {{--                            <option value="3" >Cây</option> --}}
                                    {{--                            <option value="4" >Dây</option> --}}
                                    {{--                            <option value="5" >Giàn</option> --}}
                                    {{--                        </select> --}}
                                    {{--                    </div> --}}
                                    {{--                    <div class="col-sm-2"> --}}
                                    {{--                        <label for="">Số sản phẩm tồn</label> --}}
                                    {{--                        <input type="number" name="product_old" value="{{old('product_old')}}" placeholder="Số sản phẩm tồn" --}}
                                    {{--                               class="form-control"/> --}}
                                    {{--                    </div> --}}
                                    {{--                    <div class="col-sm-2"> --}}
                                    {{--                        <label for="">Nhập trong tháng</label> --}}
                                    {{--                        <input type="number" name="product_new" value="{{old('product_new')}}"  placeholder="Nhập trong tháng" --}}
                                    {{--                               class="form-control"/> --}}
                                    {{--                    </div> --}}
                                    <div class="col-sm-2">
                                        <label for="">Giá sản phẩm</label>
                                        <input type="number" value="{{ old('price') }}" name="price"
                                            placeholder="Nhập giá sản phẩm" class="form-control" />
                                    </div>
                                    <div class="col-sm-2">
                                        <label for="">Hiện giá</label>
                                        <input type="checkbox" value="1" checked name="status_price" />
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="first_name" class="col-sm-2 control-label">Link dowload</label>
                                    <div class="col-sm-6">
                                        <input type="text" name="link" placeholder="Nhập link dowload"
                                            value="{{ old('link') }}" class="form-control" />
                                        <span style="color: red;">{{ $errors->first('link') }}</span>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-sm-2"></div>
                                    <div class="col-sm-10">
                                        <span class="btn btn-success" id="choosefile"> <i class="fa fa-picture-o"
                                                aria-hidden="true"></i> Chọn ảnh</span>
                                        <span class="btn btn-danger remove deletefile"> <i class="fa fa-times"
                                                aria-hidden="true"></i>Xóa ảnh</span>
                                        <input type="file" class="upfile_multifile hidden" multiple="true"
                                            name="images[]" accept="image/*">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label no-padding-right" for="form-field-1-1">Ảnh chi
                                        tiết</label>

                                    <div class="col-sm-10 imgdetail list_img_and_file">


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
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-sm-2 control-label no-padding-right" for="form-field-1-1">Mô tả chi
                                        tiết</label>
                                    <div class="col-sm-10">
                                        <textarea class="ckeditor" name="des2" id="a2" cols="90" rows="30"></textarea>
                                        <script type="text/javascript">
                                            CKEDITOR.replace('des2');
                                        </script>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-sm-2 control-label no-padding-right" for="form-field-1-1">Loại sản
                                        phẩm</label>
                                    <div class="col-sm-2">
                                        <div class="form-check">
                                            <input class="form-check-input type_product" type="checkbox" value="0"
                                                name="outstanding" />
                                            <label class="form-check-label" for="flexCheckChecked">Nổi bật</label>
                                        </div>
                                    </div>
                                    <div class="col-sm-2">
                                        <div class="form-check">
                                            <input class="form-check-input type_product" type="checkbox" value="0"
                                                name="promotions" />
                                            <label class="form-check-label" for="flexCheckChecked">Khuyến mại</label>
                                        </div>
                                    </div>
                                </div>

                                <div class="space-4"></div>
                                <div class="clearfix form-actions">
                                    <div class="col-md-offset-3 col-md-9">
                                        <button class="btn btn-primary" type="submit">Thêm sản phẩm</button>
                                        &nbsp; &nbsp; &nbsp;
                                        <button class="btn btn-danger" type="reset">Reset</button>

                                    </div>
                                </div>
                                {{ csrf_field() }}
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
        $(document).ready(function() {
            $(".type_product").click(function() {
                var val = $(this).is(':checked');
                if (val == true) {
                    $(this).val(1);
                } else {
                    $(this).val(0);
                }
            });
        })
    </script>
@endsection('script')
