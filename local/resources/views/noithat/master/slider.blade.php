<div class="container-fluid slider_home"> 
             <div class="large-12 columns">
            <div class="owl-carousel owl-theme slider_carosel">
              @foreach($slider as $val)
              <div class="item">
                <img src="{{url('public/backend')}}/{{$val->img}}" alt="">
              </div> 
              @endforeach     
            </div>
        </div>  
</div>
<script>
  $(document).ready(function() {
              var owl = $('.slider_carosel');
              owl.owlCarousel({
                margin: 10,
                nav: true,
                loop: true,
                autoplay: true,
                autoplayTimeout: 5000,
                responsive: {
                  0: {
                    items: 1
                  },
                  600: {
                    items: 1
                  },
                  1000: {
                    items: 1
                  }
                }
              })
            });
  var hs = $('.slider_carosel .item>img').height();
  var setheight = (hs-19)/2;
  $('.slider_right>div>img').height(setheight);
</script>