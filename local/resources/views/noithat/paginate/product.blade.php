@foreach($product as $val)
<div class="col-md-3">
  <div class="item item_nha">
            <div class="img">
                 <a href="{{url("$val->cat_id/$val->post_slug.html")}}"><img class="hvr-bob" src="{{url('public/backend/post')}}/{{$val->post_img}}" alt=""></a>
            </div>
            <div class="content">
              <h4> <a href="{{url("chi-tiet-san-pham/$val->post_slug.html")}}"> {{$val->name}}</a> </h4>
            </div>
            <div class="click">
              <span class="start">
                {{number_format($val->price)}} VNĐ
              </span>
              <span class="chitet">
                <a class="text_chitiet" href="{{url("$val->cat_id/$val->post_slug.html")}}">Chi tiết</a>
              </span>
            </div>
            <div class="shopingcart">
              <a href="{{url("cart/add/$val->id")}}">Thêm vào giỏ hàng</a>
            </div>
  </div>
</div>
 


@endforeach