
<label class="w-100 cat-title titlenew" for="">
    <h3>
        <a class="text-white" href="#">SẢN PHẨM NỔI BẬT</a>
    </h3>
</label>
<div>
	@if($sp_noibat)
	@foreach($sp_noibat as $vnb)
	<div class="row no-gutters item_n bg-white" style="padding: 5px;">
		<div class="col-4 img_col">
		<a href="{{url("san-pham/$vnb->cate_id/$vnb->slug.html")}}" title="{{$vnb->name}}">
		<img height="30px" src="{{url('public/backend')}}/{{$vnb->icon}}" alt="{{$vnb->name}}">
		</a>
		</div>
		<div class="col-8 brief_col">
		<a href="{{url("san-pham/$vnb->cate_id/$vnb->slug.html")}}" title="{{$vnb->name}}">
		{{$vnb->name}}
	   </a>
		</div>
	</div>
	@endforeach
	@endif

</div>
