<!-- THƯƠNG HIỆU ĐỒNG HÀNH CÙNG CHÚNG TÔI-->
<div class="container-fluid thuonghieu wow animated zoomIn">
  <div class="container">
    <div class="row">
      
          <div class="product_title">
            <h3><span>THƯƠNG HIỆU ĐỒNG HÀNH CÙNG CHÚNG TÔI</span></h3>
          </div>
      
    </div>
    <div class="row">
          <div class="owl-carousel owl-theme danhgiackhachhang_carosel">
            @foreach($quangcao as $val)
           <div class="item">
                <a href=""><img class="hvr-wobble-skew" src="{{url('public/backend/block')}}/{{$val->img}}" alt=""></a>
          </div>
          @endforeach
        

          </div>
           
    </div>
  </div>
</div>
<!-- THƯƠNG HIỆU ĐỒNG HÀNH CÙNG CHÚNG TÔI-->