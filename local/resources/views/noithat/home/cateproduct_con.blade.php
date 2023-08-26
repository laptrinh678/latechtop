@extends('fontend.master.index')
 @section('title')
  {{$cate->cat_name}}
 @endsection('title')
 @section('header_style')
    <!--   <link rel="stylesheet" href="{{url('public/fontend')}}/css/cateproduct.css"> -->
      <link rel="stylesheet" href="{{url('public/fontend/css')}}/detailproduct.css" /> 
  <!-- END fancy box -->
  <style>
    .title_detail {
    font-size: 15px;
    font-family: "RobotoBold";
    margin-top: 20px;
    background: #22459D;
    padding: 20px 0px;
    color: white;
    margin-bottom: 20px;
}
.fa-hand-o-right {
    color: white;
    margin-right: 10px;
    margin-left: 10px;

}
  </style>
 @endsection('header_style')
@section('content')
<!--start cateproduct-->
<div class="cateproduct container-fluid">
  <div class="container paddingtopbottom20">

    <div class="row">

      <div class="col-md-9" id="nhandulieutravetuajax">
        <ul class="list-inline"style="padding-left: 20px; margin-left: 0px;">
      <li><a href="{{url('')}}">Trang chủ</a></li>
      <li><i class="fa fa-angle-double-right" aria-hidden="true"></i> Danh mục</li>
      <li><i class="fa fa-angle-double-right" aria-hidden="true"></i> {{$cate->cat_name}}</li>
      
    </ul>
      <!--    <div class="panel panel-default">
          <div class="panel-body"><i class="fa fa-hand-o-right" aria-hidden="true"></i>Trang{{$cate->cat_name}}</div>
        </div> -->
        <!-- <div class="tieude_item">
          <h1 class="title_detail"><</h1>
              
       </div> -->
        @foreach($pro_cate_con as $val)
        <div class="col-sm-4">
             <div class="item item_nha">
            <div class="img">
                 <a href="{{url("$val->cat_id/$val->post_slug.html")}}"><img class="hvr-bob" src="{{url('public/backend/post')}}/{{$val->post_img}}" alt=""></a>
            </div>
            <div class="content">
              <h4> <a href="{{url("$val->cat_id/$val->post_slug.html")}}">{{$val->name}}</a> </h4>
            </div>
            <div class="click">
              <span class="start">
                @if($val->price !=''){{number_format($val->price) }} VNĐ @endif
              </span>
              <span class="chitet">
                <a class="text_chitiet" href="{{url("$$val->cat_id/$val->post_slug.html")}}">Chi tiết</a>
              </span>
            </div>
            <div class="shopingcart">
              <a href="{{url("cart/add/$val->id")}}">Thêm vào giỏ hàng</a>
            </div>
          </div>
        </div>
        @endforeach
       
     

      </div>
       <div class="col-md-3">
          <div class="mottram">
                    <h5 class="title_detail"> <i class="fa fa-hand-o-right" aria-hidden="true"></i>SẢN PHẨM MỚI NHẤT
                    </h5>


                    @foreach($pro_moi as $val)
                  <div class="form-group" style="min-height: 100px;
                   border-bottom: 1px solid #d5d0d0;">
                        <div class="left_30">
                          <a href="{{url("$val->cat_id/$val->post_slug.html")}}" class="">
                              <img src="{{url('public/backend/post')}}/{{$val->post_img }}" alt="{{$val->name}}">
                            </a>
                        </div>
                        <div class="right_70" style="padding-top: 0px;">
                          <p> <a href="{{url("$val->cat_id/$val->post_slug.html")}}"> {{$val->name}}</a></p>
                          <p>Giá:@if($val->price !=''){{number_format($val->price) }} VNĐ @endif</p>
                        </div>
                      </div>
                      <div class="clearfix"></div>
                    @endforeach

                </div>
        </div>
        </div>
    </div>
    </div>
</div>
@endsection
@section('script')
<script>
  $(document).ready(function()
  {
   $('#tksptheogia').change(
    function()
    {
      var gia = $(this).val();
      $.get('http://nhamoipro.xyz/search_gia/'+gia, function(data){ 
          //alert(data); //#sanphamajax chinh la vung se chua du lieu tra ve tren chinh view nay;
          $('#nhandulieutravetuajax').html(data);
       })

   })
   $('#tksptheokichthuoc').change(function(){
    var kichthuoc = $(this).val();
     $.get('http://nhamoipro.xyz/search_kichthuoc/'+kichthuoc, function(data){ 
          //alert(data); //#sanphamajax chinh la vung se chua du lieu tra ve tren chinh view nay;
          $('#nhandulieutravetuajax').html(data);
       })
   })
  
  });
  
</script>

@endsection('script')