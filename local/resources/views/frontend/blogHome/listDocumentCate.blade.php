<div class="list-cate-document news_home">
    <div class="container">
        <div class="row">
            <div class="title w-100">
                <p>DANH MỤC TÀI LIỆU ÔN THI CÔNG CHỨC, VIÊN CHỨC CÁC NGÀNH</p>
            </div>
            @foreach ($listDocumentCate as $documentCate)
                <div class="col-2 col-sm-3 p-2">
                    <a style="color:black !important;"
                        href="{{ url("bai-viet/$documentCate->id/$documentCate->slug.html") }}">
                        {{ $documentCate->name }}
                    </a>
                </div>
            @endforeach
        </div>
    </div>
</div>
