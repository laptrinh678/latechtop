<div class="container">
    <div class="row">
        <h3> <a href="{{ url('/') }}" target="_blank">Tuyendungcongchuc247.com</a>  xin chào :  {{ $infor['user_name'] }}</h3>
        <div>
            <a href="{{ url('/') }}" target="_blank">Tuyendungcongchuc247.com</a> gửi bạn link dowload tài liệu {{ $infor['name'] }}
        </div>
        <h4>Click vào link bên dưới sẽ mở ra mà hình có: Tên tài liệu và chữ dowload sau đó bạn nhấn chữ DOWLOAD để tải tài liệu về máy</h4>

        <p> <h2><a class="text-danger" href=" {{ $infor['link'] }}" target="_blank" rel="noopener noreferrer">Dowload {{ $infor['name'] }}</a></h2></p> 
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