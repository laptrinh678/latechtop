<nav class="navbar navbar-inverse menutopmobi bg-white">
  <div class="container">
    <div class="row">
    <div class="navbar-header">
      <a class="logolap" href="{{url('')}}">
        <img src="{{url('public/backend')}}/{{$header_footer->logo}}" alt="">
      </a>
    </div>
    <ul class="nav navbar-nav content_menu">
    
    <ul class="list-group">
          <li class="list-group-item" style="height: 90px;padding-top: 44px;">
            <div class="w50">
              <a class="navbar-brand logolap logolapmobi" href="{{url('')}}">
              <img src="{{url('public/backend')}}/{{$header_footer->logo}}" alt="">
              </a>
            </div>
            <div class="w50 text-right" style="padding-right: 20px;">
              <a href="javascript:void(0)">
                <i class="fa fa-times colorFull" id="clickitemfatime" aria-hidden="true"></i></a>
            </div>
          </li>
           @foreach($menu_ngang as $v)
          @if($v->parent_id==0)
          <li class="list-group-item itemcate">
              <a href="{{url("$v->id/$v->slug")}}.html">{{$v->name}}</a>
              <?php $menuconMobile = DB::table('posts')->where('cate_id', $v->id)->get()->toArray();?>
                  @if(count($menuconMobile)>0)
                <i class="fa fa-chevron-down" aria-hidden="true"></i>
                @endif
           

            <ul class="catemenu">
               @if($menuconMobile !='')
              @foreach($menuconMobile as $vcon)
              <li >
                <a href="{{url("$vcon->slug.html")}}">{{$vcon->name}}</a>
              </li>
               @endforeach()
            </ul>
              @endif

          </li>
            @endif
          @endforeach()
         
          
          
         
        </ul>
    </ul>
    <a id="clickmenu" href="javascript:void(0)" style="display: none;">
    <i class="fa fa-bars colorFull" id="clickitem" aria-hidden="true"></i>
    </a>

  </div>
</div>
</nav>
<script>
  $(document).ready(function()
  {

    $('.itemcate').hover(function(){
       $(this).find("ul:first").slideToggle(200);
    })
    // $('body').on('click','.itemcate', function(){
    //    $(this).find("ul:first").slideToggle(200);
    //    window.stop();
    // });

  });
</script>