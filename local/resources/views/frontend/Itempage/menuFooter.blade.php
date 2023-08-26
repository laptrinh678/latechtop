<ul class="list-group">
	 @foreach($menu_chantrang as $v)
  <a href="{{url("$v->id/$v->slug")}}.html" class="text-lowercase"><li class="list-group-item borderTop0">  {{$v->name}}</li></a>
    @endforeach
</ul>