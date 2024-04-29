<div class="partner_home d-none d-md-block">
    <div class="container owlparent">
        <div class="owl-carousel owl-theme partner-carousel owl-loaded owl-drag">
            @foreach($slider_doitac as $v)
            <div class="item">
                <a href=""><img src="{{url('public/backend')}}/{{$v->img}}" alt="17"></a>
            </div>
            @endforeach
            
        </div>
    </div>
</div>