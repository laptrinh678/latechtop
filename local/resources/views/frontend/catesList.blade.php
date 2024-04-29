<p>Danh mục sản phẩm</p>
<ul>
    @if($menu_sp)
        @foreach($menu_sp as $key=>$v)
            <li>
                <a  href=" {{url("danh-muc/$v->id/$v->type_menu/$v->slug.html")}}"
                   role="button" aria-expanded="false" aria-controls="collapse_cat{{$key}}">
                    {{$v->name}}
                </a>
            </li>
        @endforeach
    @endif
</ul>
