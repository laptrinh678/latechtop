
<div class="slider_box" style="padding-top:10px; padding-bottom:10px;padding-left:5px; padding-right:5px;">
    <div class="container">
        <div class="row">
            <div class="col-md-3" style="padding: 0px">
                <ul class="list-group" style="padding: 0px;">
                    <li class="list-group-item font-weight-bold text-light" style="background: #228a0a">
                        <i class="fa fa-gift" aria-hidden="true"></i> QUÀ TẶNG</li>
                    @foreach($blogQuaTang as $v)
                    <a href="{{url("danh-muc/$v->id/$v->type_menu/$v->slug.html")}}" class="text-dark font-weight-bold">
                        <li class="list-group-item"><i class="fa fa-gift text-danger" aria-hidden="true"></i> {{$v->name}}</li>
                    </a>
                    @endforeach
                  </ul>
            </div>
            <div class="col-md-9">
                <div class="owl-carousel owl-theme slider-carousel owl-loaded owl-drag">
                    @foreach($slider as $val)
                    <div class="item">
                            <img height="400" src="{{url('public/backend')}}/{{$val->img}}" alt="">
                    </div>
                    @endforeach

                </div>
            </div>
        </div>
    </div>


</div>
