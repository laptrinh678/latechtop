@extends('backend.master.index')
@section('title')
Danh sách slider
@endsection('title')
@section('style')
<link rel="stylesheet" type="text/css" href="vendors/datatables/css/dataTables.bootstrap.css" />
<link href="css/pages/tables.css" rel="stylesheet" type="text/css" />
<link href="vendors/modal/css/component.css" rel="stylesheet" />
    <link href="css/pages/advmodals.css" rel="stylesheet" />
@endsection('style')
@section('content')
     <aside class="right-side strech" id="sideright">

            <!-- Content Header (Page header) -->
            <section class="content-header list_user">
                <div >
                     <a href="{{url('admin/')}}">
                            <i class="livicon" data-name="home" data-size="14" data-color="#000"></i> Trang chủ
                            <i class="fa fa-fw fa-angle-double-right"></i>
                    </a>
                     <a href="{{url('admin/slider/index')}}">{{ __('pages.slider.name') }}</a>

                    <a href="{{url('admin/slider/create')}}">
                           <i class="fa fa-fw fa-angle-double-right"></i> Danh sách
                    </a>

                     <!--  <a onclick="return confirm('Bạn không đủ quyền thực hiện chức năng này ?');" >
                           <i class="fa fa-fw fa-angle-double-right"></i>Add User
                    </a>

                      <a onclick="return confirm('Bạn không đủ quyền thực hiện chức năng này ?');" >
                           <i class="fa fa-fw fa-angle-double-right"></i> Add User
                    </a> -->


                </div>
            </section>
            <!-- Main content -->
            <section class="content padding left_right15">
                <div class="row">
                    <div class="panel panel-primary ">
                        <div class="panel-heading">
                            <h4 class="panel-title">

                                <a href="#" data-toggle="modal" data-target="#modal-1">
                                       <i class="fa fa-fw fa-angle-double-right"></i> {{ __('message.add') }} slider
                                </a>

                        
                            </h4>
                        </div>
                        <br />
                        <div class="panel-body">


                            <table class="table table-bordered " id="table">
                                   @include('errors.note')
                                <thead>
                                    <tr class="filters">
                                        <th>#</th>
                                        <th>Ảnh</th>
                                        <th>Thông tin</th>
                                        <th>Loại slider</th>
                                        <th>Trạng thái</th>
                                        <th>Hành động</th>
                                    </tr>
                                </thead>
                                <tbody>
                                	@foreach($data as $k=>$v)
                                    <tr>
                                        <td>{{$k+1}}</td>
                                        <td>
                                
                                                @if($v->img)
                                                  <img src="{{url('public/backend/')}}/{{$v->img}}" width='30px' height='40'  alt="">
                                                @endif
                                        
                                        </td>
                                        <td>
                                          <p>Thông tin 1: {{$v->des1}}</p>
                                           <p>Thông tin 2: {{$v->des2}}</p>
                                        </td>
                                        <td>
                                          @if($v->slider_type==1)
                                          Ngang trang chủ
                                          @elseif($v->slider_type==2)
                                          Ngang trang danh sách
                                         @elseif($v->slider_type==3)
                                         Chân trang
                                         @elseif($v->slider_type==4)
                                         Trang chi tiết
                                          @elseif($v->slider_type==5)
                                         Đối tác
                                         @endif
                                        </td>

                                        <td>
                                            @if($v->deleted_at =='')
                                            <button class="btn btn-success changeStatus" data="1" id ="{{$v->id}}">ON</button>
                                            @else
                                             <button class="btn btn-danger changeStatus" data="" id ="{{$v->id}}">OFF</button>
                                             @endif
                                        </td>

                                        <td>
                                            <a href="{{url('admin/slider/destroy')}}/{{$v->id}}"><button class="btn btn-danger">Delete</button></a>
                                          <!--    <a href="{{url('admin/slider/edit')}}/{{$v->id}}"><button class="btn btn-primary">Edit</button></a> -->
                                        </td>
                                    </tr>
                                    @endforeach

                                </tbody>
                            </table>

                        </div>
                    </div>
                </div>
                <!-- row-->
            </section>

      <!--moddal dialog -->
                <div class="modal fade modal-fade-in-scale-up" tabindex="-1" id="modal-1" role="dialog" aria-labelledby="modalLabelfade" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header bg-primary">
                                <h4 class="modal-title" id="modalLabelfade">Thêm mới slider</h4>
                            </div>
                            <div class="modal-body">
                                <form method="post" action="" enctype="multipart/form-data">
                                      <div class="form-group">
                                        <label for="email">Ảnh (bắt buộc)</label>
                                        <div class="itemImage">
                                             <img id="output" width="100%" height="" src="" style="display:none">
                                        </div>
                                     <input type="file" class="upfile hidden" name="img" accept="image/*" required >
                                         <span class="btn btn-success chooseFile">Choose Img</span>
                                         <span class="btn btn-danger removeFile">Delete</span>
                                      </div>
                                      <div class="form-group">
                                        <label for="pwd">Thông tin 1</label>
                                        <input type="text" class="form-control" name="des1" id="pwd">
                                      </div>
                                      <div class="form-group">
                                       <label for="pwd">Thông tin 2</label>
                                        <input type="text" class="form-control" name="des2" id="pwd2">
                                      </div>
                                       <div class="form-group">
                                       <label for="pwd">Thông tin 3</label>
                                        <input type="text" class="form-control" name="des3" id="pwd3">
                                      </div>
                                      <div class="form-group">
                                       <label for="pwd">Loại slider</label>
                                       <select class="form-control" name="slider_type" id="" required>
                                           <option value="">Chọn loại slider</option>
                                           <option value="1">Ngang trang chủ</option>
                                           <option value="2">Ngang trang danh sách</option>
                                           <option value="3">Chân trang</option>
                                           <option value="4">Trang chi tiết</option>
                                           <option value="5">Đối tác</option>
                                           <option value="6">Ảnh mặc định bài viết</option>
                                           <option value="7">Ảnh mặc định sản phẩm</option>
                                       </select>
                                      </div>
                                      {{csrf_field()}}
                                      <button type="submit" class="btn btn-success">Thêm mới</button>
                                    </form>
                            </div>
                            <div class="modal-footer" style="padding: 0px;">
                                <button class="btn  btn-primary" data-dismiss="modal">Close me!</button>
                            </div>
                        </div>
                    </div>
                </div>
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
$(document).ready(function()
{
    $('#table').dataTable();
    $('body').on('click','.changeStatus', function(){
        let data = $(this).attr('data');
        let url = $('#url').val();
        let id = $(this).attr('id');
        let val ='';
        if(data !=''){
            val = 1;
        }else{
            val = 0;
        }
        var thiss = $(this);
        $.get(url+'/admin/slider/changeStatus/'+val+'/'+id,function(data){
                thiss.parent().html(data);
            })
    })
     $('body').on('click','.chooseFile', function(){
  
            $(this).prev().trigger('click');

        })
     $('body').on('change', '.upfile', function(e) {
            let v = $(this).val();
            if (v === '') {
                return false;
            } else {
                var datafile = v.split('.').pop().toLowerCase();
                var resultCheckFile = check_type_file(datafile);
                if (resultCheckFile != 1) {
                    $('#output').show();
                    $('.icon_delete_img').show();
                    $('#output').attr('src', '#');
                    $('#output').css('height', 200);
                    $('#view_img_1').hide();
                    console.log('loi dinh dang');
                } else {
                    var datafile = e.target.files[0];
                    var reader = new FileReader();
                    reader.onload = function(e) {
                        $('#output').show();
                        $('#output').css('height', 'auto');
                        $('.icon_delete_img').show();
                        $('#output').attr('src', e.target.result);
                        $('.removeFile').show();
                    }
                    reader.readAsDataURL(datafile);
                    if (datafile.size >= 7042880) {
                        $('.err2').text('画像のサイズは5MB以内です。')
                        return false;
                    } else {
                        $('.btnSave').removeAttr('disabled');
                        $('.err2').text('');
                        return false;
                    }
                }
            }
        });
     $('body').on('click','.removeFile', function(){
           $('#output').attr('src', '');
            $('#output').hide();
            $('.upfile').val('');
            $(this).hide();
     })
});
</script>

@endsection('script')

