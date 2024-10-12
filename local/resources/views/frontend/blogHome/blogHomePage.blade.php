@if ($blogHomePage)
@foreach ($blogHomePage as $itemblog)
    <label class="w-100 cat-title titlenew" for="">
        <h3>
            <a class="text-white" href="#">{{ $itemblog->name }}</a>
        </h3>
    </label>
    @if ($itemblog->product)
        @foreach ($itemblog->product as $product)
            <div class="d-flex flex-row bd-highlight mb-3 bg-white">
                <div class="p-2 bd-highlight w-25"><a
                        href="{{ url("san-pham/$product->cate_id/$product->slug.html") }}"><img
                            class="w-100" src="{{ url('public/backend') }}/@if($product->cate->img_default==1){{ $product->cate->icon }}@else{{$product->icon}}@endif"
                            alt="{{ $product->name }}"></a></div>
                <div class="p-2 bd-highlight w-75">
                    <h5><a class="more" style="color:black;" href="{{ url("san-pham/$product->cate_id/$product->slug.html") }}">{{ $product->name }}</a></h5>
                </div>
            </div>
        @endforeach
    @endif
@endforeach
@endif