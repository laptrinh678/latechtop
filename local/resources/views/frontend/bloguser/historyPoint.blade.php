<div class="col-12 col-md-12 right">
    <h4 class="text-danger">Lịch sử đổi điểm sang tiền</h4>
    <table class="table">
        <thead>
        <tr>
            <th>Ngày đổi điểm</th>
            <th>Tháng</th>
            <th>Doanh thu</th>
            <th>Trạng thái</th>
        </tr>
        </thead>
        <tbody>
        @foreach($history as $v)
            <tr>
                <td>
                    {{$v->created_at->format('h:m d/m/Y')}}
                    <br>
                    {{--                                        <button class="btn btn-success">Đã thanh toán</button>--}}
                    {{--                                        <br>--}}

                </td>

                <td>
                    {{$v->created_at->format('m/Y')}}
                </td>
                <td>
                        <?php
                        $diemcu = json_decode($v->diemcu, true);
                        ?>
                    <p>Doanh thu:@if($diemcu['doanhthu'])  {{$diemcu['doanhthu']}} @endif triệu VNĐ</p>
                <td>
                <td>
                    @if($v->status ==0)

                            <button class="btn btn-danger">Chưa thanh toán</button>

                    @else
                        <button class="btn btn-success">Đã thanh toán</button>
                    @endif
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>