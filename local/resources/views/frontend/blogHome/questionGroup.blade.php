<div class="list-cate-document news_home">
    <div class="title w-100">
        <p>DANH MỤC TRẮC NGHIỆM VÒNG 2</p>
    </div>
    <div class="row">
        @foreach ($cates as $cate)
            @if ($cate->id === 113)
                @if ($cate->childrenMenu && count($cate->childrenMenu) > 0)
                    @foreach ($cate->childrenMenu as $childrenMenu)
                        <div  class="col-sm-3">
                            <p>{{ $childrenMenu->name }}   </p>
                            <ul class="list-group p-0">
                                @if ($childrenMenu->questionGroup && count($childrenMenu->questionGroup) > 0)
                                    @foreach ($childrenMenu->questionGroup as $questionGroup)
                                        <a href="{{ url("trac-nghiem/$questionGroup->id/$questionGroup->slug.html") }}"
                                            class="text-dark font-weight-bold">
                                            <li class="list-group-item p-0" style="border:none;">{{ $questionGroup->name }}</li>
                                        </a>
                                    @endforeach
                                @endif
                            </ul> 
                        </div>
                    @endforeach
                @endif
            @endif
        @endforeach
    </div>
</div>
