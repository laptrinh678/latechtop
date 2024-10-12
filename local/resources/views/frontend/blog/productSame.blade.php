@if($postDetail->productPost)
<h3>Dowload nhanh tài liệu vòng 2 để ôn tập</h3>
@foreach($postDetail->productPost as $product)
<p><a href="{{ url("san-pham/$product->cate_id/$product->slug.html") }}" target="_blank">{{ $product->name }}</a></p>
@endforeach
@endif

                        
