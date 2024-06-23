@extends('backend.master.index')
@section('title')
    Lịch sử giao dịch
@endsection('title')
@section('style')
    {{-- <link href="css/pages/tables.css" rel="stylesheet" type="text/css" /> --}}
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
                <a href="{{ url('admin/history/index') }}">Lịch sử giao dịch</a>
            </div>
        </section>
        <!-- Main content -->
        <section class="content padding left_right15">
            <div class="row">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <h4 class="panel-title">
                            <a href="{{ url('admin/products/create') }}">
                                <i class="fa fa-fw fa-angle-double-right"></i> {{ __('message.add') }} sản phẩm
                            </a>
                            <a href="{{ url('admin/cates/') }}">
                                <i class="fa fa-fw fa-angle-double-right"></i>Danh mục
                            </a>
                            <a href="{{ url('admin/users') }}">
                                <i class="fa fa-fw fa-angle-double-right"></i>Thành viên
                            </a>
                        </h4>
                    </div>
                    <br />
                    <div class="panel-body">
                        <ul class="nav nav-tabs">
                            <li class="active"><a data-toggle="tab" href="#home">Lịch sử click mua hàng</a></li>
                            <li><a data-toggle="tab" href="#menu1">Lịch sử login</a></li>
                            <li><a data-toggle="tab" href="#menu2">Lịch sử trắc nghiệm</a></li>
                          </ul>
                          <div class="tab-content">
                            <div id="home" class="tab-pane fade in active">
                                <table class="table table-bordered " id="table">
                                    @include('errors.note')
                                    <thead>
                                        <tr class="filters">
                                            <th style="width:5px;">Id</th>
                                            <th>User mua hàng</th>
                                            <th>Sản phẩm</th>
                                            <th>Thời gian</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($historyShop as $itemHistoryShop)
                                        <?php 
                                            $cateId = $itemHistoryShop->products->cate_id ?? '';
                                            $proSlug = $itemHistoryShop->products->slug .'.html' ?? '';
                                            $proId = $itemHistoryShop->products->id ?? '';
                                        ?>
                                        
                                        <tr>
                                            <td>
                                                {{ $itemHistoryShop->id }}
                                               
                                            </td>
                                            <td>
                                                {{ $itemHistoryShop->users ? $itemHistoryShop->users->name : '' }}
                                                <p>Email : {{ $itemHistoryShop->users ? $itemHistoryShop->users->email : '' }} </p>
                                                <p>
                                                    <button style="margin: 0px;" type="button" slugProduct="{{ $proSlug }}" userName="{{ $itemHistoryShop->users->name ?? '' }}" nameProduct="{{ $itemHistoryShop->products->name ?? '' }}" idProduct="{{ $itemHistoryShop->products->id ?? '' }}" class="btn btn-info btn-lg showPopUpSendEmail" userEmail="{{ $itemHistoryShop->users ? $itemHistoryShop->users->email : '' }}" data-toggle="modal" data-target="#myModal">Gửi email kêu gọi mua hàng</button>
                                                </p>
                                            </td>
                                            <td>
                                                
                                                <a target="_blank" href="{{url("chi-tiet-san-pham/$proId/$proSlug")}}"
                                                    title="">{{ $itemHistoryShop->products ? $itemHistoryShop->products->name : '' }}</a>
                                               

                                            </td>
                                            <td>
                                                {{ $itemHistoryShop->created_at }}
                                                {{ $itemHistoryShop->products->cate_id }}
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                <div>
                                    {{ $historyShop->links() }}
                                </div>
                            </div>
                            <div id="menu1" class="tab-pane fade">
                                <table class="table table-bordered " id="table">
                                    @include('errors.note')
                                    <thead>
                                        <tr class="filters">
                                            <th style="width:5px;">Id</th>
                                            <th>User Login</th>
                                            <th>Thời gian</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($historyLogin as $itemHistoryLogin)
                                        <tr>
                                            <td>
                                                {{ $itemHistoryLogin->id }}
                                            </td>
                                            <td>
                                                {{ $itemHistoryLogin->users ? $itemHistoryLogin->users->name : '' }}
                                                <p>Email : {{ $itemHistoryLogin->users ? $itemHistoryLogin->users->email : '' }} </p>
                                            </td>
                                            <td>
                                                {{ $itemHistoryLogin->created_at }}
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                <div>
                                    {{ $historyLogin->links() }}
                                </div>
                            </div>
                            <div id="menu2" class="tab-pane fade in active">
                                <table class="table table-bordered " id="table">
                                    @include('errors.note')
                                    <thead>
                                        <tr class="filters">
                                            <th style="width:5px;">Id</th>
                                            <th>User trắc nghiệm</th>
                                            <th>Bộ câu hỏi</th>
                                            <th>Thời gian</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($historyQuiz as $itemHistoryQuiz)
                                       
                                        <tr>
                                            <td>
                                                {{ $itemHistoryQuiz->id }}
                                               
                                            </td>
                                            <td>
                                                {{ $itemHistoryQuiz->users ? $itemHistoryQuiz->users->name : '' }}
                                                <p>Email : {{ $itemHistoryQuiz->users ? $itemHistoryQuiz->users->email : '' }} </p>
                                                <p>
                                                    <button style="margin: 0px;" type="button" slugProduct="{{ $proSlug }}" userName="{{ $itemHistoryShop->users->name ?? '' }}" nameProduct="{{ $itemHistoryShop->products->name ?? '' }}" idProduct="{{ $itemHistoryShop->products->id ?? '' }}" class="btn btn-info btn-lg showPopUpSendEmail" userEmail="{{ $itemHistoryShop->users ? $itemHistoryShop->users->email : '' }}" data-toggle="modal" data-target="#myModal">Gửi email kêu gọi mua hàng</button>
                                                </p>
                                            </td>
                                            <td>
                                                <?php
                                                    $questionGroupId = $itemHistoryQuiz->questionGroup->id ?? null;
                                                    $questionGroupSlug = $itemHistoryQuiz->questionGroup->slug.'.html' ?? null;
                                                    
                                                ?>
                                                
                                                <a target="_blank" href="{{ url("trac-nghiem/$questionGroupId/$questionGroupSlug") }}"
                                                    title="">{{ $itemHistoryQuiz->questionGroup ? $itemHistoryQuiz->questionGroup->name : '' }}</a>
                                               
                                            </td>
                                            <td>
                                                {{ $itemHistoryQuiz->created_at }}
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                <div>
                                    {{ $historyShop->links() }}
                                </div>
                            </div>
                            
                          </div>
                       
                    </div>
                </div>
            </div>
            <!-- row-->
        </section>
        <input type="hidden" value="{{ url('') }}" id="url">
    </aside>
    <!-- Trigger the modal with a button -->

<!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Email kêu gọi mua hàng</h4>
      </div>
      <div class="modal-body">
        <form action="" method="post" id="sendMailHistoryShop">
            <div class="form-group">
                <label for="email">Tên sản phẩm</label>
                <input type="text" name="name" class="form-control" id="productName">
              </div>
            <div class="form-group">
              <label for="email">Email address:</label>
              <input type="email" name="email" class="form-control" id="email">
              <input type="hidden" class="form-control" name="product_id" id="productId">
              <input type="hidden" class="form-control" name="pro_slug" id="slugProduct">
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
@endsection('content')
@section('script')
    <script src="js/app.js" type="text/javascript"></script>
    {{-- <script type="text/javascript" src="vendors/datatables/js/jquery.dataTables2.js"></script>
    <script type="text/javascript" src="vendors/datatables/js/dataTables.bootstrap.js"></script> --}}
<script>
    $(document).ready(function(){
        $('.showPopUpSendEmail').click(function(){
            let idproduct = $(this).attr('idproduct');
            let userEmail = $(this).attr('useremail');
            let nameProduct = $(this).attr('nameproduct');
            let nameUser = $(this).attr('username');
            let slugProduct = $(this).attr('slugproduct');

            $('#productId').val(idproduct);
            $('#email').val(userEmail);
            $('#productName').val(nameProduct);
            $('#userName').val(nameUser);
            $('#slugProduct').val(slugProduct);
            $('#dataSendEmail').text('Khuyến mại 20% ' + nameProduct + ' nhân dịp...' + 'Click vào link bên dưới ngay vì thời gian khuyến mại có hạn, nhanh tay để hưởng ưu đãi');
        })
        $("#sendMailHistoryShop").submit(function(e) {
            event.preventDefault();
            let urlData = $('#url').val() + '/admin/history/sendEmailShop';
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
                            $('#myModal').hide();
                            $('.modal-backdrop').hide();
                           alert('Gửi email thành công')
                       }else
                       {
                            alert('lỗi gửi Email Bạn vui lòng thử lại')
                       }
                }
            })
        });
    })
</script>
@endsection('script')
