  <!--menu desktop -->
  <nav class="navbar navbar-inverse menudesktop bgFull">
    <div id="menu_click">
      <div class="container">
     <div class="row">
  	    <ul class="nav navbar-nav ">
          <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="{{url('/')}}"><i class="fa fa-home" aria-hidden="true"></i></a> 
          </li>
           @foreach($menu_ngang as $v)
          <li class="dropdown">
            <a class="dropdown-toggle" data-toggle="dropdown" href="{{url("$v->id/$v->slug")}}.html">
                {{$v->name}}
                  <?php 
                 $menucon = DB::table('posts')->where('cate_id', $v->id)->get()->toArray();
                  ?>
                  @if(count($menucon)>0)
                <i class="fa fa-chevron-down" aria-hidden="true"></i>
                @endif
          </a>
            @if($menucon !='')
            <ul class="dropdown-menu bgFull" id="dropdownlaptrinh">
              @foreach($menucon as $vcon)
                 <li> <a href="{{url("$vcon->slug.html")}}"><i class="fa fa-angle-double-right" aria-hidden="true"></i> {{$vcon->name}} </a></li>
              @endforeach
            </ul>
            @endif
          </li>
          @endforeach
        </ul>
  	</div>
    </div>
    </div>
  </nav>
<!-- endmenudestop-->
<!-- menu mobi-->
@include('frontend.Itempage.menuMobile_Xgrenhome')




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
  });
</script>