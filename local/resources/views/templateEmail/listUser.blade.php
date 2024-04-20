<div class="container">
    <div class="row">
        <h3>Tuyendungcongchuc247.com xin chào : {{ $infor['userName'] ?? '' }}</h3>
        <div>
            {{ $infor['text'] }}
        </div>
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