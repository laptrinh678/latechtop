<div class="col-md-8 col-sm-12">
    <label class="cat-title titlenew w-100" for="">
        <h3>
            <a class="text-white" href="#">TIN NỔI BẬT</a>
        </h3>
    </label>
    @if ($newOutstanding)
        @foreach ($newOutstanding as $postItem)
            <div class="d-flex flex-row bd-highlight mb-3 bg-white">
                <div class="p-2 bd-highlight w-25"><a
                        href="{{ url("bai-viet/$postItem->id/$postItem->slug.html") }}"><img class="w-100"
                            height="100px" src="{{ url('public/backend') }}/@if($postItem->cate->img_default==1){{ $postItem->cate->icon }} @else {{ $postItem->icon }} @endif"
                            alt="{{ $postItem->name }}"></a></div>
                <div class="p-2 bd-highlight w-75">
                    <h3><a class="text-body" style="color:black !important;"
                            href="{{ url("bai-viet/$postItem->id/$postItem->slug.html") }}">{{ $postItem->name }}</a>
                    </h3>
                    <p class="text-body"> {!! Str::limit($postItem->des, 240) !!}</p>
                </div>
            </div>
        @endforeach
    @endif
    <label class="w-100 cat-title titlenew" for="">
        <h3>
            <span class="text-white provinceButton" style="cursor: pointer;">HIỂN THỊ THÔNG BÁO THEO
                TỈNH/THÀNH <i class="fa fa-angle-double-down" aria-hidden="true"></i></span>
        </h3>
    </label>
    <div class="w-100 province p-2" style="display: none;">
        @if ($province)
            @foreach ($province as $province)
                <button class="btn btn-info mb-2 ajaxgetPostProvince" c-data="{{ $province->province_id }}"
                    style="font-size: 13px;">{{ $province->name }}</button>
            @endforeach
        @endif
    </div>
    <div class="w-100" id="listpostWhereProvince">
        @if ($provincePost)
            @foreach ($provincePost as $postItem)
                <div class="d-flex flex-row bd-highlight mb-3 bg-white">
                    <div class="p-2 bd-highlight w-25"><a
                            href="{{ url("bai-viet/$postItem->id/$postItem->slug.html") }}"><img
                                class="w-100" height="100px"
                                src="{{ url('public/backend') }}/@if($postItem->cate->img_default==1){{ $postItem->cate->icon }}@else{{$postItem->icon}}@endif"
                                alt=""></a></div>
                    <div class="p-2 bd-highlight w-75">
                        <h3><a class="text-body" style="color:black !important;"
                                href="{{ url("bai-viet/$postItem->id/$postItem->slug.html") }}">{{ $postItem->name }}</a>
                        </h3>
                        <p class="text-body"> {!! Str::limit($postItem->des, 240) !!}</p>
                    </div>
                </div>
            @endforeach
        @endif
    </div>
</div>