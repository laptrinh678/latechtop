<div class="item-product">
    <br>
    <h4 class="text-center">Tài liệu liên quan đến bộ câu hỏi trắc nghiệm giúp cho việc ôn tập được tốt hơn</h4>
    <h3 class="text-center text-danger">Mua về ôn tập ủng hộ nhóm duy trì server</h3>
    @if($question && $question->questionGroup && $question->questionGroup->questionGroupProduct)
    @foreach($question->questionGroup->questionGroupProduct as $product)
    <div class="col-sm-4">
        <div class="p-2 bd-highlight"><a
            href="{{ url("san-pham/$product->cate_id/$product->slug.html") }}"><img
                class="w-100" src="{{ url('public/backend') }}/@if($product->cate->img_default==1){{ $product->cate->icon }}@else{{$product->icon}}@endif"
                alt="{{ $product->name }}"></a></div>
        <div class="p-2 bd-highlight text-center">
            <h5><a class="more" style="color:black;" href="{{ url("san-pham/$product->cate_id/$product->slug.html") }}">{{ $product->name }}</a></h5>
        </div>
        @if ($product->price != 0)
        <form class="row no-gutters" action="{{ url("cart/add/$product->id") }}" method="GET">
            <input type="hidden" value="876" name="product_cart">
            <div class="col-3 input_cart">
                <input style="height: 34px;" type="hidden" name="quantity_cart" value="1" min="1"
                    max="10">
            </div>
            <div class="col-4 button_cart">
                <button class="btn btn-success" type="submit" name="btn_order"><strong>MUA NGAY</strong>
                </button>
            </div>
        </form>
    @endif
    </div>
    @endforeach
    @endif
</div>