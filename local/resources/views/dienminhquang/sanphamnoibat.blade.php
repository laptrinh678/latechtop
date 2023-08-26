<p>SẢN PHẨM NỔI BẬT</p>
<div>
	@if($sp_noibat)
	@foreach($sp_noibat as $vnb)
	<div class="row no-gutters item_n">
		<div class="col-4 img_col">
		<a href="{{url("san-pham/$vnb->cate_id/$vnb->slug.html")}}" title="{{$vnb->name}}">
		<img src="{{url('public/backend')}}/{{$vnb->icon}}" alt="{{$vnb->name}}">
		</a>
		</div>
		<div class="col-8 brief_col">
		<a href="{{url("san-pham/$vnb->cate_id/$vnb->slug.html")}}" title="{{$vnb->name}}">
		{{$vnb->name}}
	   </a>
	   <p>
	   		<span>
			Liên hệ
			</span>
	   </p>

		</div>
	</div>
	@endforeach
	@endif

</div>
