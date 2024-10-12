@extends('backend.master.index')
@section('title')
{{__('message.edit')}} thông tin
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
                     <a href="{{url('admin/')}}">
                            <i class="livicon" data-name="home" data-size="14" data-color="#000"></i> Trang chủ
                            <i class="fa fa-fw fa-angle-double-right"></i>
                    </a>
                     <a href="{{url('admin/imfomation')}}">Thông tin</a>
                     
                           <i class="fa fa-fw fa-angle-double-right"></i> Sửa thông tin
                       
                </div>
            </section>
            <br>
            <section class="content">
                <div class="row">
                    <div class="col-md-12">
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                <h3 class="panel-title">
                                    <i class="livicon" data-name="user-add" data-size="18" data-c="#fff" data-hc="#fff" data-loop="true"></i>Sửa thông tin
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
                        <input type="text" id="first_name" name="name" value="{{$data->name}}" placeholder="Nhập tên danh mục" class="form-control required" />
                        <span style="color: red;">{{$errors->first('password')}}</span>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label no-padding-right" for="form-field-1-1">Logo</label>
                    <div class="col-sm-6">                          
                    <div>
                            <img id="myimage" src="{{url('public/backend')}}/{{$data->logo}}" width="200px" style="margin-bottom: 5px;">
                            <span class="btn" onclick="remove(this)"><i class="fa fa-times-circle text-danger" aria-hidden="true"></i></span>
                        </div>
                    <input type="file" onchange="changeHandler(event)" id="inputupfile" name="logo">
                     
                    </div>
                </div>
                 <div class="form-group">
                    <label class="col-sm-2 control-label no-padding-right" for="form-field-1-1">Img1</label>
                    <div class="col-sm-6">                          
                    <div>
                            <img id="myimage1" src="{{url('public/backend')}}/{{$data->img1}}" width="200px" style="margin-bottom: 5px;">
                            <span class="btn" onclick="remove1(this)"><i class="fa fa-times-circle text-danger" aria-hidden="true"></i></span>
                        </div>
                    <input type="file" onchange="changeHandler1(event)" id="inputupfile1" name="img1">
                     
                    </div>
                </div>
                 <div class="form-group">
                    <label class="col-sm-2 control-label no-padding-right" for="form-field-1-1">Img2</label>
                    <div class="col-sm-6">                          
                    <div>
                            <img id="myimage2" src="{{url('public/backend')}}/{{$data->img2}}" width="200px" style="margin-bottom: 5px;">
                            <span class="btn" onclick="remove2(this)"><i class="fa fa-times-circle text-danger " aria-hidden="true"></i></span>
                        </div>
                    <input type="file" onchange="changeHandler2(event)" id="inputupfile2" name="img2">
                     
                    </div>
                </div>
                <div class="form-group">
                <label for="first_name" class="col-sm-2 control-label">Slogan</label>
                    <div class="col-sm-6">
                        <input type="text" id="first_name"  value="{{$data->slogan}}" name="slogan" placeholder="Nhập slogan" class="form-control required" />
                        <span style="color: red;">{{$errors->first('password')}}</span>
                    </div>
                </div>
                <div class="form-group">
                <label for="first_name" class="col-sm-2 control-label">adress</label>
                    <div class="col-sm-3">
                        <input type="text" id="first_name"  value="{{$data->adress}}" name="adress" placeholder="Nhập adress" class="form-control required" />
                        <span style="color: red;">{{$errors->first('password')}}</span>
                    </div>
                    <label for="first_name" class="col-sm-1 control-label">hotline</label>
                    <div class="col-sm-2">
                        <input type="text" id="first_name"  value="{{$data->hotline}}"  name="hotline" placeholder="Nhập hotline" class="form-control required" />
                        <span style="color: red;">{{$errors->first('password')}}</span>
                    </div>
                    <label for="first_name" class="col-sm-1 control-label">phone</label>
                    <div class="col-sm-2">
                        <input type="text" id="first_name" value="{{$data->phone}}" name="phone" placeholder="Nhập phone" class="form-control required" />
                        <span style="color: red;">{{$errors->first('password')}}</span>
                    </div>
                </div>
              
                 <div class="form-group">
                <label for="first_name" class="col-sm-2 control-label">Từ khóa Seo</label>
                    <div class="col-sm-6">
                        <input type="text" value="{{$data->text_seo}}" name="text_seo" placeholder="Từ khóa seo" class="form-control required" />
                        <span style="color: red;">{{$errors->first('text_seo')}}</span>
                    </div>
                </div>
                <div class="form-group">
                <label for="first_name" class="col-sm-2 control-label">Mail</label>
                    <div class="col-sm-6">
                        <input type="text" id="first_name" value="{{$data->mail}}" name="mail" placeholder="Nhập mail" class="form-control required" />
                        <span style="color: red;">{{$errors->first('password')}}</span>
                    </div>
                </div>
                <div class="form-group">
                    <label for="first_name" class="col-sm-2 control-label">Title trang chủ</label>
                        <div class="col-sm-6">
                            <input type="text" id="first_name" value="{{$data->title_home}}" name="title_home" placeholder="title home" class="form-control required" />
                            <span style="color: red;">{{$errors->first('title_home')}}</span>
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
                    <?php
                       $img = $data->img1;
                       $img_decode = json_decode($img, true);
                        ?>
                     @if($img_decode)
                    @foreach($img_decode as $key=>$val)                         
                    <div class="itemimg"><img id="editImg{{$key+1}}" src="{{url('public/backend')}}/{{$val}}" alt="your image"> </div>
                    @endforeach
                    @endif
                     
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label no-padding-right" for="form-field-1-1">Mô tả ngắn</label>
                    <div class="col-sm-10">
                    <textarea class="ckeditor"  name="des1" id="a" cols="90" rows="10" >{{$data->des1}}</textarea>
						<script type="text/javascript">
				     			CKEDITOR.replace('des1');
				      </script>﻿		
                    </div>
                </div> 

                <div class="form-group">
                    <label class="col-sm-2 control-label no-padding-right" for="form-field-1-1">Mô tả chi tiết</label>
                    <div class="col-sm-10">
                    <textarea class="ckeditor"  name="des2" id="a2" cols="90" rows="30" >{{$data->des2}}</textarea>
                        <script type="text/javascript">
                                CKEDITOR.replace('des2');
                      </script>      
                    </div>
                </div> 

                <div class="form-group">
                    <label class="col-sm-2 control-label no-padding-right" for="form-field-1-1">Thông tin tài khoản</label>
                    <div class="col-sm-10">
                    <textarea class="ckeditor"  name="des4" id="a3" cols="90" rows="30" >{{$data->des4}}</textarea>
                        <script type="text/javascript">
                                CKEDITOR.replace('des4');
                      </script>        
                    </div>
                </div> 
                <div class="form-group">
                    <label class="col-sm-2 control-label no-padding-right" for="form-field-1-1">Thông tin khác</label>
                    <div class="col-sm-10">
                    <textarea class="ckeditor"  name="des3" id="a4" cols="90" rows="30" >{{$data->des3}}</textarea>
                        <script type="text/javascript">
                                CKEDITOR.replace('des3');
                      </script>        
                    </div>
                </div> 
                <div class="form-group">
                    <label class="col-sm-2 control-label no-padding-right" for="form-field-1-1">Text đầu sản phẩm</label>
                    <div class="col-sm-10">
                    <textarea class="ckeditor"  name="headProduct" id="a4" cols="90" rows="10" >{{$data->headProduct}}</textarea>
                        <script type="text/javascript">
                                CKEDITOR.replace('headProduct');
                      </script>        
                    </div>
                </div> 
                <div class="form-group">
                    <label class="col-sm-2 control-label no-padding-right" for="form-field-1-1">Text cuối sản phẩm</label>
                    <div class="col-sm-10">
                    <textarea class="ckeditor"  name="endProduct" id="a4" cols="90" rows="10" >{{$data->endProduct}}</textarea>
                        <script type="text/javascript">
                                CKEDITOR.replace('endProduct');
                      </script>        
                    </div>
                </div> 
                <div class="form-group">
                    <label class="col-sm-2 control-label no-padding-right" for="form-field-1-1">Nạp tiền thành viên</label>
                    <div class="col-sm-10">
                    <textarea class="ckeditor"  name="money_member" id="money_member" cols="90" rows="10" >{{$data->money_member}}</textarea>
                        <script type="text/javascript">
                                CKEDITOR.replace('money_member');
                      </script>        
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label no-padding-right" for="form-field-1-1">Danh sách kiến thức chung</label>
                    <div class="col-sm-10">
                    <textarea class="ckeditor"  name="documents_round_one" id="documents_round_one" cols="90" rows="10" >{{$data->documents_round_one}}</textarea>
                        <script type="text/javascript">
                                CKEDITOR.replace('documents_round_one');
                      </script>        
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label no-padding-right" for="form-field-1-1">Danh sách tài liệu vòng 1</label>
                    <div class="col-sm-10">
                    <textarea class="ckeditor"  name="documents_round_one_list" id="documents_round_one_list" cols="90" rows="10" >{{$data->documents_round_one_list}}</textarea>
                        <script type="text/javascript">
                                CKEDITOR.replace('documents_round_one_list');
                      </script>        
                    </div>
                </div> 
                <div class="space-4"></div>
                <div class="clearfix form-actions">
                    <div class="col-md-offset-3 col-md-9">
                        <button class="btn btn-primary" type="submit">{{__('message.edit')}} thông tin</button>
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

      function changeHandler1(evt) {
        var files = evt.target.files;
        //console.log(files);
        var file = files[0];
        //console.log(file.name);
        var fileReader = new FileReader();
        fileReader.onload = function() {
            var url = fileReader.result;
            var myImg = document.getElementById("myimage1");
            myImg.src = url;
        }
        fileReader.readAsDataURL(file); // fileReader.result -> URL.
    }

    function remove1(_this) {
        document.getElementById("myimage1").setAttribute('src', '');
        // set gia tri the input file ve rong;
        document.getElementById('inputupfile1').value = "";
    }

     function changeHandler2(evt) {
        var files = evt.target.files;
        //console.log(files);
        var file = files[0];
        //console.log(file.name);
        var fileReader = new FileReader();
        fileReader.onload = function() {
            var url = fileReader.result;
            var myImg = document.getElementById("myimage2");
            myImg.src = url;
        }
        fileReader.readAsDataURL(file); // fileReader.result -> URL.
    }

    function remove2(_this) {
        document.getElementById("myimage2").setAttribute('src', '');
        // set gia tri the input file ve rong;
        document.getElementById('inputupfile2').value = "";
    }
</script>
@endsection('script')

	