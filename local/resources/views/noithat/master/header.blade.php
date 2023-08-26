
@section('header_style')
<script src="{{url('public/fontend')}}/bootstrap/bootstrap3.4.0.min.js"></script>
@endsection('header_style')
@include('errors.sanpham')
 
<header>
  <div class="container">
    <div class="row">
       <div class="menu-top"> <!-- top menu top -->
            <div class="col-xs-12 col-md-5 col-lg-5 float-right thongtin">
              <div class="btn-group" role="group" aria-label="Basic example">
                <button type="button" class="btn btn-secondary"> Giờ làm việc:8:00(T2 – CN)</button>
                <button type="button" class="btn btn-secondary">Giới thiệu</button>
                <button type="button" class="btn btn-secondary">Tin tức</button>
                <button type="button" class="btn btn-secondary">Liên hệ</button>
              </div>
              
            </div>
          </div>
    </div>
    <div class="row">
      
          <div id="banner"><!-- banner -->
          
            <!-- header logo and search box -->
            <div class="row paddingBottom20">
              <div class="logo col-md-9 col-sm-9 col-xs-12">
                <h1 class="float-left">
                  <a href="{{url('')}}"><img src="{{url('public/backend')}}/{{$header_footer->logo}}" alt=""></a>
                </h1>
              </div>
              <div class="right_header col-md-3 col-sm-3 col-xs-12 text-right">
                <div class="btn-group btn-group-justified" role="group" aria-label="...">
 
  <div class="btn-group" role="group" >
   <img src="{{url('public/backend')}}/bg_hot_sup.png" alt="">
  </div>
  <div class="btn-group" style="padding-left: 10px;" role="group">
    <div class="text-left" style="margin-bottom: 7px">HOTLINE:</div>
    <div class="text-left" > <strong>{{$header_footer->phone}}</strong></div>
  </div>
</div>

              </div>
              <div class="clearfix"></div>
            </div>
            
          </div>

     

     </div>
  </div>
  


     

  </header>
 
  <script type="text/javascript">
    $(document).ready(function()
    {
        $('#btsearch').click( function()
        {
            if($('#inputsearch').val()=='')
            {
                alert('Bạn vui lòng nhập giá trị tìm kiếm');
                return false;
            }
            else
            {
                return true;
            }

        });

      

    });
</script>