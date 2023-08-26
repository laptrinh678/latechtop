  @include('frontend.Itempage.ItemMenu')
<!-- start footer-->
<footer class="thongtinfooter">
  <div class="container">
     <div class="row">
        <div class="col-md-2">
           <img src="{{url('public/backend/')}}/{{$header_footer->img1}}" alt="">
        </div>
        <div class="col-md-4">
           <h5 class="">{{$header_footer->name}}</h5>
           <ul class="ulfooter">
          
             <li>
              <p>Địa chỉ: {{$header_footer->adress}}</p>
               <p> Điện thoại: 0973452222 – 02437512345</p>
              <p>Email:congtyxaydungtranhung@gmail.com</p>
            </li>
           </ul>
        </div>
         <div class="col-md-3">
          
          <h5 class="">DANH MỤC</h5>
           @include('frontend.Itempage.menuFooter')
        </div>
        <div class="col-md-3 ">
          
          <h4 class="">FANPAGE FACEBOOK</h4>
           
        </div>
    </div>
    <div class="row">
      <div class="footer-secondary text-center thanhtoan">
        <button><i class="fa fa-cc-visa" aria-hidden="true"></i></button>
          <button><i class="fa fa-cc-paypal" aria-hidden="true"></i></button>
           <button><i class="fa fa-cc-stripe" aria-hidden="true"></i></button>
        <button><i class="fa fa-cc-mastercard" aria-hidden="true"></i></button>

      </div>

<div class="copyright-footer text-center">
        Copyright 2022 © <strong> {{$header_footer->name}}.</strong>      </div>
    </div>
  </div>
     <div class="hotline">
<div id="phonering-alo-phoneIcon" class="phonering-alo-phone phonering-alo-green phonering-alo-show">
<div class="phonenumber"><span>{{$header_footer->hotline}}</span></div>
<div class="phonering-alo-ph-circle"></div>
<div class="phonering-alo-ph-circle-fill"></div>
<div class="phonering-alo-ph-img-circle">
<a class="pps-btn-img " title="Liên hệ" href="tel:{{$header_footer->hotline}}"> <img src="{{url('public/images')}}/v8TniL3.png" alt="Liên hệ" width="50" class="img-responsive"> </a>
</div>
</div>
</div>
   
</footer>
<!-- footer-->
<script>
   $(document).ready(function() {
              var owl = $('.danhgiackhachhang_carosel');
              owl.owlCarousel({
                margin: 30,
                nav: true,
                loop: true,
                autoplay: false,
                autoplayTimeout: 1000,
                responsive: {
                  0: {
                    items: 3
                  },
                  600: {
                    items: 8
                  },
                  1000: {
                    items: 8
                  }
                }
              })
            });
</script>