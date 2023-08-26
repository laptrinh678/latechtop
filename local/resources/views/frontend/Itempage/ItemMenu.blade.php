  <!--menu desktop -->
  <nav class="navbar navbar-inverse menudesktop bgFull">
    <div id="menu_click">
        <div class="container">
     <div class="row">
        <ul class="nav navbar-nav">
           @foreach($menu_chantrang as $v)
          <li class="dropdown">
            <a class="dropdown-toggle" data-toggle="dropdown" href="{{url("$v->id/$v->slug")}}.html">
                {{$v->name}}
            </a>
          @endforeach
        </ul>
    </div>
    </div>
    </div>
  </nav>
<!-- endmenudestop-->

