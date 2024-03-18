@extends('backend.master.index')
@section('title')
    Lịch sử giao dịch
@endsection('title')
@section('style')
    <link href="css/pages/tables.css" rel="stylesheet" type="text/css" />
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
                                        <tr>
                                            <td>
                                                {{ $itemHistoryShop->id }}
                                            </td>
                                            <td>
                                                {{ $itemHistoryShop->users ? $itemHistoryShop->users->name : '' }}
                                                <p>Email : {{ $itemHistoryShop->users ? $itemHistoryShop->users->email : '' }} </p>
                                            </td>
                                            <td>
                                                {{ $itemHistoryShop->products ? $itemHistoryShop->products->name : '' }}
                                                Giá : <p>{{ $itemHistoryShop->products ? number_format($itemHistoryShop->products->price) : '' }}</p>
                                            </td>
                                            <td>
                                                {{ $itemHistoryShop->created_at }}
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
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
                            </div>
                          </div>
                       
                    </div>
                </div>
            </div>
            <!-- row-->
        </section>
        <input type="hidden" value="{{ url('') }}" id="url">
    </aside>
@endsection('content')
@section('script')
    <script src="js/app.js" type="text/javascript"></script>
    <script type="text/javascript" src="vendors/datatables/js/jquery.dataTables2.js"></script>
    <script type="text/javascript" src="vendors/datatables/js/dataTables.bootstrap.js"></script>
@endsection('script')
