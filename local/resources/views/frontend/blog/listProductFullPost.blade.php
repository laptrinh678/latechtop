@if($blogProductPostDetail)
@foreach($blogProductPostDetail as $product)
<p><a href="{{ url("san-pham/$product->cate_id/$product->slug.html") }}" target="_blank">{{ $product->name }}</a></p>
@endforeach
@endif