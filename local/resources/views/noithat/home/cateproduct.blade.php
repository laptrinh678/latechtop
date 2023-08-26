@extends('fontend.master.index')
 @section('title')
  {{$cate->cat_name}}
 @endsection('title')
 @section('header_style')
      <link rel="stylesheet" href="{{url('public/fontend')}}/css/cateproduct.css">
  <!-- END fancy box -->
 @endsection('header_style')
@section('content')
<!--start cateproduct-->
<div class="cateproduct container-fluid">
  <div class="container">

   <!--  <div class="row">
     <div class="mottram">
       <div class="tieude_item">
             <div class="category_full">
           <div class="tab">
               <span class="dcm">
                 <a href="/danh-muc/so-mi-kieu">{{$cate->cat_name}}</a>
                  <i class="fa fa-caret-right" aria-hidden="true"></i>
                  </span>
               <p class="arrow_cate"></p> 
           </div>        
       </div>
      </div>
       </div>
   </div> -->
    <div class="row">
    
      <div class="col-md-9" id="nhandulieutravetuajax">
        <h1 class="titel_detail_pro"><span>Trang chủ</span> <i class="fa fa-angle-double-right" aria-hidden="true"></i> <span>Sản phẩm</span> <i class="fa fa-angle-double-right" aria-hidden="true"></i> <span>{{$cate->cat_name}}</span>
        
        </h1>
        @foreach($list_cate_pro as $val)
        <div class="ba_hai">
             <div class="item item_nha">
            <div class="img">
                 <a href="{{url("$cate->cat_slug/$val->pro_slug.html")}}"><img class="hvr-bob" src="{{url('public/backend/product')}}/{{$val->pro_img}}" alt=""></a>
            </div>
            <div class="content">
              <h4> <a href="{{url("$cate->cat_slug/$val->pro_slug.html")}}">{{$val->pro_name}}</a> </h4>
            </div>
            <div class="click">
              <span class="start">
                 {{number_format($val->pro_price)}} VNĐ
              </span>
              <span class="chitet">
                <a class="text_chitiet" href="{{url("$cate->cat_slug/$val->pro_slug.html")}}">Chi tiết</a>
              </span>
            </div>
            <div class="shopingcart">
              <a href="{{url("cart/add/$val->id")}}">Thêm vào giỏ hàng</a>
            </div>
          </div>
        </div>
        @endforeach
      </div>
       <div class="col-md-3 cateright">
          <ul class="list-group">
          <li class="list-group-item catename">DANH SÁCH DANH MỤC</li>
          @foreach($listcatepro as $v)
          @if($v->parent_id==0)
          <li class="list-group-item itemcate">
            <div> <i class="fa fa-angle-double-right" aria-hidden="true"></i> 
              <a class="dropdown-toggle" data-toggle="dropdown" href="">
                  {{$v->cat_name}}
                
             </a>
           
          </div>
           
            <ul class="catemenu">
              <?php 
                 $datacon = DB::table('cateproduct')->where('parent_id', $v->id)->get();
                ?>
              @foreach($datacon as $val)
              <li ><i class="fa fa-minus" aria-hidden="true"></i><a href="{{url("danh-muc/$val->cat_slug.html")}}">{{$val->cat_name}}</a></li>
               @endforeach()
            </ul>

          </li>
            @endif
          @endforeach()
         
        </ul>
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
      $.get('http://localhost/fasamy.com/search_gia/'+gia, function(data){ 
          //alert(data); //#sanphamajax chinh la vung se chua du lieu tra ve tren chinh view nay;
          $('#nhandulieutravetuajax').html(data);
       })

   })
   $('#tksptheokichthuoc').change(function(){
    var kichthuoc = $(this).val();
     $.get('http://localhost/fasamy.com/search_kichthuoc/'+kichthuoc, function(data){ 
          //alert(data); //#sanphamajax chinh la vung se chua du lieu tra ve tren chinh view nay;
          $('#nhandulieutravetuajax').html(data);
       })
   })

    $('.itemcate').hover( function()
    {
       $(this).find("ul:first").slideDown(200);
       $(this).find(".fa-chevron-up").show();
       $(this).find(".fa-chevron-down").hide();


    }, function()
    {
       $(this).find("ul:first").hide(200);
        $(this).find(".fa-chevron-up").hide();
       $(this).find(".fa-chevron-down").show();
    });

  
  });
  
</script>

@endsection('script')