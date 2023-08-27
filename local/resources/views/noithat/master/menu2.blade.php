  <!--menu desktop -->
  <nav class="navbar navbar-inverse menudesktop ">
    <div id="menu_click">
     <div class="row">
  	    <ul class="nav navbar-nav" >
          <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="{{url('')}}">TRANG CHỦ</a> 
          </li>
          <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="{{url('')}}">GIỚI THIỆU</a> 
          </li>

          <li class="dropdown">
            <a class="dropdown-toggle" data-toggle="dropdown" href="{{url("$ao->cat_slug.html")}}">
              {{$ao->cat_name}}
                <i class="fa fa-chevron-down" aria-hidden="true"></i>
          </a>
          <div class="xoaydiv"></div>
            <ul class="dropdown-menu tintucmenucon">
             <li class="container">
               <div class="col-md-2 tintucconleft">
                   <ul>
                    <li><a href="chitiet.html">Thông tin báo chí</a></li>
                   <li><a href="chitiet.html">Thông tin từ các dự án</a></li>
                   <li><a href="chitiet.html">Thành tích của Egroup</a></li>
                   <li><a href="thuvienanh.html">Thư viện ảnh</a></li>
                  <li><a href="thuvienvideo.html">Thư viện Video</a></li>
                  </ul>
               </div>

               @foreach($ao_con as $val)
                <div class="col-md-2 tintuccongiua">
                <div class="mottram">
                   <div class="item_tintuc menucon1">
                    <div class="left_30">
                      <a href=""><img class="img_menu_con" src="{{url('public/backend/product')}}/{{$val->cat_icon}}" alt=""></a>
                    </div>
                    <div class="right_70">
                      <p class="title_con_new" align="left" style="padding-left: 10px;"> 
                        <a href="{{url("danh-muc/$val->cat_slug.html")}}">{{$val->cat_name}}</a>
                        <br> <br>
                      
                      </p>
                      <p class="sl_sp"><i class="fa fa-ellipsis-v" aria-hidden="true"></i> 150: Sản phẩm</p>
                     
                    </div>
                 </div>
                </div>
               </div>
               @endforeach
             </li>
            </ul>
          </li>

         <li class="dropdown quanmenu">
            <a class="dropdown-toggle" data-toggle="dropdown" href="{{url("$quan->cat_slug.html")}}">
              {{$quan->cat_name}}
                <i class="fa fa-chevron-down" aria-hidden="true"></i>
          </a>
          <div class="xoaydiv"></div>
            <ul class="dropdown-menu tintucmenucon">
             <li class="container">
               <div class="col-md-2 tintucconleft">
                   <ul>
                    <li><a href="chitiet.html">Thông tin báo chí</a></li>
                   <li><a href="chitiet.html">Thông tin từ các dự án</a></li>
                   <li><a href="chitiet.html">Thành tích của Egroup</a></li>
                   <li><a href="thuvienanh.html">Thư viện ảnh</a></li>
                  <li><a href="thuvienvideo.html">Thư viện Video</a></li>
                  </ul>
               </div>

               @foreach($quan_con as $val)
                <div class="col-md-2 tintuccongiua">
                <div class="mottram">
                   <div class="item_tintuc menucon1">
                    <div class="left_30">
                      <a href=""><img class="img_menu_con" src="{{url('public/backend/product')}}/{{$val->cat_icon}}" alt=""></a>
                    </div>
                    <div class="right_70">
                      <p class="title_con_new" align="left" style="padding-left: 10px;"> 
                        <a href="{{url("danh-muc/$val->cat_slug.html")}}">{{$val->cat_name}}</a>
                        <br> <br>
                      
                      </p>
                      <p class="sl_sp"><i class="fa fa-ellipsis-v" aria-hidden="true"></i> 150: Sản phẩm</p>
                     
                    </div>
                 </div>
                </div>
               </div>
               @endforeach
               
             </li>
            </ul>
          </li>





  	     <li class="dropdown">
  	      <a class="dropdown-toggle" data-toggle="dropdown" href="{{url("$vaynu->cat_slug.html")}}">
  	   
            {{$vaynu->cat_name}}
            <i class="fa fa-chevron-down" aria-hidden="true"></i>
  	      </a>
          <div class="xoaydiv"></div>
  	        <ul class="dropdown-menu" id="dropdownlaptrinh">
              @foreach($vaynu_con as $val)
                 <li><a href="{{url("danh-muc/$val->cat_slug.html")}}">{{$val->cat_name}}</a></li>
              @endforeach()
  	        
  	        </ul>
  	      </li>


            <li class="dropdown">
          <a class="dropdown-toggle" data-toggle="dropdown" href="{{url("$bodonucha->cat_slug.html")}}">
       
            {{$bodonucha->cat_name}}
            <i class="fa fa-chevron-down" aria-hidden="true"></i>
          </a>
          <div class="xoaydiv"></div>
            <ul class="dropdown-menu" id="dropdownlaptrinh">
              @foreach($bodonu_con as $val)
                 <li><a href="{{url("danh-muc/$val->cat_slug.html")}}">{{$val->cat_name}}</a></li>
              @endforeach()
            
            </ul>
          </li>
           <li class="dropdown">
          <a class="dropdown-toggle" data-toggle="dropdown" href="{{url("$doboidotam->cat_slug.html")}}">
       
            {{$doboidotam->cat_name}}
            <i class="fa fa-chevron-down" aria-hidden="true"></i>
          </a>
          <div class="xoaydiv"></div>
            <ul class="dropdown-menu" id="dropdownlaptrinh">
              @foreach($doboidotam_con as $val)
                 <li><a href="{{url("danh-muc/$val->cat_slug.html")}}">{{$val->cat_name}}</a></li>
              @endforeach()
            
            </ul>
          </li>
  	     


           <li class="dropdown tintuccate">
            <a class="dropdown-toggle" data-toggle="dropdown" href="{{url("$tintuc->cat_slug.html")}}">
              {{$tintuc->cat_name}}
                <i class="fa fa-chevron-down" aria-hidden="true"></i>
          </a>
          <div class="xoaydiv"></div>
            <ul class="dropdown-menu tintucmenucon">
             <li class="container">
              <div class="col-md-3 tintuccongiua">
                @foreach($post_tintuc3 as $val)
                <div class="mottram">
                   <div class="item_tintuc">
                    <div class="left_15">
                      <a href="{{url("$tintuc->cat_slug/$val->post_slug.html")}}"><img class="" src="{{url('public/backend/post')}}/{{$val->post_img}}" alt=""></a>
                    </div>
                    <div class="right_85">
                      <p class="title_con_new"> 
                        <a href="{{url("$tintuc->cat_slug/$val->post_slug.html")}}">{{$val->post_name}}</a>
                      </p>
                     
                    </div>
                 </div>
                </div>
                @endforeach()
               </div>
               <div class="col-md-6">
                @foreach($post_tintuc4 as $val)
               <div class="nammoi tintuccongiua menu_tintuc_con">
                 <p><a href="{{url("$tintuc->cat_slug/$val->post_slug.html")}}"><img class="img_menucontoantrang" src="{{url('public/backend/post')}}/{{$val->post_img}}" alt=""></a></p>
                 <p class="title_14"><a href="{{url("$tintuc->cat_slug/$val->post_slug.html")}}">{{$val->post_name}}</a></p>
               </div>
               @endforeach()
               </div>
               
              

               <div class="col-md-3 tintuccongiua">
                @foreach($post_tintuc2 as $val)
                <div class="mottram">
                   <div class="item_tintuc">
                    <div class="left_15">
                      <a href="{{url("$tintuc->cat_slug/$val->post_slug.html")}}"><img class="img_menu_con" src="{{url('public/backend/post')}}/{{$val->post_img}}" alt=""></a>
                    </div>
                    <div class="right_85">
                      <p class="title_con_new"> 
                        <a href="{{url("$tintuc->cat_slug/$val->post_slug.html")}}">{{$val->post_name}}</a>
                      </p>
                    
                    </div>
                 </div>
                </div>
                @endforeach()
               </div>

             </li>
            </ul>
          </li>
  	      <li><a href="{{url("$tuyendung->cat_slug.html")}}">{{$tuyendung->cat_name}}</a></li>
          <li style="border-right: none !important"><a href="{{url("$lienhe->cat_slug.html")}}">{{$lienhe->cat_name}}</a></li>
        
  	     
  	    </ul>
  	</div>
    </div>
  </nav>
<!-- endmenudestop-->
<!-- menu mobi-->
<nav class="navbar navbar-inverse menutopmobi">
  <div class="container">
    <div class="row">
    <div class="navbar-header">
      <a class="logolap" href="{{url('')}}">
        <img src="{{url('public/backend/header')}}/{{$header_footer->logo1}}" alt="">
      </a>
    </div>
    <ul class="nav navbar-nav content_menu">
        <a class="navbar-brand logolap logolapmobi" href="{{url('')}}">
        <img src="{{url('public/backend/header')}}/{{$header_footer->logo1}}" alt="">
      </a>
      
        <p class="fa_time_mobi"><a href="javascript:void(0)">
        <i class="fa fa-times" id="clickitemfatime" aria-hidden="true"></i></a>
      </p>
    <li><a href="{{url('')}}">TRANG CHỦ</a></li>

     <li class="dropdown">
      <a class="dropdown-toggle a_menu_mobi" data-toggle="dropdown" href="{{url("$ao->cat_slug.html")}}">{{$ao->cat_name}}
      <i class="fa fa-chevron-down" aria-hidden="true"></i>
      <i class="fa fa-chevron-up" aria-hidden="true"></i>
    </a>
        <ul class="dropdown-menu">
           @foreach($ao_con as $val)
          <li>
            <a href="{{url("danh-muc/$val->cat_slug.html")}}">
              <i class="fa fa-angle-double-right" aria-hidden="true"></i>
              {{$val->cat_name}}
          </a>
        </li>
          @endforeach
        </ul>
      </li>

      <li class="dropdown">
        <a class="dropdown-toggle dropdown1 a_menu_mobi" data-toggle="dropdown" href="{{url("$quan->cat_slug.html")}}">{{$quan->cat_name}}  
         <i class="fa fa-chevron-down" aria-hidden="true"></i>
         <i class="fa fa-chevron-up" aria-hidden="true"></i>
      </a>
        <ul class="dropdown-menu">
           @foreach($quan_con as $val)
          <li>
           <a href="{{url("danh-muc/$val->cat_slug.html")}}">
              <i class="fa fa-angle-double-right" aria-hidden="true"></i>
              {{$val->cat_name}}
          </a>
          </li>
         @endforeach
        </ul>
      </li>

       <li class="dropdown">
        <a class="dropdown-toggle dropdown1 a_menu_mobi" data-toggle="dropdown" href="{{url("$vaynu->cat_slug.html")}}">{{$vaynu->cat_name}}  
         <i class="fa fa-chevron-down" aria-hidden="true"></i>
         <i class="fa fa-chevron-up" aria-hidden="true"></i>
      </a>
        <ul class="dropdown-menu">
           @foreach($vaynu_con as $val)
          <li>
           <a href="{{url("danh-muc/$val->cat_slug.html")}}">
              <i class="fa fa-angle-double-right" aria-hidden="true"></i>
              {{$val->cat_name}}
          </a>
          </li>
         @endforeach
        </ul>
      </li>

        <li class="dropdown">
        <a class="dropdown-toggle dropdown1 a_menu_mobi" data-toggle="dropdown" href="{{url("$bodonucha->cat_slug.html")}}">{{$bodonucha->cat_name}}  
         <i class="fa fa-chevron-down" aria-hidden="true"></i>
         <i class="fa fa-chevron-up" aria-hidden="true"></i>
      </a>
        <ul class="dropdown-menu">
           @foreach($bodonu_con as $val)
          <li>
           <a href="{{url("danh-muc/$val->cat_slug.html")}}">
              <i class="fa fa-angle-double-right" aria-hidden="true"></i>
              {{$val->cat_name}}
          </a>
          </li>
         @endforeach
        </ul>
      </li>

    <li class="dropdown">
        <a class="dropdown-toggle dropdown1 a_menu_mobi" data-toggle="dropdown" href="{{url("$doboidotam->cat_slug.html")}}">{{$doboidotam->cat_name}}  
         <i class="fa fa-chevron-down" aria-hidden="true"></i>
         <i class="fa fa-chevron-up" aria-hidden="true"></i>
      </a>
        <ul class="dropdown-menu">
           @foreach($doboidotam_con as $val)
          <li>
           <a href="{{url("danh-muc/$val->cat_slug.html")}}">
              <i class="fa fa-angle-double-right" aria-hidden="true"></i>
              {{$val->cat_name}}
          </a>
          </li>
         @endforeach
        </ul>
      </li>




       <li><a href="{{url("$tuyendung->cat_slug.html")}}">{{$tuyendung->cat_name}}</a></li>
        <li style="border-right: none !important"><a href="{{url("$lienhe->cat_slug.html")}}">{{$lienhe->cat_name}}</a></li>
      <!--<li><form action="" class="margin_left20"><input type="text" value="Tìm kiếm"> <input type="submit" value="Tìm kiếm"></form></li>-->
    </ul>
    <a id="clickmenu" href="javascript:void(0)" style="display: none;">
    <i class="fa fa-bars" id="clickitem" aria-hidden="true"></i>
    </a>

  </div>
</div>
  </div>
</nav>


<!-- end menu mobi-->
<script>
  $(document).ready(function()
  {
    $('#clickitem').click(function()
    {
      $('.content_menu').show(300);
    });
    $('#clickitemfatime').click(function()
    {
      $('.content_menu').hide(300);
      $('#clickitem').show();
    });
  });
</script>
<script>
  $(document).ready(function()
  {
    $('.menudesktop .dropdown').hover(
    function()
    {
      $(this).find("ul:first").slideDown(200);
       $(this).find(".xoaydiv:first").show();

    },function()
    {
       $(this).find("ul:first").hide(100);
       $(this).find(".xoaydiv:first").hide();
    });

    $('.menutopmobi .dropdown').hover( function()
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