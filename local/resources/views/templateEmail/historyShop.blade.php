<div class="container">
    <div class="row">
        <h3>Tuyendungcongchuc247.com xin chào : {{ $infor['userName'] ?? '' }}</h3>
        <p>Bạn quan tâm đến tài liệu: <strong>{{ $infor['name'] ?? '' }}</strong></p>
        <p>Tuyendungcongchuc247.com đang có chương trình khuyến mại 20%</p>
        <p>Bạn click vào link bên dưới để mua tài liệu nhé</p>
        <?php
        $productId = $infor['product_id'];
        $slug = $infor['pro_slug'];
        ?>
         <h2><a class="text-danger" href="{{url("chi-tiet-san-pham/$productId/$slug")}}" target="_blank" rel="noopener noreferrer">{{ $infor['name'] ?? '' }}</a></h2>
        <p>Nhanh tay vì thời gian khuyến mại có hạn</p> 
        <p>Mua tài liệu để ủng hộ 100 đồng vào quỹ tặng sách cho trẻ em vùng cao</p> 
    </div>
    <div class="row">
        <p>Mọi thông tin chi tiêt vui lòng liên hệ</p>
        <p><a href="{{ url('') }}">{{ url('') }}</a></p>
        <p>Hotline: {{$imfomation->hotline}}</p>
        <p><img src="{{ url('public/backend') }}/{{ $imfomation->img1 }}" alt=""></p>
    </div>
    <div class="row">
        <h3>Tham gia group facebook để nhận nhiều thông tin mới : <a href="https://www.facebook.com/groups/233184384015587" target="_blank" rel="noopener noreferrer">Đến group tuyển dụng - tài liệu ôn thi công chức-viên chức</a></h3>
    </div>
</div>