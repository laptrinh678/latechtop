@if($blogDetailproduct)
@foreach($blogDetailproduct as $cate)
<label class="w-100 cat-title titlenew" for="">
    <h3>
        <a class="text-white" href="#">{{ $cate->name ?? '' }}</a>
    </h3>
</label>
@if($cate->product)
@foreach($cate->product as $product)
<div class="d-flex flex-row bd-highlight mb-3 bg-white">
    <div class="p-2 bd-highlight w-25"><a
            href="{{ url("san-pham/$product->cate_id/$product->slug.html") }}"><img
                class="w-100" src="{{ url('public/backend') }}/@if($product->icon != null){{ $product->icon }}@else{{$product->iconCate}}@endif"
                alt="{{ $product->name }}"></a></div>
    <div class="p-2 bd-highlight w-75">
        <h5><a class="more" style="color:black;" href="{{ url("san-pham/$product->cate_id/$product->slug.html") }}">{{ $product->name }}</a></h5>
    </div>
</div>
@endforeach
@endif
@endforeach
@endif
