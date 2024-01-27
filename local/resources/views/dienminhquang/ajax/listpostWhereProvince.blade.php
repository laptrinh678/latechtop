@if (count($listpostWhereProvince)>0)
    @foreach ($listpostWhereProvince as $postItem)
        <div class="d-flex flex-row bd-highlight mb-3 bg-white">
            <div class="p-2 bd-highlight w-25"><a href="{{ url("bai-viet/$postItem->id/$postItem->slug.html") }}"><img
                        class="w-100" height="100px" src="{{ url('public/backend') }}/{{ $postItem->icon }}"
                        alt=""></a></div>
            <div class="p-2 bd-highlight w-75">
                <h3><a class="text-body" style="color:black !important;"
                        href="{{ url("bai-viet/$postItem->id/$postItem->slug.html") }}">{{ $postItem->name }}</a>
                </h3>
                <p class="text-body"> {!! Str::limit($postItem->des, 240) !!}</p>
            </div>
        </div>
    @endforeach
@else
<p class="text-center">	<strong> Không có dữ liệu vui lòng chọn tỉnh khác</strong></p>
@endif
