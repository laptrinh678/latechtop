@extends('backend.master.index')
@section('title')
    {{ __('message.add') }} {{ __('pages.post.name') }}
@endsection('title')
@section('style')
    <link href="vendors/bootstrap-multiselect/css/bootstrap-multiselect.css" rel="stylesheet" type="text/css">
    <link href="vendors/select2/css/select2.min.css" rel="stylesheet" type="text/css">
    <link href="vendors/select2/css/select2-bootstrap.css" rel="stylesheet" type="text/css">
    <link href="vendors/selectize/css/selectize.css" rel="stylesheet" type="text/css">
    <link href="vendors/selectize/css/selectize.bootstrap3.css" rel="stylesheet" type="text/css">
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
        .item-reply{ padding-top: 10px;}
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
                <a href="{{ url('admin/blogs') }}">Danh sách bộ câu hỏi</a>
                <a href="{{ url('admin/questionGroup/create') }}">
                    <i class="fa fa-fw fa-angle-double-right"></i>
                    {{ __('message.add') }} Thêm mới bộ câu hỏi
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
                                Bộ câu hỏi
                            </h3>
                            <span class="pull-right clickable">
                                <i class="glyphicon glyphicon-chevron-up"></i>
                            </span>
                        </div>

                        <div class="panel-body">
                            <form class="form-horizontal" role="form" method="post" action="" enctype="multipart/form-data">
                                <!--  -->
                                <div class="form-group">
                                    <label class="col-sm-2 control-label no-padding-right" for="form-field-1-1">Danh
                                        mục </label>
                                    <div class="col-sm-3">
                                        <select name="cate_id" id="" class="form-control">
                                            <option value="">Chọn danh mục</option>
                                            <?php
                                            function showCategories($categories, $parentId = 0, $char = '')
                                            {
                                                foreach ($categories as $key => $items) {
                                                    if ($items->parent_id == $parentId) {
                                                        echo '<option value="' . $items->id . '">';
                                                        echo $char . $items->name;
                                                        echo '</option>';
                                                        unset($categories[$key]);
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
                                    <label for="first_name" class="col-sm-2 control-label">Tên bộ câu hỏi</label>
                                    <div class="col-sm-10">
                                            <textarea class="form-control" name="name" id="" cols="30" rows="3"></textarea>
                                        <span style="color: red;">{{ $errors->first('name') }}</span>
                                    </div>
                                </div>

                                <div class="space-4"></div>
                                <div class="clearfix form-actions">
                                    <div class="col-md-offset-3 col-md-9">
                                        <button class="btn btn-primary" type="submit">{{ __('message.add') }} bộ câu
                                            hỏi</button>
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
    <script src="vendors/bootstrap-multiselect/js/bootstrap-multiselect.js" type="text/javascript"></script>
    <script src="vendors/select2/js/select2.js" type="text/javascript"></script>
    <script src="vendors/selectize/js/standalone/selectize.min.js" type="text/javascript"></script>
    <script src="vendors/iCheck/js/icheck.js" type="text/javascript"></script>
    <script src="vendors/bootstrap-switch/js/bootstrap-switch.js" type="text/javascript"></script>
    <script src="vendors/switchery/js/switchery.js" type="text/javascript"></script>
    <script src="js/pages/custom_elements.js" type="text/javascript"></script>
    <!-- end of page level js -->
    <script>
       $(document).ready(function(){
        $('.addItemButton').click(function(){
            let htmtAdd  = '<div class="item-reply row">';
                htmtAdd += '<label for="first_name" class="col-sm-2 control-label">'+'Nội dung đáp án</label>';
                htmtAdd += '<div class="col-sm-9"><textarea class="form-control" name="reply_name[]" id="" cols="30" rows="2"></textarea></div>';
                htmtAdd += '<div class="col-sm-1"><input class="form-check-input chooseReply" type="radio" name="chooseAnswer[]"><input type="hidden" value="" name="reply_value[]"</div></div>';
            $('.addItemReply').append(htmtAdd);
        });
        $('body').on('click', '.chooseReply', function() {
                $(this).next().val(1);
            });
       })
    </script>
@endsection('script')
