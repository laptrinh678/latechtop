<div class="news_home">
    <div class="container">
        <div class="title">
            <p>{{ $newpost->name }}</p>
        </div>
        <div class="owl-carousel owl-theme new-carousel owl-loaded owl-drag">
            @if ($newpost->posts)
                @foreach ($newpost->posts as $v3)
                    <div class="item">
                        <div class="latest_item">
                            <a href="{{ url("bai-viet/$v3->id/$v3->slug.html") }}">
                                <img height="200px" src="{{ url('public/backend') }}/{{ $v3->icon }}"
                                    alt="{{ $v3->name }}">
                            </a>
                            <div>
                                <br>
                                <h3><a href="{{ url("bai-viet/$v3->id/$v3->slug.html") }}">
                                        {{ Str::limit($v3->name, 75) }}</a>
                                </h3>
                                <div class="brief">
                                    {!! Str::limit($v3->des, 140) !!}
                                </div>
                                <a class="more" href="{{ url("bai-viet/$v3->id/$v3->slug.html") }}">Chi
                                    tiết
                                    <svg class="svg-inline--fa fa-chevron-right fa-w-10" aria-hidden="true"
                                        data-prefix="fas" data-icon="chevron-right" role="img"
                                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512" data-fa-i2svg="">
                                        <path fill="currentColor"
                                            d="M285.476 272.971L91.132 467.314c-9.373 9.373-24.569 9.373-33.941 0l-22.667-22.667c-9.357-9.357-9.375-24.522-.04-33.901L188.505 256 34.484 101.255c-9.335-9.379-9.317-24.544.04-33.901l22.667-22.667c9.373-9.373 24.569-9.373 33.941 0L285.475 239.03c9.373 9.372 9.373 24.568.001 33.941z">
                                        </path>
                                    </svg>
                                </a>
                                <div class="clearfix"></div>
                            </div>
                        </div>
                    </div>
                @endforeach
            @endif
        </div>
    </div>
</div>