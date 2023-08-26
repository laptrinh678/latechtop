<a href="javascript:void(0);">
    <div class="member-view-box">
        <div class="member-image">
            @if($v->avata !='')
                <img src="{{url('public/backend')}}/{{$v->avata}}" width="5" {{ $v->name }}>
            @endif
            <div class="member-details">
                <h5 cdata="<?php echo json_encode($v);?>">{{ $v->name }} </h5>
                <p>{{$v->code}} - {{$v->id}}</p>
                <p>Điểm cá nhân :{{$v->point}}</p>
                <p>Trái :{{ $v->diem_nhanhtrai}} | Phải : {{ $v->diem_nhanhphai}}</p>
            </div>
        </div>
    </div>
</a>

